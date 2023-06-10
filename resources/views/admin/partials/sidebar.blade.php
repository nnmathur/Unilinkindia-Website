  @php

  $userId= Auth::user()->user_type;

@endphp

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">  
          <li class=" nav-item"><a href="{{ route('auth.users.profile') }}"><span class="avatar avatar-online"><img src="{{ asset('storage/app/public/users/'.Auth::user()->image) }}" alt="avatar"><i style="position: absolute !important; top: 20px;"></i></span><span class="menu-title" data-i18n="nav.dash.main"></span><span class="user-name" style="margin-left: 10px;">{{Auth::user()->name}}</span></a>
          </li> 
          <li class=" nav-item"><a href="{{ route('auth.dashboard') }}"><i class="icon-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>
          </li>        
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Users</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-user"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Users</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.users.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.users.create') }}" data-i18n="nav.page_layouts.1_column">Add User</a></li>
              <li class="{{ Request::routeIs('auth.users.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.users.index') }}" data-i18n="nav.page_layouts.1_column">Show Users</a></li> 
              <li class="{{ Request::routeIs('auth.users.removed') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.users.removed') }}" data-i18n="nav.page_layouts.1_column">Removed Users</a></li>
            </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Solutions</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          
          <li class=" nav-item"><a href="{{ route('auth.banner.index') }}"><i class="fa fa-file-image-o"></i><span class="menu-title" data-i18n="nav.dash.main">Solutions</span></a>
          </li>  
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Services</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Services</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.services.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.services.create') }}" data-i18n="nav.page_layouts.1_column">Add Services</a></li>
              <li class="{{ Request::routeIs('auth.services.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.services.index') }}" data-i18n="nav.page_layouts.1_column">Show Services</a></li>
            </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Associates</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Associates</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.exposures.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.exposures.create') }}" data-i18n="nav.page_layouts.1_column">Add Associates</a></li>
              <li class="{{ Request::routeIs('auth.exposures.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.exposures.index') }}" data-i18n="nav.page_layouts.1_column">Show Associates</a></li>
            </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Clients</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Clients</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.clients.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.clients.create') }}" data-i18n="nav.page_layouts.1_column">Add Clients</a></li>
              <li class="{{ Request::routeIs('auth.clients.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.clients.index') }}" data-i18n="nav.page_layouts.1_column">Show Clients</a></li>
            </ul>
          </li>

          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Portfolio</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Portfolio</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.policies.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.policies.create') }}" data-i18n="nav.page_layouts.1_column">Add Portfolio</a></li>
              <li class="{{ Request::routeIs('auth.policies.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.policies.index') }}" data-i18n="nav.page_layouts.1_column">Show Portfolio</a></li>
            </ul>
          </li>

          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Blogs</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Blogs</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.blog.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blog.create') }}" data-i18n="nav.page_layouts.1_column">Add Blog</a></li>
              <li class="{{ Request::routeIs('auth.blog.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blog.index') }}" data-i18n="nav.page_layouts.1_column">Show Blogs</a></li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Blog Categories</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.blogcategory.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blogcategory.create') }}" data-i18n="nav.page_layouts.1_column">Add Blog Category</a></li>
              <li class="{{ Request::routeIs('auth.blogcategory.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blogcategory.index') }}" data-i18n="nav.page_layouts.1_column">Show Blog Categories</a></li>
            </ul>
          </li>

          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Blog Tags</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.blogtag.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blogtag.create') }}" data-i18n="nav.page_layouts.1_column">Add Blog Tag</a></li>
              <li class="{{ Request::routeIs('auth.blogtag.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.blogtag.index') }}" data-i18n="nav.page_layouts.1_column">Show Blog Tags</a></li>
            </ul>
          </li>

          <li class=" navigation-header"><span data-i18n="nav.category.layouts">FAQ's</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="icon-layers"></i><span class="menu-title" data-i18n="nav.page_layouts.main">FAQ's</span></a>
            <ul class="menu-content">
              <li class="{{ Request::routeIs('auth.faq.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.faq.create') }}" data-i18n="nav.page_layouts.1_column">Add FAQ's</a></li>
              <li class="{{ Request::routeIs('auth.faq.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.faq.index') }}" data-i18n="nav.page_layouts.1_column">Show FAQ's</a></li>
            </ul>
          </li>

          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Knowledge Base</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Sections</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.insightsection.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightsection.create') }}" data-i18n="nav.page_layouts.1_column">Add Sections</a></li>
                  <li class="{{ Request::routeIs('auth.insightsection.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightsection.index') }}" data-i18n="nav.page_layouts.1_column">List Sections</a></li> 
              </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list-alt"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Sub-Sections</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.insightsubsection.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightsubsection.create') }}" data-i18n="nav.page_layouts.1_column">Add Sub-Sections</a></li>
                  <li class="{{ Request::routeIs('auth.insightsubsection.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightsubsection.index') }}" data-i18n="nav.page_layouts.1_column">List Sub-Sections</a></li> 
              </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-file-word-o"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Knowledge Base</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.insightknowledge.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightknowledge.create') }}" data-i18n="nav.page_layouts.1_column">Add Knowledge Base</a></li>
                  <li class="{{ Request::routeIs('auth.insightknowledge.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.insightknowledge.index') }}" data-i18n="nav.page_layouts.1_column">List Knowledge Base</a></li> 
              </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Our Team</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Teams</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.team.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.team.create') }}" data-i18n="nav.page_layouts.1_column">Add Member</a></li>
                  <li class="{{ Request::routeIs('auth.team.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.team.index') }}" data-i18n="nav.page_layouts.1_column">List Members</a></li>
              </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">Testimonials</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Testimonials</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.testimonial.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.testimonial.create') }}" data-i18n="nav.page_layouts.1_column">Add Testimonial</a></li>
                  <li class="{{ Request::routeIs('auth.testimonial.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.testimonial.index') }}" data-i18n="nav.page_layouts.1_column">List Testimonials</a></li>
              </ul>
          </li>
          
          <li class=" navigation-header"><span data-i18n="nav.category.layouts">CMS</span><i class="ft-more-horizontal ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Layouts"></i>
          </li>
          <li class=" nav-item"><a href="#"><i class="fa fa-list"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Pages</span></a>
              <ul class="menu-content">
                  <li class="{{ Request::routeIs('auth.home.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.home.edit') }}" data-i18n="nav.page_layouts.1_column">Home Page</a></li>
                  <li class="{{ Request::routeIs('auth.about.edit') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.about.edit') }}" data-i18n="nav.page_layouts.1_column">About Page</a></li>
                  <!--<li class="{{ Request::routeIs('auth.content.create') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.content.create') }}" data-i18n="nav.page_layouts.1_column">Add Pages</a></li>-->
                  <li class="{{ Request::routeIs('auth.content.index') ? 'active' : '' }}"><a class="menu-item" href="{{ route('auth.content.index') }}" data-i18n="nav.page_layouts.1_column">Other Pages</a></li>
              </ul>
          </li>
        </ul>
    </div>
</div>