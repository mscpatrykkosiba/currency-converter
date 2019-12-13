currency-converter-php
======================

PHP global currency converter using fixer.io API (include bitcoin, silver and gold).

## Getting Started

Register at fixer.io to download your free api key and replace with YOUR_API_KEY.

```php
<?php
	
	require __DIR__ .'/vendor/autoload.php';
	
	$value = new CConverter\Converter('YOUR_API_KEY');
	echo $value->cconv('EUR', 'USD'); // print for ex. 1.20303 (EUR -> USD)
	
	// set amount
	
	echo $value->cconv('EUR', 'USD', 10.20); // print for ex. 12.270906 (10.20 EUR -> USD)
	
	// set output digits number (with round up)
	
	echo $value->cconv('EUR', 'USD', 1, 4); // print for ex. 1.2030 (EUR -> USD)
	echo $value->cconv('EUR', 'USD', 1, 2); // print for ex. 1.20 (EUR -> USD)
	
	// convert by country short name
	
	echo $value->cconv('DE', 'USD'); // print for ex. 1.20303 (EUR -> USD)
	echo $value->cconv('DE', 'PL'); // print for ex. 4.20394 (EUR -> PLN)
	echo $value->cconv('HU', 'JP'); // print for ex. 400.30203 (HUF -> JPY)
	
	// convert for gold, sliver or bitcoin
	
	echo $value->cconv('EUR', 'BTC'); // print for ex. 0.00023 (EUR -> BTC) [BTC bitcoin]
	echo $value->cconv('USD', 'XAU'); // print for ex. 0.00223 (USD -> XAU) [XAU gold]
	echo $value->cconv('USD', 'XAU'); // print for ex. 0.00421 (USD -> XAG) [XAG silver]
	
	// convert currency using array
	
	$array = $value->cconv(array('EUR','PLN'), 'USD');
	var_dump($array); 
	/*
		var_dump($array) returns:
		EUR -> USD
		PLN -> USD
		..array
	*/
	$array = $value->cconv(array('EUR','PLN'), array('USD', 'GBP'));
	var_dump($array); 
	/*
		var_dump($array) returns:
		EUR -> USD
		EUR -> GBP
		PLN -> USD
		PLN -> GBP
		..array
	*/
	$array = $value->cconv('EUR', array('USD', 'GBP'));
	var_dump($array); 
	/*
		var_dump($array) returns:
		EUR -> USD
		EUR -> GBP
		..array
	*/
	
```

## Caching currency

```php
<?php
	
	require __DIR__ .'/vendor/autoload.php';
	
	$value = new CConverter\Converter('YOUR_API_KEY');
	$value->cache(true); // set this for enable caching, default cache time is 60 minutes
	echo $value->cconv('EUR', 'USD');
	
	// change cache time
	$value = new CConverter\Converter('YOUR_API_KEY');
	$value->cache(true, 10); // set this for enable caching and set 10 minutes cache file
	echo $value->cconv('EUR', 'USD');
	
```

## Requirements

* PHP version 5.5 or later
* Fixer.io free account 

## Usage

Please look into GETING STARTED section.
You can combine the examples shown above.

```php
<?php
	
	require __DIR__ .'/vendor/autoload.php';
	
	$value = new CConverter\Converter('YOUR_API_KEY');
	$array = $value->cconv(array('DE','EUR'), 'USD', 10.20304, 3);
	
```

## Installation

This library depends on composer for installation . For installation of composer, please visit [getcomposer.org](//getcomposer.org).
You can download .zip for compile composer.json file to create vendor directory.

## Why Use It

* Relaible Rates with fixer.io API
* Over 160 currencies
* Support for gold, silver and bitcoin exchange rates
* Caching of rate to avoid connecting to fixer.io multiple times
* Conversion without currency code by country short name (US, DE, PL, GB...)
* Conversion of many currencies with one API reference

## Informations

A free account at fixer.io allows you to connect to the API 1000 times a month and information about currencies is provided once an hour. To use currency conversions efficiently, use the cache option.
Setting the cache for 60 minutes allows for efficient use of services without restrictions on access to the API for any amount of time.

## Authors

MSc Patryk Kosiba
See profile on linkedin (https://www.linkedin.com/in/patryk-kosiba/)

## License

This project is licensed under the MIT License.
