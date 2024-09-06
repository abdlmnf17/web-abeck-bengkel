<title>Beranda</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
<style>

    .bg-gradient-pink {
      color: #fff;
      background-color: rgb(95, 158, 160);
      border-color: pink;
    }
    .bg-gradient-pink:hover {
      background-color: #5f9ea0;
      border-color: #5f9ea0;
    }
    .bg-gradient-pink:focus,
    .bg-gradient-pink.focus {
      box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.5);
    }
    .bg-gradient-pink.disabled,
    .bg-gradient-pink:disabled {
      background-color: pink;
      border-color: pink;
    }
    .bg-gradient-pink:not(:disabled):not(.disabled):active,
    .bg-gradient-pink:not(:disabled):not(.disabled).active,
    .show > .btn-pink.dropdown-toggle {
      background-color: #5f9ea0;
      border-color: #5f9ea0;
    }

    .btn-pink {
  color: #fff;
  background-color: pink;
  border-color: pink;
}
.btn-pink:hover {
  background-color: #5f9ea0;
  border-color: #5f9ea0;
}
.btn-pink:focus,
.btn-pink.focus {
  box-shadow: 0 0 0 0.2rem rgba(255, 105, 180, 0.5);
}
.btn-pink.disabled,
.btn-pink:disabled {
  background-color: pink;
  border-color: pink;
}
.btn-pink:not(:disabled):not(.disabled):active,
.btn-pink:not(:disabled):not(.disabled).active,
.show > .btn-pink.dropdown-toggle {
  background-color: #5f9ea0;
  border-color: #5f9ea0;
}

.text-black {
  color: #000000;
}

.bg-cadetblue {
  background-color: #5f9ea0;
  border-color: #5f9ea0;
}


</style>


  <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="{{asset('asset/img/ajm_logo.png')}}" width="60">
                </div>
                <div class="sidebar-brand-text mx-2">Sisbeng AJM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
            </li>


            <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder-open"></i>
                            <span>Data Master</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('user.index') }}"> Data User</a>
                        <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('pelanggan.index') }}"> Data Pelanggan</a>
                        <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('barang.index') }}"> Data Barang</a>
                        <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('akun.index') }}"> Data Akun</a>
                        <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('setting.transaksi') }}"> Setting Akun</a>

                    </div>
                </div>
                    </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                 <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('penjualan.transaksi') }}"> Penjualan </a>
                 <a class="collapse-item fas fa-arrow-circle-right" href="{{ route('pendapatan.transaksi') }}"> Pendapatan </a>
                    
                   

              
                    </div>
                </div>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
        <a class="nav-link" href="{{route('laporan.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-share"></i>
            <span>Logout</span></a>
        </li>
          
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" 
                data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    
                    
                    </div>
                </div>
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <div class="input-group-append">
                                <h4>BENGKEL ABECK JAYA MOTOR</h4>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-black border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
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
<!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{asset('asset/img/avatar2.png')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-dark-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Create By: @AJMBengkel <br>Copyright &copy; Ajm.co.id</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar aplikasi ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" apabila ingin keluar aplikasi</div>
                <div class="modal-footer">
                  <a class="btn btn-primary" href="{{ route('logout') }}" 
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/chart.js/Chart.min.js"></script>
    <script
src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>
    <script src="asset/js/demo/datatables-demo.js"></script>
</body>
@include('sweetalert::alert')
</html>