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
            height: 25px;
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
                <tr class="border-keliling d-grid">
                    <td class="align-items-start grid-cols-2">
                        <div class="border-keliling-cov" style="display: flex; align-items: center;">
                            <img src="{{ asset('assets/images/snapedit_1699181666429-removebg-preview.png') }}"
                                alt="Logo" class="h-25 w-25 mt-2">
                            <div class="mx-0">
                                <span
                                    class="text-uppercase d-flex justify-content-center align-items-center border-keliling-bold px-2 py-1 pt-4 text-center">PT.
                                    COALINDO ADHI PERKASA</span>
                                <span
                                    class="text-uppercase d-flex justify-content-center align-items-center border-keliling-bold px-2 py-1 pb-4 text-center">Permohonan
                                    Cuti</span>
                            </div>
                            <div class="mx-0">
                                <p class="h6 text-dark border-keliling m-0 px-2 py-1">No Dok.</p>
                                <p class="h6 text-dark border-keliling m-0 px-2 py-1">Tanggal Efektif</p>
                                <p class="h6 text-dark border-keliling m-0 px-2 py-1">Status Revisi</p>
                                <p class="h6 text-dark border-keliling m-0 px-2 py-1">Tanggal Revisi</p>
                            </div>
                        </div>
                        <div style="padding: 0 7px; display: flex; align-items: center;" class="border-keliling-cov">
                            <span class="text-uppercase mx-1 px-4 font-bold"
                                style="margin-right: 40px;">Departement</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase mx-2 text-center" style="margin-left: 10px;">Information
                                Technology</span>
                            <div class="verikal-center-mini"></div>
                            <span class="text-uppercase mx-2 text-center" style="margin-left: 10px;">Halaman</span>
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
