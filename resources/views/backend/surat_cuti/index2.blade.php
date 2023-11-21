@extends('backend.layout.app')

@php
    $create = 0;
    $read = 0;
    $approval = 0;
    $update = 0;
    $delete = 0;

    foreach ($pages as $r) {
        if ($r->page_name == 'Surat Cuti') {
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
                    @if ($read == 1)
                        <table class="table-bordered table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pic</th>
                                    <th>Penyerahan Tanggung Jawab</th>
                                    <th>Tanggal Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Jumlah Cuti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cuti as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->pic_name }}</td>
                                        <td>{{ $s->pt_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($s->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</td>
                                        <td>{{ $s->sc_no_surat ?? 'Data surat belum tersedia' }}</td>
                                        <td>{{ $s->sc_jumlah_cuti ?? 'Data belum tersedia' }} Hari</td>
                                        <td>
                                            <a href="{{ route('surat_cuti.show',$s->sc_id) }}" class="btn btn-sm btn-secondary" target="__blank"><i class="fa fa-print"></i></a>
                                            @if ($update == 1)
                                                <a href="{{ route('surat_cuti.edit', $s->sc_id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if ($delete == 1)
                                                <form action="{{ route('surat_cuti.destroy', $s->sc_id) }}" method="post"
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
