

	<?php

	//$input_class='';

	if(array_key_exists('ClassData', $data)){
	    	
		if(array_key_exists('form-class-div',$data['ClassData']))
		$input_class=$data['ClassData']['form-class-div'];


	}
if(array_key_exists('index', $data))$index=$index+$data['index'];



	?>

<div class="form-group {{ $input_class or 'col-lg-6' }}" >
    {{ Form::label($data['name'], $data['lable']) }}
    {{ Form::number($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable']] ) }}
</div>