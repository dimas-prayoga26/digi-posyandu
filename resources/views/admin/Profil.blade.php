@extends('admin.templateadmin')

@section('title', 'Profil')
    
@section('content')

       <!-- Container Fluid-->
       <div class="container-fluid" id="container-wrapper"> 
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Profil </h1>
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Profil </li>
          </ol>
        </div>
        <hr>
        <!-- Documentation Link -->
        

        <div class="row mb-3 justify-content-center">
          <!-- New User Card Example -->
            <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4 ">
              
              <div class="card-body">
                
                <div class="col-lg-12">
              <div class="login-form">
                <div class="text-center">             
                    <img class="img-profile rounded-circle" src="">
                </div>
                <hr>
                
                <table>
                  <tr>
                    <td><label>Nama</label></td>
                    <td><label>:&nbsp;&nbsp;</label></td>
                    <td><label><b></b></label></td>
                  </tr>
                  <tr>
                    <td><label>Username</label></td>
                    <td><label>:</label></td>
                    <td><label><b></b></label></td>
                  </tr>
                  <tr>
                    <td><label>Email</label></td>
                    <td><label>:</label></td>
                    <td><label><b></b></label></td>
                  </tr>
                  <tr>
                    <td><label>No HP</label></td>
                    <td><label>:</label></td>
                    <td><label><b></b></label></td>
                  </tr>
                  <tr>
                    <td><label>Level</label></td>
                    <td><label>:</label></td>
                    <td><label><b></b></label></td>
                  </tr>
                </table>
                <hr>
                <div class="text-right">
                    <a href="" class="btn btn-outline-dark mb-1">Ubah Data</a>
                </div>
                
              </div>
            </div>

              </div>
            </div>
          </div>

</div>

@endsection