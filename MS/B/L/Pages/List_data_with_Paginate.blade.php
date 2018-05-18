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
//dd($data['List-Paginate']);
foreach ($data['List-array'][0] as $key => $value) {
	if (in_array($key,$data['List-disaplay'])) {
		$heading[]=ucfirst($key);
	}
		
}

//dd($heading);
?>



  <!-- Default panel contents -->


  <!-- Table -->
  <table class="table table-responsive table-bordered table-hover">
  <tr>
  	@foreach ($heading as $head)
    <th>{{ $head }}</th>
	@endforeach
  </tr>
<tbody>
  @foreach ($data['List-Paginate'] as $object)
  <tr>
    @foreach ($data['List-disaplay'] as $key )
      <td>{{$object->$key}}</td>
    @endforeach
  </tr>
  @endforeach
   </tbody>
<!--   	@foreach ($data['List-array'] as $row)
  	<tr>
    	@foreach ($row as $key=>$row2)
    	@if(in_array($key,$data['List-disaplay']))
    	<td>{{$row2}}</td>
    	@endif
    	
		
		@endforeach
		</tr>
	@endforeach -->
  
  </table>

{{ $data['List-Paginate']->links() }}


</div>

<script type="text/javascript">


@include('L.jsFix')


</script>