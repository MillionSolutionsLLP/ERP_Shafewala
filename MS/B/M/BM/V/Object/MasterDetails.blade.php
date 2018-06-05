<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Booking Module Home</strong></h5></div>
<div class="panel-body">


<div class="panel-body">

<div class="btn btn-sm btn-info ms-border col-lg-2" style="color:black;">
	<i class="fa fa-arrow-circle-up" aria-hidden="true"></i><br>Rise Lead
</div>

<div class="btn btn-sm btn-info ms-border col-lg-2 ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@addBooking') }}" style="color:black;">
	<i class="fa fa-arrow-circle-down" aria-hidden="true"></i><br>Book Order
</div>

<div class="btn btn-sm btn-info ms-border col-lg-2" style="color:black;">
<i class="fa fa-times" aria-hidden="true"></i><br>Close Order
</div>

<div class="btn btn-sm btn-info ms-border col-lg-2" style="color:black;">
<i class="fa fa-search" aria-hidden="true"></i><br>Query Stock
</div>

<div class="btn btn-sm btn-info ms-border col-lg-2 ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@viewAllBooking') }}" style="color:black;">
<i class="fa fa-eye" aria-hidden="true"></i><br>View Orders
</div>

<div class="btn btn-sm btn-info ms-border col-lg-2" style="color:black;">
<i class="fa fa-flag-o" aria-hidden="true"></i><br>View Report	
</div>

<div class="col-lg-12"><br></div>


<div class="well well-sm col-lg-3 text-center">

	Total Payment Received
<strong class="text-success">	<br>₹ {{ \MS\Core\Helper\Comman::toINR($data['total_received']) }}</strong>


</div>
<div class="well well-sm col-lg-3  text-center">
	Total Due Payment
<strong class="text-danger">	<br>₹ {{ \MS\Core\Helper\Comman::toINR($data['total_due']) }}</strong>


</div>



<div class="well well-sm col-lg-2  text-center ">

	Total Orders
<strong>	<br>{{ $data['total_order'] }}</strong>

</div>


<div class="well well-sm col-lg-2  text-center ">

	Total Open Orders
<strong>	<br>{{ $data['total_open_orders'] }}</strong>

</div>
<div class="well well-sm col-lg-2  text-center">
	Total Upcoming Orders
<strong>	<br>{{ $data['total_upcoming_orders'] }}</strong>
	
</div>

	




<br>
<?php

$model=new \B\BM\Model();
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("BM.V.Object.BookingList",['data'=>$data])



</div>

</div>


</div>