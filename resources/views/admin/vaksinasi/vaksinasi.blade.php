@extends('admin.templateadmin')

@section('title', 'Vaksinasi')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Vaksinasi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Vaksinasi</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Vaksinasi</h6>
                </div>
              
                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal"
                     id="#myBtn">
                     <span class="icon text-white-50">
                       <i class="fas fa-plus"></i>
                     </span>
                     <span class="text">Tambah Data Vaksinasi</span>  
                   </button>
                   
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">
                         @csrf
                          <div class="form-group">
                            <label for="nama_vaksinasi">Nama Vaksinasi</label>
                            <input type="text" class="form-control  @error('nama_vaksinasi') is-invalid @enderror" value="{{ old('nama_vaksinasi') }}" id="nama_vaksinasi" name="nama_vaksinasi"placeholder="Masukan Nama Vaksinasi">
                            @error('nama_vaksinasi')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                         <button type="button" class="btn btn-primary">Simpan</button>
                       </div>
                     </div>
                   </div>
                 </div>
                </div>
                 {{-- Akhir Modal Tambah --}}

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
                        <a href="ubah_data">Edit</a>
                        |
                        <a href="hapus">Hapus</a>
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
                        |
                       <form action=" #" method="post" class="d-inline">
                       @method('delete')
                       @csrf
                       <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                   </form>
                      </td>
                      </tr>
          
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            {{-- Modal Edit --}}
            <div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Edit Data Vaksinasi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                        <div class="modal-body">
                         @csrf
                            <div class="form-group">
                              <label for="nama_vaksinasi">Nama Vaksinasi</label>
                              <input type="text" class="form-control @error('nama_vaksinasi') is-invalid @enderror" value="{{ old('nama_vaksinasi') }}" id="nama_vaksinasi" name="nama_vaksinasi" placeholder="Masukan nama puskesmas">
                              @error('nama_vaksinasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                      </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                         <button type="button" class="btn btn-primary">Simpan</button>
                       </div>
                     </div>
                   </div>
                 </div>
                </div>
                 {{-- Akhir Modal Edit --}}


@endsection
