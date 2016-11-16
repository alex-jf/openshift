<?php

require_once 'vendor/autoload.php';
require_once "access.php";


use GraphAware\Neo4j\Client\ClientBuilder;

$client = ClientBuilder::create()
		    ->addConnection('bolt', 'bolt://hobby-onnhibppojekgbkekignbiol.dbs.graphenedb.com:24786')->build();


//$query = "MATCH (n:Person) RETURN n, n.name as name";
$query = 'MATCH (m:Movie)<-[r:ACTED_IN]-(p:Person) RETURN m,r,p';
$result = $client->run($query);

foreach ($result->getRecords() as $record) {
	var_dump($record);
 echo sprintf("Person name is : %s \n", $record->value('name'));
}


//$query = "MATCH (n:Person) RETURN n, n.name as name LIMIT 3";
//$result = $client->run($query);

//foreach ($result->getRecords() as $record) {
//		var_dump($record);
//	    echo ($record->value("name")), PHP_EOL;
//}


