<?php

namespace MS\Core\Helper;


class IVR {


static public $id='millionsolutionsllp';
static public $token='01a849e855d1f95abbfdf8db1637b7e413172397';




public static function call($name=''){


$post_data = array(
    'From' => "+919662611234",
     'To' => "+919537818580",
    'CallerId' => "62f807e6f1c64b8a2e7afdc97a2ec0d3",
   // 'TimeLimit' => "<time-in-seconds> (optional)",
    //'TimeOut' => "<time-in-seconds (optional)>",
    //'CallType' => "promo" //Can be "trans" for transactional and "promo" for promotional content
);
 




$exotel_sid = self::$id; // Your Exotel SID - Get it from here: http://my.exotel.in/settings/site#api-settings
$exotel_token = self::$token; // Your exotel token - Get it from here: http://my.exotel.in/settings/site#api-settings
 
$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Calls/".$post_data['CallerId'];
 
//$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/IncomingPhoneNumbers/";
 
//$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/Numbers/07930256821";


//$url = "https://".$exotel_sid.":".$exotel_token."@twilix.exotel.in/v1/Accounts/".$exotel_sid."/CustomerWhitelist";






$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_POST, 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_FAILONERROR, 0);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 
$http_result = curl_exec($ch);
$error = curl_error($ch);
$http_code = curl_getinfo($ch ,CURLINFO_HTTP_CODE);
 
curl_close($ch);
 
//print "Response = ".print_r($http_result);
//dd(simplexml_load_string($http_result));
return  (array)simplexml_load_string($http_result)->$name;

}


// https://millionsolutionsllp:01a849e855d1f95abbfdf8db1637b7e413172397@api.exotel.com/v1/Accounts/millionsolutionsllp/Calls/c3f167b90f8a6f135196d672762a6449



}