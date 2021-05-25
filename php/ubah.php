<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET['id'];
$tp = query("SELECT * FROM tabel_barang WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil diubah');
                document.location.href = 'admin.php';
            </script>";
    } else {
        echo "<script>
                alert('Data Gagal diubah');
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

<body style="background-image: url(../assets/slider/ubah.jpg); background-size: 512px;">
    <section id="tambah" class="tambah">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col offset-m3 s6">
                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $tp['id']; ?>">
                        <div class="card-panel m3 s6">
                            <h5 style="text-align: center;">Form Ubah Data</h5>
                            <div class="input-field">
                                <input type="text" name="img" id="img" required value="<?= $tp['img']; ?>">
                                <label for="img" class="active">Foto</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="nama" id="nama" required value="<?= $tp['nama']; ?>">
                                <label for="nama" class="active">Nama</label>
                            </div>

                            <div class="input-field">
                                <label for="ukuran"></label>
                                <select class="browser-default" name="ukuran" id="ukuran" required value="">
                                    <option value="<?= $tp['ukuran']; ?>">------Pilih Ukuran------</option>
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
                                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $tp['deskripsi']; ?>">
                                <label for="deskripsi" class="active">Deskripsi</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="harga" id="harga" required value="<?= $tp['harga']; ?>">
                                <label for="harga" class="active">Harga</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="stok" id="stok" required value="<?= $tp['stok']; ?>">
                                <label for="stok" class="active">Stok</label>
                            </div>

                            <button type="submit" name="tambah">Ubah Data!</button>
                            <button type="submit">
                                <a href="admin.php" style="text-decoration: none; color: black;">Kembali</a>
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>