@extends('admin.templateadmin')

@section('title', 'Bidan Desa')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bidan Desa</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Bidan Desa</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Bidan Desa</h6>
                </div>
                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal"
                    id="#myBtn">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Bidan Desa</span>  
                  </button>
                  
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bidan Desa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form>
                        <div class="modal-body">
                           <div class="form-group">
                             <label for="username">Username</label>
                             <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                           </div>
                           <div class="form-group">
                             <label for="nama">Nama</label>
                             <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                           </div>
                           <label>Jenis Kelamin</label>
                           <br>
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki - Laki">
                             <label class="form-check-label" for="jk1">Laki - Laki</label>
                           </div>
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jk" id="jk2" value="Wanita">
                             <label class="form-check-label" for="jk2">Wanita</label>
                           </div>
                           <div class="form-group">
                             <label for="alamat">Alamat</label>
                             <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                           </div>
                           <div class="form-group">
                            <label for="posyandu">Posyandu</label>
                            <select class="select2-single-placeholder form-control" name="posyandu" id="posyandu">
                              <option value="">Pilih Posyandu</option>
                              <option value="Jawa Barat">Jawa Barat</option>
                              <option value="Jakarta">Jakarta</option>
                              <option value="Jawa Tengah">Jawa Tengah</option>
                              <option value="Yogyakarta">Yogyakarta</option>
                              <option value="Jawa TImur">Jawa Timur</option>
                            </select>
                          </div>
                           <div class="form-group">
                             <label for="password">Password</label>
                             <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                           </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
               </form>
                {{-- Akhir Modal Tambah --}}


                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-data">
                            <i class="fas fa-user-edit"></i>
                           </button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                      </td>
                      </tr>
                      <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
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
{{-- Modal Edit --}}
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Data Bidan Desa</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form>
      <div class="modal-body">
         <div class="form-group">
           <label for="username">Username</label>
           <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
         </div>
         <div class="form-group">
           <label for="nama">Nama</label>
           <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
         </div>
         <label>Jenis Kelamin</label>
         <br>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="jk" id="jk1" value="Laki - Laki">
           <label class="form-check-label" for="jk1">Laki - Laki</label>
         </div>
         <div class="form-check form-check-inline">
           <input class="form-check-input" type="radio" name="jk" id="jk2" value="Wanita">
           <label class="form-check-label" for="jk2">Wanita</label>
         </div>
         <div class="form-group">
           <label for="alamat">Alamat</label>
           <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
         </div>
         <div class="form-group">
          <label for="posyandu">Posyandu</label>
          <select class="select2-single-placeholder form-control" name="posyandu" id="posyandu">
            <option value="">Pilih Posyandu</option>
            <option value="Jawa Barat">Jawa Barat</option>
            <option value="Jakarta">Jakarta</option>
            <option value="Jawa Tengah">Jawa Tengah</option>
            <option value="Yogyakarta">Yogyakarta</option>
            <option value="Jawa TImur">Jawa Timur</option>
          </select>
        </div>
         <div class="form-group">
           <label for="password">Password</label>
           <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
{{-- Akhir Modal Edit --}}
@endsection