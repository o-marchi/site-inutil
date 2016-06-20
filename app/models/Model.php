<?php

class Model {

	public static $table = NULL;

	public static function get($id) {
		$select = "SELECT * FROM " . static::$table . " WHERE id = $id";
		return self::query($select);
	}

	public static function all() {
		$select = "SELECT * FROM " . static::$table;
		return self::query($select);
	}

	public static function query($query, $fetch = true) {

		$db = require __DIR__.'/../../config/database.php';

		$connection = new PDO(
			$db['type'].':host='.$db['host'].';dbname='.$db['database'],
			$db['user'], $db['password']
		);

		if ($fetch) {
			return $connection->query($query)->fetchAll();
		}

		return $connection->query($query);
	}
}