
<table class="table table-bordered table-hover table-responsive">






    <tr>
    <th colspan="6"> <strong> Booking List</strong> </th>
  
</tr>

	<tr>
    <th colspan="1"> <strong>  Booking ID</strong> </th>
	<th colspan="1"> <strong>  Party Name</strong> </th>
    <th colspan="1"> <strong>  Product</strong> </th>
    <th colspan="1"> <strong>  Booking Amount</strong> </th>
	<th colspan="1"> <starong> Booking Date</strong> </th>
    <th colspan="1"> <starong> Action</strong> </th>
	
</tr>



<tbody>
@if (count($data['table']) > 0)
    
    @foreach ($data['table'] as $row)

    @if(($row['BookingStatus'] == 0) or ($row['BookingStatus'] == 1) or ($row['BookingStatus'] == 2)  )



    <tr>
    	

    	<?php 
       // dd( $row);
      //  dd(\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->diffForHumans(\Carbon::now()));
        $date=\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->format('d-m-Y');
        $comming=\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->diffForHumans(\Carbon::now());



        $lable='info';
      //  dd(\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->diffInDays(\Carbon::now(),true));
        if(\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->diffInDays(\Carbon::now(),true) > 0 ){
             $lable='info';

             if(\Carbon::createFromFormat('Y-m-d', $row['BookingDate'])->diffInDays(\Carbon::now(),true) < 16 ){
             $lable='danger';
            }
        }


        $model=new B\BM\Model (1,$row['UniqId']);


        $qun=$model->get()->sum('ProductQuantity');
        $pmArray=$model->get()->toArray();
        //dd($model->get()->toArray()) ;


        ?>
        <td> {{ $row['UniqId'] }}</td>
    	<td>{{ $row['BookingParty'] }}</td>
        <td>
            <table class="table">
                

        <!--     <tr>
                <th>Name</th>
                <th>Qt.</th>
            </tr> -->
        
            @foreach($pmArray as $product)
            <tr>
            <td>{{ \B\PM\Model::getProductbyId( $product['ProductCode'])['ProductName'] }}</td>
            <td>{{ $product['ProductQuantity']  }}</td>
            </tr>
            @endforeach

           </table>
         </td>
        <td class="text-success"> ₹ {{ $row['BookingAmount'] }}</td>
        <td>{{$date}} <span class="label label-{{ $lable }} ">{{ $comming }}</span></td>

    	<?php 
    	//action('/B/MAS/Controller@editTax', ['UniqId' => 1])
    	?>
    	<td>
    		
    		<div class="btn-group btn-default">
    		<div class="btn btn-success ms-mod-btn" ms-live-link=" {{action("\B\BM\Controller@editBooking",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="glyphicon glyphicon-pencil"></i></div>

        <!--     <div class="btn btn-danger ms-mod-btn" ms-live-link=" {{action("\B\PM\Controller@deleteProduct",['UniqId'=>\MS\Core\Helper\Comman::en4url($row['UniqId'])]) }}"><i class="fa fa-trash"></i></div>
    	 -->
    		</div>

    	</td>


    </tr>
  @endif

    @endforeach
@elseif (count($data['table']) == 0)
 <tr ><center>
<td colspan="4"> 
 	<div class="col-lg-12 btn btn-info ms-mod-btn" ms-live-link="{{ action("\B\BM\Controller@addBooking") }}">Add New Booking</div></center>
</td>

 </tr>
@else
    Something is wrong !
@endif



</tbody>
	



</table>
