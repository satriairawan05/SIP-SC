@extends('backend.layout.app')

@section('bradcrumb')
    <div class="row align-items-center">
        <div class="col-md-8">
            <div class="page-header-title">
                <h5 class="m-b-10">Dashboard</h5>
                <p class="m-b-0">Sistem Informasi Pengajuan Surat Cuti Berbasis
                    Web</p>
            </div>
        </div>
        <div class="col-md-4">
            <ul class="breadcrumb-title">
                <li class="breadcrumb-item">
                    <a href="#"> <i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item"><a href="#">{{ $name }}</a>
                </li>
            </ul>
        </div>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4 text-bold text-center">Selamat Datang, Dina Minarti </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
