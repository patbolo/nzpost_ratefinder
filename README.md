# New Zealand Post - Client for the rate finder web API for SilverStripe

## Compatibility

See branch 2.4 for Silverstripe 2.4.x 

Current version on master is developed for SilverStripe 3.0 and above

## Configuration

You'll need an API key for this module.

You can request one [there](http://www.nzpost.co.nz/products-services/iphone-apps-apis/rate-finder-api/get-a-rate-finder-api-key)

You can then use _ss_environment.php to set up your API credentials, or in mysite/_config.php. For example :

    NZPostRateFinderAPIGateway::$api_key = '458d1f70-59aa-042e-06b2-000c32c44ac0';

### Filtering the products returned by the API
You'll probably want to only present a subset of the available products returned by the API.
For example, you might want to only offer bubble wrapped packaging products, or exclude couriered deliveries
This can be done in mysite by adding a YML config file in the _config folder. For example:


    NZPostRateFinderAPIManager:
      Services:
        packaging: flat,   bubble
        priority: parcel_post_tracked

Possible values:
- packaging: flat,postage_only,bubble
- priority: parcel_post_tracked,courier
Using comma separated values let you filter by multiple packaging or priorities

## Usage in code
### Request
The API lets you fetch the shipping rates for domestic and international shipping.
In either case, you need to prepare the request object.
If you have to deliver a box with the minimum dimensions as below:
- Width: 120mm
- Height: 150mm
- Length: 170mm
- Weight: 1.5kg

You can then use the following

#### Domestic (to central wellington for example)
    $NZPostRateFinderRequest = new NZPostRateFinderRequestDomestic(170, 150, 120, 1.5, 6011);
    $NZPostRateFinderRequest->format = "json";

#### International (to Australia for example)
    $NZPostRateFinderRequest = new NZPostRateFinderRequestIntl(170, 150, 120, 1.5, 'AU');
    $NZPostRateFinderRequest->format = "json";
	$NZPostRateFinderRequest->format = "2";

### Response
To get a list of shipping products in a dropdown field:

    $manager = new NZPostRateFinderAPIManager();
    $products = $manager->getShippingProducts($NZPostRateFinderRequest);
    foreach($products as $product){
        $carrierProductsMap[$product->getUID()] = $product->getDescription() . ' (' . $product->getPrice() . ')';
    }
    $fields->push(
	    new DropdownField('ShippingProductUID', _t('ShippingOption'), $carrierProductsMap)
    );