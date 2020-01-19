<!DOCTYPE html>
<html>
  <head>
    <title>App | Contacts</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/glyphicons-halflings-regular.woff2')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/sticky-footer-navbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-select.min.css')}}">
  <body>
  </head>
    <div class="container">
      @include('navbar')
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-header text-center">Framework Laravel 5.6</h1>
        </div>

        @yield('content')

      </div>
    </div>
    @include('footer')
    <script type="text/javascript" src="{{URL::asset('js/jquery.js') }}"></script>
    @stack('scripts')
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap-select.min.js') }}"></script>
  </body>
</html>
