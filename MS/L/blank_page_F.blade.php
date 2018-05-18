@extends('F.L.plate')


@push('title')
@yield('PageTitle')
@endpush


@push('description')
@yield('PageDescription', 'MS LLP - One of the top ERP software companies, ERP vendors & ERP solution provider company in india offers customized ERP , online ERP solutions across India.')
@endpush

@push('keywords')
@yield('PageKeywords','erp in india,erp software india,erp software company,cloud erp,erp system,erp software development company india,erp companies,erp vendors in india,erp solution provider in india')
@endpush

@push('content')
<div >

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="preloader" style="display: none;"><div class="loaded" style="display: none;">&nbsp;</div></div>
        <!--Home page style-->





<section class="ms-bg-pic ms-fix-1-1">

    <div class="container">
        <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ol class="breadcrumb">
                          <li><a href="{{url('/')}}">Home</a></li>
                          @yield('PageLocation')
                          
                        </ol>
                	</div>

                    
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                            <div class="panel panel-default">
                                <div class="panel-footer ms-bg">
                                <h4 class="ms-text">@yield('PageHeading')</h4>
                                </div>

                                <div class="panel-body">
                                @yield('PageContent')

                                </div>

                            </div>

                        </div>


                        @include('Home.Common.sidebar')
                    
        </div>
    </div>

</section><!-- End of Banner Section -->

<div class="scrollup" style="display: none;">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <script src="../assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/vendor/isotope.min.js"></script>

        <script src="../assets/js/jquery.easypiechart.min.js"></script>
        <script src="../assets/js/jquery.mixitup.min.js"></script>
        
            
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/main.js"></script>
        
    

</div>
@endpush


@push('breadcrumb')

@endpush


@push('js')

@endpush

