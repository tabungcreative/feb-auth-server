@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/home" class="btn btn-info">Kembali</a>
            <button type="button" class="btn btn-primary my-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah role
            </button>

            <div class="card border-0 shadow">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)    
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        {{-- {{ $item->roles()->get() }} --}}
                                        @foreach($item->roles as $role)
                                            <label class="">{{ $role->role }},</label>
                                        @endforeach
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" class="btn btn-success btn-sm">Generate Password</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('roles.modal')
@endsection
