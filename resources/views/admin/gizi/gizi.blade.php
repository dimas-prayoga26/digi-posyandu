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
                       <td>{{$data->anak->no_kk }}</td>
                       <td>{{$data->anak->nik }}</td>
                       <td>{{$data->anak->anak_ke }}</td>
                       <td>{{$data->anak->nama_anak }}</td>
                       <td>{{$data->anak->tgl_lahir}}</td>
                       <td>{{$data->tgl_periksa}}</td>
                       <td>{{$data->usia}}</td>
                       <td>{{$data->anak->jk}}</td>
                       <td>{{$data->anak->keluarga->status_ekonomi}}</td>
                       <td>{{$data->anak->bb_lahir}}</td>
                       <td>{{$data->anak->keluarga->nama_ayah}} / {{$data->anak->keluarga->nama_ibu}} </td>
                       <td>{{$data->anak->keluarga->nik_ayah}}</td>
                       <td>{{$data->anak->keluarga->no_telp}}</td>
                       <td>{{$data->bb}}</td>
                       <td>{{$data->pb_tb}}</td>
                       <td>{{$data->cara_ukur}}</td>
                       <td>{{$data->asi_eks}}</td>
                       <td>{{$data->anak->imd}}</td>
                       <td>{{$data->vit_a}}</td>
                       <td>{{$data->status_gizi->bb_u}}</td>
                       <td>{{$data->validasi}}</td>
                      </tr>
                      
                      @endforeach 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
</div>
@endsection