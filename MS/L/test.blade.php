<!DOCTYPE html>
<html lang="en" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
<title>@yield('title')</title>
@include('css')
@include('others')
@include('js')
</head>
<body class="container-fluid">
    <div id="wrapper">

        <!-- Navigation -->
        @include('B.L.Object.Nav')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('Page-title')</h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
              @yield('Page-content')
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    @yield('breadcrumb')
@include('jsEnd')
<script type="text/javascript">
@yield('js')
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "url": "http://www.millionsllp.com",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-9662611234",
    "contactType": "customer service"
  }
}
</script>

</body>
</html>
