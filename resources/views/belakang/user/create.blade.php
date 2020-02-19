@extends('layouts.backend.main')

{{-- @section('pageTitle') Create New User @endsection --}}

@section('content')
    <div class="col-md-12">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
            </div>

        <form 
            enctype="multipart/form-data" 
            class="bg-white shadow-sm p-3" 
            action="{{route('user.store')}}" 
            method="POST">

            @csrf

            <label for="name">Name</label>
                <input
                value="{{old('name')}}" 
                class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"
                placeholder="Full Name"
                type="text"
                name="name"
                id="name"/>
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>   
            <br>

            <label for="username">Username</label>
                <input
                value="{{old('username')}}" 
                class="form-control {{$errors->first('username') ? "is-invalid" : ""}}"
                placeholder="username"
                type="text"
                name="username"
                id="username"/>
                <div class="invalid-feedback">
                    {{$errors->first('username')}}
                </div>  
            <br>

            <label for="">Roles</label>
            <br>
            <div class="form-check form-check-inline">
                <input
                class="form-check-input {{$errors->first('roles') ? "is-invalid" : ""}}"
                type="checkbox"
                name="roles[]"
                id="ADMIN"
                value="ADMIN">
                <label class="form-check-label" for="ADMIN">Administrator</label>    
            </div>

            <div class="form-check form-check-inline">
                <input
                class="form-check-input {{$errors->first('roles') ? "is-invalid" : ""}}"
                type="checkbox"
                name="roles[]"
                id="STAFF"
                value="STAFF">
                <label class="form-check-label" for="STAFF">Staff</label>
            </div>

            <div class="form-check form-check-inline">
                <input
                class="form-check-input {{$errors->first('roles') ? "is-invalid" : ""}}"
                type="checkbox"
                name="roles[]"
                id="CUSTOMER"
                value="CUSTOMER">
                <label class="form-check-label" for="CUSTOMER">Customer</label>
            </div>
                
                <div class="invalid-feedback">
                    {{$errors->first('roles')}}
                </div>
            <br>

            <br>
            <label for="phone">Phone number</label>
            <br>
                <input
                value="{{old('phone')}}" 
                class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}"
                type="text"
                name="phone">
                <div class="invalid-feedback">
                    {{$errors->first('phone')}}
                </div>
            <br>

            <label for="address">Address</label>
                <textarea
                value="{{old('address')}}"
                name="address"
                id="address"
                class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">
                </textarea>
                <div class="invalid-feedback">
                    {{$errors->first('address')}}
                </div>
            <br>

            <label for="avatar">Avatar image</label>
            <br>
                <input
                id="avatar"
                name="avatar"
                type="file"
                class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}"> 
                <div class="invalid-feedback">
                    {{$errors->first('avatar')}}
                </div>

                <hr class="my-4">

            <label for="email">Email</label>
                <input
                value="{{old('email')}}"
                class="form-control {{$errors->first('email') ? "is-invalid" : ""}}"
                placeholder="user@mail.com"
                type="text"
                name="email"
                id="email"/>
                <div class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
            <br>

            <label for="password">Password</label>
                <input
                class="form-control {{$errors->first('password') ? "is-invalid" : ""}}"
                placeholder="password"
                type="password"
                name="password"
                id="password"/>
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
            <br>

            <label for="password_confirmation">Password Confirmation</label>
                <input
                class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}"
                placeholder="password confirmation"
                type="password"
                name="password_confirmation"
                id="password_confirmation"/>
                <div class="invalid-feedback">
                    {{$errors->first('password_confirmation')}}
                </div>
                
            <br>
                <input
                class="btn btn-primary"
                type="submit"
                value="Save"/>
        </form>
        </div>
    </div>
@endsection