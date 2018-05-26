
var input=0;
$( ".AddSectionBtn" ).bind( "click", function() {

	
	input=input+1;
 	var html=$(".ProductDetails").html();
	
	$(".ProductDetails:last").after("<br><div class='ProductDetails'> <div class='col-lg-12'>"+html+"<span class='btn btn-sm btn-default btn-danger glyphicon glyphicon-remove pull-right RemoveSectionBtn' style='padding:2px 2px;'></span></div><div class='col-lg-12'></div>");


	
});







