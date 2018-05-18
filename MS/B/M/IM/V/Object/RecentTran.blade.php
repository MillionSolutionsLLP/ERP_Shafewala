
<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Print Lables</strong></h5></div>
<div class="panel-body">



	


<div class="col-lg-6">
	
<?php

\B\IM\Base::migrate([['id'=>2]]);

		$model=new \B\IM\Model(2);
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
dd($data);
?>
include("IM.V.Object.TranList",['data'=>$data])



</div>




</div>

</div>