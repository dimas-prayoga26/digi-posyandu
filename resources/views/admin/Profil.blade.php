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
                            

                        </div>
                    </div>

                </div>
            </div>
        </div>
     

    @endsection
