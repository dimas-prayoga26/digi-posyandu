<table>
<thead>
  <tr>
    <th></th>
    <th></th>
    <th></th>
    <th>DATA VAKSINASI</th>
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
  </tr>
  <tr>
    <td rowspan="2">Jenis Vaksinasi</td>
    @foreach($coba as $data)
        <td colspan="2">{{$data->nama_vaksinasi}}</td>
    @endforeach
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    @foreach($coba as $data)
        <td>L</td>
        <td>P</td>
    @endforeach
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
 
      <tr>
        <td></td>
        @foreach($coba as $value)
            <td>{{$value->l}}</td>
            <td>{{$value->p}}</td>
        @endforeach
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
  

</tbody>
</table>