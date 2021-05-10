<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php require_once('../../vendor/autoload.php'); ?>
<?php
	$cart = perch_shop_cart([
		'skip-template' => true,
		'raw' => true
	]);
	
	$addresses = perch_shop_order_addresses_data();
	
	use GlobalPayments\Api\Entities\Address;
	use GlobalPayments\Api\Entities\Enums\AddressType;
	use GlobalPayments\Api\ServiceConfigs\Gateways\GpEcomConfig;
	use GlobalPayments\Api\HostedPaymentConfig;
	use GlobalPayments\Api\Entities\HostedPaymentData;
	use GlobalPayments\Api\Entities\Enums\HppVersion;
	use GlobalPayments\Api\Entities\Exceptions\ApiException;
	use GlobalPayments\Api\Services\HostedService;
	
	// configure client, request and HPP settings
	$config = new GpEcomConfig();
	$config->merchantId = "133667";
	$config->accountId = "133667";
	$config->sharedSecret = "tsqJDaqr8AB3sU3H";
	$config->serviceUrl = "https://pay.sandbox.realexpayments.com/pay";
	
	$config->hostedPaymentConfig = new HostedPaymentConfig();
	$config->hostedPaymentConfig->version = HppVersion::VERSION_2;
	$service = new HostedService($config);
	
	// Add 3D Secure 2 Mandatory and Recommended Fields
	$hostedPaymentData = new HostedPaymentData();
	$hostedPaymentData->customerEmail = perch_member_get('email');
	$hostedPaymentData->addressesMatch = false;
	
	$billingAddress = new Address();
	$billingAddress->streetAddress1 = $addresses['address_1'];
	$billingAddress->streetAddress2 = $addresses['address_2'];
	$billingAddress->streetAddress3 = $addresses['address_3'];
	$billingAddress->city = $addresses['city'];
	$billingAddress->postalCode = $addresses['postcode'];
	$billingAddress->country = $addresses['country'];
	
	$shippingAddress = new Address();
	$shippingAddress->streetAddress1 = $addresses['address_1'];
	$shippingAddress->streetAddress2 = $addresses['address_2'];
	$shippingAddress->streetAddress3 = $addresses['address_3'];
	$shippingAddress->city = $addresses['city'];
	$shippingAddress->state = $addresses['county'];
	$shippingAddress->postalCode = $addresses['postcode'];
	$shippingAddress->country = $addresses['country'];
	
	try {
	   $hppJson = $service->charge($cart['grand_total'])
	      ->withCurrency("EUR")
	      ->withHostedPaymentData($hostedPaymentData)
	      ->withAddress($billingAddress, AddressType::BILLING)
	      ->withAddress($shippingAddress, AddressType::SHIPPING)
	      ->serialize();      
	   // TODO: pass the HPP JSON to the client-side  
	   print_r($hppJson);
	} catch (ApiException $e) {

	}
?>