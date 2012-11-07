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
	
	public $class = 'NZPostRateFinderRequestDomestic';
	
	/**
	 *
	 * @param type $length in mm
	 * @param type $height in mm
	 * @param type $thickness in mm
	 * @param type $weight in kg
	 * @param type $countryCode a valid pot code in NZ
	 */
	public function __construct($length = 0, $height = 0, $thickness = 0, $weight = 0, $postcode_dest = 6011){
		parent::__construct();
		$this->length = $length;
		$this->height = $height;
		$this->thickness = $thickness;
		$this->weight = $weight;
		$this->postcode_dest = $postcode_dest;
	}
	
	public function requireTable() {
		return false;
	}
}