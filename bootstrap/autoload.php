<?php

function __autoload($classname) {

	$config = require __DIR__ . '/../config/app.php';

	foreach ($config['classlocations'] as $folder) {

		$file = $folder . end(explode('\\', $classname)) . '.php';

		if (file_exists($file)) {
			require_once $file;
		}
	}
}