<!DOCTYPE html>
<html> @include('seller.includes.head') <body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
      <!-- Top Bar Start -->
      @include('seller.includes.topheader') 
      <!-- Top Bar End -->
      <!-- ========== Left Sidebar Start ========== -->
      @include('seller.includes.sidebar')
      <!-- Left Sidebar End -->
      <!-- Start right Content here -->
      <div class="content-page">
        <!-- Start content -->
        @yield('content') 
        <!-- content -->
        @include('seller.includes.footer') 
      </div>
      <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    @include('seller.includes.script') 
  </body>
</html>