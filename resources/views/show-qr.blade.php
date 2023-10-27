<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Ready Print</title>
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
</head>
<body>
<div id="canvas"></div>
<script type="text/javascript">

    const qrCode = new QRCodeStyling({
        width: 1024,
        height: 1024,
        type: "png",
        data: "{{ $data_qr }}",
        image: "{{ asset('logo_rentcon.jpeg')}}",
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
    qrCode.download({ name: "qr-barang1", extension: "png" });
</script>
</body>
</html>