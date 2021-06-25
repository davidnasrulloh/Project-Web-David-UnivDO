<?php
require 'functions.php';
if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0) {
        echo "
                <script> 
                    alert('User baru ditambahkan :)');
                </script>
            ";
    } else {
        echo "
                <script> 
                    alert('User gagal ditambahkan :(');
                </script>
            ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registrasi.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="admin/css/ubah.css">
    <link rel="stylesheet" href="css/ubahfont.css">
    <link rel="shortcut icon" href="gambar/v.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>David Nasruloh | 190441100060 </title>
</head>

<body>
    <div class="atasan">
        <header>
            <div style="display: flex;">
                <div style="width: 20%;">
                    <img src="gambar/utm.png" width="150px" height="150px" alt="">
                </div>
                <div style="width: 60%; padding: 30px; text-shadow: 4px 4px 10px black;">
                    <h1>Universitas David Office Website</h1>
                    <h3>Selamat Datang di Prototype Website David Nasrulloh</h3>
                </div>
                <div style="width: 20%;">
                    <img src="gambar/himasi.png" width="150px" height="150px" alt="">
                </div>
            </div>
        </header>
        <nav class="nav justify-content-center">
            <a class="cek nav-link active" href="index.html">Beranda</a>
            <a class="cek nav-link" href="support.html">Support</a>
            <div id="closed"></div>
            <a class="cek nav-link" href="" onclick="return confirm ('Buka APP dekstop ?');">Open in App</a>
            <a class="nav-link show2" id="btn-sidebar" href="#">Show or Close Side Bar <i class="fas fa-angle-left"></i><i class="fas fa-angle-right"></i></a>
        </nav>
    </div>
    <div class="tengah" style="display: flex;">
        <aside style="display: block;">
            <ul class="sidebar">
                <li><a href="utama.html">Menu</a></li>
                <li><a href="datamahasiswa.php">Data Mahasiswa</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="bukutamu.php">Form Buku Tamu</a></li>
                <li><a href="tabeltamu.php">Tabel Buku Tamu</a></li>
                <li><a href="berita.html">Berita</a></li>
                <li><a href="pengguna.html">Pihak Terkait</a></li>
                <li><a href="setting.html">Setting</a></li>
            </ul>
            <!-- <h3>Klik <span style="color: yellow;">show</span> sideBar pada navigasi diatas </h3> -->
        </aside>
        <main>
            <div style="display: block;">
                <div class="justify-content-center">
                    <div style="padding: 20px;">
                        <h3>Registrasi Admin David Office</h3>
                    </div>
                    <div class="align-content-center">
                        <form class="bungkus" action="" method="POST">
                            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input placeholder="Tulis username anda disini" type="text" class="form-control" id="username" name="username">
                            </div> <br>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input placeholder="Tulis password " type="password" class="form-control" id="password" name="password">
                            </div> <br>
                            <div class="form-group">
                                <label for="password2">Confirm Password</label>
                                <input placeholder="Confirm password anda" type="password" class="form-control" id="password2" name="password2">
                            </div> <br>
                            <div style="text-align:right;">
                                <button type="submit" name="registrasi" class="btn btn-primary" style="width: 110px;"><i class="fas fa-user-plus"></i> Sign Up</button>
                                <a href="datamahasiswa.php" class="btn btn-secondary" style="width: 90px;"><i class="fas fa-window-close"></i> Batal</a>
                            </div>
                        </form><br>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        Copyright &copy; 2021 | David Nasrulloh | 190441100060
    </footer>
    <script src="js/home.js"></script>

</body>

</html>