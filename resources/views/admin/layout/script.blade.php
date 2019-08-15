    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/vendors/iCheck/icheck.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="/vendors/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!-- Datatables -->
    <script src="/vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.js"></script>
    <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.js"></script>
    <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.flash.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.html5.js"></script>
    <script src="/vendors/datatables.net-buttons/js/buttons.print.js"></script>
    <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.js"></script>
    <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.js"></script>
    <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.js"></script>
    <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.js"></script>
    <script src="/vendors/jszip/dist/jszip.js"></script>
    <script src="/vendors/pdfmake/build/pdfmake.js"></script>
    <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- PNotify -->
    <script src="/vendors/pnotify/dist/pnotify.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="/vendors/pnotify/dist/pnotify.nonblock.js"></script>

        <!-- CK Editor -->
    <!-- Custom Theme Scripts -->
    <script src="/vendors/src/js/fileinput.min.js"></script>
    <script src="/vendors/src/js/custom.js"></script>
    <script>
        function show5(){
        if (!document.layers&&!document.all&&!document.getElementById)
        return

         var Digital=new Date()
         var hours=Digital.getHours()
         var minutes=Digital.getMinutes()
         var seconds=Digital.getSeconds()

        if (hours >= 0 && hours <= 11) {
            var saludo = 'Buenos Dias,';
        }
        if (hours >= 12 && hours <= 18) {
            var saludo = 'Buenas Tardes,';
        }
        if (hours >= 19 && hours <= 23) {
            var saludo = 'Buenas Noches,';
        }
        var dn="PM"
        if (hours<12)
        dn="AM"
        if (hours>12)
        hours=hours-12
        if (hours==0)
        hours=12
        $('#saludo').html(saludo);
         if (minutes<=9)
         minutes="0"+minutes
         if (seconds<=9)
         seconds="0"+seconds
        //change font size here to your desire
        myclock=""+hours+":"+minutes+" "+dn+"</b></font>"
        if (document.layers){
        document.layers.liveclock.document.write(myclock)
        document.layers.liveclock.document.close()
        }
        else if (document.all)
        liveclock.innerHTML=myclock
        else if (document.getElementById)
        document.getElementById("liveclock").innerHTML=myclock
        setTimeout("show5()",1000)
         }
  $(document).ready(function() {
    window.onload=show5;
      });
</script>
   