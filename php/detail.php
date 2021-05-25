<?php
// Mengecek apakah ada id yang dikirimkan 
// jika tidak maka akan dikembalikan ke halaman index.php
if (!isset($_GET['id'])) {
  header("location: ../index.php");
  exit;
}

require 'functions.php';

// Mengambil id dari url
$id = $_GET['id'];

// Melakukan query dengan parameter id yang diambil dari url
$tabel_barang = query("SELECT * FROM tabel_barang WHERE id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zibantek Shoes</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />

  <!-- my css -->
  <link rel="stylesheet" href="css/style.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<style>
  body {
    background: white;
    color: white;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    letter-spacing: .7px;
  }

  /* imageshake */
  img:hover {
    /* Start the shake animation and make the animation last for 0.5 seconds */
    animation: shake 0.5s;

    /* When the animation is finished, start again */
    animation-iteration-count: infinite;
  }

  .penjelasan {
    text-align: justify;
    margin-top: -20px;
  }

  .container {
    background-color: white;
    padding: 20px;
  }

  .card {
    padding: 20px;
    border-radius: 5px;
    background: azure;
  }

  .gambar {
    align-items: center;
    justify-content: center;
    display: flex;
  }
</style>

<body>
  <div class="container">
    <div class="row">
      <div class="col m4">
        <div class="card">
          <div class="gambar">
            <img src="../assets/img/<?= $tabel_barang["img"]; ?>" alt="">
          </div>
        </div>
      </div>
      <div class="col m8">
        <div class="card">
          <div class="keterangan">

            <table style="color: black;">
              <tr>
                <td><b>Nama</b></td>
                <td><b> : </b></td>
                <td><?= $tabel_barang['nama'] ?></td>
              </tr>
              <tr>
                <td><b>Harga</b></td>
                <td><b> : </b></td>
                <td><?= $tabel_barang['harga'] ?></td>
              </tr>
              <tr>
                <td><b>Ukuran</b></td>
                <td><b> : </b></td>
                <td><?= $tabel_barang['ukuran'] ?></td>
              </tr>
              <tr>
                <td><b>Stok Produk</b></td>
                <td><b> : </b></td>
                <td><?= $tabel_barang['stok'] ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col m12">

        <div class="card">
          <div class="penjelasan" style="color: black;">
            <h3>Penjelasan Singkat</h3>
            <p><?= $tabel_barang['deskripsi'] ?></p>
          </div>
        </div>
      </div>
    </div>

    <button class="waves-effect brown darken-4 lighten-1 btn-small">
      <i class="material-icons right">chevron_left</i><a href="../index.php" style="color: white;">Kembali</a>
    </button>
  </div>

</body>

</html>