<?php 

require __DIR__ . '/vendor/autoload.php';
require  'config.php';
use \Curl\Curl;
class LyricmerchApi{
	private $curl;
	function execute($method , $url,$params = []){
		$curl = new Curl();
		$token = $method . "\n" . gmdate(\DateTime::RFC2822) . "\n";
		if ($method == 'GET') {
            $token .= base64_encode(REQUEST_URI.$url);
        } elseif ($method == 'POST') {
        	if (is_array($params) && count($params) > 0) {
        		ksort($params);
                $string_request = [];
                foreach ($params as $param_name => $param_value) {
                    if(is_array($param_value)){
                        $param_value = json_encode($param_value,JSON_NUMERIC_CHECK);
                    }
                    $string_request[] = $param_name . '=' . $param_value;
                }
                $string_request = implode("&", $string_request);
                $token .= base64_encode($string_request);
        	}
        }
		$token = base64_encode(hash_hmac('sha256', utf8_encode($token), LYRICMERCH_API_KEY));
		$curl->setHeader('LYRICMERCH-USER-ID',LYRICMERCH_USER_ID);
		$curl->setHeader('LYRICMERCH-TOKEN',$token);
		$curl->setHeader('LYRICMERCH-DATE',gmdate(\DateTime::RFC2822));
		if($method == 'GET'){
			return  $curl->get(URL_API . $url );
		}elseif ($method == 'POST') {
			return  $curl->post(URL_API . $url , $params );
		}
	}

}

?>