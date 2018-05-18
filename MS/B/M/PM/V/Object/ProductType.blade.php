
<table class="table table-bordered table-hover">






    <tr>
    <th colspan="3"> <strong> Product Type List</strong> </th>
  
</tr>

	<tr>

	<th colspan="1"> <strong> Product Type Name</strong> </th>
	<th colspan="1"> <strong> Product Unit Name</strong> </th>
	<th colspan="1"> <strong> Action</strong> </th>
	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)
    <tr>
    	

    	
    	<td>{{ $row['ProductTypeName'] }}</td>
    	<td>{{ $row['ProductUnitName'] }}</td>
    	<?php 
    	//action('/B/MAS/Controller@editTax', ['UniqId' => 1])
    	?>
    	<td>
    		
    		<div class="btn-group btn-default">
    		<div class="btn btn-success ms-mod-btn" ms-live-link=" {{action("\B\PM\Controller@editProductType",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-pencil"></i></div>

            <div class="btn btn-danger ms-mod-btn" ms-live-link=" {{action("\B\PM\Controller@deleteProductType",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="fa fa-trash"></i></div>
    	
    		</div>

    	</td>


    </tr>


    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="3"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@addProductType") }}">Add New Product Type</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
