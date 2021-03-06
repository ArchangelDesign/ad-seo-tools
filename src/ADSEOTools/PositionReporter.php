<?php

namespace ADSEOTools;


use ADSEOTools\Provider\GoogleComProvider;
use ADSEOTools\Provider\ProviderInterface;

class PositionReporter
{
    private $connector;

    public function __construct()
    {
        $this->connector = new \GuzzleHttp\Client();
    }

    private function fetchRawResults(ProviderInterface $provider, array $keywords, $page = 0)
    {
        $url = $provider->getSearchQuery($keywords, $page);
        $res = $this->connector->request('GET', $url);

        if ($res->getStatusCode() != 200) {
            throw new \Exception("Couldn't fetch results.");
        }

        return $this->filterResults($res->getBody());
    }

    private function filterResults($responseBody)
    {
        return $responseBody;
        $res = preg_replace('/<head>.*<\/head>/', '', $responseBody);
        $res = preg_replace('/<script([ \w="\/]*)?>.*<\/script>/', '', $res);
        $res = preg_replace('/<style>.*<\/style>/', '', $res);

        $res = preg_replace('/<div id=gbar>(.*?)<\/div>/', '', $res);
        $res = preg_replace('/<div id=guser width=100%>(.*?)<\/div>/', '', $res);
        $res = preg_replace('/<form(.*?)<\/form>/', '', $res);
        $res = preg_replace('/<tr ?(.*?)?>(.*?)<\/tr>/', '', $res, 4);
        $res = preg_replace('/<td id="leftnav" valign="top">(.*?)<\/td>/', '', $res, 1);
        return $res;
    }

    private function getResultCount($responseBody)
    {
        preg_match('/<div class="sd" id="resultStats">(.*?)<\/div>/', $responseBody, $matches);
        $resString = $matches[1];
        $matches = "";
        preg_match('/([\d,]){1,}/', $resString, $matches);
        return $matches[0];
    }

    private function getResultPages($responseBody)
    {
        preg_match_all('/<cite>(.*?)<\/cite>/', $responseBody, $result);
        $res = $result[1];
        foreach ($res as $k => $v) {
            $res[$k] = str_replace(['<b>', '</b>'], '', $v);
        }
        return $res;
    }

    public function getProvider($providerName)
    {
        switch ($providerName) {
            case 'google.com': return new GoogleComProvider();
            default: return new GoogleComProvider();
        }
    }

    public function getSearchResults($providerName, array $keywords, $pages = 1)
    {
        $provider = $this->getProvider($providerName);
        $pageResult = [];
        $resultCount = -1;
        for ($page = 0; $page < $pages; $page++) {
            $body = $this->fetchRawResults($provider, $keywords, $page);
            if ($resultCount == -1) {
                $resultCount = $this->getResultCount($body);
            }
            $pageResult = array_merge($pageResult, $this->getResultPages($body));
        }
        return [
            'count' => $resultCount,
            'pages' => $pageResult,
        ];
    }

    public function getSiteRanking(array $keywords, $site, $pageCount = 3, $provider = 'google.com')
    {
        $searchResults = $this->getSearchResults($provider, $keywords, $pageCount);
        $position = -1;
        foreach ($searchResults['pages'] as $pos => $address) {
            if (strpos($address, $site) !== false) {
                $position = $pos + 1;
                break;
            }
        }
        $searchResults['pageRanking'] = $position;
        $searchResults['site'] = $site;
        return $searchResults;
    }
}