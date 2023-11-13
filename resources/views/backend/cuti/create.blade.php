@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('cuti.index') }}">{{ $name }}</a>
            </li>
            <li class="breadcrumb-item">Create
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
