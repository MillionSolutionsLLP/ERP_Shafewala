<?php

if(array_key_exists('index', $data))$index=$index+$data['index'];

?>
<div class="form-group col-lg-6">
{{ Form::label($data['lable'], $data['name']) }} 

<div class="radio">
<?php //	dd($data); ?>




@foreach($data['data'] as $value=>$lable)
<label tabindex="{{$index}}" class="form-conrtol">

	@if ($value == $data['value'])
	{{Form::radio($data['name'], $value,true)}}
    {{$lable}}
	
	@else
    {{Form::radio($data['name'], $value)}}
    {{$lable}}
	@endif
	
  	
  </label>
@endforeach

</div>
</div>

