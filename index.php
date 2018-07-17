<?php 

require 'LyricmerchApi.php';
$api = new LyricmerchApi();

// demo for api /designs
// artist_name or song name need urlencode
$artist_name = urlencode('Ke$ha');
$title = urlencode("Can't Have Everything");
$url = "/designs?artist=".$artist_name.'&title='.$title;
$data = $api->execute('GET',$url);


// demo for api /designs/:id
$id = 1;
$url = "/designs/".$id;
$data = $api->execute('GET',$url);

// /orders/shippingcost

$url = '/orders/shippingcost';
$data = [
	'country' => 'US',
	'list_of_order_items' => [
		[
			'product_id' => 1261,
			'quantity' => 2,
			'design_id' => 123
		],
		[
			'product_id' => 1299,
			'quantity' => 1,
			'design_id' => 123
		]
	]
];
$data = $api->execute('POST',$url,$data);

// demo for api /orders

$url = '/orders';
$data = [
	'order_id' => 123455,
	'shipping' => [
	    "first_name" => "First name",
	    "last_name" => "Last name",
	    "company" => "company",
	    "country" => "US",
	    "address_1" => "address_1",
	    "address_2" => "address_2",
	    "city" => "city",
	    "state" => "state",
	    "postcode" => "100000",
	    "phone" => 123456789,
	    "email" => "duc@mobilefolk.com"
	],
	'order_data' => [
		[
		"design_id" =>  8,
	      	"product_id" =>  1345,
	      	"product_size" =>  "M",
	      	"product_color" =>  "000000",
	     	"quantity" =>  3,
		]
	],
	'price_data' => [
	    'subtotal_charged' => 1,
	    'shipping_charged' => 1,
	    'tax_charged' => 1,
	    'currency' => 'USD'
  	]
];
$data = $api->execute('POST',$url,$data);

?>
