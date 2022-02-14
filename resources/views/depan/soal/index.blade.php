@extends('layouts.frontend.main')

@section('navbar')
    <div class="navbar-start">
        <div class="navbar-item has-dropdown is-hoverable">
            @if($join->all() == null)

            @else
            <a class="navbar-link">
                List Mapel 
            </a>
            <div class="navbar-dropdown">
                @foreach ($join->all() as $soal)
                    <a class="navbar-item" href="" style="text-decoration:none; color:black">
                        {{$soal->nama_soal}}
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection

@section('content')
    <section class="hero is-small is-info is-bold">
        <div class="hero-body">
            <div class="container">
                @if($join->all() == null)
                    <h1 class="title">
                        Daftar Soal
                    </h1>
                    <h2 class="subtitle">
                        Yah... Belum ada datanya nih
                    </h2>
                @else
                <h1 class="title">
                    Halaman Daftar Soal 
                </h1>
                <h2 class="subtitle">
                    Klik pada kolom aksi ya guys :)
                </h2>
                @endif
            </div>
        </div>
    </section>

    @if($join->all()  == null)
        <div class="container pt-5">
        </div>
    @else
    <div class="container pt-5">
        <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
            <ul>
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href= @foreach($join->all() as $bca) "{{url('jenjang', $bca->jenjang_id)}}" @endforeach>Kelas</a>
                </li>
                <li>
                    <a href= @foreach($join->all() as $bcb) "{{url('kelas', $bcb->kelas_id)}}" @endforeach>Mata Pelajaran</a>
                </li>
                <li class="is-active">
                    <a href="#" aria-current="page">Soal</a>
                </li>
            </ul>
        </nav>
    </div>
    @endif

    <section class="hero is-small">
        <div class="hero-body">
            <div class="container py-3">
            @if($join->all() == null)
                <div class="columns is-2 is-multiline is-mobile">
                    <div class="column is-info is-light">
                        <article class="message is-info">
                            <div class="message-header">
                                Info
                            </div>
                            <div class="message-body">
                                Mohon maaf, soal untuk mapel ini belum dilakukan update oleh admin. Bantu ingatkan admin ya, guys :)
                            </div>
                        </article>
                    </div>
                    <div class="column is-one-quarter">
                        <div class="box has-background-white-bis">
                            <div class="content is-normal">
                                <h2>Link Terkait</h2>
                                <p>Silakan klik <strong>link</strong> berikut untuk menuju ke halaman lainnya</p>
                            </div>
                            <aside class="menu">
                                <p class="menu-list subtitle is-6 has-text-justified">
                                    <a href="{{url('/')}}" class="has-text-link-dark" style="text-decoration:none">Home</a>
                                    @foreach($join->all() as $link)
                                        <a href="{{url('mapel', $link->id)}}" class="has-text-link-dark" >
                                            {{ $link->nama_soal }}
                                        </a>
                                    @endforeach
                                </p>
                            </aside>
                        </div>
                    </div>
                @else
                <div class="columns">
                    <div class="block">
                        <table class="table is-striped is-bordered is-hoverable is-fullwidth">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Soal</th>
                                    <th>Tingkat</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>File Soal / Materi</th>
                                    <th>Deskripsi Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($join->all() as $soal)
                                <tr>
                                    <th> # </th>
                                    <td>{{ $soal->nama_soal }}</td>
                                    <td> {{ $soal->nama_jenjang }}</td> 
                                    <td> {{ $soal->nama_kelas }}</td> 
                                    <td> {{ $soal->nama_mapel }}</td>
                                    
                                    <td>{{ $soal->isi_soal }}</td>
                                    <td>{!! $soal->deskripsi_soal !!}</td>
                                    <td>
                                        <a href="{{url('uploads/soal/'.$soal->isi_soal) }}" class="btn btn-warning btn-md">
                                            <i class="fa fa-file-download"></i> Download
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <nav class="pagination is-right" role="navigation" aria-label="pagination">
                            <a class="pagination-previous">Previous</a>
                            <a class="pagination-next">Next page</a>
                            <ul class="pagination-list">
                                <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                                <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                                <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>
                                <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection