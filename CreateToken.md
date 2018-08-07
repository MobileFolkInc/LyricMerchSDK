### API Authentication
  ### For GET method:
  1) token = method + "\n" + API call timestamp + "\n" <br />
  Example : GET Thu, 26 Jul 2018 08:59:45 +0000 (gmdate(\DateTime::RFC2822) in php ) <br /> 
  2) token = token + base64_encode(REQUEST_URI,url call api) REQUEST_URI is '/api/v1' <br />
  3) token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY)) <br />
  ### For POST method:
  1) token = method + "\n" + API call timestamp + "\n" <br />
  Example : POST Thu, 26 Jul 2018 08:59:45 +0000 <br />
  2) Need all parameters and ksort(parameters) (  ksort is Sorts an array by key )<br />
  3) Push all parameters and parameter values to an array. For each parameter the key is parameter name and the value is json_encode value of parameters.  Then implode the array joined by "&" character. <br />
  Example: country=US&list_of_order_items=[{"product_id":1261,"quantity":2},{"product_id":1299,"quantity":1}] <br />
  4) token = token +  base64_encode(array above) <br />
  5) token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY)); <br />
### Note
  All API calls need to include:<br /> 
   LYRICMERCH-USER-ID = user id in LyricMerch <br />
   LYRICMERCH-TOKEN = token <br />
   LYRICMERCH-DATE = current timestamp <br />
  If you use curl setTimeout is 1000 <br />
  
