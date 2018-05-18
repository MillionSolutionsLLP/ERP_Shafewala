
<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Master Home</strong></h5></div>
<div class="panel-body">
	
	<div class="col-lg-6">

@include("MAS.V.Object.CompanyDetails")
</div>




<div class="col-lg-6">
	
<?php

$model=new \B\MAS\Model(4);
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>[end($tableData)],
		];
//dd($data);
?>
@include("MAS.V.Object.HSNSAC",['data'=>$data])



</div>
<div class="col-lg-6">
	
<?php

$model=new \B\MAS\Model(3);

		$data=[

			'table'=>$model->get()->toArray()
		];
//dd($data);
?>
@include("MAS.V.Object.TaxDetails",['data'=>$data])



</div>

<div class="col-lg-12">
	
<?php

$model=new \B\MAS\Model(2);
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("MAS.V.Object.TNCDetails",['data'=>$data])



</div>

</div>
<div class="panel-footer"></div>

</div>




