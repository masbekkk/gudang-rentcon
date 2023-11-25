<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QR Code Ready Print</title>
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
</head>

<body>
    <div id="canvas"></div>
    <button id="btn-print" style="display: block" onclick="downloadQR()">Download QR</button>
    <script type="text/javascript">
        function downloadQR() {
            const qrCode = new QRCodeStyling({
                width: 200,
                height: 200,
                type: "png",
                data: "{{ $data_qr }}",
                image: "{{ asset('logo_rentcon.jpeg') }}",
                dotsOptions: {
                    color: "#fd0e18",
                    type: "rounded"
                },
                backgroundOptions: {
                    color: "#ffffff",
                },
                imageOptions: {
                    crossOrigin: "anonymous",
                    margin: 10
                }
            });

            qrCode.append(document.getElementById("canvas"));
            // qrCode.print();
            qrCode.download({
                name: "QR-{{ $nama_barang }}",
                extension: "png"
            });
        }

        downloadQR()
    </script>
</body>

</html>
