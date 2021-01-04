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

                @if (session('level') == 'admin_puskesmas')
                <div class="card-header export d-flex flex-row align-items-center justify-content-end">
                  <a href="{{ url('/gizi/export_gizi')}}" class="btn btn-outline-success">
                    Export Laporan
                  </a>
                </div>
                 @elseif(session('level') == 'bidan')
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <a href="{{ url('/gizi/export_gizi_bidan')}}" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                @else
                <div class="card-header export d-flex flex-row align-items-center justify-content-end">
                  <button type="button" data-toggle="modal"  data-target="#modalexport" id="#myBtn" class="btn btn-outline-success">
                    Export Laporan
                  </button>
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
              <form method="get" align="right">
                <input placeholder="Cari disini" class="search" id="search" type="search" name="search">
              </form>

                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>NIK</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Ukur</th>
                        <th>Umur (Bln)</th>
                        <th>Detail</th>
                        <th>Data Anak</th>
                      </tr>
                    </thead>
                    <tbody id="show_data"> 
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
            <h5 class="modal-title" id="exampleModalLabel">{{$data->nama_anak }}</h5>
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
              <li class="list-group-item">Imd : {{$data->imd}} </li>
              <li class="list-group-item">Vitamin A Feb : {{$data->vit_a}} </li>
              <h4>Status Gizi</h4>
              <li class="list-group-item">BB / U : <td>{{$data->bb_u}} </li>
              <li class="list-group-item">PB_TB / U : <td>{{$data->pb_tb_u}} </li>
              <li class="list-group-item">BB_PB / TB : <td>{{$data->bb_pb_tb}} </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
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
              <li class="list-group-item">No Kartu Keluarga : {{$data->no_kk }} </li>
              <li class="list-group-item">No Induk Kependudukan : {{$data->nik }} </li>
              <li class="list-group-item">Nama : {{$data->nama_anak }}</li>
              <li class="list-group-item">Tanggal Lahir : {{date('d-m-Y', strtotime($data->tgl_lahir))}}</li>
              <li class="list-group-item">Usia : {{$data->usia}} Bulan</li>
              <li class="list-group-item">Jenis Kelamin : {{$data->jk}}</li>
              <li class="list-group-item">Anak Ke- : {{$data->anak_ke }} </li>
              <li class="list-group-item">Berat Badan Lahir : {{$data->bb_lahir}}</li>
              <li class="list-group-item">Panjang Badan Lahir : {{$data->pb_lahir}}</li>
              <br>
              <h3>Data Keluarga</h3>
              <br>
              <li class="list-group-item">Nik Ayah  : {{$data->nik_ayah}}</li>
              <li class="list-group-item">Nama Ayah : {{$data->nama_ayah}}</li>
              <li class="list-group-item">Nik Ibu   : {{$data->nik_ibu}}</li>
              <li class="list-group-item">Nama Ibu  : {{$data->nama_ibu}} </li>
              <li class="list-group-item">Status Ekonomi : {{$data->status_ekonomi}}</li>
              <li class="list-group-item">No Telp : {{$data->no_telp}}</li>
            </ul>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
           </div>
         </div>
       </div>
     </div>
    @endforeach 
     
    <div class="modal fade" id="modalexport" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Export Laporan Gizi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addExportGizi" action="{{ url('/gizi/export_gizi_superadmin')}}" method="GET" role="form">
                    @csrf
                    <div class="form-group">
                      <label for="id_puskesmas">Puskesmas</label>
                      <select class="select2-single-placeholder form-control" name="id_puskesmas"
                          id="id_puskesmas">
                          <option value="#">Pilih Puskesmas</option>
                          @foreach ($puskesmas as $item)
                            <option value="{{$item->id_puskesmas}}">
                                {{$item->nama_puskesmas}}
                            </option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_month">Bulan</label>
                      <select class="select2-single-placeholder form-control" name="id_month">
                          <option value="#">Pilih Bulan</option>
                          <option value="01">Januari</option>
                          <option value="02">Februari</option>
                          <option value="03">Maret</option>
                          <option value="04">April</option>
                          <option value="05">Mei</option>
                          <option value="06">Juni</option>
                          <option value="07">Juli</option>
                          <option value="08">Agustus</option>
                          <option value="09">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">November</option>
                          <option value="12">Desember</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_year">Tahun</label>
                      <select class="select2-single-placeholder form-control" name="id_year">
                          <option value="#">Pilih Tahun</option>
                          @foreach ($years as $year)
                              <option value="{{$year->year}}">{{$year->year}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger"
                            data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Export</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
  $(document).ready(function () {
    fetchGizi();
    function fetchGizi(query = '') {
      $.ajax({
        type: 'GET',
        url: 'giziSearch',
        data: {query: query},
        dataType: 'json', 
        success: function(data) {
          var html = '';
          data.forEach((item, i) =>{
            html += '<tr>'+
                    '<td>' + (i+1) + '</td>' +
                    '<td>' + item.nik + '</td>' +
                    '<td>' + item.nama_anak + '</td>' +
                    '<td>' + item.tgl_periksa + '</td>' +
                    '<td>' + item.usia + '</td>' +
                    '<td>' +  '<button type="button" class="btn btn-primary btn-icon-split btn-sm"' +
                              'data-toggle="modal" data-target="#modal-detail-'+item.no_pemeriksaan_gizi+'">' +
                              '<span class="icon text-white-50"><i class="fas fa-info-circle"></i>' +
                              '</span>' +
                              '<span class="text">Detail</span>' +  
                              '</button>' +'</td>' +
                    '<td>' +  '<button type="button" class="btn btn-success btn-icon-split btn-sm"' +
                              'data-toggle="modal" data-target="#modal-anak-'+item.no_pemeriksaan_gizi+'">' +
                              '<span class="icon text-white-50"><i class="fas fa-info-circle"></i>' +
                              '</span>' +
                              '<span class="text">Detail Data Anak</span>' +  
                              '</button>' +
                    '</td></tr>' 
          });
          $('#show_data').html(html);
        }
      });
    }

    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetchGizi(query);
      var interval = setInterval(fetchGizi, 5000);
    });
  });
</script>
@endsection
