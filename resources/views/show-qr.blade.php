<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code {{ $nama_barang }}</title>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    {{-- <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.merge.min.js"></script> --}}
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #qrcode {
            max-width: 300px;
            margin-top: 20px;
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

        #downloadBtn {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div id="qrcode"></div>
    <br>
    <div>
        <button id="downloadBtn" type="button" class="button">
            Download QR Code</button>
    </div>

    <script>
        function generateQRCode(data) {
            // Generate QR Code
            var qr = new QRCode(document.getElementById("qrcode"), {
                text: data,
                width: 200,
                height: 200,
                colorDark: "#FF0000"
            });
        }

        function downloadQRCode() {
            // Get the data URL of the QR code (including the image) as a PNG image
            var dataUrl = document.getElementById("qrcode").getElementsByTagName("img")[0].src;

            // Create a download link
            var downloadLink = document.createElement('a');
            downloadLink.href = dataUrl;
            downloadLink.download = 'QR CODE-{!! $nama_barang !!}.png';
            document.body.appendChild(downloadLink);

            // Trigger a click on the link to start the download
            downloadLink.click();

            // Remove the download link from the DOM
            document.body.removeChild(downloadLink);
        }
        // generateQRCode("{!! $data_qr !!}", "{!! asset('logo/logo_rentcon.jpeg') !!}", 30, function() {
        //         downloadQRCode();
        //     });
        // Trigger the generation and download when the document is ready
        document.addEventListener('DOMContentLoaded', function() {
            generateQRCode("{!! $data_qr !!}");
            // Trigger download after a short delay (adjust as needed)
            setTimeout(downloadQRCode, 1000);
        });

        // Trigger download when button is clicked
        document.getElementById("downloadBtn").addEventListener("click", function() {
            downloadQRCode();
        });
    </script>
</body>

</html>
