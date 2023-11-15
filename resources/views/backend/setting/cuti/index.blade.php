@extends('backend.layout.app')

@php
    $create = 0;
    $read = 0;
    $update = 0;
    $delete = 0;

    foreach ($pages as $r) {
        if ($r->action == 'Create') {
            $create = $r->access;
        }

        if ($r->action == 'Read') {
            $read = $r->access;
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
            <li class="breadcrumb-item"><a href="{{ route('cuti.index') }}">{{ $name }}</a>
            </li>
        </ul>
    </div>
@endsection

@section('app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($create == 1)
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('cuti.create') }}" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                @endif
                @if($read == 1)
                <div class="card-body">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuti as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->cuti_jenis }}</td>
                                    <td>{{ $c->cuti_jumlah }}</td>
                                    <td>
                                    @if($edit == 1)
                                        <a href="{{ route('cuti.edit', $c->cuti_id) }}" class="btn btn-sm btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                    @endif
                                    @if($delete == 1)
                                        <form action="{{ route('cuti.destroy', $c->cuti_id) }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
