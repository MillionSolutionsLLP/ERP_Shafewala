<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>


<style>
	div
	{
		position: absolute;
		
	}
	
	div#check-1-date-box
	{
		left: 590px;
		top: 15px;
		
	}
	
	div#check-1-pay-to-box
	{
		left: 80px;
		top: 80px;
	}
	
	div#check-1-amount-nbr-box
	{
		left: 600px;
		top: 135px;
	}
	
	div#check-1-amount-txt-box
	{
		left: 130px;
		top: 113px;
	}
	
	div#check-1-pay-to-address-box
	{
		left: 30px;
		top: 98px;
	}
	
	div#check-1-memo-box
	{
		left: 50px;
		top: 205px;
	}

	div#check-1-date-box-d-1{
		left: -18px;
		top :10px;
	}

	div#check-1-date-box-d-2{
		left: 2px;
		top :10px;
	
	}

	div#check-1-date-box-m-1{

		left: 22px;
		top :10px;
	
		
	}

	div#check-1-date-box-m-2{

		left: 42px;
		top :10px;
		
		
	}

	div#check-1-date-box-y-1{

		left: 62px;
		top :10px;
		
		
	}

	div#check-1-date-box-y-2{

		left: 82px;
	
		top :10px;
	}

	div#check-1-date-box-y-3{

		left: 100px;
	top :10px;
		
	}

	div#check-1-date-box-y-4{

		left: 120px;
		top :10px;
		
	}


</style>
</head>
<body >

<?php

$date=explode('/', $data['date']);
$day=$date[0];
$month=$date[1];
$year=$date[2];

?>
	<div id="check-1-date-box">
		<div id="check-1-date-box-d-1">{{ $day[0] }} </div>
		<div id="check-1-date-box-d-2">{{ $day[1] }}</div>
		<div id="check-1-date-box-m-1">{{ $month[0] }} </div>
		<div id="check-1-date-box-m-2">{{ $month[1] }}</div>
		<div id="check-1-date-box-y-1">{{ $year[0] }}</div>
		<div id="check-1-date-box-y-2">{{ $year[1] }}</div>
		<div id="check-1-date-box-y-3">{{ $year[2] }}</div>
		<div id="check-1-date-box-y-4">{{ $year[3] }}</div>
	
	</div>
	<div id="check-1-pay-to-box">
	{{ $data['payTo'] }}
	</div>
	<div id="check-1-amount-nbr-box">
	{{ $data['amountNbr'] }}/-
	</div>
	<div id="check-1-amount-txt-box">
	{{ $data['amountTxt'] }} only
	</div>
	<div id="check-1-pay-to-address-box">
	<pre>
		
	</pre>
	</div>
	<div id="check-1-memo-box">
	{{ $data['memo'] }}
	</div>



</body>
</html>