

	<?php

	//$input_class='';

	if(array_key_exists('ClassData', $data)){
	    	
		if(array_key_exists('form-class-div',$data['ClassData']))
		$input_class=$data['ClassData']['form-class-div'];

	}

dd($data);

	?>

<div class="form-group  {{ $input_class or  'col-xs-12 col-sm-12 col-md-6 col-lg-6'}}">
{{ Form::hidden($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,] ) }}
</div>