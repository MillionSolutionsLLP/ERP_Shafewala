@extends('L.root_BackEnd')



@section('title')
MS-Billing System 2.0.1 for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection


@section('content')


    <div class="container">
        <div class="row">
     

            <div class="col-md-4 col-md-offset-4" style=" transform: translateY(10%);">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<center>
                        
                        <span class="col-md-6 col-md-offset-3">
                            
                            <img   style="max-height: 50px;" src="{{asset('images/'.env('APP_V_LOGO','Ms_CCA.png'))}}">
                        </span>

                        <br><br>

                        <span class="col-lg-12">
                        @if(!env("APP_V_NAME",'MS-CCA FOR NCT'))
                        MS-CCA FOR NCT
                        @else
                        {{env("APP_V_NAME",'MS-CCA FOR NCT')}}
                        @endif
                        </span>                    	
                        <br><br>
                        <h3 class="panel-title">Please Sign In</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['action' => '\B\Users\Controller@login_post','method' => 'post','files' => true,'class'=>'ms-form']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Username" name="UserName" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="Password" type="password" value="">
                                </div>
          
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block ms-form-btn">Login</button>
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
