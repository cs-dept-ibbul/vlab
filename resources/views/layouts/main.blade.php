<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::Vlab @yield('page-title')</title>
    
   @include('layouts.head')
</head>
<body>

    <div class="container-fluid" id="app">
       @yield('content-body')
    </div>

    @include('layouts.scripts')

    <script>
    </script>
    <div>
        @yield('scripts_section')
    </div>
</body>
</html>