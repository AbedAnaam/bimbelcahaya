@extends('layouts.frontend.main')

@section('content')
{{-- -- Ini Kalau Mau Pakai Bulma -- --}}
<section class="hero is-small is-warning is-bold">
    <div class="hero-body">
    <div class="container">
        <h1 class="title">
        LAMAN DAFTAR SOAL
        </h1>
        <h2 class="subtitle">
        TAMPILANNYA BERUPA TABEL SAJA - soal.index
        </h2>
    </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <nav class="breadcrumb has-succeeds-separator" aria-label="breadcrumbs">
            <ul>
                @foreach($soal->all() as $jenjang)
                    <li><a href="{{url('/')}}">Jenjang</a></li>
                    <li><a href="{{url('jenjang', $jenjang->id)}}">Kelas</a></li>
                    <li><a href="{{url('kelas', $jenjang->id)}}">Mapel</a></li>
                @endforeach
                    <li class="is-active"><a href="{{url('soal')}}" aria-current="page">Soal</a></li>
            </ul>
        </nav>
    </div>

    <br>

    @foreach($soal->all() as $jenjang)
    <div class="container">
        <div class="columns is-mobile">
                <div class="column is-one-third">
                    <div class="uk-animation-toggle" tabindex="0">
                        <div class="uk-card uk-card-default uk-card-body uk-animation-fade is-link">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-128x128">
                                        <img src="{{asset('storage/'.$jenjang->gambar_soal)}}" alt="Gambar Soal">
                                        </figure>
                                    </div>

                                    <div class="media-content">
                                        <p class="title is-4">{{$jenjang->nama_soal}}</p>
                                        <p class="subtitle is-6">{!! $jenjang->deskripsi_soal !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <footer class="footer">
        <div class="content has-text-centered">
            <p>
            <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>

    {{-- -- Ini kalau pakai bootstrap -- --}}
    
@endsection