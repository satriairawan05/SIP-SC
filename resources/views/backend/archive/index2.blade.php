@extends('backend.layout.app')

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('archive') }}">{{ $name }}</a>
            </li>
            <li class="breadcrumb-item text-uppercase">DEPARTEMEN {!! $departemen->departemen_name !!}
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table-bordered table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal Surat</th>
                            <th>Nomor Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($surat as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>Tanggal Surat</td>
                            <td>Nomor Surat</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
