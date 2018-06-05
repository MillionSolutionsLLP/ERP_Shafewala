	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  



  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><i class="fa fa-arrow-circle-up" aria-hidden="true"></i>Booking Managment</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ action ('\B\BM\Controller@indexData') }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@addBooking') }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Add Booking</a>

      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@viewAllBooking') }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Edit Booking</a>

      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@closeBookingForm') }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Close Booking</a>


      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action('\B\BM\Controller@viewAllBooking') }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> View All Booking</a>

  
    


      </div>
    </div>
  </div>








</div>