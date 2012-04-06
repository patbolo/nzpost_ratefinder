<?php

class NZPostRateFinderResponseIntl extends DataObject{
	
	static $has_many = array(
		'products' => 'NZPostRateFinderProductIntl',
	);
	
	public function requireTable() {
		return false;
	}
}