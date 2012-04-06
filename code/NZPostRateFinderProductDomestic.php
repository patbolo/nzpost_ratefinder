<?php

class NZPostRateFinderProductDomestic extends DataObject{
	
	static $db = array(
		'size'=>'Text',
		'image_url'=>'Text',
		'cost'=>'Currency',
		'product_url'=>'Text',
		'code'=>'Text',
		'tracked'=>'Boolean',
		'service'=>'Enum("parcel_post_tracked")',
		'delivery_rank'=>'Float',
		'priority'=>'Enum("parcel_post_tracked")',
		'weight'=>'Float',
		'signature'=>'Boolean',
		'carrier'=>'Enum("nzpost")',
		'product_max_dimensions'=>'Text',
		'cms_code'=>'Text',
		'label_url'=>'Text',
		'service_code'=>'Text',
		'service_group_description'=>'Text',
		'height'=>'Int',
		'packaging'=>'Text',
		'speed_description'=>'Text',
		'length'=>'Int',
		'description'=>'Text',
		'width'=>'Int',
		'distance'=>'Text'
	);
	
	static $has_one = array(
		'NZPostRateFinderResponseDomestic' => 'NZPostRateFinderResponseDomestic'
	);
	
	public function requireTable() {
		return false;
	}
}