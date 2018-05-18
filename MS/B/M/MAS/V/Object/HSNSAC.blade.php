
<table class="table table-bordered table-hover">






    <tr>
    <th colspan="1"> <strong> HSN/SAC Details</strong> </th>
    <th colspan="1" > <strong class="btn btn-success ms-mod-btn pull-right" ms-live-link="{{action('\B\MAS\Controller@editHSNSAC')}}"> <i class="glyphicon glyphicon-pencil"></i></strong> </th>
  
</tr>

	<tr>

	<th colspan="1"> <strong> Code Name</strong> </th>
	<th colspan="1"> <strong> HSN Code</strong> </th>

	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)
    <tr>
    	

    	
    	<td>{{ $row['HsnName'] }}</td>
    	<td>{{ $row['HsnCode'] }}</td>

    </tr>


    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="3"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\MAS\Controller@addTax") }}">Add New Tax</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
