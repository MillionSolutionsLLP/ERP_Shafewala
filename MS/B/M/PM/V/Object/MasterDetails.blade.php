
<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Paghadi Module Home</strong></h5></div>
<div class="panel-body">


<div class="col-lg-12">
	
<?php

$model=new \B\PM\Model();
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("PM.V.Object.ProductList",['data'=>$data])



</div>
	


<div class="col-lg-6">
	
<?php

$model=new \B\PM\Model(1);
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("PM.V.Object.ProductType",['data'=>$data])



</div>


<div class="col-lg-6">
	
<?php

$model=new \B\PM\Model(2);
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("PM.V.Object.ProductRentSlabList",['data'=>$data])



</div>

</div>

</div>