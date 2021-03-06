### API Authentication

### For GET method:
	1. token = method + "\n" + API call timestamp + "\n"  
	Example code PHP : $token =  “GET”. "\n" . gmdate(\DateTime::RFC2822) . "\n"; 
	2. token = token + base64_encode(REQUEST_URI,url_call_api) 
	Example code PHP: $token .= base64_encode(REQUEST_URI,”/designs”); 
	3. token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY)) 
	Example code PHP: $token = base64_encode(hash_hmac('sha256',utf8_encode($token),LYRICMERCH API KEY));
### For POST method:
	1. token = method + "\n" + API call timestamp + "\n" 
	Example code PHP : $token =  “POST”. "\n" . gmdate(\DateTime::RFC2822) . "\n"; 
	2. Do ksort parameter array which is needed to transfer
	Example code PHP: ksort( $param ); 
	3. Loop over the parameter (foreach key => value) only one time to make a string variable (example str) obey the rule bellow: 
	    need a variable (var)
		- If value is not an array; var =  key + “=” + value 
		- If value is an array; var =  key + “=” + json_encode(value,JSON_NUMERIC_CHECK) 
	PHP code example :  
	foreach ($param as $param_name => $param_value) {
	    if(is_array($param_value)){
		$param_value = json_encode($param_value,JSON_NUMERIC_CHECK);
	    }
	    $temp[] = $param_name . '=' . $param_value;
	}

	Then push var to a temporary array (example temp). Finally implode this array with “&” glue
	Example code in PHP:  $str = implode("&", $temp);
	The final result of str be like : str = country=US&list_of_order_items=[{"product_id":1261,"quantity":2},{"product_id":1299,"quantity":1}]  
	from a demo data : 
		$data = [	'country' => 'US', 'list_of_order_items' => [ [ 'product_id' => 1261,'quantity' => 2,'design_id' => 123] , ['product_id' => 1299,'quantity' => 1,'design_id' => 123] ]  ];   
	4. token = token + base64_encode(string above) 
	PHP code example:  $token .= base64_encode($str); 
	5. token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY));  
	PHP code example: $token = base64_encode(hash_hmac('sha256', utf8_encode($token), LYRICMERCH_API_KEY)); 

### Note:  <br />
All API calls need to include: <br />
LYRICMERCH-USER-ID = user id in LyricMerch  <br />
LYRICMERCH-TOKEN = token  <br />
LYRICMERCH-DATE = current timestamp  <br />
If you use curl setTimeout is 1000  
