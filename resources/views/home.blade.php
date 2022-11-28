@extends('layouts.app')

@section('style')
    <style>
        .card-custom:hover {
            transform: translateX()
        }
    </style>
@endsection

@section('content')

    <div class="row d-flex justify-content-center align-items-center flex-column mt-5">
        <img src="https://is3.cloudhost.id/storage-feb/logo-feb.png" class="img-fluid rounded" width="200px" alt="image-profile">
        <h5 class="font-weight-bold text-gray-900 mt-3">Selamat datang, {{ Auth::user()->name }}</h5>
        <p>Manage your info, privacy, and security to make Faculty work better for you.</p>
    </div>
    <!-- Page Heading -->
    <h4 class="mb-4 text-gray-900">
        <i class="fas fa-fw fa-desktop"></i>
        Daftar Aplikasi Tersedia
    </h4>

    <div class="row">

        @can('manage-ebfis')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://ebfis.feb-unsiq.ac.id/dashboard" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-ebfis.png" class="card-img-top py-2" alt="logo-ebfis">
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('manage-difisy')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://difisy.feb-unsiq.ac.id/dashboard" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-difisy.png" class="card-img-top py-2" alt="logo-difisy">
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('manage-digilib')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://digilib.feb-unsiq.ac.id/admin/dashboard" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-digilib.png" class="card-img-top py-2" alt="logo-digilib">
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('manage-diaregsy')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://diaregsy.feb-unsiq.ac.id/admin/dashboard" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-diaregsy.png"class="card-img-top py-2" alt="logo-diaregsi">
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('manage-pedoma')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://pedoma.feb-unsiq.ac.id/" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-pedoma.png" class="card-img-top py-2" alt="logo-pedoma">
                    </div>
                </div>
            </a>
        </div>
        @endcan

        @can('manage-spmi')
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="https://espmi.feb-unsiq.ac.id/home" class="nav-link card-custom" target="_blank">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/logo-sistem/logo-spmifeb.png" class="card-img-top py-2" alt="logo-spmi">
                    </div>
                </div>
            </a>
        </div>
        @endcan
    </div>

@endsection
