

<div class="panel panel-default">

	<div  class="panel-heading"><h5 class=""> <strong><i class="glyphicon glyphicon-chevron-right"></i> {{$data['form-title']}}</strong> </h5></div>

			{!! Form::open(['action' => $data['frm-action'],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}

		<div class="panel-body bg-info">
			<span class="col-lg-12">
		
				@include('B.L.Object.Error')
			</span>
		<?php echo $data['form-content']; ?>
		</div>

		<div class="panel-footer bg-info ">
			<center class="">
			<div class="btn-group">
				
			@foreach ($data['form-btn'] as $btn)
			
			@if(array_key_exists('action',$btn))

			@if(array_key_exists('data',$btn))
			
			@if(array_key_exists('color',$btn))
			{{ Form::button("<i class='".$btn["icon"]." ' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
			@else
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn'.' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
			@endif


			@else
			
			@if(array_key_exists('color',$btn))
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"]),] ) }}
			@else
			{{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn ms-text-black ' , 'ms-live-link'=>action($btn["action"]),] ) }}
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

	
		{!! Form::close() !!}



</div>






<script type="text/javascript">

@if(array_key_exists('form-js',$data))

@foreach($data['form-js'] as $value)

@include($value)

@endforeach

@endif


@include('L.jsFix')


</script>