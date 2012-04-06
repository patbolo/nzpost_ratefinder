<?php

class NZPostRateFinderRequestIntl extends DataObject implements INZPostRateFinderRequest{
	
	static $db = array(
		'country_code' => 'VarChar(2)',
		'value' => 'Float',
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