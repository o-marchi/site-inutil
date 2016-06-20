<?php

class BaseController {
	
	public static $main_layout = 'main';

	public static function prepare_file($file, $data = []) {

		$data = array_merge($data, [
			'project_uri' => 'http://'.$_SERVER['SERVER_NAME'].implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)).'/',
		]);

		if ( ! file_exists($file)) {
			return false;
		}

		ob_start();
			extract($data);
			include $file;
			$contents = ob_get_contents();
		ob_end_clean();

		return $contents;
	}

	public static function render($layout, $data = []) {

		if (is_null($layout)) {
			return false;
		}

		$main = __DIR__.'/../views//'.self::$main_layout . '.php';
		$layout_file = __DIR__.'/../views//'.$layout.'.php';

		$yield = self::prepare_file($layout_file, $data);
		$content = self::prepare_file($main, [ 'yield' => $yield ]);

		echo $content;
	}
}