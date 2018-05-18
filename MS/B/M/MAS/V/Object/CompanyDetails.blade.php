<table class="table table-bordered table-hover ">


	<tr>
	<th colspan="1"> <strong> Company Details</strong> </th>
	<th colspan="1" > <strong class="btn btn-success ms-mod-btn pull-right" ms-live-link="{{action('\B\MAS\Controller@editCompany')}}"> <i class="glyphicon glyphicon-pencil"></i></strong> </th>
	
</tr>
<tbody>
<tr>
	<td>Name of Company :</td>
	<td><strong>{{$data['Master_Company_current']['NameOfBussiness']}}</strong></td>
</tr>


<tr>
	<td>GSTIN :</td>
	<td><strong>{{$data['Master_Company_current']['GstNo']}}</strong></td>
</tr>

<tr>
	<td>CIN :</td>
	<td><strong>{{$data['Master_Company_current']['CinNo']}}</strong></td>
</tr>

<tr>
	<td>PAN :</td>
	<td><strong>{{$data['Master_Company_current']['PanNo']}}</strong></td>
</tr>

</tbody>

<tr>
	<th colspan="2"> <strong> Account Details</strong>  </th>
	
</tr>
<tbody>
<tr>
	<td>Bank Name :</td>
	<td><strong>{{$data['Master_Company_current']['BankName']}}</strong></td>
</tr>

<tr>
	<td>Account Type :</td>
	<td><strong>{{$data['Master_Company_current']['AccountType']}}</strong></td>
</tr>

<tr>
	<td>Account No :</td>
	<td><strong>{{$data['Master_Company_current']['AccountNo']}}</strong></td>
</tr>

<tr>
	<td>IFSC Code :</td>
	<td><strong>{{$data['Master_Company_current']['IfscCode']}}</strong></td>
</tr>




</tbody>
	



</table>
