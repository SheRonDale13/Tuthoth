<?php
	ini_set("display_errors", true);
	date_default_timezone_set("Indian/Christmas");
	define("DB_DSN", "mysql:host=localhost;dbname=cms");
	define("DB_USERNAME", "root");
	define("DB_PASSWORD", "");
	define("CLASS_PATH", "classes");
	define("TEMPLATE_PATH", "templates");
	define("HOMEPAGE_NUM_ARTICLES", 5);
	define("ADMIN_USERNAME", "tuthother");
	define("ADMIN_PASSWORD", "password13");
	require(CLASS_PATH . "/Article.php");
	require(CLASS_PATH . "/Category.php");

	/*function handleException($exception) {
		echo "Sorry, a problem occurred. Please try later.";
		error_log($exception -> getMessage());
	}
	set_exception_handler('handleException');*/
?>


