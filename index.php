<?php
	
	require __DIR__ .'/vendor/autoload.php';
	
	$value = new CConverter\Converter('YOUR_API_KEY');
	echo $value->cconv('EUR', 'USD');

	
	
	
	
	