@extends('L.root_BackEnd')

@section('title')
@yield('Page-title')
@endsection

@section('content')

    <div id="wrapper">

        <!-- Navigation -->
        @include('B.L.Object.Nav')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid ms-live-tab">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$data['Page-title']}}</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12 ">
            		  {{$data['Page-content']}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
             
        </div>
        <!-- /#page-wrapper -->

    </div>

@endsection


@section('breadcrumb')
<li class="active">{{ __('panel.urhere') }} : </li>
<li class="active">{{ __('panel.home') }}</li>
{{$data['Page-breadcrumb']}}
@endsection

@section('js')

@endsection