
<table class="table table-bordered table-hover">






    <tr>
    <th colspan="3"> <strong> Product List</strong> </th>
  
</tr>

	<tr>

	<th colspan="1"> <strong> Product Name</strong> </th>
    <th colspan="1"> <strong> Cat.</strong> </th>
	<th colspan="1"> <starong> Action</strong> </th>
	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)
    <tr>
    	

    	<?php 
        $cat=\B\PM\Model::getProductCatagory( $row['ProductTypeCode']);

        $type[$row['ProductTypeCode']]=$cat;

        ?>
    	<td>{{ $row['ProductName'] }}</td>
        <td>{{ $cat['ProductTypeName'] }}</td>

    	<?php 
    	//action('/B/MAS/Controller@editTax', ['UniqId' => 1])
    	?>
    	<td>
    		
    		<div class="btn-group btn-default">
    		<div class="btn btn-success ms-mod-btn" ms-live-link=" {{action("\B\PM\Controller@editProduct",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-pencil"></i></div>

            <div class="btn btn-danger ms-mod-btn" ms-live-link=" {{action("\B\PM\Controller@deleteProduct",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="fa fa-trash"></i></div>
    	
    		</div>

    	</td>


    </tr>


    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="3"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@addProduct") }}">Add New Product</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
