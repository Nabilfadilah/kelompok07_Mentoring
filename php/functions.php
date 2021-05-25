<?php
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "");
  mysqli_select_db($conn, "kelompok7") or die("Database salah!");

  return $conn;
}

function query($sql)
{
  $conn = koneksi();
  $result = mysqli_query($conn, "$sql");
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $img = htmlspecialchars($data['img']);
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $harga = htmlspecialchars($data['harga']);
  $ukuran = htmlspecialchars($data['ukuran']);
  $stok = htmlspecialchars($data['stok']);

  $query = "INSERT INTO tabel_barang
                 VALUES
                (null, 
                '$img',
                '$nama',  
                '$deskripsi', 
                '$harga',
                '$ukuran', 
                '$stok')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  mysqli_query($conn, "DELETE FROM tabel_barang WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = Koneksi();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $harga = htmlspecialchars($data['harga']);
  $ukuran = htmlspecialchars($data['ukuran']);
  $stok = htmlspecialchars($data['stok']);

  $query = "UPDATE tabel_barang SET 
              nama ='$nama',
              deskripsi = '$deskripsi',
              harga = '$harga',
              ukuran = '$ukuran',
              stok = '$stok'
              WHERE id = $id";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM tabel_barang
              WHERE 
              nama LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              ukuran LIKE '%$keyword%' OR
              stok LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function login($data)
{
  $conn = koneksi();

  $usernama = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username
  if ($user = query("SELECT * FROM user WHERE username = '$usernama'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}

function registrasi($data)
{
  $conn = koneksi();
  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);

  // cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
                alert('username sudah digunakan');
            </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambah user baru 
  $query_tambah = "INSERT INTO user VALUES('', '$username', '$password')";

  mysqli_query($conn, $query_tambah);

  return mysqli_affected_rows($conn);
}
