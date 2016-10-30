<!-- ================== BEGIN BASE JS ================== -->
<script src="/admumpln/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="/admumpln/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="/admumpln/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
  <script src="/admumpln/assets/crossbrowserjs/html5shiv.js"></script>
  <script src="/admumpln/assets/crossbrowserjs/respond.min.js"></script>
  <script src="/admumpln/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="/admumpln/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/admumpln/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/admumpln/assets/plugins/switchery/switchery.min.js"></script>
<script src="/admumpln/assets/plugins/powerange/powerange.min.js"></script>
<script src="/admumpln/assets/js/form-slider-switcher.demo.min.js"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/admumpln/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="/admumpln/assets/plugins/DataTables/js/dataTables.colReorder.js"></script>
<script src="/admumpln/assets/js/table-manage-colreorder.demo.min.js"></script>
<script src="/admumpln/assets/plugins/DataTables/js/dataTables.fixedColumns.min.js"></script>
<script src="/admumpln/assets/js/table-manage-fixed-columns.demo.min.js"></script>
<script src="/admumpln/assets/plugins/DataTables/js/dataTables.tableTools.js"></script>


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="/admumpln/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="/admumpln/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/admumpln/assets/plugins/masked-input/masked-input.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/admumpln/assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="/admumpln/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/admumpln/assets/plugins/select2/dist/js/select2.min.js"></script>
<?php
    include "./data/pegawai-report-plugin.php";
?>

<script src="/admumpln/assets/plugins/parsley/dist/parsley.js"></script>
<script src="/admumpln/assets/plugins/bootstrap-wizard/js/bwizard.js"></script>
<script src="/admumpln/assets/js/form-wizards-validation.demo.min.js"></script>
<script src="/admumpln/assets/js/apps.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->


<script>
  $(document).ready(function() {
    App.init();
    TableManageColReorder.init();
    FormWizardValidation.init();
    FormPlugins.init();
  });
</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','/admumpln/assets/js/analytics.js','ga');

    ga('create', 'UA-53034621-1', 'auto');
    ga('send', 'pageview');
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#data-pegawai').DataTable( {
      "ajax": "/admumpln/data/pegawai-ajax.php",
    } );
  } );
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#pegawai-report').DataTable( {
      "ajax": "/admumpln/data/pegawai-report-ajax.php",
    } );
  } );
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#pegawai-pensiun').DataTable( {
      "ajax": "/admumpln/data/pensiun-ajax.php",
    } );
  } );
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#diklat-pegawai').DataTable( {
      "ajax": "/admumpln/data/diklat-ajax.php",
    } );
  } );
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#data-diklat').DataTable( {
      "ajax": "/admumpln/data/diklat-data-ajax.php",
    } );
  } );
</script>

<script>
  var table;
  $(document).ready(function() {
    table = $('#diklat-report').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },
      "autoWidth": false,
      "ajax": "/admumpln/data/diklat-report-ajax.php",
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#diklat-view').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },
      "autoWidth": false,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#data-talenta').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },

      "ajax": "/admumpln/data/talenta-ajax.php",
      dom: 'T<"clear">lfrtip',

      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#data-pendidikan').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },
      "ajax": "/admumpln/data/pendidikan-ajax.php",
      "autoWidth": false,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#pendidikan-pegawai').DataTable( {
      scrollY:        '50vh',
      scrollCollapse: true,
      paging:false

    } );
  } );
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#data-satpam').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },
      "ajax": "/admumpln/data/satpam-ajax.php",
      "autoWidth": false,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#talenta-grafik').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 2,
      },
      "ajax": "/admumpln/data/talenta-grafik-ajax.php",
      "autoWidth": false,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
<script>
  var table;
  $(document).ready(function() {
    table = $('#pkl-data').DataTable( {
      scrollX:        true,
      scrollCollapse: true,
      fixedColumns:   {
        leftColumns: 1,
      },
      "ajax": "/admumpln/data/pkl-ajax.php",
      "autoWidth": false,
      dom: 'T<"clear">lfrtip',
      tableTools: {
        sSwfPath: "/admumpln/assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
      }
    } );
  } );
  var TableManageTableTools = function() {
    "use strict";
    return {
      init: function() {
        handleDataTableTools()
      }
    }
  }()
</script>
