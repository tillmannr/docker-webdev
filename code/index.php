<?php

require_once __DIR__.'/vendor/autoload.php';


$app = new Silex\Application();

$app['debug'] = true;
$app->get('/blog', function() use($app) {

	$config = new \Doctrine\DBAL\Configuration();
	$connectionParams = array(
		'dbname' => 'myapp',
		'user' => 'root',
		'password' => '123456',
		'host' => 'db',
		'driver' => 'pdo_mysql',
	);
	$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

	$sql = "SELECT * FROM posts";
	$stmt = $conn->query($sql);

	while ($row = $stmt->fetch()) {
		echo print_r($row);
	}

	return true;
});

$app->run();