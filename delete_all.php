<?php
include "bootstrap.php";
$options = array
(
    'hostname' => SOLR_SERVER_HOSTNAME,
    'login'    => SOLR_SERVER_USERNAME,
    'password' => SOLR_SERVER_PASSWORD,
    'port'     => SOLR_SERVER_PORT,
);

$client = new SolrClient($options);

//This will erase the entire index
$client->deleteByQuery("*:*");
$client->commit();
