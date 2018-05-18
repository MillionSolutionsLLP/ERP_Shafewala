@extends('B.L.Plate')

	
@section('Page-title')
<i class="{{$data['form-icon']}}" aria-hidden="true"></i>
{{$data['form-title']}}

@endsection

@section('Page-content')

	<div class="panel panel-default">

			{!! Form::open(['action' => $data['frm-action'],'method' => 'post','files' => true,'class'=>'ms-form','role'=>'form']) !!}
		<fieldset>
		<div class="panel-body bg-warning">
		<?php echo $data['form-content']; ?>
		</div>

		<div class="panel-footer bg-info ">
			<center class="">
			<div class="btn-group">
				
			@foreach ($data['form-btn'] as $btn)
			@if(array_key_exists('action',$btn))

			@if(array_key_exists('data',$btn))
			
			@if(array_key_exists('color',$btn))
			{{ Form::button("<i class='".$btn["icon"]." ' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   action-btn '.$btn['color'].' ms-text-black' , 'actionlink'=>action($btn["action"],$btn['data']),] ) }}
			@else
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   action-btn'.' ms-text-black' , 'actionlink'=>action($btn["action"],$btn['data']),] ) }}
			@endif


			@else
			
			@if(array_key_exists('color',$btn))
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   action-btn '.$btn['color'].' ms-text-black' , 'actionlink'=>action($btn["action"]),] ) }}
			@else
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   action-btn ms-text-black' , 'actionlink'=>action($btn["action"]),] ) }}
			@endif


			@endif

			
			@else

			@if(array_key_exists('color',$btn))
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn  btn-frm-submit end-close '.$btn['color'].' ms-text-black'] ) }}
			@else
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-success  btn-frm-submit ms-text-black'] ) }}
			@endif
			

			@endif
			@endforeach
			</div>
			</center>
		
		</div>
		</fieldset>
		{!! Form::close() !!}

</div>
           
@endsection

