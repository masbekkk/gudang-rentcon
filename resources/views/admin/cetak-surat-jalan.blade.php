<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan Kepada {{ $data->penerima }} Up: {{ $data->pic_penerima }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous" />

    <style>
        * {
            font-family: Arial, sans-serif;
        }

        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
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
        @media print {
            .button {
                display: none;
                visibility: hidden;
            }
        }
    </style>
</head>

<body class="min-vh-100 min-vw-100">
    <div class="container-print">
        <div class="mb-4 d-flex justify-content-between">
            <img class="logo" src="{{ asset('logo/logo_rentcon.jpeg') }}" alt="RENTCON ICON">
            <div class="pt-3">
                <h6 class="fw-bold mb-4 text-end">
                    RENTCON
                </h6>
                <p class="mb-0 fs-small text-end">Ruko gempol interchange No.14 Ds. Legok Kec. Gempol Kab Pasuruan Jawa
                    Timur</p>
                <p class="mb-0 fs-small text-end">Telp: 082330390941</p>
                <p class="mb-0 fs-small text-end">Email: rentconn.jatim@gmail.com</p>
            </div>
        </div>
        <button type="button" class="button" onclick="window.print()">
            Cetak Surat</button>
        <h3 class="fw-bold text-end mb-0">SURAT JALAN</h3>
        <table class="mb-4" style="width:100%">
            <tr>
                <th class="py-3 px-3 w-50">
                    <p class="mb-3 fs-small">Kepada</p>
                    <h5 class="fw-bold" style="margin-bottom: .3rem;">{{ $data->penerima }}</h5>
                    <p class="mb-0 fs-small">{{ $data->alamat_penerima }}</p>
                    <p class="mb-0 fs-small">{{ $data->kab_prov_penerima }}</p>
                    <p class="mb-0 fs-small">Up: {{ $data->pic_penerima }}</p>
                </th>
                <th class="pt-3 px-4 w-50 align-items-start" style="vertical-align: top;">
                    <p class="border-bottom border-2 border-dark mb-2 pb-1 fs-small">
                        Referensi : {{ $data->no_referensi }}
                    </p>
                    <p class="border-bottom border-2 border-dark mb-2 pb-1 fs-small">
                        Tanggal: {{ date('d/m/Y', strtotime($data->tanggal)) }}
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
                <th class="p-2 fs-small fw-bold" style="width: 29%;">
                    Lama Sewa
                </th>
                <th class="p-2 text-center fs-small fw-bold" style="width: 11%;">
                    Kuantitas
                </th>
            </tr>
            @foreach ($barangSuratJalan as $dataBSJ)
                <tr>
                    <th class="p-2 fs-small">
                        {{ $dataBSJ->barang->nama_mesin }}
                    </th>
                    <th class="p-2 fs-small fw-bold">{{ $dataBSJ->barang->spesifikasi_mesin }}</th>
                    <th class="p-2 fs-small fw-bold">{{ $dataBSJ->lama_sewa }}</th>
                    <th class="p-2 fs-small text-center">
                        {{ $dataBSJ->jumlah_barang }} pcs
                    </th>
                </tr>
            @endforeach
        </table>

        <table class="mb-4" style="width:100%">
            <tr>
                <th class="p-2 fs-small fw-bold" style="width: 20%;">
                    Pesan
                </th>
                <th class="p-2 fs-small">
                    {{ $data->pesan }}
                </th>
            </tr>
        </table>


        <div class="row gx-5 mt-5">
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Disiapkan Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    ({{ $data->disiapkan }})
                </p>
            </div>
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Dikirim Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    ({{ $data->dikirim }})
                </p>
            </div>
            <div class="col-3 ttd-box d-flex flex-column justify-content-between">
                <p class="mb-0 fs-small text-center">
                    Diterima Oleh
                </p>
                <p class="mb-0 fs-small text-center">
                    ({{ $data->diterima }})
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
    <script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     window.print();
        // });
    </script>

</body>

</html>
