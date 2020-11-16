@extends('admin.templateadmin')

@section('title', 'Gizi')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gizi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gizi</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Gizi</h6>
                </div>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <button type="button" class="btn btn-outline-success ">Export Laporan</button>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Posyandu</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data">
                            <i class="fas fa-user-edit"></i>
                           </button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                      </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
</div>
@endsection