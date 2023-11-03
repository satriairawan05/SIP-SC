@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ $name }}</a>
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-blue">200</h4>
                            <h6 class="text-muted m-b-0">Total Surat Curi</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-file-archive-o f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-red">120</h4>
                            <h6 class="text-muted m-b-0">Surat Cuti Menunggu Persetujuan</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-file-text f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-green">80</h4>
                            <h6 class="text-muted m-b-0">Surat Cuti yang Disetujui</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-file-pdf-o f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-blue">500</h4>
                            <h6 class="text-muted m-b-0">Total Users</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-users f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- task, page, download counter  End -->
        <!-- page welcome -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="h4 text-bold text-center">Selamat Datang, {{ auth()->user()->name }}.</h1>
                </div>
            </div>
        </div>
        <!-- page welcome -->
    </div>
@endsection
