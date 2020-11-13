@extends('admin.templateadmin')

@section('title', 'Admin Puskesmas')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jadwal Posyandu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Jadwal Posyandu</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jadwal Posyandu</h6>
                </div>
                
                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal"
                     id="#myBtn">
                     <span class="icon text-white-50">
                       <i class="fas fa-plus"></i>
                     </span>
                     <span class="text">Tambah Data Jadwal Posyandu</span>  
                   </button>
                   
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal Posyandu</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                        <form id="frmAddJadwal" action="{{ url('addJadwal') }}" method="POST" role="form">
                          @csrf
                       <div class="modal-body">
                          <div class="form-group">
                            <label for="tgl">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" placeholder="Masukan tgl">
                          </div>                         
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-success">Simpan</button>
                       </div>
                     </div>
                   </div>
                 </div>
                </div>
              </form>
                 {{-- Akhir Modal Tambah --}}


                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($datas as $data)
                        <tr>
                          <td>{{++$i}}</td>
                          <td>{{$data->tanggal}}</td>
                          <td>
                            <button type="button" class="btn btn-primary" 
                              data-toggle="modal" data-target="#edit-data">
                              <i class="fas fa-user-edit"></i>
                            </button>
                            <button type="submit" class="btn btn-danger">
                              <i class="fas fa-trash"></i>
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          {{-- Modal edit --}}
          <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Jadwal Puskesmas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="tgl">Tanggal</label>
                      <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Masukan tgl">
                    </div>                         
                 </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success">Simpan</button>
            </div>
          </div>
          </div>
          </div>
          </div>
          </form>
{{-- Akhir Modal Tambah --}}
@endsection