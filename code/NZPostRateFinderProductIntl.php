<?php

class NZPostRateFinderProductIntl extends DataObject{
	
	static $db = array(
		'group'=>'Text',
		'price'=>'Currency',
		'name'=>'Text',
		'code'=>'Text'
	);
	
	static $has_one = array(
		'NZPostRateFinderResponseIntl' => 'NZPostRateFinderResponseIntl'
	);
	
	public function requireTable() {
		return false;
	}
}