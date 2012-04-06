<?php

class NZPostRateFinderResponseDomestic extends DataObject{
	
	static $has_many = array(
		'products' => 'NZPostRateFinderProductDomestic',
	);
	
	public function requireTable() {
		return false;
	}
}