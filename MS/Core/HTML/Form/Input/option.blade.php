<div class="form-group col-lg-6">
<?php

if(array_key_exists('index', $data))$index=$index+$data['index'];

?>
{{ Form::label($data['name'],$data['lable']) }} 


@if(array_key_exists('value',$data))



@if(array_key_exists('editLock',$data))


@if( $data['editLock']  )


 <fieldset disabled> 
 {{ Form::text($data['name'],$data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['lable']] ) }}
 </fieldset>



{{Form::hidden($data['name'], $data['value'])}}
	

@else

{{Form::select($data['name'], $data['data'],$data['value'],['class'=>'form-control','tabindex'=>$index])}}

@endif







@else


{{Form::select($data['name'], $data['data'],$data['value'],['class'=>'form-control'])}}



@endif






@else


{{Form::select($data['name'], $data['data'],null,['class'=>'form-control'])}}



@endif


</div>

