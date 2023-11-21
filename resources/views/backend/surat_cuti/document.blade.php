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

        .bort {
            border-top: 2px solid black;
            width: 100%;
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
        <div class="row">
            <div class="col-3 border-keliling d-flex align-items-center justify-content-center">
                <img src="{{ asset('assets/images/snapedit_1699181666429-removebg-preview.png') }}" alt="Logo"
                    class="h-100 w-100 mt-2">
            </div>
            <div class="col-5 border-keliling">
                <span class="text-dark font-weight-bold text-uppercase">PT. COALINDO ADHI PERKASA</span>
                <div class="bort"></div>
                <span class="text-dark font-weight-bold text-uppercase">PERMOHONAN CUTI</span>
            </div>
            <div class="col-4 border-keliling">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
