<?php

class NZPostRateFinderAPIManager{
	
	static $client;
	
	public function __construct(INZPostRateFinderAPI $client=null) {
		if ($client) {
			self::$client = $client;
		} else{
			self::$client = new NZPostRateFinderAPIGateway();
		}
	}
	
	public function getShippingProducts(INZPostRateFinderRequest $rateFinderRequest){
		//TODO Use cached results.
		$client = self::$client;
		if ($rateFinderRequest instanceof NZPostRateFinderRequestDomestic){
			$productClass = "NZPostRateFinderProductDomestic";
		} else {
			$productClass = "NZPostRateFinderProductIntl";
		}
		try{
			$apiResponse = $client->call($rateFinderRequest);
		} catch (Exception $e){
			throw new Exception("An error occured when retrieving data about shipping fees : ".$e->getMessage());
		}
		if (isset($apiResponse["status"]) && $apiResponse["status"]== 'success'){
			$shippingSession = ShippingProductSession::get();
			$products = new ArrayList();
			$nzpostConfig = Config::inst()->get('NZPostRateFinderAPIManager', 'Services');
			$packagingFilter = isset($nzpostConfig['packaging']) ? str_getcsv($nzpostConfig['packaging']) : null;
			$priorityFilter = isset($nzpostConfig['priority']) ? str_getcsv($nzpostConfig['priority']) : null;
			foreach($apiResponse["products"] as $product){
				if (($packagingFilter == null || in_array($product['packaging'], $packagingFilter)) &&
					($priorityFilter == null || in_array($product['priority'], $priorityFilter))
					){
					$NZPostRateFinderProduct = new $productClass($product);
					$products->push($NZPostRateFinderProduct);
					$shippingSession->addShippingProduct($NZPostRateFinderProduct);
					//TODO Cache results
				}
			}
		} else {
			throw new Exception("An error occured when retrieving data about shipping fees");
		}
		return $products;
	}
}