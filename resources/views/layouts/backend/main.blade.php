<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bimbel Cahaya - Admin</title> <!-- Custom fonts for this template-->
    <link href="{{asset('js/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    {{-- <link href="{{ asset('css/polished/dist/polished.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/polished/dist/iconic/css/open-iconic-bootstrap.min.css')}}" rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    <link href="{{asset('css/backend/sb-admin-2.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
  
  </head>
  
  <body id="page-top">
  
    <!-- Page Wrapper -->
    <div id="wrapper">
  
      @include('layouts.backend.sidebar')
  
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column" @if(!Auth::check())  @endif>
        @if(Auth::check())
          @include('layouts.backend.topbar')
        @endif
        <!-- Main Content -->
        <div id="content">
        
          <!-- Begin Page Content -->
          <div class="container-fluid">
  
            <!-- Page Heading -->
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
              <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div> --}}

            {{-- @if (session('info'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-right:30px;"><span aria-hidden="true">&times;</span></button>
                    {{ session('info') }}
                </div>
            @endif --}}
              <!-- Content Row -->
              {{-- <div class="row"> --}}
                @yield('content')
              {{-- </div> --}}
            </div>
          </div>
          @include('layouts.backend.footer')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{asset('js/backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/backend/sb-admin-2.min.js')}}"></script>

    {{-- <script src="https://cdn.tiny.cloud/1/ygzvdp0phv6jr11j2u9mbmg16wb8t73w5c2rb19la63ko55b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

    <script src="{{ asset('js/backend/tinymce/tinymce.min.js') }}"></script>
    @yield('scripts')
  
  </body>  
</html>
  