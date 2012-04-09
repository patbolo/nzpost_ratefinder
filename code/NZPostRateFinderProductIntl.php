<?php

class NZPostRateFinderProductIntl extends DataObject implements IShippingProduct{
	
	static $db = array(
		'group'=>'Text',
		'price'=>'Currency',
		'name'=>'Text',
		'code'=>'Text'
	);
	
	static $has_one = array(
		'NZPostRateFinderResponseIntl' => 'NZPostRateFinderResponseIntl'
	);
	
	static $casting = array(
		'Price' => 'Currency'
	);
	
	public function requireTable() {
		return false;
	}
	
	public function getUID(){
		return $this->code;
	}
	
	public function getDescription(){
		return $this->group . ' - ' . $this->name;
	}
	
	public function getPrice(){
		return $this->getField('price');
	}
}