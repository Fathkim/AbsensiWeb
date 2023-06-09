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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    @foreach($guru as $item)
                    <tr>
                        <th class="text-dark text-uppercase">Photo</th>
                        <td>:</td>
                        <td>
                            <img class="img-thumbnail" src="{{ asset('/storage/guru/'.$item->photo) }}"
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
                        <td class="badge badge-primary py-2 mt-2 px-4">{{$user->level}}</td>
                    </tr>
                    @foreach ($guru as $item)
                    <tr>
                        <th class="text-dark text-uppercase">Mapel</th>
                        <td>:</td>
                        <td>
                            {{$item->mapel->nama_mapel}}
                        </td>
                    </tr> 
                    <tr>
                        <th class="text-dark text-uppercase">Nomor</th>
                        <td>:</td>
                        <td>
                            <label class="text-dark">+62</label>
                            {{$item->nomor}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @if($guru)
            <a type="submit" href="/guru" class="btn btn-primary px-5 shadow">Back</a>
            <a type="submit" href="{{url('guru/edit', $user->id)}}" class="btn px-5 btn-warning shadow">Edit</a>
            @endif
            @if(!$guru)
            <!-- maka tampilkan form untuk mengisi biodata -->
            <form action="{{route('create-guru', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Mapel</label>
                        <select class="form-control" required id="inputGroupSelect01" name="id_mapel">
                            <option value="0">Choose...</option>
                            @foreach ($mapel as $item)
                            <option value="{{$item->id}}">{{$item->nama_mapel}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Photo</label>
                        <div class="mb-3">
                            <input type="file" required class="form-control p-0" id="image-input" name="photo">
                            <input type="number" class="form-control" id="image-input" name="id_user"
                                value="{{$user->id}}" hidden>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="name" for="inputGroupSelect01">Nomor</label>
                        <div class="mb-3">
                            <input type="number" required class="form-control" name="nomor">
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