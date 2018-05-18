<!DOCTYPE html>
<html lang="en">
<head>
	

	@include('Backend.css')
</head>

<?php
//dd($data);



$count=0;

?>

<body>

<div  style="   height: 842px;
        width: 595px;
      
        margin-left: auto;
        margin-right: auto;">


<div class="col-lg-12" style="padding: 0px;">
	
	@foreach($data['products'] as $key=>$value)
	<div class="col-lg-4 col-xs-4 col-sm-4 col-md-4" style="border-style: solid;border-width: 1px;">
			 
			<center>

					<br><?php echo '<img src="data:image/png;base64,' .\DNS1D::getBarcodePNG($value['UniqId'], "C39",1,50,array(1,1,1)). '" alt="barcode"   />'; ?>
				
				<br>
				<p style="text-align: left;">
					<small>
				Barcode: {{ $value['UniqId'] }}
			<br>Name: {{ $data['productDetails']['name'] }}<br> Type: {{ $data['productDetails']['type'] }}
				</small>
				</p>				
			</center>
				
			
	</div>



			@if($loop->iteration > 20 && $loop->iteration < 22)
			<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="min-height: 80px;"></div>
			@endif


			@if($loop->iteration > 41 && $loop->iteration < 43)
			<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="min-height: 80px;"></div>
			@endif
	@endforeach




</div>



<script type="text/javascript">
	
	var url=$('.ms-link').attr('ms-link');
	window.open(url,'_blank');
</script>



    @include('Backend.jsEnd')

        </div>


</body>

</html>