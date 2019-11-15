<?php

// spl_autoload() 加载即可，无需手动include
include '.\\Hook\\A\\B\\C.class.php';

function parseDocument($class, $method) {
	$reflectionClass  = new ReflectionClass($class);
	$reflectionMethod = $reflectionClass->getMethod($method);
	$doc              = $reflectionMethod->getDocComment();
	if ( empty($doc) ) {
		return false;
	}
	preg_match("/<code>([\s\S]+)<\/code>/", $doc, $matches);

	if ( ! isset($matches[1]) ) {
		return false;
	}
	$result = trim(preg_replace("/(\n\s+\*\s)/i", "\n", $matches[1]));

	return $result;
}

// \Hook\A\B\C

//echo json_encode([
//	'test1'=>parseDocument("\\Hook\\A\\B\\C", "initTable"),
//	'test2'=>parseDocument("\\Hook\\A\\B\\C", "checkTable"),
//],JSON_PRETTY_PRINT);


echo parseDocument("\\Hook\\A\\B\\C", "initTable");
echo PHP_EOL . PHP_EOL;
echo parseDocument("\\Hook\\A\\B\\C", "checkTable");
echo PHP_EOL . PHP_EOL;
try {
	echo parseDocument("\\Hook\\A\\B\\C", "checkTableA");
} catch (Exception $ex) {
	echo $ex->getMessage();
}

