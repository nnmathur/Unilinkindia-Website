<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">  
          <li class=" nav-item"><a href="{{ route('auth.users.profile') }}"><span class="avatar avatar-online"><img src="{{ asset('public/assets/admin/images/ico/optum.png') }}" alt="avatar"><i style="position: absolute !important; top: 20px;"></i></span><span class="menu-title" data-i18n="nav.dash.main"></span><span class="user-name" style="margin-left: 10px;">{{Auth::user()->name}}</span></a>
          </li> 
          <li class=" nav-item"><a href="{{ route('auth.dashboard') }}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
          </li>        
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Users</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Users</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{ route('auth.users.create') }}" data-i18n="nav.page_layouts.1_column">Add User</a></li>
              <li><a class="menu-item" href="{{ route('auth.users.index') }}" data-i18n="nav.page_layouts.1_column">Show Users</a></li> 
              <li><a class="menu-item" href="{{ route('auth.users.removed') }}" data-i18n="nav.page_layouts.1_column">Removed Users</a></li>
            </ul>
          </li>
        </ul>
    </div>
</div>