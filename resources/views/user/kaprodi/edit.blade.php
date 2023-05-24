@extends('layouts.main-view')

@section('title')
Edit Your User
@endsection

@section('sidebar')
@endsection

@section('content')
<!-- content -->
<div class="container">
    <div class="rounded rounded-3 shadow-lg bg-white p-3">
        <p class="fs-4 fw-bold text-secondary text-capitalize mb-5">edit your user</p>

        <form action="{{ route('update-kaprodi', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    @foreach ($kaprodi as $item)
                    <div class="justify-content-center d-flex">
                        <img src="{{ asset('/storage/kaprodi/'.$item->photo) }}"
                            class="rounded rounded-3 img-thumbnail mb-3" width="210px" id="preview-selected-image">
                    </div>
                    <div class="mb-3">
                        <input require type="file" accept="image/*" onchange="previewImage(event);" class="form-control" id="image-input" name="photo">
                    </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input require type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input require type="email" class="form-control" id="email" name="email"
                            value="{{$user->email}}">
                    </div>
                    <div class="mb-4">
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
                    <div class="row">
                        <div class="col-md-6 mb-4">

                            <label for="inputGroupSelect01">level</label>
                            <select class="form-control" require id="inputGroupSelect01" name="level">
                                <option value="{{$user->level}}">{{$user->level}}</option>
                                <option value="guru">guru</option>
                                <option value="siswa">siswa</option>
                                <option value="kaprodi">kaprodi</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="name" for="inputGroupSelect01">Jurusan</label>
                            <select class="form-control" require id="inputGroupSelect01" name="id_jurusan">
                                @foreach ($jurusan as $item)
                                <option value="{{$item->id}}">{{$item->nama_jurusan}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-2 form-group col-md-6">
                    <button type="submit" class="btn btn-success col-md-4 text-uppercase">edit</button>
                </div>
            </div>
        </form>
    </div>

    <form action="{{ route('delete-kaprodi', $user->id) }}" class="mt-4" method="post">
        @csrf
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-danger px-5"
            onclick="return confirm('Apakah anda akan menghapus {{$user->name}} ?');">Hapus</button>
        <a href="{{url('/kaprodi')}}" class="btn btn-warning px-4">Cancel</a>
    </form>
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
</script>
@endsection