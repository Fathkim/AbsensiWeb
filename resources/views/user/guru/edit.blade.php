@extends('layouts.main-view')

@section('title')
Edit Your User
@endsection

@section('content')
<!-- content -->
<div class="container">
    <div class="rounded shadow-lg bg-white p-3">
        <div class="rounded px-2 bg-gray-200 d-flex mb-4 align-items-center">
            <p class="text-dark m-0 text-capitalize">edit your user</p>
            <div class="ml-auto">
                @if(!$guru)
                <span class="badge badge-danger py-2 my-2 px-4">
                    Belum Ada Biodata
                </span>
                @else
                <span class="badge badge-success py-2 my-2 px-4">
                    Sudah Ada Biodata
                </span>
                @endif
            </div>
        </div>
    <div class="rounded shadow-lg bg-white p-3">
        <div class="rounded px-2 bg-gray-200 d-flex mb-4 align-items-center">
            <p class="text-dark m-0 text-capitalize">edit your user</p>
            <div class="ml-auto">
                @if(!$guru)
                <span class="badge badge-danger py-2 my-2 px-4">
                    Belum Ada Biodata
                </span>
                @else
                <span class="badge badge-success py-2 my-2 px-4">
                    Sudah Ada Biodata
                </span>
                @endif
            </div>
        </div>
<div class="rounded rounded-3 shadow-lg bg-white p-3">
    <p class="fs-4 fw-bold text-secondary text-capitalize mb-5">edit your user</p>

        <form action="{{ route('update-guru', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 @if(!$guru) d-none @else d-sm-inline-block @endif">
                    @foreach ($guru as $item)

                    <div class="justify-content-center d-flex mb-4">

                        <div class="img-preview"
                            style="background-image: url('{{ asset('/storage/guru/'.$item->photo) }}')"
                            id="preview-selected-image"></div>

                        <div class="img-preview" style="background-image: url('{{ asset('/storage/guru/'.$item->photo) }}')" id="preview-selected-image"></div>
                    <div class="justify-content-center d-flex">
                        <img src="{{ asset('/storage/guru/'.$item->photo) }}"
                            class="rounded rounded-3 img-thumbnail mb-3" width="210px" id="preview-selected-image">
                    </div>
                    <div class="mb-3">
                        <input require type="file" accept="image/*" onchange="previewImage(event);" class="form-control" id="image-input" name="photo">

                        <input require type="file" accept="image/*" onchange="previewImage(event);" class="form-control"
                            id="image-input" name="photo">
                    </div>
                    @endforeach
                </div>
                <div class="@if(!$guru) col-md-12 @else col-md-6 @endif">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input require type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input require type="email" class="form-control" id="email" name="email"
                            value="{{$user->email}}">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="inputGroupSelect01">level</label>
                            <select class="form-select form-control" require id="inputGroupSelect01" name="level">
                                <option value="{{$user->level}}">{{$user->level}}</option>
                                <option value="guru">guru</option>
                                <option value="siswa">siswa</option>
                                <option value="kaprodi">kaprodi</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input require type="password" class="form-control" id="password" name="password">
                            @if ($errors->any())
                            <div class="alert p-2 mt-3 alert-danger">
                                @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success col-md-2 text-uppercase">edit</button>

                    <button type="submit" class="btn btn-success col-md-2 text-uppercase">edit</button>


            <button type="submit" class="btn btn-success col-md-2 text-uppercase">edit</button>

                    <button type="submit" class="btn btn-success col-md-2 text-uppercase">edit</button>

        </form>
    </div>
</div>


<script>
    const previewImage = (event) => {
        const imageFiles = event.target.files;
        const imageFilesLength = imageFiles.length;
        if (imageFilesLength > 0) {
            const imageSrc = URL.createObjectURL(imageFiles[0]);
            const imagePreviewElement = document.querySelector("#preview-selected-image");
            imagePreviewElement.src = imageSrc;
            imagePreviewElement.style.display = "block";
        }
    };

    $('.delete').click(function () {
        var dataid = $(this).attr('data-id')
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete-guru/" + dataid + ""
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    })

</script>
@endsection
