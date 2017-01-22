<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require "vendor/autoload.php";

$pr = new \ADSEOTools\PositionReporter();

$res = $pr->getSiteRanking(['krzyzowki', 'online'], 'enigma.org.pl');
var_dump($res);

var_dump($pr->getSiteRanking(['software', 'design'], 'archangel-design.com', 4));