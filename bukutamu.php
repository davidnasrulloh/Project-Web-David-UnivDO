<?php
require "functions.php";
if (isset($_POST["simpan"])) {
    if (tambahtamu($_POST) > 0) {
        echo "
            <script>
                alert('Data tamu berhasil ditambah :)');
                document.location.href = 'tabeltamu.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di masukkan');
                document.location.href = 'bukutamu.php';
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
    <link rel="stylesheet" href="css/david.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="shortcut icon" href="gambar/v.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/ubahfont.css">
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
            <a class="cek nav-link" href="" onclick="return confirm ('Buka APP dekstop ?');">Open in App</a>
            <a class="nav-link show2" id="btn-sidebar" href="#">Show or Close Side Bar <i class="fas fa-angle-left"></i><i class="fas fa-angle-right"></i></a>
        </nav>
    </div>
    <div style="display: flex;">
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
        </aside>
        <main>
            <form action="" method="POST">
                <div class="gas">
                    <hr>
                    <h3 style="color: blue; text-align: center; font-weight: bold;">Form Buku Tamu</h3>
                    <hr>
                    <div class="dalam">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama">Nama Lengkap</label>
                            <div class="yaya col-sm-10">
                                <input size="30" placeholder="Tulis nama lengkap anda disini" class="form-control-plaintext" id="nama" name="nama" type="text" required><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="yaya col-sm-10">
                                <input placeholder="Tulis email anda disini" class="form-control-plaintext" id="email" name="email" type="email" required><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="nama">Nomor Hp</label>
                            <div class="yaya col-sm-10">
                                <input placeholder="Tulis No HP anda disini" class="form-control-plaintext" name="nohp" id="nohp" type="text" maxlength="12" onkeypress="return hanyaAngka(event)" required><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="tgl">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="custom-select" style="color: white; font-size: 18px;" name="jk" id="jk" required>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select><br><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="pesan">Pesan</label>
                            <div class="col-sm-10">
                                <textarea placeholder="Tulis pesan anda disini" style="height: 100px; font-size: 18px;" size="100" name="pesan" id="pesan" cols="23" rows="2" required></textarea><br>
                            </div>
                        </div><br>

                        <div class="tombol">
                            <button style="font-weight: bold; height: 45px; width: 70px;" class="btn btn-primary" type="submit" name="simpan">Kirim</button>
                            <button style="font-weight: bold; height: 45px; width: 70px;" class="btn btn-primary" type="reset">Reset</button>
                        </div>
                        <hr>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <footer>
        Copyright &copy; 2021 | David Nasrulloh | 190441100060
    </footer>
    <script src="js/david.js"></script>
</body>

</html>