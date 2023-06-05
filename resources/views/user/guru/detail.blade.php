@extends('layouts.main-view')

@section('title')
detail
@endsection

@section('content')
<!-- content -->
<div class="container">
    <div class="card border-left-primary rounded-3 shadow-lg bg-white p-3">
        <div class="card-header">
            <h3 class="text-dark text-uppercase">{{$user->name}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
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
                        <td class="badge badge-primary py-2 mt-2 px-4">{{$user->level}}</td>
                    </tr>
                    <tr>
                        <th class="text-dark text-uppercase">Status Biodata</th>
                        <td>:</td>
                        <td class="p-0">
                            @if(!$guru)
                            <span class="badge badge-danger py-2 my-2 px-4">
                                Belum Ada Biodata
                            </span>
                            @else
                            <span class="badge badge-success py-2 my-2 px-4">
                                Sudah Ada Biodata
                            </span>
                            @endif
                        </td>
                    </tr>
                    @foreach ($guru as $item)
                    <tr>
                        <th class="text-dark text-uppercase">Jurusan</th>
                        <td>:</td>
                        <td>
                            {{$item->mapel->nama_mapel}}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-dark text-uppercase">Photo</th>
                        <td>:</td>
                        <td>
                            <img class="img-thumbnail" src="{{ asset('/storage/guru/'.$item->photo) }}"
                            width="200px" />
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @if($guru)
            <a type="submit" href="/guru" class="btn btn-warning shadow">Back</a>
            @endif
            @if(!$guru)
            <!-- maka tampilkan form untuk mengisi biodata -->
            <form action="{{route('create-guru', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Jurusan</label>
                        <select class="form-control" require id="inputGroupSelect01" name="id_mapel">
                            <option value="0">Choose...</option>
                            @foreach ($mapel as $item)
                            <option value="{{$item->id}}">{{$item->nama_mapel}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Photo</label>
                        <div class="mb-3">
                            <input type="file" class="form-control p-0" id="image-input" name="photo">
                            <input type="number" class="form-control" id="image-input" name="id_user"
                                value="{{$user->id}}" hidden>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Nomor</label>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="nomor">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow">Create Biodata</button>
                <a type="submit" href="/guru" class="btn btn-warning shadow">Back</a>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection