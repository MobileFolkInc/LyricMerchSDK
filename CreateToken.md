### API Authentication
  ### With method GET
  first token  method  +  "\n" +  time when call api +  "\n" demo : GET Thu, 26 Jul 2018 08:59:45 +0000 <br />
  after token  = token + base64_encode(REQUEST_URI,url call api) <br />
  after token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY)) <br />
  ### With method POST
  first token  method  +  "\n" +  time when call api +  "\n" demo : GET Thu, 26 Jul 2018 08:59:45 +0000 <br />
  after we need each all params and ksort(params) <br />
  after push all params to array with key is key name of params value is json_encode value of params <br />
  after implode array above  with character & demo : country=US&list_of_order_items=[{"product_id":1261,"quantity":2},{"product_id":1299,"quantity":1}] <br />
  after token = token +  base64_encode(array above) <br />
  after token = base64_encode(hash_hmac('sha256',utf8_encode(token),LYRICMERCH API KEY)); <br />
### Note
  All api when call need have <br /> 
   LYRICMERCH-USER-ID = user id in lyricmerch <br />
   LYRICMERCH-TOKEN = token <br />
   LYRICMERCH-DATE = date time now <br />
  If you use curl setTimeout is 1000 <br />
  
