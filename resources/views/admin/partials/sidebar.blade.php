<!-- sidebarnya ini -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ URL::asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1.">
      <span class="brand-text font-weight-light">Ajatappareng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->img != null)
            <img src="{{ URL::asset('storage/Profile/'. Auth::user()->img)}}" class="img-circle elevation-2">
          @else
            <img src="{{ URL::asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Dashboard 
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Informasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HKM</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('series-variety.index') }}" class="nav-link {{ (request()->routeIs('series-variety.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Series Varieties</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HPHD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HTR</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perlindungan dan Pengamangan Hutan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lainnya</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="../charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products Suitabilities</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('member.index')}}" class="nav-link {{ (request()->routeIs('member.index', 'member.create', 'member.edit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Anggota 
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Response 
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('berita.index')}}" class="nav-link {{ (request()->routeIs('berita.index', 'berita.create', 'berita.edit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Berita 
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link {{ (request()->routeIs('admin.index', 'admin.create', 'admin.edit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin 
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> --}}

          
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- batas sidebarnya -->