<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Stock Module Home</strong></h5></div>
<div class="panel-body">


<div class="col-lg-6">



	<div class="panel panel-default">
		
		<div class="panel-heading"><h5>Stock Overview</h5></div>

		<div class="panel-body">
			
				<table class="table table-bordered table-hover">
		
		<tbody>

				
				<tr>
					
					<th>No Warehouse</th>
					<td>1</td>


				</tr>


				<tr>
					<th>No Types of Product</th>
					<td>1</td>
				</tr>
				<tr>
					
					<th>No Total Product</th>
					<td>1</td>
				</tr>

		</tbody>

	</table>

		</div>



	</div>




</div>


<div class="col-lg-6">
<?php
 
 //dd($data);
echo $data['addStockForm'];

?>

</div>


<div class="col-lg-12">


	
<?php

$model=new \B\IM\Model();
		$tableData=$model->get()->toArray();
	
		$data=[

			'table'=>$tableData,
		];
//dd($data);
?>
@include("IM.V.Object.WarehouseList",['data'=>$data])





</div>

</div>

</div>