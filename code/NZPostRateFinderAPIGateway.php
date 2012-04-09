<?php

class NZPostRateFinderAPIGateway implements INZPostRateFinderAPI{
	
	static $url = "http://api.nzpost.co.nz/ratefinder/";
	
	static $suffix = "domestic"; // can also be "international"
	
	static $api_key = "123";
	
	public function getUrlQuery(INZPostRateFinderRequest $rateFinderRequest){
		$queryData = array(
			'api_key' => self::$api_key,
			'utf8' => '✓'
		);
		self::$suffix = ($rateFinderRequest instanceof NZPostRateFinderRequestDomestic) ? "domestic" : "international";
		foreach (Object::get_static(get_class($rateFinderRequest), 'db') as $fieldName => $fieldType){
			$queryData[$fieldName] = $rateFinderRequest->{$fieldName};
		}
		if ($rateFinderRequest instanceof NZPostRateFinderRequestDomestic){
			$queryData['postcode_src'] = SiteConfig::current_site_config()->PostOfficePostCode;
		}
		$queryData['commit'] = 'Submit';
		$queryUrl = self::$url . self::$suffix . '?'.http_build_query($queryData);
		return $queryUrl;
	}
	
	public function call(INZPostRateFinderRequest $rateFinderRequest){
		try{
			$ch = curl_init($this->getUrlQuery($rateFinderRequest));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
			$res = curl_exec($ch);
			curl_close($ch);
		}
		catch (Exception $e){
			throw new Exception();
		}
		return json_decode($res, true);		
	}
}