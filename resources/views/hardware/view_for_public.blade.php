<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>PT DMAC Asset Management</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo DMAC" class="img-thumbnail" width="150">
                            <h3 class="card-title" style="text-align: right">
                                Informasi Asset
                                <br>PT Duta Mandiri Anugerah Cemerlang
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center">Nomor Asset</h3>
                        <h2 class="card-text text-center">
                            {{ $asset->asset_tag }}
                        </h2>

                        <p class="card-text">
                            Seluruh asset yang tercantum dalam laman ini adalah milik <b>PT Duta Mandiri Anugerah
                                Cemerlang</b>. Barang siapa menemukan asset tersebut diharapkan untuk segera
                            mengembalikannya ke perusahaan.
                        </p>

                        <p class="card-text">
                            Setiap tindakan merusak, mencuri, atau menggunakan asset tanpa izin dari <b>PT Duta Mandiri
                                Anugerah Cemerlang</b> akan dianggap pelanggaran hukum. Pelanggar akan diwajibkan
                            mengganti kerugian sesuai dengan spesifikasi yang sama seperti yang tertera dalam daftar aset
                            perusahaan.
                        </p>

                        <p class="card-text">
                            Kami menghargai kerjasama dan kepatuhan terhadap peraturan ini demi menjaga keamanan dan
                            keberlanjutan operasional perusahaan kami.
                        </p>

                        <h5 class="card-title">Kontak</h5>
                        <p class="card-text">
                            Apabila anda menemukan atau butuh informasi lebih lanjut, silahkan hubungi: <br> <br>
                            Alamat: Kawasan Industri Kencana Alam, Jl. Raya Serang No.Km 18,8 Kav. 10, Sukanagara, Kec.
                            Cikupa, Kabupaten Tangerang, Banten 15710 <br>
                            Email: <a href="mailto:ekki.rizkia@dmacautoparts.com">ekki.rizkia@dmacautoparts.com</a> <br>
                            Telepon: (021) 5940 5015, (021) 5940 4802
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
