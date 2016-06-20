<?php

class Router {

	public static function get($request, $callback) {

		if ($_SERVER['REQUEST_METHOD'] != 'GET') {
			return false;
		}

		self::route($request, $callback);
	}

	public static function post($request, $callback) {

		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			return false;
		}

		self::route($request, $callback);
	}

	public static function route($request, $callback) {

		$uri = self::get_current_request();
		
		if ($uri != $request) {	 return false; }

		if (is_string($callback)) {
			$classAndMethod = explode('.', $callback);

			return eval("$classAndMethod[0]::$classAndMethod[1]();");
		}

		return $callback();	
	}

	private static function get_current_request($all_paramaters = false) {
		$basepath = implode('/', array_slice(explode('/', $_SERVER['PHP_SELF']), 0, -1)) . '/';
		$uri = '/' . substr($_SERVER['REQUEST_URI'], strlen($basepath));

		if ( ! $all_paramaters) {
			preg_match('/(\/.+(?=\/))|.+/', $uri, $matches);
			$match = empty($matches[0]) ? '/' : $matches[0];
			if (is_null($match)) { return false; }

			return $match;
		}

		return $uri;
	}
}