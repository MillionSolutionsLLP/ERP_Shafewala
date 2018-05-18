<?php

if(array_key_exists('index', $data))$index=$index+$data['index'];

?>


<div class="form-group col-lg-6">
{{ Form::label($data['lable'], $data['name']) }} 

<div class="checkbox">
@foreach($data['data'] as $value=>$lable)
<label tabindex="{{$index}}">
	{{Form::checkbox($data['name']."[]", $value)}}
    {{$lable}}
  </label>
@endforeach
</div>
</div>
