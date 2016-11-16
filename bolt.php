<?php
require_once 'vendor/autoload.php';
require_once 'access.php';

var_dump($user);

use GraphAware\Neo4j\Client\ClientBuilder;

$config = \GraphAware\Bolt\Configuration::newInstance()
	->withCredentials($user_grh, $pass_grh)
		->withTLSMode(\GraphAware\Bolt\Configuration::TLSMODE_REQUIRED);

$driver = \GraphAware\Bolt\GraphDatabase::driver("bolt://$url_grh:24786", $config);
$session = $driver->session();

var_dump($session);