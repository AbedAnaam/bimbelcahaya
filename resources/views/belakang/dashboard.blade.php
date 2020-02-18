@extends('layouts.backend.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <a href="{{route('jenjang.index')}}" class="d-block" style="text-decoration: none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">jenjang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jenjang}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-signal fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <a href="{{route('kelas.index')}}" class="d-block" style="text-decoration: none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kelas}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    {{-- <a href="{{route('kelas.index')}}" class="d-block" style="text-decoration: none"> --}}
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mata Pelajaran</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$kelas}}</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>                    
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    {{-- <a href="{{route('kelas.index')}}" class="d-block" style="text-decoration: none"> --}}
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Soal</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$kelas}}</div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    </a>
                </div>                    
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 m-6 s-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang {{Auth::user()->username}}</h6>
                </div>
                <div class="card-body">
                Halo {{Auth::user()->username}} atau {{Auth::user()->name}}<br> 
                Anda sudah login sebagai {{Auth::user()->roles}} <br>
                Email Anda : <b>{{Auth::user()->email}}</b>
                </div>
            </div>
        </div>
    </div>
@endsection