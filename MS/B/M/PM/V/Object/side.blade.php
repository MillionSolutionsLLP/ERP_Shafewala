	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  

  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group" role="group" aria-label="...">
          <span class="btn btn-default collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Manage Product </span>

           <span class="pull-right ms-mod-btn btn btn-default" ms-live-link="{{ action("\B\PM\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@addProduct") }}"> <i class="fa fa-plus-square"></i> Add New Product</a>
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@indexData") }}">
        <i class="fa fa-pencil-square"></i> Edit Product</a>


		
      </div>
    </div>
  </div>




  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group" role="group" aria-label="...">
          <span class="btn btn-default collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-tags" aria-hidden="true"></i> Manage Product Type</span>

           <span class="pull-right ms-mod-btn btn btn-default" ms-live-link="{{ action("\B\PM\Controller@indexData") }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ action("\B\PM\Controller@addProductType") }}"> <i class="fa fa-plus-square"></i> Add New Product Type</a>
    
      </div>
    </div>
  </div>


<div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group" role="group" aria-label="...">
          <span class="btn btn-default collapsed " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-signal" aria-hidden="true"></i> Manage Product Rent Slab</span>

           <span class="pull-right ms-mod-btn btn btn-default" ms-live-link="{{ action("\B\PM\Controller@indexData") }}">
            
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