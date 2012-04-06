<?php

class NZPostRateFinderRequestDomestic extends DataObject implements INZPostRateFinderRequest{
	
	static $db = array(
		'carrier' => 'Enum("all,courierpost,nzpost","all")',
		'source_x' => 'VarChar(255)',
		'source_y' => 'VarChar(255)',
		'dest_x' => 'VarChar(255)',
		'dest_y' => 'VarChar(255)',
		'postcode_source' => 'VarChar(255)',
		'postcode_dest' => 'VarChar(255)',
		'source_txt' => 'VarChar(255)',
		'dest_txt' => 'VarChar(255)',
		'length' => 'Int',
		'height' => 'Int',
		'thickness' => 'Int',
		'diameter'=> 'Int',
		'weight' => 'Float',
		'format' => 'Enum("json,xml,jsonp,html","json")'
	);
	
	public function requireTable() {
		return false;
	}
}