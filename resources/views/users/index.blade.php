@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

        <a href="{{ route('user.create') }}" class="btn btn-primary my-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah User
        </a>

        @if($refund = Session::has('password-show'))
            <div class="alert alert-warning">
                Berhasil generate password user ({{ Session::get('user')->name }}), <br>
                <b>Password  : {{ Session::get('user')->password }} </b>,<br>
                Password hanya akan ditampilan 1 kali !!. copy password agar tidak lupa ya
            </div>
        @endif

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
                                <th scope="row">{{ $loop->iteration + $data->firstItem() - 1}}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    {{-- {{ $item->roles()->get() }} --}}
                                    @foreach($item->roles as $role)
                                        <span class="badge badge-info">{{ $role->role }} </span><br>
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="{{ route('user.edit', ['id' => $item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form method="post" action="{{ route('user.delete', $item->id ) }}" onsubmit="return confirm('Konfirmasi Hapus Data . !!')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-3 my-3">
                    {{ $data->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
