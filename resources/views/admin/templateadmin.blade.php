<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>@yield('title')</title>
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{url('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        {{-- <div class="sidebar-brand-icon">
        <!--<img src="img/logo/logo2.png">-->
        </div> --}}
        <div class="sidebar-brand-text mx-3">Integrasi Posyandu</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        <!--Features-->
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-address-card" aria-hidden="true"></i>
          <span>Akun</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Akun</h6>
            <a class="collapse-item" href="{{url('kader')}}">Kader Penanggung Jawab</a>
            <a class="collapse-item" href="{{url('bidan')}}">Bidan Desa</a>
            <a class="collapse-item" href="{{url('admin_puskesmas')}}">Admin Puskesmas</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-syringe"></i>
          <span>Imunisasi</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Imunisasi</h6>-->
            <a class="collapse-item" href="{{url('vaksinasi')}}">Vaksinasi</a>
            <a class="collapse-item" href="{{url('imunisasi')}}">Imunisasi</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('gizi')}}">
          <i class="fas fa-weight"></i>
          <span>Gizi</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      <!--  Examples-->
      </div>
    
      <li class="nav-item">
        <a class="nav-link" href="{{url('puskesmas')}}">
          <i class="far fa-hospital"></i>
          <span>Puskesmas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('posyandu')}}">
          <i class="fas fa-clinic-medical"></i>
          <span>Posyandu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('jadwal')}}">
          <i class="fas fa-clinic-medical"></i>
          <span>Jadwal</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
                        
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{url('img/boy.png')}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"> Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('profil')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>


          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        @yield('content') 
          <!--Row-->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Integrasi Posyandu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah Anda Ingin logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> Integrasi Posyandu
          
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

 <!-- Scroll to top -->
 <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('js/ruang-admin.min.js')}}"></script>
<!-- Page level plugins -->
<script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script>
  $(document).ready(function () {
      var frmAddJadwal = $('#frmAddJadwal');
      frmAddJadwal.submit(function (event) {
          event.preventDefault();
          
          $.ajax({
              url: frmAddJadwal.attr('action'),
              type: "POST",
              data: frmAddJadwal.serialize(),
              dataType: "json",
              success: function( response ){
                  console.log(response);
                  $('#exampleModal').modal('hide');
                  if( response.error == 0 ){      
                    window.location.href = "{{ url('jadwal') }}";
                  } 
              }   
          });
      });
  });
</script>

<!-- Page level custom scripts -->
{{-- <script>
  $(document).ready(function () {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    // Select2 Single  with Placeholder
   $('.select2-single-placeholder').select2({
        placeholder: "Select a Province",
        allowClear: true
  });
  });
</script> --}}

</body>
</html>