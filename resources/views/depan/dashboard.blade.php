@extends('layouts.frontend.main')

@section('content')
    <div id="our-services" class="our-services section-invert py-1" style="opacity: 1">
        <h3 class="section-title text-center my-3">Database Soal Bimbel</h3>
        <!-- Features -->
        <div class="features py-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="feature py-4 col-md-6 d-flex">
                    <div class="icon text-warning mr-3"><i class="fa fa-paint-brush"></i></div>
                    <div class="px-4">
                        <h5>Profile</h5>
                        {{-- @foreach ($profiles as $profile)
                            <p>{!! $profile->deskripsi_profile !!}</p>
                        @endforeach --}}
                        <p>Detail profile usaha Kami dapat Anda lihat dengan men-klik link di bawah ini</p>
                        <a class="btn btn-warning btn-sm" href="{{url('profile')}}">Selengkapnya &rarr;</a>
                    </div>
                </div>
                <div class="feature py-4 col-md-6 d-flex">
                    <div class="icon text-warning mr-3"><i class="fa fa-code"></i></div>
                    <div class="px-4">
                        <h5>Produk Kami</h5>
                        <p>Detail produk usaha Kami dapat Anda lihat dengan men-klik link di bawah ini</p>
                        <a class="btn btn-warning btn-sm" href="{{url('produk')}}">Selengkapnya &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="feature py-4 col-md-6 d-flex">
                <div class="icon text-warning mr-3"><i class="fa fa-font"></i></div>
                <div class="px-4">
                    <h5>Resep</h5>
                    <p>Detail daftar resep Kami dapat Anda lihat dengan men-klik link di bawah ini</p>
                    <a class="btn btn-warning btn-sm" href="{{url('resep')}}">Selengkapnya &rarr;</a>
                </div>
            </div>
            <div class="feature py-4 col-md-6 d-flex">
                <div class="icon text-warning mr-3"><i class="fa fa-support"></i></div>
                <div class="px-4">
                    <h5>Testimonial</h5>
                    <p>Detail testimonial dari pelanggan usaha Kami dapat Anda lihat dengan men-klik link di bawah ini</p>
                    <a class="btn btn-warning btn-sm" href="{{url('testimonial')}}">Selengkapnya &rarr;</a>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- / Features -->
    </div>

    <!-- Our Blog Section -->
    <div class="blog section section py-4">
        <h3 class="section-title text-center m-5">Daftar Produk Kami</h3>

        <div class="container">
            <div class="py-4">
                <div class="row">
                    <div class="owl-carousel owl-theme">
                        @foreach($produks as $produk)
                        <div class="item">
                            <div class="card-deck">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card mb-4">
                                        <img class="card-img-top" src="{{asset('storage/'.$produk->image)}}" style="max-height:200px;max-width:100%;margin-top:0px;">
                                        <div class="card-body">
                                            <h4 class="category text-info">{{$produk->nama_produk}}</h4>
                                            <h6 class="card-title text-warning">Rp. {{$produk->harga}},-</h6>
                                            <p class="card-text">{!! substr($produk->description, 0, 180) !!} </p>
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-outline-warning btn-pill btn-sm" href={{url('produk',$produk->id)}}>Selengkapnya &rarr;</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Our Blog Section -->

    <!-- Testimonials Section -->
    <div class="testimonials section-invert py-4">
        <h3 class="section-title text-center m-5">Testimonials Produk</h3>
        <div class="container py-4">
            <div class="row">
                @foreach($testimonials as $testimoni)
                <div class="col-md-4 testimonial text-center">
                    <div class="avatar rounded-circle with-shadows mb-3 ml-auto mr-auto">
                        <img src="{{asset('storage/'.$testimoni->image_testi)}}" style="max-height:100%;max-width:100%;margin-top:0px;" alt="Testimonial Avatar" />
                    </div>
                    <h5 class="mb-1">{{$testimoni->nama_testi}}</h5>
                    <span class="text-muted d-block mb-2">Pelanggan</span>
                    <p>{!! $testimoni->deskripsi_testi !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- / Testimonials Section -->
@endsection