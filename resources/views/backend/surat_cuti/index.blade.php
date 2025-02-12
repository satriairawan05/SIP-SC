@extends('backend.layout.app')

@php
    $read = 0;

    foreach ($pages as $r) {
        if ($r->page_name == 'Surat Cuti') {
            if ($r->action == 'Read') {
                $read = $r->access;
            }
        }
    }
@endphp

@section('bradcrumb')
    <div class="col-md-4">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('surat_cuti.index') }}">{{ $name }}</a>
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($read == 1)
                        <div class="list-group">
                            @foreach ($departemen as $d)
                                @php
                                    $scCount = \App\Models\SuratCuti::leftJoin('approvals','surat_cutis.sc_id','=','approvals.sc_id')->where('approvals.user_id',auth()->user()->id)->whereNull('approvals.app_date')->where('surat_cutis.departemen_id', $d->departemen_id)->count();
                                @endphp
                                <a href="?departemen_id={!! $d->departemen_id !!}"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">{{ $d->departemen_name }}
                                    <span
                                        class="badge rounded-pill @if ($scCount == 0) bg-secondary @else bg-primary @endif">
                                        {{ $scCount == 0 ? 'Empty Data' : $scCount }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
