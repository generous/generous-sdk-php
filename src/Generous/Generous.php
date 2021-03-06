<?php

abstract class Generous
{
    public static $apiKey;
    public static $apiSecret;

    public static $apiVersion;

    public static $apiBaseUrl = 'https://api.genero.us';
    public static $apiBaseUrlVersion = 'v0';

    public static $apiTimeout = 80;
    public static $apiConnectTimeout = 30;

    const VERSION = '0.1.4';

    public static function getApiKey()
    {
        return self::$apiKey;
    }

    public static function setApiKey($apiKey, $apiSecret = null)
    {
        self::$apiKey = $apiKey;

        if($apiKey != null) {
            self::$apiSecret = $apiSecret;
        }
    }

    public static function setApiVersion($apiVersion)
    {
        self::$apiVersion = $apiVersion;
    }

    public static function setBaseUrl($apiBaseUrl = null, $apiBaseUrlVersion = null)
    {
        if($apiBaseUrl !== null) self::$apiBaseUrl = $apiBaseUrl;
        if($apiBaseUrlVersion !== null) self::$apiBaseUrlVersion = $apiBaseUrlVersion;
    }

    public static function getBaseUrl()
    {
        return self::$apiBaseUrl . '/' . self::$apiBaseUrlVersion . '/';
    }

    public static function setTimeout($timeout = 80, $connectTimeout = 30)
    {
        self::$apiTimeout = $timeout;
        self::$apiConnectTimeout = $connectTimeout;
    }

    public static function customRequest($method, $endpoints, $params = null)
    {
        $requestor = new Generous_ApiRequestor(self::$apiKey);

        return $requestor->request($method, $endpoints, $params);
    }
}