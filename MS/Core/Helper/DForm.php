<?php

namespace MS\Core\Helper;
use Collective\Html\FormFacade as Form;


class DForm {

public function __construct($formData=null,$formdataArray=[])
    {
       

       $this->formdataArray=$formdataArray;
       return (is_array($formData)) ? $this->formData=$formData : false ;
                    
    }



public static function display($formData,$formdataArray=[]){
	(is_array($formData)) ? $formClass=new \MS\Core\Helper\DForm ($formData,$formdataArray) : false ;
	return (isset($formClass)) ? $formClass->make() : false ;

	//return $formClass;
}

public function make(){
	$dataSet=(isset($this->formData)) ? $this->formData : false ;
	$html='';

	

	if($dataSet){
	foreach ($dataSet as $key => $value) {
			 $value['ClassData']=$this->formdataArray;
		// 	 if(count($this->formdataArray)>0){
		// 	dd($value);
		// }
			 $html.=$this->input($value,$key+1);
		}	
	}

	return $html;

}

public function input($value,$key){

	//$html='<div class="form-group">';
			 if(count($this->formdataArray)>0){
									//	dd($value);
									}
	$html=' ';

			if(is_array($value)){

				if(array_key_exists('type', $value)){
					#text/option/radio/check/password/disable
					switch ($value['type']) {
						case 'text':

						
							$html.=\Form::inputText($value,$key);
							//$html.=\Form::label($value['name'], $value['lable']);
							//$html.=\	Form::text($value['name'], ($value['value'] !=null ? $value['value'] : ''),[
							//	'tabindex'=>$key,
							//	'class'=>"form-control",
							//	'placeholder'=>"Enter ".$value['lable'],
							//	]);
							if(array_key_exists('barcode', $value)){
								$html.=$value['barcode'];
							}
							break;

						case 'number':
							$html.=Form::inputNumber($value,$key);
							break;

						case 'email':
							$html.=Form::inputEmail($value,$key);
							break;

						case 'password':
							# code...
							break;
						
						case 'option':
							//dd($key);
							$html.=\Form::inputOption($value,$key);
							break;

						case 'radio':
							//dd($value);
							//$html.=\Form::inputRadio($value,$key);
							//$html.=\Form::label('', $value['lable'])." : ";
							//foreach ($value['data'] as $key2 => $value2) {
							//	$html.=" ".\Form::label($value['name'], $value2)." ";
							//	$html.=" ".\Form::radio($value['name'],$key2,[]);
							//dd($value);
							$html.=Form::inputRadio($value,$key);
							//var_dump($value['data']);
							break;
						
						case 'check':
							# code...
							break;

						case 'textarea':
							$html.=Form::inputTextArea($value,$key);
							break;

						case 'hidden':
							$html.=Form::inputHidden($value,$key);
							break;
							
							
						case 'disable':
							# code...
							break;

						case 'file':
							//dd($value);
							$html.=Form::inputFile($value,$key);
							break;

						case 'auto':
							$html.=Form::inputLockText($value,$key);
						
							# code...
							break;

						case 'date':
							$html.=Form::inputDate($value,$key);
						
							# code...
							break;

						default:
							# code...
							break;
					}

				}



				
			}
			//$html.='</div>';
			return $html;
			return false;
			
}









}
