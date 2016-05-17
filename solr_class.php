<?php
class solr {
	public function delete($query ) {
		$this->_client->deleteByQuery($query);
		$this->commit();
	}
	
	public function commit() {
		$solrConfig= '';// array with solr host, port, path to collection (/solr/my_collection),
		$solrAddress = SOLR_SERVER_HOSTNAME . ':' . SOLR_SERVER_PORT . SOLR_PATH;
		$output = array();
		$response = exec('curl ' . $solrAddress . '/update?commit=true', $output);
		return $output;
	}
}