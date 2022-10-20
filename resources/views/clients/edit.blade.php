@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
            <a href="{{ route('user.index') }}" class="btn btn-success mb-2">Kembali</a>
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Client</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('client.update', $client->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Redirect</label>
                            <input type="text" class="form-control" name="redirect" value="{{ $client->redirect }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Client</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
