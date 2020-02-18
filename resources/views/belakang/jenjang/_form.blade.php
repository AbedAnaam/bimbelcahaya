{{-- <div class="form-group">
    <div class="form-group">
        {!! Form::label('nama_produk', 'Nama Produk', ['class'=>'col-sm-6 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::text('nama_produk', null, ['class'=>'form-control' . ($errors->first('nama_produk') ? "is-invalid" : ""),
            'placeholder'=>'Masukkan nama produk']) !!}
            <div class="invalid-feedback">
                {{$errors->first('nama_produk')}}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Image', ['class'=>'col-sm-2 control-label']) !!}
        
        <div class="col-sm-12">
            <div class="input-group">
                {!! Form::file('image', ['class'=>'form-control' . ($errors->first('image') ? "is-invalid" : ""),
                'id'=>'image' ]) !!}
            </div>
            <div class="invalid-feedback">
                {{$errors->first('image')}}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('harga', 'Harga', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::text('harga', null, ['class'=>'form-control' . ($errors->first('harga') ? "is-invalid" : ""),
            'placeholder' => 'Masukkan harga']) !!}
            <div class="invalid-feedback">
                {{$errors->first('harga')}}
            </div>
        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('description', 'Description', ['class'=>'col-sm-6 control-label']) !!}
        <div class="col-sm-12">
            {!! Form::textarea('description', null, ['class'=>'form-control'. ($errors->first('harga') ? "is-invalid" : ""),
            'placeholder'=>'Deskripsi Produk'])
            !!}
            <div class="invalid-feedback">
                {{$errors->first('description')}}
            </div>
        </div>
    </div>
</div>
    
{!! Form::hidden('author', Auth::user()->name) !!}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
        {!! Form::button('Batal', ['class'=>'btn btn-danger']) !!}
    </div>
</div> --}}