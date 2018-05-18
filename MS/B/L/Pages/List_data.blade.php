<div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{!!$data['List-title']!!}</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12 ">
            				
            			
<?php
$heading=[];

foreach ($data['List-array'][0] as $key => $value) {
	if (in_array($key,$data['List-disaplay'])) {
		$heading[]=ucfirst($key);
	}
		
}

//dd($heading);
?>



  <!-- Default panel contents -->


  <!-- Table -->
  <table class="table table-bordered">
  <tr>
  	@foreach ($heading as $head)
    <th>{{ $head }}</th>
	@endforeach
  </tr>

   
  	@foreach ($data['List-array'] as $row)
  	<tr>
    	@foreach ($row as $key=>$row2)
    	@if(in_array($key,$data['List-disaplay']))
    	<td>{{$row2}}</td>
    	@endif
    	
		
		@endforeach
		</tr>
	@endforeach
  
  </table>



</div>