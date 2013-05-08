<?php

abstract class Generous
{
	public static $apiKey;
	public static $apiSecret;

	public static $apiVersion;

	public static $apiBaseUrl = 'http://api.genero.us';
	public static $apiBaseUrlVersion = 'v1';

	const VERSION = '0.1.0';

	public static function getApiKey()
	{
		return self::$apiKey;
	}

	public static function setApiKey($apiKey, $apiSecret = null)
	{
		self::$apiKey = $apiKey;

		if($apiKey != null)
		{
			self::$apiSecret = $apiSecret;
		}

		self::setBaseUrl(self::$apiBaseUrl, self::$apiBaseUrlVersion);
	}

	public static function setApiVersion($apiVersion)
	{
		self::$apiVersion = $apiVersion;
	}

	public static function setBaseUrl($apiBaseUrl = null, $apiBaseUrlVersion = null)
	{
		if($apiBaseUrl == null) $apiBaseUrl = self::$apiBaseUrl;
		if($apiBaseUrlVersion != null) self::$apiBaseUrlVersion = $apiBaseUrlVersion;

		self::$apiBaseUrl = $apiBaseUrl . '/' . self::$apiBaseUrlVersion . '/';
	}

	public static function customRequest($method, $endpoints, $params = null)
	{
		$requestor = new Generous_ApiRequestor(self::$apiKey);

		return $requestor->request($method, $endpoints, $params);
	}
}