
<table class="table table-bordered table-hover">






    <tr>
    <th colspan="3"> <strong> Terms & Conditions Details</strong> </th>
  
</tr>

	<tr>

	<th colspan="1"> <strong> Tax Name</strong> </th>
	<th colspan="1"> <strong> Tax Rate %</strong> </th>
	<th colspan="1"> <strong> Action</strong> </th>
	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)
    <tr>
    	

    	
    	<td>{{ $row['Text'] }}</td>
    	<td>{{ $row['DisplayRank'] }}</td>
    	<?php 
    	//action('/B/MAS/Controller@editTax', ['UniqId' => 1])
    	?>
    	<td ms-live-link="" >
    		
    		<div class="btn-group btn-default">
    		<div class="btn btn-success ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@editTNC",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-pencil"></i></div>
    	
    		</div>

    	</td>


    </tr>


    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="3"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@addTNC") }}">Add New Terms & Conditions</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
