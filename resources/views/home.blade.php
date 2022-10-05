@extends('layouts.app')

@section('style')
    <style>
        .card-custom:hover {
            transform: translateX()
        }
    </style>
@endsection

@section('content')

    <div class="row d-flex justify-content-center align-items-center flex-column">
        <img src="https://is3.cloudhost.id/storage-feb/logo-feb.png?AWSAccessKeyId=F81RYXGH1N5R4MWUVBP9&Expires=1664934960&Signature=tkXQtLWxTRINqAdcLDng79yhUiQ%3D" class="img-fluid rounded" width="200px" alt="image-profile">
        <h5 class="font-weight-bold text-gray-900 mt-3">Welcome, {{ Auth::user()->name }}</h5>
        <p>Manage your info, privacy, and security to make Faculty work better for you.</p>
    </div>
    <!-- Page Heading -->
    <h4 class="mb-4 text-gray-900">
        <i class="fas fa-fw fa-desktop"></i>
        Daftar Aplikasi Tersedia
    </h4>

    <div class="row">
       
        <div class="col-xl-3 col-md-6 mb-4">
                <a href="" class="nav-link card-custom">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/assets/logo/logo-difisy.png?AWSAccessKeyId=F81RYXGH1N5R4MWUVBP9&Expires=1664933857&Signature=MuEiv9AjsXDFiK0YNFvmEoQEzxw%3D" class="card-img-top py-2" alt="logo-ebfis">
                        <p class="card-text text-gray-800 mt-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
                <a href="" class="nav-link card-custom">
                <div class="card border-left-primary shadow h-100 py-2" style="width: 18rem;">
                    <div class="card-body">
                        <img src="https://is3.cloudhost.id/storage-feb/assets/logo/logo-digilib.png?AWSAccessKeyId=F81RYXGH1N5R4MWUVBP9&Expires=1664934012&Signature=lWMShpN%2Bzm2RUVqUBweGfG6J%2Fv4%3D" class="card-img-top" alt="logo-ebfis">
                        <p class="card-text text-gray-800 mt-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        
    </div>

@endsection
