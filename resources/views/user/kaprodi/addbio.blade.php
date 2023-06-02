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

        <form action="{{ route('create-kaprodi') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-md-6">
                    <div class="justify-content-center d-flex">
                        <img src="{{ asset('images/icon-web.png') }}" class="rounded rounded-3 img-thumbnail mb-3"
                            width="250px" id="imagePreview">
                    </div>
                    <div class="mb-3">
                        <input require type="file" class="form-control" id="image-input" name="photo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <select name="id_user" id="" class="form-control">
                        <option value="0">Choose...</option>
                            @foreach($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                                <label for="name" for="inputGroupSelect01">Jurusan</label>
                                <select class="form-control" require id="inputGroupSelect01" name="id_jurusan">
                                    <option value="0">Choose...</option>
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
                    <button type="submit" class="btn btn-success col-md-4 text-uppercase">create</button>
                    <a href="{{url('/kaprodi')}}" class="btn btn-warning px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>


</div>
@endsection