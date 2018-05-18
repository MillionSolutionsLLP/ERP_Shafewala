

@extends('L.root_BackEnd')

@section('title')

MS-ERP 2.0.1 for {{B\MAS\Model::getCompanyName()}} , Solution Provided by Million Solutions LLP
@endsection

@section('content')


        <!-- Navigation -->
        @include('B.L.Object.Nav')

  
            <div class="ms-content">
                <div class="row">

                    <div class="ms-live-tab">

                        <div class="panel-heading">@yield('Page-title') </div>
                        @include('B.L.Object.Error')
                        @yield('Page-content')

                    </div>

                </div>
             
            
            </div>
  



@endsection


@section('breadcrumb')
<li class="active">{{ __('panel.urhere') }} : </li>
<li class="active">{{ __('panel.home') }}</li>
@yield('Page-breadcrumb')
@endsection

@section('js')

@endsection