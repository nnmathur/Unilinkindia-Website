<!DOCTYPE html>
<html class="loading attachment" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front/images/logo/logo5.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('front/images/logo/logo5.png') }}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/app.min.css') }}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/core/colors/palette-gradient.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/calendars/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/plugins/calendars/fullcalendar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/forms/selects/select2.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/style.css') }}">
    <!-- END Custom CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">  
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/vendors/css/editors/summernote.css') }}">
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)attachment(\s|$)/,"$1js$2")})(document,window,0);</script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <style type="text/css">
      .hide{display:none;}

      .upload-poster {
          display: inline-block;
          padding: 4px 12px;
          margin-bottom: 0;
          font-size: 14px;
          line-height: 20px;
          color: #000;
          text-align: center;
          vertical-align: middle;
          cursor: pointer;
          border: 1px solid #bbbbbb;
          border-bottom-color: #a2a2a2;
          -webkit-border-radius: 4px;
          -moz-border-radius: 4px;
          border-radius: 4px;
      }

      .organisation-logo{
          width: 200px;
          height: 200px;
          border: 1px solid #bbbbbb;
          margin-top: 20px;
      }

      .js .inputfile {
          width: 0.1px;
          height: 0.1px;
          opacity: 0;
          overflow: hidden;
          position: absolute;
          z-index: -1;
      }

      .inputfile + label {
          display: inline-block;
          padding: 4px 12px;
          margin-bottom: 0;
          font-size: 14px;
          line-height: 20px;
          color: #000;
          text-align: center;
          vertical-align: middle;
          cursor: pointer;
          border: 1px solid #bbbbbb;
          border-bottom-color: #a2a2a2;
          -webkit-border-radius: 4px;
          -moz-border-radius: 4px;
          border-radius: 4px;
      }
    </style>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand" href="{{ route('auth.dashboard') }}"><img class="brand-logo" alt="robust admin logo" src="{{ asset('assets/admin/images/logo/logo-light-sm.png') }}">
                <h3 class="brand-text">Admin Panel</h3></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>              
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-link" href="{{ route('change_passsword') }}" style="padding: 1.4rem 1rem; font-size: 20px;"><i class="fa fa-cog"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">   
              <li class="nav-item"><a class="nav-link" href="{{ route('admin.logout') }}" style="padding: 1.4rem 1rem;"><i class="ft-power"></i>Logout</a>
              </li>
            </ul>
            {{-- <ul class="nav navbar-nav float-right">   
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="{{ asset('assets/admin/images/portrait/small/avatar-s-1.png') }}" alt="avatar"><i></i></span><span class="user-name">{{Auth::user()->name}}</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('auth.users.profile') }}"><i class="ft-user"></i> My Profile</a>
                    <a class="dropdown-item" href="{{ route('change_passsword') }}"><i class="ft-check-square"></i> Change Password</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ft-power"></i> Logout</a>
                </div>
              </li>
            </ul> --}}
          </div>
        </div>
      </div>
    </nav>