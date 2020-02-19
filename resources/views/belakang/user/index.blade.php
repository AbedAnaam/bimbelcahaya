@extends('layouts.backend.main')

{{-- @section('pageTitle') Users List @endsection --}}

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form action="{{route('user.index')}}">
        <div class="row">
            <div class="col-lg-6 md-6 sm-3">
                <input
                    value="{{Request::get('keyword')}}"
                    name="keyword"
                    class="form-control"
                    type="text"
                    placeholder="Masukan email untuk filter..."/>
            </div>
            <div class="col-lg-6 md-6 sm-3">
                <div class="form-check form-check-inline">
                    <input {{Request::get('status') == 'ACTIVE' ? 'checked' : ''}}
                        value="ACTIVE"
                        name="status"
                        type="radio"
                        class="form-check-input"
                        id="active">
                    <label class="form-check-label" for="active">Active</label>
                </div>

                <div class="form-check form-check-inline">
                    <input {{Request::get('status') == 'INACTIVE' ? 'checked' : ''}}
                        value="INACTIVE"
                        name="status"
                        type="radio"
                        class="form-check-input"
                        id="inactive">
                    <label class="form-check-label" for="inactive">Inactive</label>
                </div>

                <input
                    type="submit"
                    value="Filter"
                    class="btn btn-info btn-sm">
            </div>
        </div>
    </form>
    
    <br>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
            <a href="{{route('user.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Username</b></th>
                        <th><b>Email</b></th>
                        <th><b>Avatar</b></th>
                        <th><b>Roles</b></th>
                        <th><b>Status</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->avatar)
                                    <img src="{{asset('storage/'.$user->avatar)}}" width="70px">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{$user->roles}}</td>
                            <td>
                                @if($user->status == "ACTIVE")
                                    <span class="badge badge-success">
                                        {{$user->status}}
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        {{$user->status}}
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{-- <a class="btn btn-info text-white btn-sm" href="{{route('user.edit', ['id' => $user->id])}}">Edit</a> --}}
                                <a class="btn btn-info text-white btn-sm" href="{{route('user.edit', $user->id)}}">Edit</a>
                                
                                <a href="{{route('user.show', $user->id)}}" class="btn btn-primary btn-sm">Detail</a>
                                
                                <form onsubmit="return confirm('Delete this user permanently?')"
                                    class="d-inline"
                                    action="{{route('user.destroy', $user->id )}}"
                                    method="POST">
                                    @csrf
                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="DELETE">
                                    <input
                                        type="submit"
                                        value="Delete"
                                        class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan=10>
                            {{$users->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection