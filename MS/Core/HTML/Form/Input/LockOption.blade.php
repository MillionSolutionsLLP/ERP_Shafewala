
<?php

if(array_key_exists('index', $data))$index=$index+$data['index'];

?>
<div class="form-group col-lg-6">
<fieldset disabled>
{{ Form::label($data['lable'], $data['name']) }} 
 {{ Form::text($data['name'], $data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['lable']] ) }}
</fieldset>


@if($data['editLock'])

@if(array_key_exists('value',$data))
{{Form::hidden($data['name'], $data['value'])}}
@endif
@endif


</div>

