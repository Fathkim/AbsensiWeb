@extends('layouts.main-view')

@section('title')
Create User
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

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    @if (Auth::user()->level == 'admin')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usercollaps" aria-expanded="flase"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-server"></i>
            <span>Pengguna</span>
        </a>
        <div id="usercollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('/kaprodi')}}">Kaprodi</a>
                <a class="collapse-item" href="{{url('guru')}}">Guru</a>
                <a class="collapse-item" href="{{url('siswa')}}">Siswa</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('create-user')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Buat User</span></a>
    </li>
    @endif

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('monthly-report')}}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Bulanan</span></a>
    </li>

    @if (Auth::user()->level != 'admin')
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
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
    <h1 class="h3 mb-0 text-gray-800 d-sm-inline-block d-none">Buat User</h1>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif
<div class="card shadow py-3 px-4">
    <form action="{{ url('data-create')}}" method="post" id="myForm">
        @csrf
        <div class="row">
            <div class="col-md-12 input-group">
                <span class="input-group-text col-md-2 form-control" id="basic-addon1">Nama Lengkap</span>
                <input type="text" class="form-control" require name="name" id="name" placeholder="Username"
                    aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-md-12 input-group my-3">
                <span class="input-group-text col-md-2 form-control" id="basic-addon1">Alamat E-mail</span>
                <input type="email" class="form-control" require name="email" id="email" placeholder="mail"
                    aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-md-6 input-group mb-3">
                <label class="form-control col-md-2 input-group-text" for="inputGroupSelect01">Lavel</label>
                <select name="level" require class="form-control form-select" id="level">
                    <option>Choose...</option>
                    <option value="kaprodi">Kaprodi</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text col-md-2 form-control" id="basic-addon1">password</span>
                    <input type="password" class="form-control" require name="password" placeholder="password"
                        id="password" aria-describedby="basic-addon1">
                </div>
                @error('password')
                <p class="text-danger">Password minimal 5</p>
                @enderror
            </div>
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-success" id="submitButton" disabled>Tambah
                    Data</button>
            </div>
        </div>
    </form>
</div>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center  justify-content-between mb-1 mt-5">
    <h1 class="h3 mb-0 text-gray-800 d-sm-inline-block d-none">Buat Mapel</h1>
</div>

<div class="row px-2">

    <div class="card shadow  col-md-6 py-3 ">
        <form action="{{url('mapel-create')}}" method="post" id="myForm">
            @csrf
            <div class="input-group">
                <span class="input-group-text col-md-3 form-control" id="basic-addon1">Nama Lengkap</span>
                <input type="text" class="form-control" require name="nama_mapel" id="name" placeholder="mata pelajaran">
            </div>

            <button type="submit" class="form-control mt-4 btn btn-success">Tambah
                    Data</button>
        </form>
    </div>
</div>


<!-- Content Row -->
@endsection