@extends('L.root')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    	<img class="col-md-6 col-md-offset-3" style="max-height: 50px;" src="{{asset('images/billing.png')}}"><br><br>
                    	<center>
                        <h3 class="panel-title">{!!$data['Login-title']!!}</h3>
                        </center>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['action' => $data['Login-action'],'method' => 'post','files' => true,'class'=>'ms-form','role'=>'form']) !!}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Username" name="UserName" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Password" name="Password" type="password" value="">
                                </div>
                                <div class="checkbox">	

                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button  class="btn btn-lg btn-success btn-block">{!!$data['Login-button']!!}</button>
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
