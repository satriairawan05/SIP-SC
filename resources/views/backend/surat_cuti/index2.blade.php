@extends('backend.layout.app')

@php
    $create = 0;
    $read = 0;
    $approval = 0;
    $update = 0;
    $delete = 0;
    $closing = 0;

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

            if ($r->action == 'Closed') {
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
            <li class="breadcrumb-item text-uppercase">Departemen {!! $departemen->departemen_name !!}
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
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
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
                                        <td>{{ \Carbon\Carbon::parse($s->sc_tgl_ambil_start)->isoFormat('DD MMMM YYYY') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($s->sc_tgl_ambil_end)->isoFormat('DD MMMM YYYY') }}
                                        </td>
                                        <td>{{ $s->sc_no_surat ?? 'Data surat belum tersedia' }}</td>
                                        <td>{{ $s->sc_jumlah_cuti ?? 'Data belum tersedia' }} Hari</td>
                                        <td>
                                            @if (
                                                $approval == 1 &&
                                                    \App\Models\Approval::where('sc_id', $s->sc_id)->where('user_id', auth()->user()->id)->where('app_ordinal', (int) $s->sc_approved_step)->first())
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target=".bd-example-modal-lg"><i
                                                        class="fa fa-bookmark-o"></i></button>

                                                <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1"
                                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Surat Cuti
                                                                    {{ $s->pic_name }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('surat_cuti.approval', $s->sc_id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-2">
                                                                            <label for="sc_disposisi">Disposisi <span
                                                                                    class="text-danger">*</span></label>
                                                                        </div>
                                                                        @php
                                                                            $disposisi = [['name' => 'Accepted'], ['name' => 'Rejected']];
                                                                        @endphp
                                                                        <div class="col-10">
                                                                            <select class="form-select form-select-sm"
                                                                                id="sc_disposisi" name="sc_disposisi">
                                                                                @foreach ($disposisi as $d)
                                                                                    @if (old('sc_disposisi') == $d['name'])
                                                                                        <option name="sc_disposisi"
                                                                                            value="{{ $d['name'] }}"
                                                                                            selected>
                                                                                            {!! $d['name'] !!}</option>
                                                                                    @else
                                                                                        <option name="sc_disposisi"
                                                                                            value="{{ $d['name'] }}">
                                                                                            {!! $d['name'] !!}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-2">
                                                                            <label for="sc_remark">Remark <span
                                                                                    class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <input type="text" name="sc_remark"
                                                                                id="sc_remark"
                                                                                class="form-control form-control-sm"
                                                                                value="{{ old('sc_remark') }}"
                                                                                placeholder="Ex: Okeee">
                                                                        </div>
                                                                    </div>
                                                                    @if ($closing == 1)
                                                                        <div class="row mt-3">
                                                                            <div class="col-2">
                                                                                <label for="sc_status">Closing <span
                                                                                        class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    value="{{ old('sc_status') }}"
                                                                                    id="sc_status">
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($s->sc_status != null)
                                            <button type="button" onclick="return printDoc({{ $s->sc_id }})"
                                                class="btn btn-sm btn-secondary"><i
                                                    class="fa fa-print"></i></button>
                                            @endif
                                            @if ($update == 1 && $s->pic_id == auth()->user()->id)
                                                <a href="{{ route('surat_cuti.edit', $s->sc_id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if ($delete == 1 && $s->pic_id == auth()->user()->id)
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sc_disposisi').select2({
                dropdownParent: $('#modal')
            });
        });

        const printDoc = (id) => {
            var contents = "";
            var url = "{{ route('surat_cuti.show', ':id') }}";
            url = url.replace(':id', id);
            $.get(url, function(data, status) {
                contents = data;
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({
                    "position": "absolute",
                    "top": "-1000000px"
                });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument
                    .document ?
                    frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                frameDoc.document.write(`
            <!DOCTYPE html>
            <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>{{ env('APP_NAME') }}</title>
                    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
                    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
                    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
                    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.ico') }}">
                </head>

                <body id='bodycontent'>`);
                frameDoc.document.write(contents);
                frameDoc.document.write(`
                </body>
            </html>`);
                frameDoc.document.close();
    </script>
@endsection
