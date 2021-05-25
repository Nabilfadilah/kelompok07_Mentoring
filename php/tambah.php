<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
    } else {
        echo "<script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="background-image: url(../assets/slider/tambah.jpg); background-size: 507px;">
    <section id="tambah" class="tambah">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col offset-m3 s6">
                    <form action="" method="POST">
                        <div class="card-panel m3 s6">
                            <h5 style="text-align: center;">Form Tambah Data</h5>
                            <div class="input-field">
                                <input type="text" name="img" id="img" required class="validate" autocomplete="off">
                                <label for="img" class="active">Foto</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="nama" id="nama" required class="validate" autocomplete="off">
                                <label for="nama" class="active">Nama</label>
                            </div>

                            <div class="input-field">
                                <label for="ukuran"></label>
                                <select class="browser-default" name="ukuran" id="ukuran" required class="active">
                                    <option value="" disabled selected>------Pilih Ukuran------</option>
                                    <option value="All Size">All Size</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <input type="text" name="deskripsi" id="deskripsi" required class="validate" autocomplete="off">
                                <label for="deskripsi" class="active">Deskripsi</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="harga" id="harga" required class="validate" autocomplete="off">
                                <label for="harga" class="active">Harga</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="stok" id="stok" required class="validate" autocomplete="off">
                                <label for="stok" class="active">Stok</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="produk" id="produk" required class="validate" autocomplete="off">
                                <label for="produk" class="active">Produk</label>
                            </div>

                            <button type="submit" name="tambah">Tambah Data!</button>
                            <button type="submit">
                                <a href="admin.php" style="text-decoration: none; color: black;">Kembali</a>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </form>

</body>

</html>