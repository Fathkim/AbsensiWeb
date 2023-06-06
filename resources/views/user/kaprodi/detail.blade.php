@extends('layouts.main-view')

@section('title')
Detail {{$user->name}}
@endsection

@section('content')
<!-- content -->
<div class="container">
    <div class="card border-left-primary rounded-3 shadow-lg bg-white p-3">
        <div class="card-header d-flex align-items-center">
            <p class="m-0">Detail User</p>
            <div class="ml-auto">
                @if(!$kaprodi)
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
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-borderless">
                    @foreach ($kaprodi as $item)
                    <tr>
                        <th class="text-dark text-uppercase">Photo</th>
                        <td>:</td>
                        <td>
                            <img class="img-thumbnail" src="{{ asset('/storage/kaprodi/'.$item->photo) }}"
                                width="200px" />
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th class="text-dark text-uppercase">Nama</th>
                        <td>:</td>
                        <td>{{$user->name}}</td>

                    </tr>
                    <tr>
                        <th class="text-dark text-uppercase">E-mail</th>
                        <td>:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th class="text-dark text-uppercase">Lavel</th>
                        <td>:</td>
                        <td class="badge badge-primary py-2 my-2 px-4">{{$user->level}}</td>
                    </tr>
                    @foreach ($kaprodi as $item)
                    <tr>
                        <th class="text-dark text-uppercase">Jurusan</th>
                        <td>:</td>
                        <td>
                            {{$item->jurusan->nama_jurusan}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @if($kaprodi)
            <a type="submit" href="/kaprodi" class="btn px-5 btn-primary shadow">Back</a>
            <a type="submit" href="{{url('kaprodi/edit', $user->id)}}" class="btn px-5 btn-warning shadow">Edit</a>
            @endif
            @if(!$kaprodi)
            <!-- maka tampilkan form untuk mengisi biodata -->
            <form action="{{route('create-kaprodi', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
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
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Photo</label>
                        <div class="mb-3">
                            <input type="file" class="form-control p-0" id="image-input" name="photo">
                            <input type="number" class="form-control p-0" id="image-input" name="id_user"
                                value="{{$user->id}}" hidden>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow">Create Biodata</button>
                <a type="submit" href="/kaprodi" class="btn btn-warning shadow">Back</a>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection