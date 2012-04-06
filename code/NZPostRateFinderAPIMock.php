<?php

class NZPostRateFinderAPIMock implements INZPostRateFinderAPI{
	
	static $fixture = '';
	
	static $suffix = "domestic"; // can also be "international"
	
	public function call(INZPostRateFinderRequest $rateFinderRequest){
		$fixturePath = BASE_PATH.'/nzpost_ratefinder/tests/fixtures/'.self::$fixture;
		if (!file_exists($fixturePath)){
			throw new Exception("Can't find fixture for ".self::$fixture);
		}
		$fixture = file_get_contents($fixturePath);
		return json_decode($fixture, true);
	}
}