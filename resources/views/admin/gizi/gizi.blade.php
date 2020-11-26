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
                  <a href="{{ url('gizi/export_gizi')}}" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Ukur</th>
                        <th>Umur (Bln)</th>
                        <!-- <th>Vit. A Agt</th> -->
                        <th>Detail</th>
                        <th>Data Anak</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                      <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$data->anak->nik }}</td>
                       <td>{{$data->anak->nama_anak }}</td>
                       <td>{{date('d-m-Y', strtotime($data->tgl_periksa))}}</td>
                       <td>{{$data->usia}}</td>
                       <td>
                        <button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#modal-detail-{{$data->no_pemeriksaan_gizi}}">
                        <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Detail</span>  
                      </button> 
                       <td>
                        <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#modal-anak-{{$data->no_pemeriksaan_gizi}}"
                        id="#modalScroll">
                        <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Detail Data Anak</span>  
                      </button> 
                      </td>
                      </tr>
                      
                      @endforeach 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
</div>
@foreach($datas as $data)
    <!-- Modal Detail -->
      <div class="modal fade" id="modal-detail-{{$data->no_pemeriksaan_gizi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$data->anak->nama_anak }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Berat Badan : {{$data->bb}}</li>
              <li class="list-group-item">Panjang / Tinggi Badan  : {{$data->pb_tb}}</li>
              <li class="list-group-item">Cara ukur : {{$data->cara_ukur}} </li>
              <li class="list-group-item">Asi Eksklusif : {{$data->asi_eks}} </li>
              <li class="list-group-item">Imd : {{$data->anak->imd}} </li>
              <li class="list-group-item">Vitamin A Feb : {{$data->vit_a}} </li>
              <h4>Status Gizi</h4>
              <li class="list-group-item">BB / U : <td>{{$data->status_gizi->bb_u}} </li>
              <li class="list-group-item">PB_TB / U : <td>{{$data->status_gizi->pb_tb_u}} </li>
              <li class="list-group-item">BB_PB / TB : <td>{{$data->status_gizi->bb_pb_tb}} </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
      </div>



       <!-- Modal Detail Anak -->
       <div class="modal fade" id="modal-anak-{{$data->no_pemeriksaan_gizi}}" tabindex="-1" role="dialog"
       aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Data Anak & Keluarga</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">No Kartu Keluarga : {{$data->anak->no_kk }} </li>
              <li class="list-group-item">No Induk Kependudukan : {{$data->anak->nik }} </li>
              <li class="list-group-item">Nama : {{$data->anak->nama_anak }}</li>
              <li class="list-group-item">Tanggal Lahir : {{date('d-m-Y', strtotime($data->anak->tgl_lahir))}}</li>
              <li class="list-group-item">Usia : {{$data->usia}}</li>
              <li class="list-group-item">Jenis Kelamin : {{$data->anak->jk}}</li>
              <li class="list-group-item">Anak Ke- : {{$data->anak->anak_ke }} </li>
              <li class="list-group-item">Berat Badan Lahir : {{$data->anak->bb_lahir}}</li>
              <li class="list-group-item">Panjang Badan Lahir : {{$data->anak->pb_lahir}}</li>
              <br>
              <h3>Data Keluarga</h3>
              <br>
              <li class="list-group-item">Nik Ayah  : {{$data->anak->keluarga->nik_ayah}}</li>
              <li class="list-group-item">Nama Ayah : {{$data->anak->keluarga->nama_ayah}}</li>
              <li class="list-group-item">Nik Ibu   : {{$data->anak->keluarga->nik_ibu}}</li>
              <li class="list-group-item">Nama Ibu  : {{$data->anak->keluarga->nama_ibu}} </li>
              <li class="list-group-item">Status Ekonomi : {{$data->anak->keluarga->status_ekonomi}}</li>
              <li class="list-group-item">No Telp : {{$data->anak->keluarga->no_telp}}</li>
            </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
           </div>
         </div>
       </div>
     </div>
     @endforeach 
@endsection