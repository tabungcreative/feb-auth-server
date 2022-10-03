@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h3>
                <i class="fas fa-boxes fa-lg"></i>
                Menu</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex flex-wrap justify-content-start">
            <div class="card m-2 border-0 shadow-sm item-menu" style="width: 12rem">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="icon-menu">
                            <i class="fas fa-users fa-5x"></i>
                        </div>
                        <h3 class="fw-bold pt-3">Users</h3>
                    </div>
                </a>
            </div>
            @canany(['super-admin', 'dev'])
            <div class="card m-2 border-0 shadow-sm item-menu" style="width: 12rem">
                <a href="" class="nav-link">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div class="icon-menu">
                            <i class="fa-solid fa-key fa-5x"></i>
                        </div>
                        <h3 class="fw-bold pt-3">Oauth Client</h3>
                    </div>
                </a>
            </div>
            <div class="card m-2 border-0 shadow-sm item-menu" style="width: 13rem">
                    <a href="{{ route('role.index') }}" class="nav-link">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fas fa-shield-alt fa-5x"></i>
                            <h3 class="fw-bold pt-3">Roles</h3>
                        </div>
                    </a>
                </div>
            @endcanany
        </div>
    </div>
</div>
@endsection
