@include('template/Header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="{{route('logout')}}" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i>Logout
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

       <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MAN 2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth()->user()->role == 2)
          <li class="nav-item">
            <a href="{{route('IndexPanitia')}}" class="nav-link
            @if(Route::current()->getName() == 'DashboardGuru')
            active
            @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        @elseif(Auth()->user()->role == 1)
          <li class="nav-item">
            <a href="{{route('IndexPanitia')}}" class="nav-link
            @if(Route::current()->getName() == 'IndexPanitia')
            active
            @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
        @endif

        {{-- @if(Auth()->user()->role == 1)
          <li class="nav-item">
            <a href="{{route('DataPanitia')}}" class="nav-link
            @if(Route::current()->getName() == 'DataPanitia')
            active
            @endif
            ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Panitia
              </p>
            </a>
          </li>
        @endif --}}

        @if(Auth()->user()->role == 2 || Auth()->user()->role == 1)
        <li class="nav-item
        @if(Route::current()->getName() === 'KriteriaIndex' || Route::current()->getName() == 'MatriksIndex' || Route::current()->getName() == 'Matriks' || Route::current()->getName() === 'SubNilaiIndex')
            menu-open
        @endif
        ">
            <a href="#" class="nav-link
            @if(Route::current()->getName() == 'KriteriaIndex'  || Route::current()->getName() == 'MatriksIndex' || Route::current()->getName() == 'Matriks' || Route::current()->getName() === 'SubNilaiIndex')
                active
            @endif
            ">
            <i class="nav-icon far fa-bookmark"></i>
              <p>
                Data Kriteria
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KriteriaIndex')}}" class="nav-link
                @if(Route::current()->getName() == 'KriteriaIndex')
                active
                @endif
                ">
                <i class="fas fa-filter nav-icon"></i>
                  <p>Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('SubNilaiIndex')}}" class="nav-link
                @if(Route::current()->getName() == 'SubNilaiIndex')
                active
                @endif
                ">
                <i class="fas fa-tags nav-icon"></i>
                  <p>Sub Nilai Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('MatriksIndex')}}" class="nav-link
                @if(Route::current()->getName() == 'MatriksIndex')
                    active
                @endif
                ">
                  <i class="fas fa-paste nav-icon"></i>
                  <p>Perbandingan AHP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Matriks')}}" class="nav-link
                @if(Route::current()->getName() == 'Matriks')
                    active
                @endif
                ">
                    <i class="fas fa-th nav-icon"></i>
                  <p>Penghitungan AHP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('NilaiKriteria')}}" class="nav-link
                @if(Route::current()->getName() == 'NilaiKriteria')
                    active
                @endif
                ">
                    <i class="fas fa-list nav-icon"></i>
                  <p>Nilai Kriteria</p>
                </a>
              </li>
            </ul>
          </li>
        @endif


        <li class="nav-header">Penghitungan Alternatif</li>
          @if(Auth()->user()->role == 1 || Auth()->user()->role == 2)
          <li class="nav-item">
            <a href="{{route('AlternatifIndex')}}" class="nav-link
            @if(Route::current()->getName() == 'AlternatifIndex' || Route::current()->getName() == 'TambahAlternatif')
            active
            @endif
            ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
        @endif
        @if(Auth()->user()->role == 2 || Auth()->user()->role == 1)
        <li class="nav-item
        @if(Route::current()->getName() === 'alternatifSS' || Route::current()->getName() == '' || Route::current()->getName() == '')
            menu-open
        @endif
        ">
            <a href="#" class="nav-link
            @if(Route::current()->getName() == 'alternatifSS'  || Route::current()->getName() == '' || Route::current()->getName() == '')
                active
            @endif
            ">
            <i class="nav-icon fas fa-th"></i>
              <p>
                TOPSIS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('alternatifSS')}}" class="nav-link
                @if(Route::current()->getName() == 'alternatifSS')
                active
                @endif
                ">
                <i class="fas fa-filter nav-icon"></i>
                  <p>Normalisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('MatriksIndex')}}" class="nav-link
                @if(Route::current()->getName() == 'MatriksIndex')
                    active
                @endif
                ">
                  <i class="fas fa-paste nav-icon"></i>
                  <p>Solusi Ideal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Preferensi')}}" class="nav-link
                @if(Route::current()->getName() == 'Preferensi')
                    active
                @endif
                ">
                    <i class="fas fa-th nav-icon"></i>
                  <p>Preferensi</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


      @include('template/Footer')
