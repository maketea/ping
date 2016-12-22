<?php
/**
 * Blog Ping
 * @author https://github.com/maketea
 */
require ("IXR_Library.php");

function xmlRpcPing($url, $title, $urlIndex, $url_key, $rss)
{

    $client = new IXR_Client($url);
    $client->timeout = 3;
    $client->useragent .= ' -- Shop123 Ping/2.0.0';
    $client->debug = false;

    if ($client->query('weblogUpdates.extendedPing', $title, $urlIndex, $url_key, $rss)) {
        return $client->getResponse();
    }

    if ($client->query('weblogUpdates.ping', $title, $urlIndex, $url_key)) {
        return $client->getResponse();
    }

    return false;
}

$title = "title";
$urlIndex = "http://yourblog.com/";
$url_key = "http://yourblog.com/postid";
$rss = "http://yourblog.com/feed";

xmlRpcPing('http://blogsearch.google.com/ping/RPC2', $title, $urlIndex, $url_key, $rss);

