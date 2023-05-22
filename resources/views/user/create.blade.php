@extends('layouts.main-view')

@section('sidebar')
<!-- Sidebar - Brand -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usercollaps" aria-expanded="flase"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-server"></i>
            <span>User</span>
        </a>
        <div id="usercollaps" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{url('user')}}">View</a>
                <a class="collapse-item active" href="{{url('create-user')}}">Create</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan Bulanan</span></a>
    </li>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>


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
    <h1 class="h3 mb-0 text-gray-800">Buat User</h1>
    <a href="{{route('user')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-user fa-sm text-white-50"></i> View Staff</a>
</div>
<div class="card shadow py-3 px-4">
    <form action="{{route('data-create')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12 input-group">
                <span class="input-group-text col-md-2 form-control" id="basic-addon1">Nama Lengkap</span>
                <input type="text" class="form-control" require name="name" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="col-md-12 input-group my-3">
                <span class="input-group-text col-md-2 form-control" id="basic-addon1">Alamat E-mail</span>
                <input type="email" class="form-control" require name="email" placeholder="mail" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="col-md-6 input-group mb-3">
                <label class="form-control col-md-2 input-group-text" for="inputGroupSelect01">Lavel</label>
                <select name="level" require class="form-control form-select" id="inputGroupSelect01">
                    <option>Choose...</option>
                    <option value="kaprodi">Kaprodi</option>
                    <option value="siswa">Siswa</option>
                    <option value="guru">Guru</option>
                </select>
            </div>


            <div class="col-md-6">
                <div class="input-group mb-4">
                    <span class="input-group-text col-md-2 form-control" id="basic-addon1">password</span>
                    <input type="password" class="form-control" require name="password" placeholder="••••"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-success">Tambah Data</button>
            </div>
        </div>
    </form>
</div>

<!-- Content Row -->
<!-- disini kita akan membuat form untuk membuat users dan menghash id tersebut -->

@endsection