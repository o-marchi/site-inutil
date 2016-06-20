<?php

class User extends Model {

	public static $table = 'user';

	public static function create($data) {

		// create user
		$query = sprintf("INSERT INTO %s (`name`, `email`, `password`, `food`) VALUES ('%s', '%s', '%s', '%s')",
						 self::$table, $data['name'], $data['email'], md5($data['password']), $data['food']);
		$result = self::query($query, false);

		return true;
	}

	public static function destroy($id) {

		$query = sprintf("DELETE FROM %s WHERE id = %s",
						 self::$table, $id);
		$result = self::query($query);

		return true;
	}

	public static function edit($id, $name, $food) {

		$query = sprintf("UPDATE %s SET name = '%s', food = '%s' WHERE id = %s",
						 self::$table, $name, $food, $id);
		$result = self::query($query, false);

		return true;
	}
}