<?php
//phpinfo();die;

include "bootstrap.php";

$options = array
(
    'hostname' => SOLR_SERVER_HOSTNAME,
    'login'    => SOLR_SERVER_USERNAME,
    'password' => SOLR_SERVER_PASSWORD,
    'port'     => SOLR_SERVER_PORT,
);

$client = new SolrClient($options);

$doc = new SolrInputDocument();

$doc->addField('id', 20);
$doc->addField('cat', 'Footware');
$doc->addField('manu', '123468');

$updateResponse = $client->addDocument($doc);
$client->commit();
print_r($updateResponse->getResponse());