<!DOCTYPE html>
<html lang="en" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
<title>@yield('title')</title>
@include('css')
@include('others')
@include('js')
</head>
<body >
<div class="progress progress-striped active ms-process-bar-div">
                                        <div class="progress-bar progress-bar-success ms-process-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                          
                                        </div>
</div>
@yield('content')



<!-- <ol class="breadcrumb">
@yield('breadcrumb')
</ol> -->

								
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





