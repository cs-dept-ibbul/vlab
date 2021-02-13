<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::Vlab @yield('page-title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @yield('head')
   @include('layouts.head')
</head>
<body style="background-color:#20154e">

    <div class="container-fluid" id="app" style="padding-right: 0;">
       @yield('content-body')
    </div>

    @include('layouts.scripts')
      
   @yield('scripts_section')
    
</body>
</html>