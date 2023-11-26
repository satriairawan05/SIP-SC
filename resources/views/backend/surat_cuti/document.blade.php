<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Sistem Informasi Pengajuan Surat Cuti" />
    <meta name="keywords" content="Sistem Informasi Pengajuan Surat Cuti" />
    <meta name="author" content="Deuwi Satriya Irawan" />
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/site.webmanifest') }}">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style type="text/css">
        :root {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
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

        .verikal-center-mini {
            border-left: 3px solid black;
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
                size: A4 portrait;
                margin: 0;
                border: 1px solid red;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <table class="table">
            <tbody>
                <tr class="border-keliling-bold d-grid">
                    <td class="align-items-start col-12 grid-cols-2">
                        <div class="border-keliling-cov" style="display: flex; align-items: center;">
                            <img src="{{ asset('assets/images/snapedit_1699181666429-removebg-preview.png') }}"
                                alt="Logo" class="h-25 w-25 col-3 mt-2">
                            <div class="col-3 mx-0">
                                <span
                                    class="text-uppercase d-flex justify-content-center align-items-center border-keliling-bold px-2 py-2 pt-4 text-center">PT.
                                    COALINDO ADHI PERKASA</span>
                                <span
                                    class="text-uppercase d-flex justify-content-center align-items-center border-keliling-bold px-2 py-2 pb-4 text-center">Permohonan
                                    Cuti</span>
                            </div>
                            <div class="d-flex flex-column col-3 mx-0">
                                <span class="text-dark border-keliling px-2 py-2">No Dok.</span>
                                <span class="text-dark border-keliling px-2 py-2">Tanggal Efektif</span>
                                <span class="text-dark border-keliling px-2 py-2">Status Revisi</span>
                                <span class="text-dark border-keliling px-2 py-2">Tanggal Revisi</span>
                            </div>
                            <div class="d-flex flex-column col-3 mx-0">
                                <span class="text-dark border-keliling px-1 py-2">09/10.04/HCMS</span>
                                <span
                                    class="text-dark border-keliling px-1 py-2">{{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}</span>
                                <span class="text-dark border-keliling px-1 py-2">01</span>
                                <span
                                    class="text-dark border-keliling px-1 py-2">{{ \Carbon\Carbon::now()->subDay()->isoFormat('DD MMMM YYYY') }}</span>
                            </div>
                        </div>
                        <div class="border-keliling-cov d-flex align-items-center col-12">
                            <span class="text-uppercase col-3 text-center font-bold">Departement</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase col-3 px-2 text-center">Information
                                Technology</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase col-3 px-2 text-center">Halaman</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase col-3 px-2 text-center">1</span>
                        </div>
                    </td>
                </tr>
                <tr class="border-keliling-bold d-grid mt-2">
                    <td class="align-items-start grid-cols-2">
                        <div class="border-keliling-cov">
                            <div class="border-keliling-cov d-flex align-items-center col-12">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h4 fs-4 text-center font-bold">Data Karyawan</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 110px; !important"></div>
                                <div class="col-5 ms-3">
                                    <p class="text-uppercase h6 fs-6 font-weight-bold">Nama / Nik</p>
                                    <p class="text-uppercase h6 fs-6 font-weight-bold">Departemen & Jabatan</p>
                                    <p class="text-uppercase h6 fs-6 font-weight-bold">Tanggal Masuk Kerja / DOH</p>
                                    <p class="text-uppercase h6 fs-6 font-weight-bold">Lokasi Kerja</p>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                            <div class="border-keliling-cov d-flex align-items-center col-12">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h5 fs-5 text-center font-bold">Data Hak Cuti
                                        Karyawan</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 66px; !important"></div>
                            </div>
                            <div class="border-keliling-cov d-flex align-items-center col-12">
                                <div class="col-3 d-flex justify-content-center">
                                    <span class="text-uppercase h5 fs-5 text-center font-bold">Jenis Cuti</span>
                                </div>
                                <div class="verikal-center-mini" style="height: 66px; !important"></div>
                                @foreach ($cuti as $c)
                                    <div class="col-3 d-flex justify-content-center">
                                        <input class="form-check-input" type="checkbox" value="{{ $c->cuti_id == $surat->cuti_id ? $surat->cuti_id : $c->cuti_id }}" id="jenis_cuti" {{ $c->cuti_id == $surat->cuti_id ? 'checked' : '' }}>
                                        <label class="form-check-label ms-1" for="jenis_cuti">
                                            {{ $c->cuti_jenis }}
                                        </label>
                                    </div>
                                @endforeach
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
