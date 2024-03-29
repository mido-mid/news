<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>لوحة تحكم | منصة مصر</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">

    <!-- DataTables -->
    <link href="{{  asset('assets') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{  asset('assets') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{  asset('assets') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <!-- C3 Chart css -->
    <link href="{{  asset('assets') }}/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{  asset('assets') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{  asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{  asset('assets') }}/css/app-rtl.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div class="accountbg" style="background: url('../../assets/images/bg.jpg');background-size: cover;background-position: center;"></div>

    @yield('content')

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>

<script src="assets/js/app.js"></script>


<script src="{{ asset('assets') }}/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="{{ asset('assets') }}/js/pages/form-editor.init.js"></script>


<!-- Peity chart-->
<script src="{{ asset('assets') }}/libs/peity/jquery.peity.min.js"></script>

<!--C3 Chart-->
<script src="{{ asset('assets') }}/libs/d3/d3.min.js"></script>
<script src="{{ asset('assets') }}/libs/c3/c3.min.js"></script>

<script src="{{ asset('assets') }}/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="{{ asset('assets') }}/libs/select2/js/select2.min.js"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/libs/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
<script>
    $(document).ready(function() {
        $('.tox-edit-area').attr('disabled','disabled');
    });
</script>

</body>
</html>
