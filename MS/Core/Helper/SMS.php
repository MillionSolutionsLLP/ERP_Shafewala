<?php

namespace MS\Core\Helper;

class SMS {


public $apicode="9bb90d43-7f4e-47b4-92e3-7f9f4fce36bd";

public $number="";

public $msg="";

public $outgoing=true;

public $senderID="MSLLPI";

public $channel="2";

public $dsc="8";

public $flash="0";

public $route="1";
public $product="CCA";



public static function sendOTP($number,$code){
	$sms = new SMS();
	$sms->number="91".$number;
	//$sms->msg=$code;
	$sms->msg="Your OPT for MS-".$sms->product." is ".$code." from : MS LLP ( www.millionsllp.com )  ";
	return $sms->sendSMS();
}

public static function send($number,$msg){
	$sms = new SMS();
	$sms->number="91".$number;
	$sms->msg=$msg;
	return $sms->sendSMS();
}




public static function getBal(){
	$sms = new SMS();
	return $sms->getBalance();

}



public function getBalance(){

	$posts="";
	$url="https://www.smsgatewayhub.com/api/mt/GetBalance?APIKey=";
	$response=$this->sendApi($url,$this->apicode);
	return $response['Balance'];
	

}



public function sendSMS(){



$query=$this->apicode.'&senderid='.$this->senderID.'&channel='.$this->channel.'&DCS='.$this->dsc.'&flashsms='.$this->flash.'&number='.$this->number.'&text='.urlencode($this->msg).'&route='.$this->route;
$url='https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=';

$response=$this->sendApi($url,$query);


if($response['ErrorCode']=="000"){
return true;
}else{
	return false;
}
 
}


public function sendApi($url,$query){


$response['ErrorCode']='404';
$response['Balance']='Promo:offline | Tranc:offline';
if($this->outgoing){
	$ch=curl_init();
	$posts="";
	curl_setopt($ch, CURLOPT_URL, $url.$query);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 2); 
	curl_setopt($ch, CURLOPT_POST,1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS,$posts);
	$response=json_decode(curl_exec($ch),1);
}
//dd($response);
return $response;

}



}