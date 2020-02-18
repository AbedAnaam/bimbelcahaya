@if (Auth::check())
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
        {{-- Auth::user()->roles == 'admin' --}}
        <!-- Sidebar - Brand -->
        {{-- <br> --}}
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('belakang')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hallo {{Auth::user()->username}} </div>
        
        
            {{-- Hallo {{Auth::user()->username}}</div> --}}
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        <a class="nav-link" href={{route ('belakang')}}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        {{-- <div class="sidebar-heading">
            Profile & Resep
        </div> --}}

        <li class="nav-item">
            <a class="nav-link" href="{{route('user.index')}}">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
        </li>

        <!-- Nav Item - Profile Usaha -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('jenjang.index')}}">
                <i class="fas fa-fw fa-signal"></i>
                <span>Jenjang</span>
            </a>
        </li>
    
        <!-- Nav Item - Tables -->
        <li class="nav-item">
        <a class="nav-link" href="{{route('kelas.index')}}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Kelas</span></a>
        </li>

        <!-- Heading -->
        {{-- <div class="sidebar-heading">
        Produk & Testimonial
        </div> --}}

        <!-- Nav Item - Charts -->
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Mapel</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Soal</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
@endif