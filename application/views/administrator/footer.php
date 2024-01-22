 <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2022 <a href="#" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2"><?php echo $ad_name ?></a>, All rights reserved. </span></p>
        </footer>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
   
    <!-- END Notification Sidebar-->
   
    <!-- BEGIN VENDOR JS-->
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/gmaps.min.js" type="text/javascript"></script>
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php  echo base_url('assets/')  ?>vendors/js/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN Camiony JS-->
    <script src="<?php  echo base_url('assets/')  ?>js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php  echo base_url('assets/')  ?>js/customizer.js" type="text/javascript"></script>
    <!-- END Camiony JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php  echo base_url('assets/')  ?>js/dashboard1.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="<?php  echo base_url('assets/')  ?>js/maps.js" type="text/javascript"></script>

    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href=https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js" type="text/javascript"></script>

    <style type="text/css">
        .dt-buttons {
    width: 50%;
    float: left;
    margin-top: 20px;
    margin-bottom: 20px;
}
div#example_filter {
    width: 50%;
    float: left;
    margin-top: 20px;
    margin-bottom: 20px;
    text-align: right;
}
button.dt-button {
    background: #f46e7e;
    color: #fff;
    border: none;
    padding: 5px 10px;
}
.paginate_button {
    padding: 10px;
    background: #ff586b;
    color: #fff;
    border: 2px solid #fff;
}
div#example_paginate {
    float: left;
    text-align: right;
    width: 50%;
}
div#example_info {
    width: 50%;
    float: left;
}
table#example {
    border: 1px solid #eee;
}
    </style>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
    </script>

  </body>
</html>