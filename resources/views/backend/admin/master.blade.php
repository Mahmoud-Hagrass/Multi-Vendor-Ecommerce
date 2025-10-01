<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('backend.admin.partials.head')
@flasher_render

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern"
  data-col="2-columns">
  <!-- fixed-top-->
  @include('backend.admin.partials.navbar')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('backend.admin.partials.sidebar')
  <div class="app-content content">
      <div class="content-wrapper">
          @yield('content')
      </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  @include('backend.admin.partials.scripts')
</body>

</html>
