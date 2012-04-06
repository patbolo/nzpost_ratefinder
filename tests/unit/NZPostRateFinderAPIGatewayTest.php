<?php

class NZPostRateFinderAPIGatewayTest extends SapphireTest{
	
	public function testUrlQueryDomestic(){
		$gateway = new NZPostRateFinderAPIGateway();
		$request = new NZPostRateFinderRequestDomestic(
			array(
				'source_x' => '',
				'source_y' => '',
				'dest_x' => '',
				'dest_y' => '',
				'postcode_source' => '',
				'postcode_dest' => '',
				'source_txt' => '85 Victoria Street, Te Aro, Wellington',
				'dest_txt' => '163 Fitzherbert Avenue, Palmerston North',
				'length' => '300',
				'height' => '120',
				'thickness' => '120',
				'diameter'=> '',
				'weight' => '2.5',
			)
		);
		
		$url = $gateway->getUrlQuery($request);
		$urlBits = preg_split('/\?|&/', $url);
		$this->assertContains(NZPostRateFinderAPIGateway::$url . NZPostRateFinderAPIGateway::$suffix, $urlBits);
		$this->assertContains('api_key='.NZPostRateFinderAPIGateway::$api_key, $urlBits);
		$this->assertContains('source_txt=85+Victoria+Street%2C+Te+Aro%2C+Wellington', $urlBits);
		$this->assertContains('dest_txt=163+Fitzherbert+Avenue%2C+Palmerston+North', $urlBits);
		$this->assertContains('length=300', $urlBits);
		$this->assertContains('height=120', $urlBits);
		$this->assertContains('thickness=120', $urlBits);
		$this->assertContains('weight=2.5', $urlBits);
	}
	
	public function testUrlQueryIntl(){
		$gateway = new NZPostRateFinderAPIGateway();
		$request = new NZPostRateFinderRequestIntl(
			array(
				'country_code' => 'AU',
				'value' => '7.5',
				'length' => '300',
				'height' => '120',
				'thickness' => '120',
				'diameter'=> '',
				'weight' => '2.5',
			)
		);
		
		$url = $gateway->getUrlQuery($request);
		$urlBits = preg_split('/\?|&/', $url);
		$this->assertContains(NZPostRateFinderAPIGateway::$url . NZPostRateFinderAPIGateway::$suffix, $urlBits);
		$this->assertContains('api_key='.NZPostRateFinderAPIGateway::$api_key, $urlBits);
		$this->assertContains('country_code=AU', $urlBits);
		$this->assertContains('value=7.5', $urlBits);
		$this->assertContains('length=300', $urlBits);
		$this->assertContains('height=120', $urlBits);
		$this->assertContains('thickness=120', $urlBits);
		$this->assertContains('weight=2.5', $urlBits);
	}
}
