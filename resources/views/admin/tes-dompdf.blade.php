<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Surat Jalan</title>

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
 <link href="css/index.css" rel="stylesheet" crossorigin="anonymous" /> -->

    <style>
        * {
            font-family: Arial, sans-serif;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            /* text-align: var(--bs-body-text-align); */
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        .h3,
        h3 {
            font-size: calc(1.3rem + .6vw);
        }

        @media (min-width: 1200px) {

            .h3,
            h3 {
                font-size: 1.75rem;
            }
        }

        x .h5,
        h5 {
            font-size: 1.25rem;
        }

        .h6,
        h6 {
            font-size: 1rem;
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
            color: inherit;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        th {
            text-align: inherit;
            text-align: -webkit-match-parent;
        }

        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .min-vh-100 {
            min-height: 100vh !important;
        }

        .min-vw-100 {
            min-width: 100vw !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .mb-2 {
            margin-bottom: 0.5rem !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .pt-3 {
            padding-top: 1rem !important;
        }

        .pb-1 {
            padding-bottom: 0.25rem !important;
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-3 {
            padding-right: 1rem !important;
            padding-left: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6 !important;
        }

        .border-2 {
            border-width: 2px !important;
        }

        .border-dark {
            border-color: rgba(33, 37, 41, 1) !important;
        }

        .w-50 {
            width: 50% !important;
        }

        .justify-content-between {
            justify-content: space-between !important;
        }

        .flex-column {
            flex-direction: column !important;
        }

        .flex-wrap {
            flex-wrap: wrap !important;
        }

        .d-flex {
            display: flex !important;
        }

        .row {
            display: flex;
            margin-top: calc(-1 * 0);
            margin-right: calc(-.5 * 3rem);
            margin-left: calc(-.5 * 3rem);
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(3rem * .5);
            padding-left: calc(3rem * .5);
            margin-top: 0;
        }

        .col-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .text-center {
            text-align: center !important;
        }

        .text-end {
            text-align: right !important;
        }

        .fw-bold {
            font-weight: 700 !important;
        }

        .ttd-box {
            height: 10.5rem;
        }

        .container-print {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .fs-small {
            font-size: .9rem;
            line-height: 1rem;
            font-weight: 500;
        }

        .logo {
            width: 8rem;
            height: 8rem;
        }
        .button {
            display: inline-block;
            padding: 15px 25px;
            font-size: 24px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #f4511e;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {
            background-color: #fc7c54
        }

        .button:active {
            background-color: #fc7c54;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>

</head>

<body class="min-vh-100 min-vw-100">
    <div class="container-print">
        <div class="mb-4 d-flex justify-content-between">
            @if (Route::is('test.pdf'))
                <img class="logo" src="{{ asset('logo/logo_rentcon.jpeg') }}" alt="RENTCON ICON">
            @else
                <img class="logo" src="./logo/logo_rentcon.jpeg" alt="RENTCON ICON">
            @endif
            <div class="pt-3">
                <h6 class="fw-bold mb-4 text-end">
                    RENTCON
                </h6>
                <p class="mb-0 fs-small text-end">Ruko gempol interchange No.14 Ds. legok kec. Gempol kab Pasuruan jawa
                    timu</p>
                <p class="mb-0 fs-small text-end">Telp: 082330390941</p>
                <p class="mb-0 fs-small text-end">Email: rentcin.jatim@gmail.com</p>
            </div>
        </div>
        @if (Route::is('test.pdf'))
            <a href="/test/pdf-surat-jalan" target="_blank" type="button" class="button">
                Download PDF</a>
        @endif
        <h3 class="fw-bold text-end mb-0">SURAT JALAN</h3>
        <table class="mb-4" style="width:100%">
            <tr>
                <th class="py-3 px-3 w-50">
                    <p class="mb-3 fs-small">Kepada</p>
                    <h5 class="fw-bold" style="margin-bottom: .3rem;">BAPAK BEJO WIYONO</h5>
                    <p class="mb-0 fs-small">DS. KEMBRANGGEN 001/002 WINONG GEMPOL</p>
                </th>
                <th class="pt-3 px-4 w-50 align-items-start" style="vertical-align: top;">
                    <p class="border-bottom border-2 border-dark mb-2 pb-1 fs-small">
                        Referensi : INV/00053
                    </p>
                    <p class="border-bottom border-2 border-dark mb-2 pb-1 fs-small">
                        Tanggal: 05/10/2023
                    </p>
                </th>
            </tr>
        </table>

        <table class="mb-4" style="width:100%">
            <tr>
                <th class="p-2 fs-small fw-bold">
                    Produk
                </th>
                <th class="p-2 fs-small fw-bold" style="width: 29%;">
                    Deskripsi
                </th>
                <th class="p-2 text-center fs-small fw-bold" style="width: 11%;">
                    Kuantitas
                </th>
            </tr>
            <tr>
                <th class="p-2 fs-small">
                    PER SET ( FRAME CROSS BRANCE)
                </th>
                <th class="p-2 fs-small fw-bold"></th>
                <th class="p-2 fs-small text-center">
                    2
                </th>
            </tr>
        </table>

        <table class="mb-4" style="width:100%">
            <tr>
                <th class="p-2 fs-small fw-bold" style="width: 20%;">
                    Pesan
                </th>
                <th class="p-2 fs-small">
                    Transfer via BCA 411-081-9361 A.N Muhammad Budi Hendrawan Sutopo
                </th>
            </tr>
        </table>


        <div class="row gx-5 mt-5">
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Disiapkan Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    Ria Ayu Lestari
                </p>
            </div>
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Dikirim Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    (.................................)
                </p>
            </div>
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Diterima Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    (.................................)
                </p>
            </div>
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Dengan Hormat,
                </p>
                <p class="mb-0 fs-small text-center">
                    Finance Dept
                </p>
            </div>
        </div>
    </div>
</body>

</html>
