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
			'quantity' => 2
		],
		[
			'product_id' => 1299,
			'quantity' => 1
		]
	]
];
$data = $api->execute('POST',$url,$data);
?>