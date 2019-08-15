<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->

<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/fastclick.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>




<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
