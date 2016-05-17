<?php

include "bootstrap.php";

$options = array
(
    'hostname' => SOLR_SERVER_HOSTNAME,
    'login'    => SOLR_SERVER_USERNAME,
    'password' => SOLR_SERVER_PASSWORD,
    'port'     => SOLR_SERVER_PORT,
	'path'	   => SOLR_PATH,
);

$client = new SolrClient($options);
$category = array('Cloth','Footware','Personal Grooming','Electronic','Dresses','Hair Styler');

for ($i=1;$i<=15;$i++){

	$dataAry = array('id'=>$i,'sku'=>str_pad($i, 4,'0',STR_PAD_LEFT),'name'=>'name-'.$i,'cat'=>$category[rand(0,5)],'price'=>rand(1,5005));
	
	$doc = new SolrInputDocument();
	foreach ($dataAry as $docKey=>$docVal){
		$doc->addField($docKey, $docVal);
	}
	$updateResponse = $client->addDocument($doc);
	
}
$client->commit();
print_r($updateResponse->getResponse());