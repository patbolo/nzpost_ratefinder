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
	
	public $class = 'NZPostRateFinderRequestIntl';
	
	/**
	 *
	 * @param type $length in mm
	 * @param type $height in mm
	 * @param type $thickness in mm
	 * @param type $weight in kg
	 * @param type $countryCode a valid ISO2 country code, ie 'AU' for Australia
	 */
	public function __construct($length = 0, $height = 0, $thickness = 0, $weight = 0, $countryCode = ''){
		$this->length = $length;
		$this->height = $height;
		$this->thickness = $thickness;
		$this->weight = $weight;
		$this->country_code = $countryCode;
	}
	
	public function requireTable() {
		return false;
	}
}