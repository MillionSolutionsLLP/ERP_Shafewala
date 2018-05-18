require('./bootstrap');
//window.Vue = require('vue');



  
$( document ).ready(function() {
  
   


});




$("#error").slideUp("5");


var master = 0;
var keycount = 0;

$( "body" ).on( "keydown", function( event ) {



if(event.altKey){

event.preventDefault();

if(event.which == 77 ){
 //alert("Open Master");
var open=$('li[class="dropdown open"] ');
var toopen=$('li[ms-module="Master"] ');
open.removeClass("open");
toopen.addClass("open");
  master = 1 ;

}


if(event.which == 72 ){
 //alert("Open Master");

var open=$('li[class="dropdown open"] ');
open.removeClass("open");
  var toopen=$('li[ms-modele-sub="Home"]');
 toopen.trigger( "click" );

 master=0;
 
}


if(master == 1){


  if(event.which == 67  ){

   var toopen=$('li[ms-modele-sub="Company"]');
  var open=$('li[class="dropdown open"] ');
  open.removeClass("open");
  toopen.trigger( "click" );
  keycount=keycount+1;
 
 
}


  if(event.which == 85  ){

     var toopen=$('li[ms-modele-sub="User"]');
    var open=$('li[class="dropdown open"] ');
    open.removeClass("open");
    toopen.trigger( "click" );
    keycount=keycount+1;
    
   
  }

  if(event.which == 82  ){

     var toopen=$('li[ms-modele-sub="Roles"]');
    var open=$('li[class="dropdown open"] ');
    open.removeClass("open");
    toopen.trigger( "click" );
    keycount=keycount+1;
   
   
  }

}




}



//console.log(master);
//console.log( event.type + ": " +  event.which);
});




$("body").on("click",".ms-js-btn",function (e){
e.preventDefault();

var tab2 =$(this).attr('ms-js-target');
    

   
   tab2='a[href="#'+tab2+'"]';
//   $('.tab-pane .active').tab('hide');
// //  $(tab2).tab('show');



  $(tab2).tab('show');


});


function loadingOn() {
  
 $(".loading").fadeIn( "slow", function() {
    // Animation complete
  });;




}


function loadingOff() {
  
   $(".loading").fadeOut( "slow", function() {
    // Animation complete
  });

}

$("body").on("click",".ms-mod-btn",function (){


var link= $(this).attr('ms-live-link');



getMsModLink(link);

//alert($(this).attr('ms-live-link'));

});





function getMsModLink(link) {
$(".ms-mod-tab").slideUp("slow");
loadingOn();


$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                $(".ms-mod-tab").html(data);
                $(".ms-mod-tab").slideDown("fast");
               loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
                       // console.log(xhr);
                
                   // alert("Something went wrong!"+ "Error is : "+status);
                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

}



$("body").on("click",".ms-live-btn",function (){


var link= $(this).attr('ms-live-link');

$(".ms-live-tab").slideUp();
loadingOn();
$.ajax({
                url: link,  //server script to process data
                type: 'GET',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
                $(".in").removeClass("in");
                $(".ms-live-tab").html(data);
                $(".ms-live-tab").slideDown();
                loadingOff();

              
                },
                error: errorHandler = function(xhr, status, error) {
                       // console.log(xhr);
                
                   // alert("Something went wrong!"+ "Error is : "+status);
                },
                cache: false,
                contentType: false,
                processData: false
            }, 'json');

//alert($(this).attr('ms-live-link'));

});

$("body").on("submit","form",function (){

event.preventDefault();

});


$("form").on("click",".ms-form-btn",function (){
event.preventDefault();
var link= $('.ms-form').attr('action');

            $.ajax({
                url: link,  //server script to process data
                type: 'POST',
                xhr: function() {  // custom xhr
                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // if upload property exists
                       // myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // progressbar
                    }
                    return myXhr;
                },
                // Ajax events
                success: completeHandler = function(data) {
                 // alert("Your action taken succefully.!");
                 
                // console.log("msg" in data);
              	//console.log(data);
              //data=$.parseJSON(data);
              //console.log(data);


                console.log(data);
                $a =1;
                if($a==0){




                  if("redirect" in data){
                    
                     //localStorage.LastPage = data.redirect;
                    location.replace(data.redirect);
                   
                  //  console.log(data->redirect);
                }else{
                      
                      if ("redirectData" in data) {

                        getMsModLink(data.redirectData);

                      }else{
                        //location.reload();
                      }
                    
                }


                }

                
               // alert(data.redirect);
                  location.replace(data.redirect);
                },
                error: errorHandler = function(xhr,status, error) {
                // console.log(xhr.responseJSON.msg);
                 var html="";
                 jQuery.each(xhr.responseJSON.msg,function (item, index){

                 	html+='<span><i class="fa fa-exclamation" aria-hidden="true"></i> '+item+'</span><br>';
           			 $("#error").html(html);
           			 $("#error").slideDown();


                 });
                
                    //alert("Something went wrong!"+ "Error is : "+status);
                },
                // Form data
                data: new FormData($('.ms-form')[0]),
                // Options to tell jQuery not to process data or worry about the content-type
                cache: false,
                contentType: false,
                processData: false
            }, 'json');
});


