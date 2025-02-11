<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.style')
</head>
<body class="gradient-bg">
        @include('layouts.header')

   
        @yield('content');


  
    <hr class="mt-5 text-secondary" />

         @include('layouts.footer')
  
    <div id="scrollTop" class="visually-hidden end-0"></div>
    <div class="page-overlay"></div>
  
        @include('layouts.script')
    
  </body>
</html>
 