<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="VLab give access to University students to coductt practicals and experiments in a Virtual environment" name="descriptison">
    <meta content="vlab, vlabnigeria, vlab Nigeria, Virtual Laboratory, Virtual Laboratory for science and enginering students, vlab ibbul, ibbul vlab" name="keywords">
    <title>::Virtual Laboratory - Nigeria (VLab). </title>
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

    <div id="toast" class="alert alert-danger"><div id="img"><img src="\err.png" width="100%"></div><div id="toastdesc" class="text-danger">Network Error</div></div>
    @include('layouts.scripts')
      
   @yield('scripts_section')
</body>
</html>