<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Booking Module Home</strong></h5></div>
<div class="panel-body">


<div class="panel-body">

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