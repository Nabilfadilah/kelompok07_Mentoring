<?php
require '../php/functions.php';
$mahasiswa = cari($_GET['keyword']);
?>

<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($tabel_barang)) : ?>
    <tr>
      <td colspan="4">
        <p style="color: red; font-style: italic;">data barang tidak ditemukan!</p>
      </td>
    </tr>
  <?php endif; ?>


  <?php $i = 1;
  foreach ($tabel_barang as $tb) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $tb['gambar']; ?>" width="60"></td>
      <td><?= $tb['nama']; ?></td>
      <td>
        <a href="detail.php?id= <?= $tb['id']; ?>">Lihat detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>