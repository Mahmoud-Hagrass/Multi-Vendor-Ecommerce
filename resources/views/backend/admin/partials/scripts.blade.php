  <script src="{{ asset('assets/assets-back') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/assets-back') }}/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/data/jvector/visitor-data.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('assets/assets-back') }}/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/js/core/app.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets/assets-back') }}/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <!-- for toaster-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<!-- for toaster-->
  @include('backend.admin.partials.toaster_notification')
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

@stack('js')
