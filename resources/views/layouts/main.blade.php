<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::Vlab @yield('page-title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,900&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
  
    @yield('head')
   @include('layouts.head')
</head>
<body>
   <!-- loader elements -->

    <!--onclick progress loader  -->
    <div class="sysloader p-loader-bg-transparent p-display-none" id="system-loader">
      <div class="lds-dual-ring"></div>
    </div>
    <!-- end onclick  progress loader-->
    <!--  -->
    <!-- page loader -->
    <div class="sysloader p-loader-bg-dark p-display-flex" id="system-loader2">
      <div class="lds-dual-ring"></div>
    </div>
    <!-- end page loader -->

  <!--end loader element  -->

    <div class="container-fluid p-0" id="app" style="padding-right: 0;">
       @yield('content-body')
    </div>

    @include('layouts.scripts')
      
   @yield('scripts_section')
    <div id="toast"><div id="img"><img src="\err.png"></div><div id="desc" class="alert alert-danger">Network Error</div></div>
</body>
</html>