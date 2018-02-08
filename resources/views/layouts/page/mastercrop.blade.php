<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <!-- <title>Pages - Admin Dashboard UI Kit - Blank Page</title> -->
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="{{ asset('pages/ico/60.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/ico/76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/ico/120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/ico/152.png') }}">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/qtip2/2.2.1/jquery.qtip.min.css">
  </head>
  <body class="fixed-header horizontal-menu horizontal-app-menu ">
    <!-- START PAGE-CONTAINER -->
 
    <div class="page-container ">
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
          <div class="">           
            <!--@include('layouts.page.menu')-->
            <div class="inner-content full-height  p-r-20 p-l-20">       
              <div class="">
                @yield('content')
              </div>
            </div>
          <!-- END PAGE CONTENT -->
          </div>
        </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    @include('layouts.page.js')
    @yield('js')
    <!-- END PAGE LEVEL JS -->
  </body>
</html>