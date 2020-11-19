<table >
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
                        <th colspan="3">Status Gizi</th>

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
                       <td>{{$data->anak->keluarga->nama_ayah}} / {{$data->anak->keluarga->nama_ibu}}</td>
                       <td>{{$data->anak->keluarga->nik_ayah}} </td>
                       <td>{{$data->anak->keluarga->no_telp}}</td>
                       <td>{{$data->bb}}</td>
                       <td>{{$data->pb_tb}}</td>
                       <td>{{$data->cara_ukur}}</td>
                       <td>{{$data->asi_eks}}</td>
                       <td>{{$data->anak->imd}}</td>
                       <td>{{$data->vit_a}}</td>
                       <td>{{$data->status_gizi->bb_u}}</td>
                       <td></td>
                       <td></td>
                       <td>{{$data->validasi}}</td>
                      </tr>
                      
                      @endforeach 
                    </tbody>
                  </table>