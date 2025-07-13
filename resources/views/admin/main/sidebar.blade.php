  <!--sidebar-wrapper-->
  <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
          <div class="">
              <a href="{{ route('adminLayout') }}">
                  <img src="{{ asset('admin/assets/tbslogo.png') }}" class="logo-icon-2" alt="" />
              </a>
          </div>
          <div>
              <a href="{{ route('adminLayout') }}">
                  <h4 class="logo-text">Architecture</h4>
              </a>
          </div>
          {{-- toggle button --}}
          <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
          </a>
      </div>
      <!--navigation-->

      {{-- implement sidebar --}}
      @php
          $menuItems = [
              [
                  'title' => 'User Management',
                  'icon' => 'bx bx-user',
                  'iconColor' => 'icon-color-7',
                  'submenu' => [
                      [
                          'title' => 'Role',
                          'route' => 'role.index',
                          'permission' => ['controller' => 'RoleController', 'method' => 'index'],
                      ],
                      [
                          'title' => 'Permission',
                          'route' => 'permission.index',
                          'permission' => ['controller' => 'PermissionController', 'method' => 'index'],
                      ],
                      [
                          'title' => 'Users',
                          'route' => 'user.index',
                          'permission' => ['controller' => 'UserController', 'method' => 'index'],
                      ],
                  ],
              ],
          ];
      @endphp

      <x-form.sidebar-menu :items="$menuItems" />

      <!--end navigation-->
  </div>
  <!--end sidebar-wrapper-->
