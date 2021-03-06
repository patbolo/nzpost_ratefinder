<?php

class NZPostRateFinderAPIManagerTest extends SapphireTest{
	
	public function testGetShippingProductsDomestic(){
		NZPostRateFinderAPIMock::$fixture = '300x120x120mm-2.5kg-all-domestic.json';
		$manager = new NZPostRateFinderAPIManager(new NZPostRateFinderAPIMock());
		$products = $manager->getShippingProducts(new NZPostRateFinderRequestDomestic());
		$this->assertEquals($products->Count(), 8);
		$this->assertEquals($products->First()->cost, "7.60");
	}
	
	public function testGetShippingProductsIntl(){
		NZPostRateFinderAPIMock::$fixture = '230x123x200mm-1.5kg-intl.json';
		$manager = new NZPostRateFinderAPIManager(new NZPostRateFinderAPIMock());
		$products = $manager->getShippingProducts(new NZPostRateFinderRequestIntl());
		$this->assertEquals($products->Count(), 3);
		$this->assertEquals($products->First()->price, "94.5");
	}
}
