<?php

namespace ADSEOTools\Provider;


interface ProviderInterface
{
    public function getSearchQuery(array $keywords, $page);
}