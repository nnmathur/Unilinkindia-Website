<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Forgot Password</title>
    <link rel="apple-touch-icon" href="{{ asset('public/assets/admin/images/ico/optum.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/admin/images/ico/optum.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/css/app.min.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/css/core/colors/palette-gradient.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/admin/style.css') }}">
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">                    
                    <div class="card-title text-center">
                        <img src="{{ asset('public/assets/admin/images/logo/optum1.png') }}" alt="branding logo" style="width: 150px;">
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                        <h2>Congratulations !</h2> 
                        <h2 class="mt-2 mb-3">Your Password has been Changed Suceesfully !</h2>
                        <a href="{{ route('auth.dashboard') }}"> 
                            <button name="button" type="submit" class="btn btn-outline-info btn-block" tabindex="4">Go to Dashboard</button> 
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>

    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/jszip.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendors/js/tables/buttons.colVis.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{{ asset('public/assets/admin/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/core/app.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/js/scripts/customizer.min.js') }}"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('public/assets/admin/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.min.js') }}"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>