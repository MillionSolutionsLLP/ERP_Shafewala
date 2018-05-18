<?php

	//dd($data);
?>

<div class="panel panel-default">
	<div class="panel-heading">


<table class="ms-full-w">

    <tr>
    
    <td><strong> <i class="glyphicon glyphicon-home ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@indexData") }}"></i> Tax Home</strong></td>
    <td><div class="btn btn-info ms-mod-btn pull-right" ms-live-link="{{ action("\B\MAS\Controller@addTax") }}"> Add New Tax  <i class="fa fa-plus-square" aria-hidden="true"></i></div></td>
   </tr>
   </table>


</div>
	<div class="panel-body">
	
<div class="col-lg-12"> 
<table class="table table-bordered table-hover">








	<tr>
	<th colspan="1"> <strong> No</strong> </th>
	<th colspan="1"> <strong> Tax Name</strong> </th>
	<th colspan="1"> <strong> Rate</strong> </th>
	<th colspan="1"> <strong> Action</strong> </th>
	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)
    <tr>
    	

    	<td>{{ $loop->iteration }}</td>
    	<td>{{ $row['TaxName'] }}</td>
    	<td>{{ $row['TaxRate'] }}</td>
    	<?php 
    	//action('/B/MAS/Controller@editTax', ['UniqId' => 1])
    	?>
    	<td ms-live-link="" >
    		
    		<div class="btn-group btn-default">
    			<div class="btn btn-danger ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@deleteTax",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-trash"></i></div>
    			<div class="btn btn-success ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editTax",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-pencil"></i></div>
    	
    		</div>

    	</td>


    </tr>


    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="4"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@addTax") }}">Add New Tax</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
</div>
</div>