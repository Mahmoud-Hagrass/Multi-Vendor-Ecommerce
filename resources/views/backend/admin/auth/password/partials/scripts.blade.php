 <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('assets/assets-back') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/assets-back') }}/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('assets/assets-back') }}/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{ asset('assets/assets-back') }}/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets/assets-back') }}/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <!-- for toaster-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- for toaster-->
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
