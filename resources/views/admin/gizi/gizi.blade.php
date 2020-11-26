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
                @if (session('level') == 'admin_puskesmas')
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <a href="{{ url('gizi/export_gizi')}}" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                @else
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-end">
                  <button type="button" data-toggle="modal"  data-target="#modal" id="#myBtn" class="btn btn-outline-success " >Export Laporan</a>
                </div>
                @endif
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No.</th>
                        <th>No Kartu Keluarga</th>
                        <th>NIK</th>
                        <th>Anak Ke-</th>
                        <th>Nama Anak</th>
                        <th>Tanggal Lahir</th>
                        <th>Tanggal Ukur</th>
                        <th>Umur (Bln)</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Ekonomi</th>
                        <th>BB Lahir</th>
                        <th>Nama Orang Tua</th>
                        <th>NIK Ayah</th>
                        <th>No Telp</th>
                        <th>BB(Kg)</th>
                        <th>TB(Cm)</th>
                        <th>Cara Ukur</th>
                        <th>Asi Ekslusif</th>
                        <th>IMD</th>
                        <th>Vit. A Feb</th>
                        <!-- <th>Vit. A Agt</th> -->
                        <th>Status Gizi</th>
                        <th>Validasi</th>

                      </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                      <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$data->no_kk }}</td>
                       <td>{{$data->nik }}</td>
                       <td>{{$data->anak_ke }}</td>
                       <td>{{$data->nama_anak }}</td>
                       <td>{{$data->tgl_lahir}}</td>
                       <td>{{$data->tgl_periksa}}</td>
                       <td>{{$data->usia}}</td>
                       <td>{{$data->jk}}</td>
                       <td>{{$data->status_ekonomi}}</td>
                       <td>{{$data->bb_lahir}}</td>
                       <td>{{$data->nama_ayah}} / {{$data->nama_ibu}} </td>
                       <td>{{$data->nik_ayah}}</td>
                       <td>{{$data->no_telp}}</td>
                       <td>{{$data->bb}}</td>
                       <td>{{$data->pb_tb}}</td>
                       <td>{{$data->cara_ukur}}</td>
                       <td>{{$data->asi_eks}}</td>
                       <td>{{$data->imd}}</td>
                       <td>{{$data->vit_a}}</td>
                       <td>{{$data->bb_u}}</td>
                       <td>{{$data->validasi}}</td>
                      </tr>
                      
                      @endforeach 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
</div>

{{-- Modal Tambah --}}
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Export Laporan Gizi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="addExportGizi" action="{{ url('gizi/export_gizi_superadmin')}}" method="GET" role="form">
                                    @csrf
                                    <div class="form-group">
                                            <label for="id_puskesmas">Laporan Puskesmas</label>
                                            <select class="select2-single-placeholder form-control" name="id_puskesmas"
                                                id="id_puskesmas">
                                                <option value="#">Pilih Puskesmas</option>
                                                @foreach ($datas as $item)
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
                
                {{-- Akhir Modal Tambah --}}
@endsection