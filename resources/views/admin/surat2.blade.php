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
        
        th{
            background-color: blue;
            color: white;
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
            justify-content: space-between;
        }

        .signature {
            text-align: center;
        }

        .signature img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="logo_rentcon.jpeg" alt="Logo Perusahaan" class="logo">
            <h1>Surat Jalan</h1>
        </div>

        <div class="address">
            <b><p>RENTCON</p></b>
            <p>Jl. Raya Gondanglegi, Cangkringmalang</p>
            <p>Kec. Beji Kab. Pasuruan,67154</p>
            <p>Telp: 0823-3039-0941</p>
        </div>

        <div class="details">
            <p>Tanggal: 16 Oktober 2023</p>
            <p>No. Surat: SJ-001</p>
        </div>

        <div class="recipient">
            <h2>Penerima:</h2>
            <b><p>CV. BISEKA SYNERGY</p></b>
            <p>RUKO GEMPOL INTERCHENGE NO.007 GEMPOL,</p>
            <p>PASURUAN JATIM</p>
            <p>Up: Bapak M. JAINURI</p>
        </div>

        <table>
            <tr>
                <th>Produk</th>
                <th>Deskripsi</th>
                <th>Kuantitas</th>
                
            </tr>
            <tr>
                <td>Gerinda 4"</td>
                <td>4" 1Phase</td>
                <td>5 pcs</td>
            </tr>
            <tr>
                <td>Vacum</td>
                <td>380 Watt</td>
                <td>5 pcs</td>
            </tr>
            
        </table>
        <br>
        <div class="signatures">
            <div class="signature">
                <p>Disiapkan</p>
                <img src="signature1.png" alt="Tanda Tangan 1">
                <p>Tanda Tangan 1</p>
            </div>
            <div class="signature">
                <p>Dikirim</p>
                <img src="signature2.png" alt="Tanda Tangan 2">
                <p>Tanda Tangan 2</p>
            </div>
            <div class="signature">
                <p>Diterima</p>
                <img src="signature3.png" alt="Tanda Tangan 3">
                <p>Tanda Tangan 3</p>
            </div>
        </div>
    </div>
</body>

</html>
