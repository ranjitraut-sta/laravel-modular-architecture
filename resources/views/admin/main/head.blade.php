 <!--header-->
 <header class="top-header">
     <nav class="navbar navbar-expand">
         <div class="left-topbar d-flex align-items-center">
             <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
             </a>
         </div>
         <a href="{{ url('/') }}" target="__blank">View Site</a>
         <div class="right-topbar ms-auto">
             <ul class="navbar-nav">
                 <li class="nav-item search-btn-mobile">
                     <a class="nav-link position-relative" href="javascript:;"> <i
                             class="bx bx-search vertical-align-middle"></i>
                     </a>
                 </li>
                 <li class="nav-item dropdown dropdown-user-profile">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                         data-bs-toggle="dropdown">
                         <div class="d-flex user-box align-items-center">
                             <div class="user-info">
                                 <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                 <p class="designation mb-0" style="font-size:10px;">
                                     {{ Auth::user()->name }}
                                 </p>
                             </div>
                             <img src="{{ asset('admin/assets/default.png') }}" class="user-img"
                                 alt="user avatar">
                         </div>
                     </a>


                     <div class="dropdown-menu dropdown-menu-end">
                         <a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                         <a class="dropdown-item" href=""><i class="bx bx-cog"></i><span>Settings</span></a>
                         <div class="dropdown-divider mb-0"></div>
                         <a class="dropdown-item" href="javascript:;" id="buttonId"
                             onclick="document.getElementById('logout-form').submit();">
                             <i class="bx bx-power-off"></i><span>Logout</span>
                         </a>
                     </div>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </li>

             </ul>
         </div>
     </nav>
 </header>
