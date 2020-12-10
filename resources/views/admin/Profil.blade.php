@extends('admin.templateadmin')

@section('title', 'Profil')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Profil </li>
        </ol>
    </div>
    <hr>
    <!-- Documentation Link -->


    <div class="row mb-3 justify-content-center">
        <!-- New User Card Example -->
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4 ">

                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="login-form">
                            <div class="text-center">
                                <img class="img-profile rounded-circle" src="">
                            </div>
                            <hr>

                            <table>
                              @foreach($datas as $data)
                                <tr>
                                    <td><label>Nama</label></td>
                                    <td><label>:&nbsp;&nbsp;</label></td>
                                    <td><label><b>{{$data->nama}}</b></label></td>
                                </tr>
                                <tr>
                                    <td><label>Username</label></td>
                                    <td><label>:</label></td>
                                    <td><label><b>{{$data->username}}</b></label></td>
                                </tr>
                                <tr>
                                    <td><label>Alamat</label></td>
                                    <td><label>:</label></td>
                                    <td><label><b>{{$data->alamat}}</b></label></td>
                                </tr>
                                <tr>
                                    <td><label>Level</label></td>
                                    <td><label>:</label></td>
                                    <td><label><b>{{$data->level}}</b></label></td>
                                </tr>
                                <tr>
                                    <td><label>Jenis Kelamin</label></td>
                                    <td><label>:</label></td>
                                    <td><label><b>{{$data->jk}}</b></label></td>
                                </tr>
                              @endforeach
                            </table>
                            <hr>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-data-{{$datas->id_admin}}">
                                    <i class="fas fa-user-edit"></i>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- Modal edit --}}
    <div class="modal fade" id="edit-data-{{$datas->id_admin}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin Puskesmas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('profil', $datas->id_admin)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{$datas->username}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$datas->nama}}">
                        </div>
                        <label>Jenis Kelamin</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk1" value="laki-laki"
                                {{ ($datas->jk=="laki-laki")? "checked" : "" }}>
                            <label class="form-check-label" for="jk1">Laki - Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="jk2" value="perempuan"
                                {{ ($datas->jk=="perempuan")? "checked" : "" }}>
                            <label class="form-check-label" for="jk2">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"
                                rows="2">{{$datas->alamat}}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </div>
        </div>
    </div>
    
    

    @endsection
