	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  

  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed ms-btn-full-width-main " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Manage Stock</span>

           <span class="pull-right ms-mod-btn btn btn-default ms-btn-full-width-side" ms-live-link="{{ action("\B\IM\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\IM\Controller@addWard") }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> IN/OUT Entry</a>
	
        <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\IM\Controller@WardPrint") }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Print Lables</a>
  
		    
        <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\IM\Controller@WardPrint") }}"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Receive From Client</a>
  
    


      </div>
    </div>
  </div>





      <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed ms-btn-full-width-main" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-industry" aria-hidden="true"></i> Warehouses </span>

           <span class="pull-right ms-mod-btn btn btn-default ms-btn-full-width-side" ms-live-link="{{ action("\B\IM\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\IM\Controller@addWarehouse") }}"> <i class="fa fa-plus-square"></i> Add New Warehouse</a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@indexData") }}">
        <i class="fa fa-pencil-square"></i> Edit Warehouse</a>


    
      </div>
    </div>
  </div>



<div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed ms-btn-full-width-main" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-signal" aria-hidden="true"></i> Report Stock</span>

           <span class="pull-right ms-mod-btn btn btn-default ms-btn-full-width-side" ms-live-link="{{ action("\B\IM\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@addProductRentSlab") }}"> <i class="fa fa-plus-square"></i> Add New Product Rent Slab</a>
   
    
      </div>
    </div>
  </div>





</div>