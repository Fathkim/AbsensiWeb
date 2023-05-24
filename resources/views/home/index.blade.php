@extends('layouts.main-view')


@if (Auth::user()->level == 'siswa')
    @include('home.siswa')
@else
    @section('title')
        Dashboard
    @endsection

    @section('sidebar')
        <!-- Sidebar - Brand -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
                <img src="{{ asset('images/icon-web.png') }}" class="image-thumbnail" style="width:2rem;" alt="Gambar">
                <div class="sidebar-brand-text my-2 mx-2">Muhammadiyah<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            @if (Auth::user()->level == 'admin')
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usercollaps"
                        aria-expanded="flase" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-server"></i>
                        <span>Pengguna</span>
                    </a>
                    <div id="usercollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ url('/kaprodi') }}">Kaprodi</a>
                            <a class="collapse-item" href="{{ url('guru') }}">Guru</a>
                            <a class="collapse-item" href="{{ url('siswa') }}">Siswa</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('create-user') }}">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Buat User</span></a>
                </li>
            @endif

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('monthly-report') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Laporan Bulanan</span></a>
            </li>

            @if (Auth::user()->level != 'admin')
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/profile">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Profile</span></a>
                </li>
            @endif


            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out"></i>
                    <span>logout</span></a>
            </li>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    @endsection

    @section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 d-none d-sm-inline-block">Dashboard</h1>
            <a href="{{ url('/monthly-report') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Laporan bulanan</a>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('create-user')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Buat User</span></a>
    </li>
    @endif


    @if(Auth::user()->level == 'guru' || Auth::user()->level == 'kaprodi')
    <li class="nav-item">
        <a class="nav-link" href="{{url('create-user')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Buat Akademik</span></a>
    </li>
    @endif

    @if(Auth::user()->level != 'siswa')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('monthly-report')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Bulanan</span></a>
    </li>
    @endif

    @if(Auth::user()->level == 'siswa')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('izin')}}">
            <i class="fas fa-fw fa-info"></i>
            <span>Izin (udzur)</span></a>
    </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="/profile">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out"></i>
            <span>logout</span></a>
    </li>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
        <!-- Content Row -->

         <!-- Modal -->
         <div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel"
         aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="inputModalLabel">Modal title</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form action="">
                        <input type="text" name="">
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="button" class="btn btn-primary">Save changes</button>
                 </div>
             </div>
         </div>
     </div>
    @endsection
@endif
