<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Surat Jalan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .address {
            text-align: right;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
        }

        .recipient {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* @media print { */
        th {
            background-color: blue !important;
            color: white;
        }

        /* } */

        @media print {
            #btn-print {
                display: none;
                visibility: hidden;
            }
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .signatures {
            display: flex;
            /* Use Flexbox to make the children align horizontally */
            justify-content: space-between;
            /* Distribute space between the children */
            max-width: 210mm;
            /* Set the maximum width for A4 size */
            margin: 0 auto;
            /* Center the component horizontally on the page */
        }

        .signature {
            text-align: center;
            /* Center the content within each signature block */
            width: calc(33.33% - 10px);
            /* Divide the available space equally among 3 blocks with some margin */
            margin: 0 5px;
            /* Add some horizontal margin between signature blocks */
        }

        /* You can adjust the width and margin values to fit your specific design. */


        .signature img {
            max-width: 100px;
            height: auto;
        }

        /* Signature Container Styles */
        .table-title {
            width: 100%;
            border-collapse: collapse;
        }

        .nama {
            width: 33.33%;
            padding: 10px;
            text-align: center;
            vertical-align: top;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        /* Signature Text Styles */
        .tgl {
            font-size: 14px;
            font-weight: bold;
        }

        .nama {
            font-size: 16px;
        }

        /* Adjust as needed for each specific case */
    </style>
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css" type="text/css">
    <script type="text/javascript" src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('logo_rentcon.jpeg') }}" alt="Logo Perusahaan" class="logo">
            <h1>Surat Jalan</h1>
            <button id="btn-print" style="display: block" onclick="window.print()">Cetak</button>
        </div>

        <div class="address">
            <b>
                <p>RENTCON</p>
            </b>
            <p>Jl. Raya Gondanglegi, Cangkringmalang</p>
            <p>Kec. Beji Kab. Pasuruan,67154</p>
            <p>Telp: 0823-3039-0941</p>
        </div>

        <div class="details">
            <p>Tanggal: {{ date('d/m/Y', strtotime($data->tanggal)) }}</p>
            <p>No. Surat: {{ $data->no_referensi }}</p>
        </div>

        <div class="recipient">
            <h2>Penerima:</h2>
            <b>
                <p>{{ $data->penerima }} </p>
            </b>
            <p>{{ $data->alamat_penerima }},</p>
            <p>{{ $data->kab_prov_penerima }}</p>
            <p>Up: {{ $data->pic_penerima }}</p>
        </div>

        <table>
            <tr>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Kuantitas</th>

            </tr>
            @foreach ($barangSuratJalan as $dataBSJ)
                <tr>
                    <td>{{ $dataBSJ->barang->nama_mesin }}</td>
                    <td>{{ $dataBSJ->barang->spesifikasi_mesin }}</td>
                    <td>{{ $dataBSJ->jumlah_barang }} pcs</td>
                </tr>
            @endforeach



        </table>
        <br>
        <div class="signatures">
            <div class="signature">
                <p>Disiapkan</p>
                {{-- <img src="signature1.png" alt="Tanda Tangan 1"> --}}
                <p>{{ $data->disiapkan }}</p>
            </div>
            <div class="signature">
                <p>Dikirim</p>
                {{-- <img src="signature2.png" alt="Tanda Tangan 2"> --}}
                <p>{{ $data->dikirim }}</p>
            </div>
            <div class="signature">
                <p>Diterima</p>
                {{-- <img src="signature3.png" alt="Tanda Tangan 3"> --}}
                <p>{{ $data->diterima }}</p>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            window.print();
        });
    </script>
</body>

</html>
