<?php

function __autoload($class)
{
	$class = str_replace('\\', '/', $class);

	$pathSrc = __DIR__ . '/../src/' . $class . '.php';

	if (file_exists($pathSrc)) {
		require_once $pathSrc;

		return;
	}

	$pathTests = __DIR__ . '/' . ltrim($class, 'Test/') . '.php';

	if (file_exists($pathTests)) {
		require_once $pathTests;
	}
}

spl_autoload_register('__autoload');