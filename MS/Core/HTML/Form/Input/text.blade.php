<div class="form-group col-lg-6">
	


	@if(array_key_exists('link',$data))


	<?php


	$class="\\B\\".$data['link']['mod']."\\Model";

	$class=new $class ();
    // if(substr($data['name'], -1) == ']'){

    // 	$data['name']=substr($data['name'], 0, -2);

    // }
	if(!array_key_exists('vName', $data))$data['vName']=$data['name'];
    $function="get".$data['vName'];
   // dd($function);
    

	$dlist=$class->$function ();
	if(array_key_exists('index', $data))$index=$index+$data['index'];

	?>



<datalist id="{{$data['name']}}List">
	@foreach($dlist as $value=>$key)
 <option value="{{$value}}"> {{$key}}</option>

	@endforeach

	
	</datalist>


	@endif

    {{ Form::label($data['name'], $data['lable']) }}
    



      {{ Form::text($data['name'], $data['value'],['class'=>'form-control','list'=>$data['name'].'List','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable'], 
    
    ]
     ) }}




</div>
