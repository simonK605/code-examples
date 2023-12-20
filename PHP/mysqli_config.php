<?php

// Here the example for mysqli connection

class Config {
    private static $dbHost = 'localhost';
	private static $dbUser = 'root';
	private static $dbPass = '';
	private static $dbName = 'dbName';
	public static $connection = null;

    /**
     * @return string|mysqli|null
     */
    public static function getConnect(): string|mysqli|null
    {
		if (! self::$connection) {
			self::$connection = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
			if (self::$connection->connect_error) {
				return 'connect error'.self::$connection->connect_errno.')'.self::$connection->connect_error;
			}
		}
		return self::$connection;
	}
}