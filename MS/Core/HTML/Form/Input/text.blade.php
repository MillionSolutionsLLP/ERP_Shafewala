<div class="form-group col-lg-6">
<?php

//dd($data);
if(!array_key_exists('vName', $data))$data['vName']=$data['lable'];

//if(array_key_exists('editLock', $data))var_dump($data);

//if($data['vName'] =='Warehouse')dd($data);

?>

	@if(array_key_exists('link',$data))


	<?php

	

	$class="\\B\\".$data['link']['mod']."\\Model";

	$class=new $class ();


    if(substr($data['name'], -1) == ']'){

    	$data['funName']=substr($data['name'], 0, -2);

    }else{

    	$data['funName']=$data['name'];

    }
	//$data['vName']=$data['name'];
    if(array_key_exists('funName', $data))
    {
    	$function="get".$data['funName'];
     	$dlist=$class->$function ();


    
    }

	if(array_key_exists('index', $data))$index=$index+$data['index'];

	?>


@if(isset($dlist))

<datalist id="{{$data['name']}}List">
	@foreach($dlist as $value=>$key)
 <option value="{{$value}}"> {{$key}}</option>

	@endforeach

	
	</datalist>

@endif
	@endif





{{ Form::label($data['name'], $data['vName']) }}
    
@if(array_key_exists('editLock',$data))


	@if( $data['editLock']  )


 <fieldset disabled> 
 {{ Form::text($data['name'],$data['value'],['class'=>'form-control','tabindex'=>$index,'readonly','placeholder'=>'Enter '.$data['vName']] ) }}
 </fieldset>



	{{Form::hidden($data['name'], $data['value'])}}

@endif	


@else






      {{ Form::text($data['name'], $data['value'],['class'=>'form-control','list'=>$data['name'].'List','tabindex'=>$index,'placeholder'=>'Enter '.$data['lable'], 
    
    ]
     ) }}


@endif	

</div>
