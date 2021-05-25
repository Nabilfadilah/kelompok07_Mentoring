<?php
require 'functions.php';

if (isset($_POST['registrasi'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil ditambahkan. silahkan login!');
            document.location.href = 'login.php';
          </script>";
    } else {
        echo 'user gagal ditambahkan!';
    }
}

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

<body style="background-image: url(../assets/slider/registrasi.jpg); background-size: 512px;">

    <section id="registrasi" class="registrasi">
        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col offset-m3 s6">
                    <form action="" method="POST">
                        <div class="card-panel m3 s6">
                            <h5 style="text-align: center;">Registrasi</h5>

                            <div class="row">
                                <div class="input-field">
                                    <input type="text" name="username">
                                    <label for="username" class="active">Username</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field">
                                    <input type="password" name="password">
                                    <label for="password" class="active">Password</label>
                                </div>
                            </div>

                            <button class="waves-effect blue-grey lighten-1 btn-small" type="submit" name="registrasi">Registrasi
                                <i class="material-icons right">chevron_right</i>
                            </button>

                            <button class="waves-effect blue-grey lighten-1 btn-small" type="submit" name="kembali">
                                <a href="login.php" style="color: white;">Kembali</a>
                                <i class="material-icons right">chevron_left</i>
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>