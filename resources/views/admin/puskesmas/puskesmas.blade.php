@extends('admin.templateadmin')

@section('title', 'Puskesmas')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Puskesmas</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Puskesmas</li>
        </ol>
    </div>

    <div class="card-header">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
            {{ session('success') }}
        </div>
        @endif
    </div>
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Puskesmas</h6>
                </div>
                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal"
                        data-target="#exampleModal" id="#myBtn">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Puskesmas</span>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Puskesmas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('addPuskesmas')}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_puskesmas">Nama Puskesmas</label>
                                            <input type="text" class="form-control" name="nama_puskesmas"
                                                placeholder="Masukan Nama Puskesmas">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat"
                                                placeholder="Masukan Alamat">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Modal Tambah --}}

                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Puskesmas</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$data->nama_puskesmas}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-data-{{$data->id_puskesmas}}">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <form action="{{url('deletePuskesmas', $data->id_puskesmas)}}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Edit --}}
        @foreach ($datas as $data)
        <div class="modal fade" id="edit-data-{{$data->id_puskesmas}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Puskesmas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('editPuskesmas', $data->id_puskesmas)}}" method="post">
                            @csrf
                            @method('PUT')
                             <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nama_puskesmas">Nama Puskesmas</label>
                                            <input type="text" class="form-control" name="nama_puskesmas"
                                                placeholder="Masukan Nama Puskesmas" value="{{$data->nama_puskesmas}}">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat"
                                                placeholder="Masukan Alamat" value="{{$data->alamat}}">
                                        </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
    @endforeach

    {{-- Akhir Modal Edit --}}
    @endsection
