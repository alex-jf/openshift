<?php
require_once 'vendor/autoload.php';
require_once "access.php";

echo "Query is MATCH (n:Person) RETURN n, n.name as name";
echo "<pre>";

use GraphAware\Neo4j\Client\ClientBuilder;

$time_start = microtime(true);

$client = ClientBuilder::create()
	->addConnection('default', "http://$user_grh:$pass_grh@$url_grh:24789") // Example for HTTP connection configuration (port is optional)                                
		->addConnection('bolt', "bolt://$user_grh:$pass_grh@url_grh:24786") // Example for BOLT connection configuration (port is optional)                                    
			->build();

$query = "MATCH (n:Person) RETURN n, n.name as name";
//$query = 'MATCH (m:Movie)<-[r:ACTED_IN]-(p:Person) RETURN m,r,p';
//$result = $client->run($query);
foreach ($result->getRecords() as $record) {
//      var_dump($record); 
echo sprintf("Person name is : %s \n", $record->value('name'));
}


$time_end = microtime(true);

$execution_time = ($time_end - $time_start);

echo '<b>Total Execution Time:</b> '.$execution_time.' sec';

//$query = "MATCH (n:Person) RETURN n, n.name as name LIMIT 3";

//$result = $client->run($query);



//foreach ($result->getRecords() as $record){
//	var_dump($record);
//	echo ($record->value("name")), PHP_EOL;
//}
