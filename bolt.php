<?php

require_once 'vendor/autoload.php';
require_once 'access.php';

use GraphAware\Neo4j\Client\ClientBuilder;

$config = \GraphAware\Bolt\Configuration::newInstance()
	    ->withCredentials($user, $pass)
		    ->withTLSMode(\GraphAware\Bolt\Configuration::TLSMODE_REQUIRED);

$driver = \GraphAware\Bolt\GraphDatabase::driver('bolt://hobby-onnhibppojekgbkekignbiol.dbs.graphenedb.com:24786', $config);
$session = $driver->session();


var_dump($session);

