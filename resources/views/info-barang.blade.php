<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Barang {{ $nama_mesin }}</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css?ver=1.1"
        type="text/css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    {{-- font awesome css --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css?ver=1.1" type="text/css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .login-brand {
            margin: 20px 0;
            margin-bottom: 40px;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="login-brand">
        <img src="{{ asset('logo/logo_rentcon.jpeg') }}" alt="logo" width="100"
            class="shadow-light">
            {{-- <p class="font-weight-bold">INFORMASI BARANG</p> --}}
            <p><strong>INFORMASI BARANG</strong></p>
        </div>
        <div class="card border-primary mb-3">

            <div class="card-body ">
                <h5 class="card-title">{{ $nama_mesin }}</h5>
                <p class="card-text">{{ $spesifikasi_mesin }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><i class="fas fa-check"></i> <strong>Lokasi Mesin</strong> {{ $lokasi_mesin }}</li>
                    {{-- <ul>
                        <li>Surabaya</li>
                    </ul> --}}
                    <li class="list-group-item"><strong>Kondisi Mesin</strong> {{ $kondisi_mesin }}</li>
                    {{-- <li class="list-group-item"><strong>Lokasi Mesin</strong> Surabaya</li> --}}
                    {{-- <li class="list-group-item"><strong>Lokasi Mesin</strong> Surabaya</li> --}}
                    {{-- <li class="list-group-item">And a fifth one</li> --}}
                </ul>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and Popper.js (for Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
