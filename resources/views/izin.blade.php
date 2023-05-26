<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Absensi | Izin</title>

    <!-- image icon web -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/icon-web.png') }}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('home')}}">
                <img src="{{ asset('images/icon-web.png') }}" class="image-thumbnail" style="width:2rem; " alt="Gambar">
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
                <a class="nav-link" href="{{url('izin')}}">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Izin (udzur)</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out"></i>
                    <span>logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>

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

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item">
                            <a class="nav-link" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-4 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{asset('images/SMKMuhammadiyah2.jpg')}}">
                            </a>
                        </li>
                        @endguest
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid my-5">
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
                                        <div class="col-md-2 mb-2">
                                            <label class="form-label">Nama Siswa</label>
                                        </div>
                                        <div class="col-md-10 mb-2">
                                            <input type="text" required class="form-control" name="id_user"
                                                value="{{Auth::user()->id}} " hidden>
                                            <input type="text" required class="form-control"
                                                value="{{Auth::user()->name}} " disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2 mb-2">
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
                                            <select type="text" required class="form-control" id="keterangan"
                                                name="keterangan">
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
                                            <input type="text" name="deskripsi" id="deskripsi-text"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            <input class="form-control" required type="file" id="formFile"
                                                style="height: 100px;" name="bukti_foto">
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
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
<!-- Core plugin JavaScript-->
<script>
// Event handler untuk perubahan pada dropdown jabatan 
const keterangan = document.querySelector("#keterangan");

keterangan.addEventListener("change", function() {
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

document.getElementById("izin-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Menghentikan pengiriman form secara langsung

    // Menampilkan pop-up dengan pesan "Selamat"
    alert("Selamat!");

    // Submit form secara manual
    this.submit();
});
</script>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


</html>