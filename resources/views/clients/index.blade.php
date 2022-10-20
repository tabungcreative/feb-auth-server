@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

        <a href="{{ route('client.create') }}" class="btn btn-primary my-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Client
        </a>

        <div class="card border-0 shadow">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Client</th>
                            <th scope="col">Client Id</th>
                            <th scope="col">Client Secret</th>
                            <th scope="col">Redirect</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->secret }}</td>
                                <td>{{ $item->redirect }}</td>
                                <td class="d-flex">
                                    <form method="POSt" action="{{ route('client.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-info btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                    <a href="{{ route('client.edit', $item->id) }}" class="btn btn-success ml-2 btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
