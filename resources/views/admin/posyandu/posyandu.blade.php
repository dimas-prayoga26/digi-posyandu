@extends('admin.templateadmin')

@section('title', 'Posyandu')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Posyandu</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Posyandu</li>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Posyandu</h6>
                </div>

                {{-- Modal Tambah --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#exampleModal"
                     id="#myBtn">
                     <span class="icon text-white-50">
                       <i class="fas fa-plus"></i>
                     </span>
                     <span class="text">Tambah Data Posyandu</span>  
                   </button>
                   
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Tambah Data Posyandu</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                       <div class="modal-body">
                        <form action="{{url('addPosyandu')}}" method="POST">
                          @csrf
                          <div class="form-group">
                            <label for="nama_posyandu">Nama Posyandu</label>
                            <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu" 
                              placeholder="Masukan nama posyandu">
                          </div>

                          <div class="form-group">
                            <label for="puskesmas">Puskesmas</label>
                            <select class="select2-single-placeholder form-control" 
                              name="id_puskesmas" id="puskesmas" style="width: 100%">
                              <option value="">Select</option>                             
                              @foreach ($puskesmas as $item)
                                <option value="{{$item->id_puskesmas}}">
                                  {{$item->nama_puskesmas}}
                                </option>
                              @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="id_desa">Desa</label>
                            <select class="select2-single-placeholder form-control" 
                              name="id_desa" id="id_desa" style="width: 100%">
                              <option value="">Select</option>
                              @foreach ($desa as $item)
                                <option value="{{$item->id_desa}}">
                                  {{$item->nama_desa}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
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
                        <th>Nama Posyandu</th>
                        <th>Nama Puskesmas</th>
                        <th>Nama Desa</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($datas as $data)
                      <tr>
                      <td>{{++$i}}</td>
                      <td>{{$data->nama_posyandu}}</td>
                      <td>{{$data->nama_puskesmas}}</td>
                      <td>{{$data->nama_desa}}</td>
                        <td>
                       <button type="button" class="btn btn-primary" data-toggle="modal" 
                        data-target="#edit-data-{{$data->id_posyandu}}">
                          <i class="fas fa-user-edit"></i>
                       </button>
                        <form action="{{url('deletePosyandu', $data->id_posyandu)}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                       <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
            <div class="modal fade" id="edit-data-{{$data->id_posyandu}}" tabindex="-1" 
              role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Edit Data Posyandu</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                        <div class="modal-body">
                          <form action="{{url('editPosyandu', $data->id_posyandu)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="nama_posyandu">Nama Posyandu</label>
                              <input type="text" class="form-control" 
                                value="{{ $data->nama_posyandu }}" id="nama_posyandu" name="nama_posyandu" 
                                placeholder="Masukan nama posyandu">
                              @error('nama_posyandu')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
  
                            <div class="form-group">
                              <label for="puskesmas">Puskesmas</label>
                              <select class="select2-single-placeholder form-control" 
                                name="id_puskesmas" id="puskesmas">
                                @foreach ($datas as $item)
                                  <option value="{{$item->id_puskesmas}}">
                                    {{$item->nama_puskesmas}}
                                  </option>
                                @endforeach
                              </select>
                            </div>
  
                            <div class="form-group">
                              <label for="id_desa">Desa</label>
                              <select class="select2-single-placeholder form-control " name="id_desa" id="id_desa">
                               
                                @foreach ($datas as $item)
                                  <option value="{{$item->id_desa}}">
                                    {{$item->nama_desa}}
                                  </option>
                                @endforeach
                              </select>
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
@section('js')
<script>
  $(document).ready(function () {
    // Select2 Single  with Placeholder
    $('#id_desa').select2({
      placeholder: "Pilih Desa",
      allowClear: true,
    
    });         
   
    $('#puskesmas').select2({
      placeholder: "Pilih Puskesmas",
      allowClear: true,
    
    });         

  });
</script>
@endsection