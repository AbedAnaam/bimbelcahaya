@extends('layouts.backend.main')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            @if(count($kelas) > 1)
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Mata Pelajaran</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach($kelas->all() as $kls)
                <tbody>
                    <tr>
                        <th scope="row">{{ $kls->id }}.</th>
                        <td>
                            <div class="text-sm font-weight mb-0">Mata Pelajaran {{$kls->nama_kelas}} </div>
                        </td>
                        <td>
                            <a class="btn btn-sm text-dark btn-warning" href="{{route('mapel.show',$kls->id)}} ">
                                Lihat Detail <i class="fas fa-chevron-circle-right fa-sm text-dark-50"></i> 
                            </a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            
            @else
                <div class="alert alert-info">
                    <span><b> MAAF -  </b> DATA MAPEL TIDAK DITEMUKAN</span>
                </div>  
            @endif
        </div>
    </div>
@endsection