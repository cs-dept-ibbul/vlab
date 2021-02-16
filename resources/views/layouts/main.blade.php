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

    <div class="container-fluid" id="app" style="padding-right: 0;">
       @yield('content-body')
    </div>

    @include('layouts.scripts')
      
   @yield('scripts_section')
    
</body>
</html>