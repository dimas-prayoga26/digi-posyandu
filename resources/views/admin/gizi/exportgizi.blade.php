<table>
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th colspan="7">DATA BULAN PENIMBANGAN BALITA (BPB)</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>

            <td colspan="3">KECAMATAN</td>
            <td>{{$items->nama_kecamatan}}</td>
            <td></td>
            <td></td>
            <td>RT/RW</td>
            <td>{{$items->rt}} / {{$items->rw}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <!-- <td>Tanggal Ukur</td> -->
            <td></td>
            <td></td>
            <td></td>
            <td>1 = Terlentang</td>
            <td>2 = Berdiri</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3">PUSKESMAS</td>
            <td>{{$items->nama_puskesmas}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3">DESA</td>
            <td>{{$items->nama_desa}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="3">POSYANDU</td>
            <td>{{$items->nama_posyandu }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
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
                <td colspan="3">Status Gizi</td>
                <th>Validasi</th>

            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1=Ya</td>
                <td>1=Ya</td>
                <td>1=Ya</td>
                <td>BB/U</td>
                <td>PB-TB/U</td>
                <td>BB/PB-TB</td>
                <td></td>
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
            <td>{{$data->nama_ayah}} / {{$data->nama_ibu}}</td>
            <td>{{$data->nik_ayah}} </td>
            <td>{{$data->no_telp}}</td>
            <td>{{$data->bb}}</td>
            <td>{{$data->pb_tb}}</td>
            <td>{{$data->cara_ukur}}</td>
            <td>{{$data->asi_eks}}</td>
            <td>{{$data->imd}}</td>
            <td>{{$data->vit_a}}</td>
            <td>{{$data->bb_u}}</td>
            <td>{{$data->pb_tb_u}}</td>
            <td>{{$data->bb_pb_tb}}</td>
            <td>{{$data->validasi}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
