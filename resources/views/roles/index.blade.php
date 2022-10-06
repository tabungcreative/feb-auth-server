@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)    
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $item->role }}</td>
                                <td>@mdo</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @canany(['dev','super-admin'])
    <div class="col-md-6">
        <div class="card border-0 shadow">
            <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Role</label>
                    <input type="text" name="role" class="form-control" placeholder="Role">
                </div>
                <button type="submit" class="btn btn-primary"> Tambah</button>
            </form>
            </div>
        </div>
    </div>
    @endcanany
</div>
@endsection
