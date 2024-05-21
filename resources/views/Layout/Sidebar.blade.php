{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="{{ asset('adminLTE') }}/dist/img/logsmapa.png" alt="AdminLTE Logo" class="brand-image 
         style="opacity: .8">
    <span class="brand-text font-weight-light"> <strong>EKSTRASMAPA</strong> </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    {{-- <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <a href="{{ route('user.profile', Auth::user()->id) }}" >
      <img src="{{ asset('fotoprofil/'. Auth()->user()->foto_profil) }}" class="rounded-circle shadow-lg" style="width: 35px; height: 35px; object-fit: cover;" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('user.profile', Auth::user()->id) }}" >
        <span class="badge badge-success">{{ Auth()->user()->role }}</span>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    {{-- <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-header">MENU UTAMA</li>
        <li class="nav-item"> --}}
          {{-- <a href="{{ url('/home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p> --}}
              {{-- Dashboard --}}
            {{-- </p>
          </a>
          
        </li> --}} 
        {{-- <li class="nav-item has-treeview"> 
          @if (Auth()->user()->role == 'Administrator')       
          <a href="#" class="nav-link {{ (request()->is('dataekskul*', 'datapembina*')) ? 'active' : '' }}">
            <i class="fas fa-server"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
        @endif
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="{{ route('dataekskul.index')}}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Ekskul</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ route('datapembina.index')}}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Pembina</p>
              </a>
            </li>
          </ul>
        </li> --}}
        {{-- @if (Auth::user()->role == 'Administrator' || Auth::user()->role == 'Pembina')
    <!-- Konten yang dapat diakses oleh Administrator dan Pembina -->


        <li class="nav-item">
          <a href="{{ route('dataevent.index')}}" class="nav-link {{ (request()->is('dataevent*')) ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <p>Event</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('dataekskul.index') }}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
            <i class="fas fa-baseball-ball"></i>
            <p>Data Ekstrakulikuler </p>
          </a>

        </li>
        
        <li class="nav-item">
          <a href="{{ route('datapembina.index') }}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <p>Data Pembina</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('datasiswa.index') }}" class="nav-link {{ (request()->is('datasiswa*')) ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <p>Data Siswa</p>
          </a>
        </li>
  @endif      
        {{-- <li class="nav-item">
          <a href="{{ route('laporan.index') }}" class="nav-link {{ (request()->is('laporan*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>Laporan Kegiatan </p>
          </a>
        </li> --}}
        {{-- @if (Auth()->user()->role == 'Siswa') --}}
        {{-- <li class="nav-item">
          <a href="{{ route('dataprestasi.index') }}" class="nav-link {{ (request()->is('dataprestasi*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>Riwayat Event</p>
          </a>
        </li> --}}


{{-- Role Siswa --}}
{{-- 
        @if (Auth()->user()->role == 'Siswa')
        <li class="nav-item">
          <a href="{{ route('daftarekskul.index') }}" class="nav-link {{ (request()->is('daftarekskul*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>Ekstrakulikuler</p>
          </a>
        </li>
@endif --}}
{{--         
@if (Auth()->user()->role == 'Siswa')
        <li class="nav-item">
          <a href="{{ route('myekskul.index') }}" class="nav-link {{ (request()->is('myekskul*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>My Ekstrakulikuler</p>
          </a>
        </li>

        {{-- role admin melihat user --}}
{{-- @endif
          @if (Auth()->user()->role == 'Administrator')
          <li class="nav-item">
            <a href="/manageuser" class="nav-link {{ (request()->is('profil*')) ? 'active' : '' }}">
              <i class="fas fa-users-cog"></i>
              <p>Manage User</p>
            </a>
            </li>  --}}

          {{-- @elseif (Auth()->user()->role == 'Administrator')
          <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>Setting Aplikasi</p>
          </a>
        </li>
        @endif --}}
        {{-- <li class="nav-item">
          <a href="{{ route('user.profile', Auth::user()->id) }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
            <i class="fas fa-user-friends"></i>
            <p>Profil Saya</p>
          </a> --}}
      {{-- <br>
      <br>
      <br>  --}}
        
{{--   
      <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="nav-link">
          <button type="button" class="btn btn-danger btn-sm" id="logout-form"><i class="fas fa-sign-out-alt"></i> Logout</button>
          {{ csrf_field() }}
          </form>
        </li>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside> --}}

{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/home" class="brand-link">
    <img src="{{ asset('adminLTE/dist/img/logsmapa.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><strong>EKSTRASMAPA</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('fotoprofil/' . Auth()->user()->foto_profil) }}" class="rounded-circle shadow-lg" style="width: 35px; height: 35px; object-fit: cover;" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('user.profile', Auth::user()->id) }}">
          <span class="badge badge-success">{{ Auth()->user()->role }}</span>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Data Master for Administrator -->
        @if (Auth()->user()->role == 'Administrator')
        <li class="nav-item has-treeview {{ (request()->is('dataekskul*') || request()->is('datapembina*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (request()->is('dataekskul*') || request()->is('datapembina*')) ? 'active' : '' }}">
            <i class="fas fa-server"></i>
            <p>
              Data Master
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('dataekskul.index') }}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Ekskul</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('datapembina.index') }}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
                <i class="fas fa-angle-right"></i>
                <p>Data Pembina</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

        <!-- Event -->
        <li class="nav-item">
          <a href="{{ route('dataevent.index') }}" class="nav-link {{ (request()->is('dataevent*')) ? 'active' : '' }}">
            <i class="fas fa-calendar-alt"></i>
            <p>Event</p>
          </a>
        </li>

        <!-- Ekstrakulikuler -->
        <li class="nav-item">
          <a href="{{ route('dataekskul.index') }}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
            <i class="fas fa-baseball-ball"></i>
            <p>Ekstrakulikuler</p>
          </a>
        </li>

        <!-- Data Pembina -->
        <li class="nav-item">
          <a href="{{ route('datapembina.index') }}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <p>Data Pembina</p>
          </a>
        </li>

        <!-- Data Siswa -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user"></i>
            <p>Data Siswa</p>
          </a>
        </li>

        <!-- Riwayat Event -->
        <li class="nav-item">
          <a href="{{ route('dataprestasi.index') }}" class="nav-link {{ (request()->is('dataprestasi*')) ? 'active' : '' }}">
            <i class="fas fa-trophy"></i>
            <p>Riwayat Event</p>
          </a>
        </li>

        <!-- Manage User for Administrator -->
        @if (Auth()->user()->role == 'Administrator')
        <li class="nav-item">
          <a href="/manageuser" class="nav-link {{ (request()->is('manageuser*')) ? 'active' : '' }}">
            <i class="fas fa-users-cog"></i>
            <p>Manage User</p>
          </a>
        </li>

        <!-- Setting Aplikasi for Administrator -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-cogs"></i>
            <p>Setting Aplikasi</p>
          </a>
        </li>
        @endif

        <!-- Logout -->
        <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

            --}}



            <aside class="main-sidebar sidebar-light-primary elevation-4">
              <!-- Brand Logo -->
              <a href="/home" class="brand-link">
                <img src="{{ asset('adminLTE') }}/dist/img/logsmapa.png" alt="AdminLTE Logo" class="brand-image"
                     style="opacity: .8">
                <span class="brand-text font-weight-light"><strong>EKSTRASMAPA</strong></span>
              </a>
            
              <!-- Sidebar -->
              <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                    <a href="{{ route('user.profile', Auth::user()->id) }}">
                      <img src="{{ asset('fotoprofil/'. Auth()->user()->foto_profil) }}" class="rounded-circle shadow-lg"
                           style="width: 35px; height: 35px; object-fit: cover;" alt="User Image">
                    </a>
                  </div>
                  <div class="info">
                    <a href="{{ route('user.profile', Auth::user()->id) }}">
                      <span class="badge badge-success">{{ Auth()->user()->role }}</span>
                    </a>
                  </div>
                </div> --}}
            
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Dashboard -->
                    <li class="nav-item">
                      <a href="{{ url('/home') }}" class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                      </a>
                    </li>
            <br>
                    <!-- Event -->
                    @if (Auth::user()->role == 'Administrator' || Auth::user()->role == 'Pembina')
                    <li class="nav-item">
                      <a href="{{ route('dataevent.index') }}" class="nav-link {{ (request()->is('dataevent*')) ? 'active' : '' }}">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Event</p>
                      </a>
                    </li>
                    @endif
                    <!-- Ekstrakulikuler -->
                    @if (Auth::user()->role == 'Administrator' || Auth::user()->role == 'Pembina') 
                    <li class="nav-item">
                      <a href="{{ route('dataekskul.index') }}" class="nav-link {{ (request()->is('dataekskul*')) ? 'active' : '' }}">
                        <i class="fas fa-baseball-ball"></i>
                        <p>Ekstrakulikuler</p>
                      </a>
                    </li>
                    @endif
                    <!-- Data Pembina -->
                    @if (Auth::user()->role == 'Administrator')
                    <li class="nav-item">
                      <a href="{{ route('datapembina.index') }}" class="nav-link {{ (request()->is('datapembina*')) ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <p>Data Pembina</p>
                      </a>
                    </li>
                    @endif
                    
                    <!-- Data Siswa -->
                    @if (Auth::user()->role == 'Administrator' || Auth::user()->role == 'Pembina') 
                    <li class="nav-item">
                      <a href="{{ route('datasiswa.index') }}" class="nav-link {{ (request()->is('datasiswa*')) ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <p>Data Siswa</p>
                      </a>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Pembina') 
                    <li class="nav-item">
                      <a href="{{ route('absensi') }}" class="nav-link {{ (request()->is('absensi*')) ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <p>Absensi</p>
                      </a>
                    </li>
                    @endif
                    <!-- Riwayat Event -->

                    <li class="nav-item">
                      <a href="{{ route('dataprestasi.index') }}" class="nav-link {{ (request()->is('dataprestasi*')) ? 'active' : '' }}">
                        <i class="fas fa-trophy"></i>
                        <p>Event Prestasi</p>
                      </a>
                    </li>
            
                    <!-- Ekstrakulikuler for Siswa -->
                    @if (Auth::user()->role == 'Siswa')
                    <li class="nav-item">
                      <a href="{{ route('daftarekskul.index') }}" class="nav-link {{ (request()->is('daftarekskul*')) ? 'active' : '' }}">
                        <i class="fas fa-plus"></i>
                        <p>Ekstrakulikuler</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('myekskul.index') }}" class="nav-link {{ (request()->is('myekskul*')) ? 'active' : '' }}">
                        <i class="fas fa-baseball-ball"></i>
                        <p>My Ekstrakulikuler</p>
                      </a>
                    </li>
                    @endif
            
                    <!-- Manage User for Administrator -->
                    @if (Auth()->user()->role == 'Administrator')
                    <li class="nav-item">
                      <a href="/manageuser" class="nav-link {{ (request()->is('manageuser*')) ? 'active' : '' }}">
                        <i class="fas fa-users-cog"></i>
                        <p>Manage User</p>
                      </a>
                    </li>
                    <!-- Setting Aplikasi for Administrator -->
                    {{-- <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p>Setting Aplikasi</p>
                      </a>
                    </li> --}}
                    @endif
            
                    <!-- Logout -->
                    <li class="nav-item">
                      <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <button type="button" class="btn btn-danger btn-sm">
                              <i class="fas fa-sign-out-alt"></i> Logout
                          </button>
                      </a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
              <!-- /.sidebar -->
            </aside>
            