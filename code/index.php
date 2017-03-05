<?php

require_once __DIR__.'/vendor/autoload.php';


$app = new Silex\Application();

$app['debug'] = true;
$app->get('/blog', function() use($app) {
//	var_dump(php_ini_loaded_file());
//	var_dump(get_loaded_extensions());
//	var_dump(extension_loaded('pdo_mysql'));
//	print phpinfo();

	$config = new \Doctrine\DBAL\Configuration();
	$connectionParams = array(
		'dbname' => 'myapp',
		'user' => 'root',
		'password' => '123456',
		'host' => 'localhost',
		'driver' => 'pdo_mysql',
	);
	$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

	$sql = "SELECT * FROM posts";
	$stmt = $conn->query($sql);

	while ($row = $stmt->fetch()) {
		echo print_r($row);
	}

//
//	$conn = new PDO('mysql:host=localhost;dbname=myapp', 'root', '123456');
//	if ($conn->connect_error) {
//		die("Connection failed: " . $conn->connect_error);
//	}

	return;
});

$app->run();