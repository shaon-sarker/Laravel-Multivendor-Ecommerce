<!DOCTYPE html>
<html> @include('admin.includes.head') 
<body class="fixed-left">
  @include('sweetalert::alert') 
    <!-- Begin page -->
    <div id="wrapper">
      <!-- Top Bar Start -->
      @include('admin.includes.topheader') 
      <!-- Top Bar End -->
      <!-- ========== Left Sidebar Start ========== -->
      @include('admin.includes.sidebar')
      <!-- Left Sidebar End -->
      <!-- Start right Content here -->
      <div class="content-page">
        <!-- Start content -->
        @yield('content')
       
        <!-- content -->
        @include('admin.includes.footer') 
      </div>
      <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    @include('admin.includes.script') 
  </body>
</html>