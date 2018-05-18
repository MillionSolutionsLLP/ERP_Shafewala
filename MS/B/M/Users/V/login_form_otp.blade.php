@extends('L.root_BackEnd')

@section('content')

    <div class="container">
        <div class="row">
             <div class="col-md-12"> <a href="{{url('/')}}">
    <center class="">
        <img src="{{ asset('images/judm_logo.png') }}"> 
        </center>
        <br>
        </a>
        </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<center>
                        <img class="col-md-6 col-md-offset-3" src="{{asset('images/Ms_CCA.png')}}"><br><br>

                        
                        For Online Recruitment Proccess<br><br>
                    	<center>
                        <h3 class="panel-title">Please Enter OTP</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['action' => '\B\Users\Controller@login_otp_post','method' => 'post','files' => true,'class'=>'ms-form','role'=>'form']) !!}
                            <fieldset>
                        
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter OTP Recived on Your Phone" name="OTP" type="text" >
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block ms-form-btn">Verify OTP</button>
                            </fieldset>
                       {!! Form::close() !!}
                       <center>
                        <span >We provide support 365 days in year.</span >
						<br><i class="fa fa-envelope-o" aria-hidden="true"><b > : help@millionsllp.com</b></i>   | | |
						 <i class="fa fa-phone-square " aria-hidden="true"><b > : +91 7990563470</b ></i> 
                        <br><i class="fa fa-copyright" aria-hidden="true"></i> {{date('Y')}}-{{date('Y')+1}},<br>All rights reserved By <i ><a href="http://www.millionsllp.com">Million Solutions LLP</i></a>.
                    </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
