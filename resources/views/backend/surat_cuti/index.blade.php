@extends('backend.layout.app')

@php
    $create = 0;
    $read = 0;
    $approval = 0;
    $update = 0;
    $delete = 0;

    foreach ($pages as $r) {
        if ($r->action == 'Create') {
            $create = $r->access;
        }

        if ($r->action == 'Read') {
            $read = $r->access;
        }

        if ($r->action == 'Approval') {
            $approval = $r->access;
        }

        if ($r->action == 'Update') {
            $update = $r->access;
        }

        if ($r->action == 'Delete') {
            $delete = $r->access;
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
                    {{-- <div class="list-group">
                        @foreach ($departemen as $d)
                            <a href="?departemen_id={!! $d->departemen_id !!}"
                                class="list-group-item list-group-item-action">{{ $d->departemen_name }}</a>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
