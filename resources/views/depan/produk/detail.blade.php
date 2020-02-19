@extends('layouts.frontend.content')

@section('content')
    <div class="blog section section py-5">
        <div class="container py-4">
            <div class="row">
                <h3>{{$title}}</h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="py-2">
                    <div class="col sm-5 md-6 lg-4">
                        <img class="card-img-top" src="{{asset('storage/'.$produkdetail->image)}}" style="max-height:100%;max-width:100%;margin-top:0px;">
                    </div>
                </div>
                <div class="col sm-7 md-6 lg-8">
                    <h4 class="category text-info">{{$produkdetail->nama_produk}}</h4>
                    <h6 class="card-title text-warning">Rp. {{$produkdetail->harga}},-</h6>
                    {{-- <p class="card-text">{!!substr($produkdetail->description, 0, 180)!!} </p> --}}
                    <p class="card-text"{!!$produkdetail->description!!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection