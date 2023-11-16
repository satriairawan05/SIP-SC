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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($surat as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($s->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</td>
                            <td>{{ $s->sc_no_surat }}</td>
                            <td>
                                <a href="{{ route('surat_cuti.show',$s->sc_id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></a>
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
