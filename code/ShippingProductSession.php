<?php

class ShippingProductSession {
	private static $instance = null;
	
	public static function get(){
		if (isset(self::$instance)){
			return self::$instance;
		} else {
			self::$instance = new ShippingProductSession();
			return self::$instance;
		}
	}
	
	public function getSessionObj(){
		$sessionObj = Session::get('ShippingProductSession');
		if (!$sessionObj){
			$sessionObj = array(
				'ShippingProducts' => array()
			);
		}
		return $sessionObj;
	}
	
	public function setSessionObj($sessionObj){
		// We need to unset the session var manually, as Session::recursiveApply doesn't save the new state of the object, but only new additions to the array.
		// so if an object were removed from the cart, it would still be in the session.
		unset($_SESSION['ShippingProductSession']);
		Session::set('ShippingProductSession', $sessionObj);
		Session::save();
	}
	
	/**
	 *
	 * @return array 
	 */
	public function getShippingProducts(){
		$sessionObj = $this->getSessionObj();
		return $sessionObj['ShippingProducts'];
	}
	
	function getShippingProductByUID($uid){
		$shippingProducts = $this->getShippingProducts();
		foreach ($shippingProducts as $productUID=>$shippingProduct){
			if ($productUID == $uid){
				return $shippingProduct;
			}
		}
		return false;
	}
	
	public function addShippingProduct(IShippingProduct $product){
		$sessionObj = $this->getSessionObj();
		$sessionObj['ShippingProducts'][$product->getUID()] = $product;
		$this->setSessionObj($sessionObj);
	}
}
