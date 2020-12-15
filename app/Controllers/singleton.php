<?php

class singleton
{
	private static $_instance = null;
	private function __construct() {}

	public static function getInstance()
	{
		if (singleton::$_instance == null) {
			return new singleton();
		} else {
			return singleton::$_instance;
		}
	}

	public function getFooter()
	{
        include TEMP_PATH . "footer.temp.php";
	}

}