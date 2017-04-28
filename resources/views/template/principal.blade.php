<!DOCTYPE html>
<html lang="en">

<head>

  <title> @yield('titulo') | Fusagasugá</title>
  @include('template.head')
  @yield('js1')

</head>

<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      @include('template.navleft')

      <!-- top navigation -->

      @include('template.navtop')

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          <div class="text-center animate form">
            @include('flash::message')
          </div>
          <div class="page-title">
            <div class="title_left">
              <h3>@yield('pagina') </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">
            @yield('contenido')
          </div>

        </div>

        @include('template.footer')

      </div>
      <!-- /page content -->
    </div>
    <div class="sidebar-footer hidden-small" style="">
        <a data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('inicio') }}">
          <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Perfil" href="{{ route('usuarios.show', Auth::user()->id) }}">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Ayuda" href="{{ route('inicio') }}" target="_blank" 
   onclick="window.open(this.href, this.target, 'top=100,left=50, width=900,height=450'); return false;">
          <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" href="{{ route('logout') }}" title="Salir">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>

  </div>

  @include('template.botjs')
  @yield('js2')

  <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>

  <!-- bootstrap progress js -->
  <script src="{{ asset('plugins/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
  <script src="{{ asset('plugins/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <!-- icheck -->
  <script src="{{ asset('plugins/js/icheck/icheck.min.js') }}"></script>
  <!-- tags -->
  <script src="{{ asset('plugins/js/tags/jquery.tagsinput.min.js') }}"></script>
  <!-- switchery -->
  <script src="{{ asset('plugins/js/switchery/switchery.min.js') }}"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="{{ asset('plugins/js/moment/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugins/js/datepicker/daterangepicker.js') }}"></script>
  <!-- richtext editor -->
  <script src="{{ asset('plugins/js/editor/bootstrap-wysiwyg.js') }}"></script>
  <script src="{{ asset('plugins/js/editor/external/jquery.hotkeys.js') }}"></script>
  <script src="{{ asset('plugins/js/editor/external/google-code-prettify/prettify.js') }}"></script>
  <!-- select2 -->
  <script src="{{ asset('plugins/js/select/select2.full.js') }}"></script>
  <!-- form validation -->
  <script type="text/javascript" src="{{ asset('plugins/js/parsley/parsley.min.js') }}"></script>
  <!-- textarea resize -->
  <script src="{{ asset('plugins/js/textarea/autosize.min.js') }}"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="{{ asset('plugins/js/autocomplete/countries.js') }}"></script>
  <script src="{{ asset('plugins/js/autocomplete/jquery.autocomplete.js') }}"></script>
  <!-- pace -->
  <script src="{{ asset('plugins/js/pace/pace.min.js') }}"></script>
</body>

</html>
