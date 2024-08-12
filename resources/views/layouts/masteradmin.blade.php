<!DOCTYPE html>
<html>
<head>
  <title>Laundry MASBRO</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <!-- plugin css -->
  {{Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css')}}
  {{Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {{Html::style('css/app.css')}}
  <!-- end common css -->

  @stack('style')

</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layouts.header')
    <div class="container-fluid page-body-wrapper">
      @include('layouts.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layouts.footer')
      </div>
    </div>
  </div>

   <!-- base js -->
  {{Html::script('js/app.js') }}
  {{Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  {{Html::script('assets/js/off-canvas.js') }}
  {{Html::script('assets/js/hoverable-collapse.js') }}
  {{Html::script('assets/js/misc.js') }}
  {{Html::script('assets/js/settings.js') }}
  {{Html::script('assets/js/todolist.js') }}
  <!-- end common js -->

  @stack('custom-scripts')
  
  
</body>
</html>