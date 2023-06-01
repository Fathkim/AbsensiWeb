@extends('layouts.main-view')

@section('title')
Profile
@endsection
@section('sidebar')

<!-- Sidebar - Brand -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
        <img src="{{ asset('images/icon-web.png') }}" class="image-thumbnail" style="width:2rem;" alt="Gambar">
        <div class="sidebar-brand-text my-2 mx-2">Muhammadiyah<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Auth::user()->level == 'admin')
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usercollaps" aria-expanded="flase"
            aria-controls="usercollaps">
            <i class="fas fa-fw fa-server"></i>
            <span>Pengguna</span>
        </a>
        <div id="usercollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('kaprodi')}}">Kaprodi</a>
                <a class="collapse-item" href="{{url('guru')}}">Guru</a>
                <a class="collapse-item" href="{{url('siswa')}}">Siswa</a>
            </div>
        </div>
    </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item active" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    @endif

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('monthly-report')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Bulanan</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('profile')}}">
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
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

@endsection

@section('content')
@if (Auth::user()->level == 'admin')

@else
<!-- Earnings (Annual) Card Example -->


        <div class="row">
            <div class="col-xl-4 col-md-4 mb-4 text-center ">
                <img src="{{ asset('/images/icon-web.png') }}" alt="#" class="rounded img-fluid img-thumbnail mb-3"
                    style="max-width: 100%; width:250px;">
            </div>
            <div class="col-xl-8 col-md-8 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold mb-3 text-success text-uppercase mb-1">
                                    Your Identiti Card</div>
                                <form action="{{url('/profile/send')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" readonly id="nama" value="{{Auth::user()->name}}">
                                        <input type="text" hidden name="id_user" value="{{Auth::user()->id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" class="form-control" name="" id="kelas" value="XII IPA">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="nisn" value="Dayeuh">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No Hp</label>
                                        <input type="number" class="form-control" name="no_hp" id="nisn" value="1234567890">
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NIS</label>
                                        <input type="text" class="form-control" name="nis" id="nisn" value="1234567890">
                                    </div>
                                    <div class="form-group">
                                        <label for="nisn">NISN</label>
                                        <input type="text" class="form-control" name="nisn" id="nisn" value="1234567890">
                                    </div>
                                    <div class="d-flex mt-4">
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                        <button type="button" class="btn btn-warning ml-2">Setting</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endif

@endsection
