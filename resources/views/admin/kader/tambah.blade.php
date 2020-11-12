@extends('admin.templateadmin')

@section('title', 'Kader')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kader</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="./">Kader</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Kader</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Kader</h6>
                </div>
               <div class="card-body">
                  <form>
                    <div class="form-group">
                      <label for="nama_kader">Nama Kader</label>
                      <input type="text" class="form-control" id="nama_kader" aria-describedby="emailHelp"  placeholder="Enter email"> 
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea input type="text" class="form-control" id="alamat" aria-describedby="emailHelp"  placeholder="Enter email"></textarea> 
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
              </div>
            </div>

@endsection