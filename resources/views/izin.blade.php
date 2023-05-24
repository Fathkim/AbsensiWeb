@extends('layouts.main-view')

@section('sidebar')
<!-- Sidebar - Brand -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <img src="{{ asset('images/icon-web.png') }}" class="image-thumbnail" style="width:2rem; alt="Gambar">
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

    <!-- Nav Item - Charts -->
    <li class="nav-item active">
        <a class="nav-link" href="/izin">
            <i class="fas fa-fw fa-info"></i>
            <span>Izin (udzur)</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endsection

@section('content')
<div class="col-md-8 m-auto my-5">
    <div class="card h-auto">
        <div class="card-header px-3">
            <h6 class="mb-0 p-3">Buat Perizinan</h6>
        </div>
        <div class="card-body">
            <form action="/izin/send" id="izin-form" method="post">
                {{-- {{method_field('POST')}} --}}
                @csrf
                <div class="form-group row">
                    <div class="col-2 mb-2">
                        <label class="form-label">Nama Siswa</label>
                    </div>
                    <div class="col-md-10 mb-2">
                        <input type="text" required class="form-control" name="id_user" value="{{Auth::user()->id}} "
                            hidden>
                        <input type="text" required class="form-control" value="{{Auth::user()->name}} " disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2 mb-2">
                        <label class="form-label">Kelas</label>
                    </div>
                    <div class="col-md-10 mb-2">
                        <input type="text" required class="form-control" name="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 mb-2">
                        <label class="label-form">Keterangan</label>
                    </div>
                    <div class="col-md-10 mb-2">
                        <select type="text" required class="form-control" id="keterangan" name="keterangan">
                            <option value="">Pilih Opsi</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option id="lainnya" value="lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" id="description-container" style="display: none;">
                    <div class="col-md-2 mb-2">
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                    <div class="col-md-10 mb-2">
                        <input type="text" name="deskripsi" id="deskripsi-text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <input class="form-control" required type="file" id="formFile" style="height: 100px;"
                            name="bukti_foto">
                        <div id="passwordHelpBlock" class="form-text">
                            Kirim bukti keterangan
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end form-group ">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Event handler untuk perubahan pada dropdown jabatan 
    const keterangan = document.querySelector("#keterangan");

    keterangan.addEventListener("change", function () {
        // Mendapatkan opsi yang dipilih pada dropdown jabatan
        const selectedOption = this.value;

        // Mendapatkan elemen div dengan id "description-container"
        const descriptionContainer = document.querySelector("#description-container");

        // Jika opsi yang dipilih adalah "lainnya"
        if (selectedOption === "lainnya") {
            // Tampilkan elemen div dengan id "description-container"
            descriptionContainer.style.display = "flex";
            descriptionContainer.querySelector("#deskripsi-text").setAttribute("required", true);
        } else {
            // Sembunyikan elemen div dengan id "description-container"
            descriptionContainer.style.display = "none";
        }
    });

    document.getElementById("izin-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Menghentikan pengiriman form secara langsung

        // Menampilkan pop-up dengan pesan "Izin"
        setTimeout(function () {
            alert("Izin telah dikirim!");
        }, 1000);

        alert("Izin telah masuk!");
        // Submit form secara manual
        this.submit();
    });
    // // Event handler untuk perubahan pada dropdown jabatan
    // $("#keterangan").change(function() {
    //     var selectedOption = $(this).val();

    //     if (selectedOption === "lainnya") {
    //         $("#description-container").show();
    //     } else {
    //         $("#description-container").hide();
    //     }
    // });

    console.log("test");

</script>
@endsection
