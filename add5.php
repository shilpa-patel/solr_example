<?php
include "bootstrap.php";
//this is change 
$options = array
(
		'hostname' => SOLR_SERVER_HOSTNAME,
		'login'    => SOLR_SERVER_USERNAME,
		'password' => SOLR_SERVER_PASSWORD,
		'port'     => SOLR_SERVER_PORT,
		//'path'	   => SOLR_PATH,
);

$client = new SolrClient($options);

$query = new SolrQuery();

$query->setTerms(true);

/* Return only terms starting with $prefix */
$prefix = 'C';

$query->setTermsField('cat')->setTermsPrefix($prefix);

$updateResponse = $client->query($query);
//$client->commit();

echo "<pre>";print_r($updateResponse->getResponse());
