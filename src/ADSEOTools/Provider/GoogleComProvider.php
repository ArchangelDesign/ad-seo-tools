<?php

namespace ADSEOTools\Provider;


class GoogleComProvider implements ProviderInterface
{
    public function getSearchQuery(array $keywords, $page)
    {
        $query = urlencode(implode('+', $keywords));
        $p = $page == 0 ? "" : '&start=' . $page * 10;
        return "http://google.com/search?q=$query" . $p;
    }
}