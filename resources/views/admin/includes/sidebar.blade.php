<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
      {{-- <div class="user-details">
        <div class="text-center">
          <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt="" class="img-circle">
        </div>
        <div class="user-info">
          <div class="dropdown"> @if(Auth::guard('admin')->check()) <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::guard('admin')->user()->name }}</a> @elseif (Auth::guard('seller')->check()) <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::guard('seller')->user()->name }}</a> @else @endif 
          </div>
          <p class="text-muted m-0">
            <i class="fa fa-dot-circle-o text-success"></i> Online
          </p>
        </div>
      </div> --}}
      <!--- Divider -->
      <div id="sidebar-menu">
        <ul>
          <li>
            <a href="{{ route('admin.dashboard') }}" class="waves-effect">
              <i class="ti-home"></i>
              <span> Dashboard </span>
            </a>
          </li>
          <li>
            <a href="typography.html" class="waves-effect">
              <i class="ti-ruler-pencil"></i>
              <span> Typography <span class="badge badge-primary pull-right"></span>
              </span>
            </a>
          </li>
          <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
              <i class="ti-agenda"></i>
              <span>Category & Brands</span>
              <span class="pull-right">
                <i class="mdi mdi-plus"></i>
              </span>
            </a>
            <ul class="list-unstyled">
              <li>
                <a href="{{ route('category.index') }}">Category</a>
              </li>
              <li>
                <a href="{{ route('brand.index') }}">Brands</a>
              </li>
              <li>
                <a href="{{ route('subcategory.index') }}">Sub-Category</a>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
  </div>
  <!-- Left Sidebar End -->