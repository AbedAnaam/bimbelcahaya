@extends('layouts.frontend.content')

@section('content')
    <div class="blog section section py-5">
        <div class="container">
            <div class="py-2">
                <div class="row">
                    <h3>{{$title}}</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($produklist as $produklist)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{asset('storage/'.$produklist->image)}}" style="max-height:200px;max-width:100%;margin-top:0px;">
                        <div class="card-body">
                            <h4 class="category text-info">{{$produklist->nama_produk}}</h4>
                            <hr>
                            <h6 class="card-title text-warning">Rp. {{$produklist->harga}},-</h6>
                            <p class="card-text">{!! substr($produklist->description, 0, 180) !!} </p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning btn-square" href={{url('produk',$produklist->id)}}>Baca Selengkapnya &rarr;</a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection