<?php

namespace ADSEOTools\User;

use ADSEOTools\Provider\ProviderInterface;

class WebsiteEntity
{
    /**
     * @var int
     */
    private $adUserId;

    /**
     * @var int
     */
    private $websiteId;

    /**
     * @var string
     */
    private $websiteName;

    /**
     * @var string
     */
    private $websiteUrl;

    /**
     * @var array
     */
    private $keywords;

    /**
     * @var int
     */
    private $resultPages;

    /**
     * @var int hours
     */
    private $updateFrequency;

    /**
     * @var ProviderInterface
     */
    private $provider;

    /**
     * @return int
     */
    public function getAdUserId()
    {
        return $this->adUserId;
    }

    /**
     * @param int $adUserId
     * @return $this
     */
    public function setAdUserId($adUserId)
    {
        $this->adUserId = $adUserId;
        return $this;
    }

    /**
     * @return int
     */
    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    /**
     * @param int $websiteId
     * @return $this
     */
    public function setWebsiteId($websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteName()
    {
        return $this->websiteName;
    }

    /**
     * @param string $websiteName
     * @return $this
     */
    public function setWebsiteName($websiteName)
    {
        $this->websiteName = $websiteName;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * @param string $websiteUrl
     * @return $this
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return int
     */
    public function getResultPages()
    {
        return $this->resultPages;
    }

    /**
     * @param int $resultPages
     * @return $this
     */
    public function setResultPages($resultPages)
    {
        $this->resultPages = $resultPages;
        return $this;
    }

    /**
     * @return int
     */
    public function getUpdateFrequency()
    {
        return $this->updateFrequency;
    }

    /**
     * @param int $updateFrequency
     * @return $this
     */
    public function setUpdateFrequency($updateFrequency)
    {
        $this->updateFrequency = $updateFrequency;
        return $this;
    }

    /**
     * @return ProviderInterface
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param ProviderInterface $provider
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }


}