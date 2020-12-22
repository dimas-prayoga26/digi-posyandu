@extends('admin.templateadmin')

@section('title', 'Imunisasi')
    
@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Imunisasi</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Imunisasi</li>
            </ol>
          </div>

          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Imunisasi</h6>
                </div>
               @if (session('level') == 'admin_puskesmas')
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <a href="{{ url('/imunisasi/exportimunisasi')}}" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                @else
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <button type="button" data-toggle="modal"  data-target="#modalexport" id="#myBtn" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                @endif
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>Tgl Imunisasi</th>
                        <th>Nama Anak</th>
                        <th>Nama Vaksinasi</th>
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
 <!-- Modal Detail Anak -->
       <div class="modal fade" id="modal-anak-{{$data->no_pemeriksaan_imunisasi}}" tabindex="-1" role="dialog"
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
      {{-- Modal Export --}}
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
  
                                <form id="addExportGizi" action="{{ url('/imunisasi/export_imunisasi_superadmin')}}" method="GET" role="form">
                                    @csrf
                                    <div class="form-group">
                                            <label for="id_puskesmas">Laporan Puskesmas</label>
                                            <select class="select2-single-placeholder form-control" name="id_puskesmas"
                                                id="id_puskesmas">
                                                <option value="#">Pilih Puskesmas</option>
                                                @foreach ($puskesmas as $item)
                                                <option value="{{$item->id_puskesmas}}">{{$item->nama_puskesmas}}
                                                </option>
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
        var apiUrl = '';
        var level = "{{session('level')}}";
        if(level == 'admin_puskesmas'){ 
          var puskesmas = "{{session('puskesmas')}}";
          apiUrl = 'api/getImunisasi/'+puskesmas; 
        }else if(level == 'super_admin'){
          apiUrl = 'api/getImunisasi';
        }
        fetchImunisasi();
        var interval = setInterval(fetchImunisasi, 4000);
        $('#dataTable').DataTable(); // ID From dataTable 
        function fetchImunisasi() {
          $.ajax({
            type: 'GET',
            url: apiUrl,
            dataType: 'json',
            success: function(data) {
              var html = '';
              data.forEach((item, i) => {
                html += '<tr>'+
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + item.tgl_imunisasi + '</td>' +
                        '<td>' + item.anak.nama_anak + '</td>' +
                        '<td>' + item.vaksinasi.nama_vaksinasi + '</td>' +
                        '<td>' +  '<button type="button" class="btn btn-success btn-icon-split btn-sm"' +
                                  'data-toggle="modal" data-target="#modal-anak-'+item.no_pemeriksaan_imunisasi+'">' +
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
      });
    </script>
@endsection
