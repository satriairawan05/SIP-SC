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
                                <th>No</th>
                                <th>Pic</th>
                                <th>Penyerahan Tanggung Jawab</th>
                                <th>Tanggal Surat</th>
                                <th>Nomor Surat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->pic_name }}</td>
                                    <td>{{ $s->pt_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</td>
                                    <td>{{ $s->sc_no_surat }}</td>
                                    <td>
                                        <a href="{{ route('surat_cuti.show', $s->sc_id) }}"class="btn btn-sm btn-secondary"
                                            target="__blank"><i class="fa fa-print"></i></a>
                                        {{-- <button type="button" onclick="return printDoc({{ $s->sc_id }})"
                                            class="btn btn-sm btn-secondary"><i class="fa fa-print"></i></button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const printDoc = (id) => {
            const url = "{{ route('surat_cuti.show', ':id') }}";

            $.get(url, function(data, status) {
                const contents = data;

                const frame1 = $('<iframe />', {
                    name: 'frame1',
                    css: {
                        position: 'absolute',
                        top: '-1000000px'
                    }
                });

                $('body').append(frame1);

                const frameDoc = frame1[0].contentDocument || frame1[0].contentWindow.document;
                frameDoc.open();
                frameDoc.write(`
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>${process.env.APP_NAME}</title>
                <link rel="apple-touch-icon" sizes="180x180" href="${asset('images/apple-touch-icon.png')}">
                <link rel="icon" type="image/png" sizes="32x32" href="${asset('images/favicon-32x32.png')}">
                <link rel="icon" type="image/png" sizes="16x16" href="${asset('images/favicon-16x16.png')}">
                <link rel="icon" type="image/png" sizes="16x16" href="${asset('images/favicon.ico')}">
            </head>
            <body id='bodycontent'>
                ${contents}
            </body>
            </html>
        `);
                frameDoc.close();

                setTimeout(function() {
                    window.frames['frame1'].focus();
                    window.frames['frame1'].print();
                    frame1.remove();
                }, 1000);
            });
        };
    </script>
@endsection
