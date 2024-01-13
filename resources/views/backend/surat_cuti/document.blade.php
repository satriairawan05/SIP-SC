<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="asset('images/apple-touch-icon.png')">
    <link rel="icon" type="image/png" sizes="32x32" href="asset('images/favicon-32x32.png')">
    <link rel="icon" type="image/png" sizes="16x16" href="asset('images/favicon-16x16.png')">
    <link rel="icon" type="image/png" sizes="16x16" href="asset('images/favicon.ico')">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        :root {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        .tebal {
            display: block;
            border-bottom: 5px solid #000;
        }

        .page-break {
            page-break-before: always;
            page-break-after: always;
        }

        .page-break-before {
            page-break-before: always;
        }

        .page-break-after {
            page-break-after: always;
        }

        .border-keliling {
            border: 2px solid black;
        }

        .border-keliling-cov {
            border: 3px solid black;
        }

        .border-keliling-bold {
            border: 4px solid black;
        }

        .bort {
            border-top: 2px solid black;
            width: 100%;
        }

        .verikal-center {
            border-left: 2px solid black;
            height: 100px;
            width: 2px;
        }

        .verikal-center-bottom {
            border-left: 2px solid black;
            height: 115px;
            width: 2px;
        }

        .verikal-center-mini {
            border-left: 3px solid black;
            height: 48px;
            width: 2px;
        }

        .vertical-mini {
            border-left: 2px solid black;
            height: 48px;
            width: 2px;
        }

        .horizontal-center {
            display: flex;
            align-items: center;
        }

        .horizontal-center::before,
        .horizontal-center::after {
            content: "";
            flex-grow: 1;
            height: 2px;
            background-color: black;
            margin: 0 10px;
        }

        .print-hr {
            display: block;
            border: none;
            border-top: 2px solid black;
            height: 0;
            width: 100%;
            margin: 10px 0;
        }

        /* Default styling untuk checkbox */
        input[type="checkbox"] {
            /* Hapus styling default browser */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Set ukuran checkbox */
            width: 16px;
            height: 16px;
            /* Tambahkan tampilan kotak */
            border: 1px solid #000;
            /* Set latar belakang awal */
            background-color: #fff;
            /* Tambahkan efek hover */
            cursor: pointer;
        }

        /* Checkbox yang dicentang */
        input[type="checkbox"]:checked {
            /* Ubah warna latar belakang menjadi hitam saat dicentang */
            background-color: #000;
            border: none;
        }

        @media print {
            @page {
                size: F4 portrait;
                margin: 0;
                border: 1px solid red;
            }
        }
    </style>
</head>

<body>
    <div class="container my-3">
        <table class="table">
            <tbody>
                <tr class="border-keliling-bold d-grid">
                    <td class="align-items-start col-12 grid-cols-2">
                        <div class="border-keliling-cov" style="display: flex; align-items: center;">
                            <img src="{{ asset('assets/images/snapedit_1699181666429-removebg-preview.png') }}"
                                alt="Logo" class="h-25 w-25 col-3 mt-1">
                            <div class="col-3 mx-0">
                                <span
                                    class="text-uppercase d-flex fs-6 justify-content-center align-items-center border-keliling-bold px-4 py-2 pt-4 text-center"
                                    style="border: 3px solid black !important; font-size: 15px !important;">PT.
                                    COALINDO ADHI PERKASA</span>
                                <span
                                    class="text-uppercase d-flex fs-6 justify-content-center align-items-center border-keliling-bold px-3 py-2 pb-4 text-center"
                                    style="border: 3px solid black !important; font-size: 15px !important;">Permohonan
                                    Cuti</span>
                            </div>
                            <div class="d-flex flex-column col-3 mx-0">
                                <span class="text-dark border-keliling fs-6 px-2 py-2"
                                    style="border: 2px solid black !important;">No Dok.</span>
                                <span class="text-dark border-keliling fs-6 px-2 py-2"
                                    style="border: 2px solid black !important;">Tanggal Efektif</span>
                                <span class="text-dark border-keliling fs-6 px-2 py-2"
                                    style="border: 2px solid black !important;">Status Revisi</span>
                                <span class="text-dark border-keliling fs-6 px-2 py-2"
                                    style="border: 2px solid black !important;">Tanggal Revisi</span>
                            </div>
                            <div class="d-flex flex-column col-3 mx-0">
                                <span class="text-dark border-keliling fs-6 px-1 py-2"
                                    style="border: 2px solid black !important;">{{ $surat->sc_no_surat_old == $surat->sc_no_surat ? $surat->sc_no_surat_old : $surat->sc_no_surat }}</span>
                                <span class="text-dark border-keliling fs-6 px-1 py-2"
                                    style="border: 2px solid black !important;">{{ \Carbon\Carbon::parse($surat->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</span>
                                <span class="text-dark border-keliling fs-6 px-1 py-2"
                                    style="border: 2px solid black !important;">{{ $surat->sc_no_surat_old == $surat->sc_no_surat ? '00' : '01' }}</span>
                                <span class="text-dark border-keliling fs-6 px-1 py-2"
                                    style="border: 2px solid black !important;">{{ $surat->sc_tgl_surat_rev != null ? \Carbon\Carbon::parse($surat->sc_tgl_surat_rev)->isoFormat('DD MMMM YYYY') : \Carbon\Carbon::parse($surat->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</span>
                            </div>
                        </div>
                        <div class="border-keliling-cov d-flex align-items-center col-12"
                            style="border: 2px solid black !important;">
                            <span class="text-uppercase col-3 text-center font-bold">Departement</span>
                            <div class="verikal-center-mini"></div>
                            <span
                                class="text-uppercase col-3 px-2 text-center">{{ $departemenPic->departemen_name }}</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase col-3 px-2 text-center">Halaman</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase col-3 px-2 text-center">1</span>
                        </div>
                    </td>
                    <td class="align-items-start grid-cols-2">
                        <div class="border-keliling-cov">
                            <div class="d-flex align-items-center">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h6 fs-6 text-center font-bold">Data Karyawan</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 95px; !important"></div>
                                <div class="col-3 ms-1">
                                    <h4 class="text-uppercase h6 fs-6 font-weight-bold">
                                        Nama / Nik &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    </h4>
                                    <h4 class="text-uppercase h6 fs-6 font-weight-bold">
                                        Dept & Position &nbsp;&nbsp;:
                                    </h4>
                                    <h4 class="text-uppercase h6 fs-6 font-weight-bold">
                                        Date Of Hiring &nbsp;&nbsp;&nbsp;&nbsp;:
                                    </h4>
                                    <h4 class="text-uppercase h6 fs-6 font-weight-bold">
                                        Lokasi Kerja &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                    </h4>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-uppercase fs-6 font-weight-bold">
                                        {{ $dataPic->name }} / {{ $dataPic->nik }}
                                    </h4>
                                    <h4 class="text-uppercase fs-6">
                                        {{ $departemenPic->departemen_name }} / {{ $dataPic->jabatan }}
                                    </h4>
                                    <h4 class="text-uppercase fs-6">
                                        {{ \Carbon\Carbon::parse($dataPic->tgl_masuk)->isoFormat('DD MMMM YYYY') }}
                                    </h4>
                                    <h4 class="text-uppercase fs-6">
                                        {{ $dataPic->lokasi_kerja }}
                                    </h4>
                                </div>
                            </div>
                            <div class="border-keliling-cov d-flex align-items-center col-12"
                                style="border: 2px solid black !important;">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h6 fs-6 text-center font-bold">Data Hak Cuti
                                        Karyawan</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 190px; !important"></div>
                                <div class="col-9 text-end">
                                    @if ($surat->cuti_id != 3)
                                        <span style="margin:0;"
                                            class="fs-6 h6 me-2">{{ $surat->cuti_id == 1 ? 'Hak Cuti Lapangan :' : 'Hak Hamil/Melahirkan :' }}
                                            <u>{{ $surat->cuti_id == 1 ? $cuti[0]->cuti_jumlah : $cuti[2]->cuti_jumlah }}
                                                Hari</u></span><br>
                                    @endif
                                    <span style="margin:0;" class="fs-6 h6 me-2">Hak Cuti Tahunan :
                                        <u>{{ $cuti[1]->cuti_jumlah }} Hari</u></span><br>
                                    @php
                                        $data = '';
                                        if ($surat->cuti_id == 1) {
                                            $data = $cuti[0]->cuti_jumlah;
                                        }

                                        if ($surat->cuti_id == 2) {
                                            $data = $cuti[2]->cuti_jumlah;
                                        }
                                    @endphp
                                    <span style="margin:0;" class="fs-6 h6 me-2">Jumlah :
                                        <u>{{ $data + $cuti[1]->cuti_jumlah }}
                                            Hari</u></span><br>
                                    <span style="margin:0;" class="my-0 me-2">--------------------</span><br>
                                    @if ($surat->cuti_id != 3)
                                        <span style="margin:0;"
                                            class="fs-6 h6 me-2">{{ $surat->cuti_id == 1 ? 'Cuti Lapangan Yang Diambil :' : 'Cuti Hamil/Melahirkan Yang Diambil:' }}
                                            <u>{{ $surat->sc_jumlah_cuti }} Hari</u></span><br>
                                    @endif
                                    <span style="margin:0;" class="fs-6 h6 me-2">Cuti Tahunan Yang
                                        Diambil : <u>{{ $surat->cuti_id == 3 ? $surat->sc_jumlah_cuti : '0' }}
                                            Hari</u></span><br>
                                    <span style="margin:0;" class="fs-6 h6 me-1">Jumlah :
                                        <u>{{ $surat->sc_jumlah_cuti }}
                                            Hari</u></span>
                                    <span style="margin:0;" class="me-2"></span><br>
                                    <span style="margin:0;" class="fs-6 h6 me-2">*) Diisi Periode
                                        Sebelumnya oleh Masing-masing Departemen</span><br>
                                    <span class="fs-6 h6 me-2">:
                                        <u>{{ \Carbon\Carbon::parse($surat->sc_tgl_ambil_start)->isoFormat('DD MMMM YYYY') }}</u>
                                        s/d
                                        <u>{{ \Carbon\Carbon::parse($surat->sc_tgl_ambil_end)->isoFormat('DD MMMM YYYY') }}</u></span>
                                </div>
                            </div>
                            <div class="border-keliling-cov d-flex align-items-center col-12"
                                style="border: 1px solid black !important;">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h6 fs-6 text-center font-bold">Jenis Cuti</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 50px; !important"></div>
                                @foreach ($cuti as $c)
                                    <div class="col-3 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox"
                                            value="{{ $c->cuti_id == $surat->cuti_id ? $surat->cuti_id : $c->cuti_id }}"
                                            id="jenis_cuti" {{ $c->cuti_id == $surat->cuti_id ? 'checked' : '' }}>
                                        <label class="form-check-label ms-1" for="jenis_cuti">
                                            {{ $c->cuti_jenis }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="border-keliling-cov col-12 p-2" style="border: 1px solid black !important;">
                                <span class="text-uppercase text-center">Periode Pengambilan Cuti : <span
                                        class="text-decoration-underline">{{ \Carbon\Carbon::parse($surat->sc_tgl_ambil_start)->isoFormat('DD MMMM YYYY') }}</span>
                                    s/d <span
                                        class="text-decoration-underline">{{ \Carbon\Carbon::parse($surat->sc_tgl_ambil_end)->isoFormat('DD MMMM YYYY') }}</span></span>&nbsp;&nbsp;{{ $surat->sc_jumlah_cuti }}
                                Hari<br>
                                <span class="text-uppercase text-center">Tanggal Kembali Kerja : <span
                                        class="text-decoration-underline">{{ \Carbon\Carbon::parse($surat->sc_tgl_kembali)->isoFormat('DD MMMM YYYY') }}</span></span>
                            </div>
                            <div class="border-keliling-cov p-2" style="border: 1px solid black !important;">
                                <h3 class="fs-6">Selama cuti, pekerjaan dan tanggung jawab diserahkan kepada :</h3>
                                <div class="row">
                                    <div class="col-8">
                                        <p class="fs-6 h6 text-uppercase">Nama / Nik &nbsp;&nbsp;:
                                            {{ $dataPJ->name }}/{{ $dataPJ->nik }}</p>
                                        <p class="fs-6 h6 text-uppercase">Jabatan
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $dataPJ->jabatan }}
                                        </p>
                                        <p class="fs-6 h6 text-uppercase">Departemen :
                                            {{ $departemenPJ->departemen_name }}</p>
                                    </div>
                                    <div class="col-4 mt-0 text-end">
                                        <p class="mb-0 mt-4 font-bold">-----------------------</p>
                                        <span class="text-uppercase fs-6 h6 mt-0">Tanda Tangan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-keliling-cov" style="border-top: 0px !important">
                            <div class="row">
                                <div class="col-3 border-keliling"
                                    style="border-left: 0px !important; border-top: 0px !important; border-bottom: 0px !important;">
                                    <span class="fs-6 ms-2 text-center">Dibuat Tanggal : </span><br><span
                                        class="ms-2">{{ \Carbon\Carbon::parse($surat->sc_tgl_surat)->isoFormat('DD MMMM YYYY') }}</span>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <span class="fs-6 ms-2 text-center">{{ $dataPic->name }}</span><br>
                                    <span class="fs-6 ms-2 text-center">{{ $dataPic->jabatan }}</span>
                                </div>
                                @if ($surat->sc_status != null)
                                    <div class="col-3 border-keliling" style="border: 1px solid black !important;">
                                        <span class="fs-6 ms-2 text-center">Disetujui oleh,</span>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[0]->name }}</span><br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[0]->jabatan }}</span>
                                    </div>
                                    <div class="col-3 border-keliling" style="border: 1px solid black !important;">
                                        <span class="fs-6 ms-2 text-center">Diperiksa oleh,</span>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[1]->name }}</span><br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[1]->jabatan }}</span>
                                    </div>
                                    <div class="col-3 border-keliling"
                                        style="border-right: 0px !important; border-top: 0px !important; border-bottom: 0px !important;">
                                        <span class="fs-6 ms-2 text-center">Diketahui oleh,</span>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[2]->name }}</span><br>
                                        <span class="fs-6 ms-2 text-center">{{ $dataApp[2]->jabatan }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="border-keliling-cov" style="border: 2px solid black !important;">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="fs-4 font-weight-bold ms-2">Note (Wajib Diisi)</h5>
                                    <h6 class="fs-6 ms-2">Alamat Selama Cuti : <u>{{ $surat->sc_alamat_cuti }}</u>
                                    </h6>
                                    <h5 class="fs-6 ms-2">No Telpon / HP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                        <u>{{ $surat->sc_no_hp }}</u>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="border-keliling-cov" style="border: 2px solid black !important;">
                            <div class="row">
                                <div class="col-12 mx-1">
                                    <div class="border-keliling my-1">
                                        <span style="text-align:justify" class="me-2 ms-2">Permohonan Cuti diajukan
                                            secara
                                            tertulis
                                            kepada HCMS Dept. setelah diajukan oleh atasan langsung</span><br>
                                        <span style="text-align:justify" class="me-2 ms-2">(minimal setingkat Dept.
                                            Head)
                                            selambat-lambatnya 5 hari kerja sebelum cuti diambil.</span><br>
                                        <span style="text-align:justify" class="me-2 ms-2">Ket. untuk non-staf cukup
                                            sampai dengan di
                                            periksa HCMS Dept.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        window.print();
    </script>
</body>

</html>
