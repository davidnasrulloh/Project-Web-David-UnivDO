<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../tabeltamu.php");
    exit;
}

require '../functions.php';
$mahasiswa = query("SELECT * FROM bukutamu");

$id = $_GET["id"];
$mhs = query("SELECT * FROM bukutamu WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubahtamu($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah :)');
                document.location.href = 'tabeltamu_admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah :(');
                document.location.href = 'tabeltamu_admin.php';
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
    <link rel="stylesheet" href="../css/david.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/ubah.css">
    <link rel="shortcut icon" href="../gambar/v.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>David Nasruloh | 190441100060 </title>
    <style type="text/css">
        .loader {
            width: 100px;
            position: absolute;
            top: 122px;
            /* left: 300px; */
            height: 100px;
            z-index: -1;
            display: none;
        }
    </style>
</head>

<body>
    <div class="atasan">
        <header>
            <div style="display: flex;">
                <div style="width: 20%;">
                    <img src="../gambar/utm.png" width="150px" height="150px" alt="">
                </div>
                <div style="width: 60%; padding: 30px; text-shadow: 4px 4px 10px black;">
                    <h1>Universitas David Office Website</h1>
                    <h3>Selamat Datang di Prototype Website David Nasrulloh</h3>
                </div>
                <div style="width: 20%;">
                    <img src="../gambar/himasi.png" width="150px" height="150px" alt="">
                </div>
            </div>
        </header>
        <nav class="nav justify-content-center">
            <a class="cek nav-link active" href="../index.html">Beranda</a>
            <a class="cek nav-link" href="../support.html">Support</a>
            <a class="cek nav-link" href="" onclick="return confirm ('Buka APP dekstop ?');">Open in App</a>
            <a class="nav-link show2" id="btn-sidebar" href="#">Show or Close Side Bar <i class="fas fa-angle-left"></i><i class="fas fa-angle-right"></i> </a>
        </nav>
    </div>
    <div style="display: flex;">
        <aside style="display: block;">
            <ul class="sidebar">
                <li><a href="../utama.html">Menu</a></li>
                <li><a href="../datamahasiswa.php">Data Mahasiswa</a></li>
                <li><a href="../profile.html">Profile</a></li>
                <li><a href="../bukutamu.php">Form Buku Tamu</a></li>
                <li><a href="../tabeltamu.php">Tabel Buku Tamu</a></li>
                <li><a href="../berita.html">Berita</a></li>
                <li><a href="../pengguna.html">Pihak Terkait</a></li>
                <li><a href="../setting.html">Setting</a></li>
            </ul>
        </aside>
        <main class="containerku" style="display: block;">
            <div class="container">
                <div>
                    <h1 class="text-center mb-5">Edit Data Tamu</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-9">
                        <form class="bungkus" action="" method="POST">
                            <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mhs['nama']; ?>">
                            </div> <br>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $mhs['email']; ?>">
                            </div> <br>
                            <div class="form-group">
                                <label for="nohp">No HP</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" maxlength="12" onkeypress="return hanyaAngka(event)" value="<?php echo $mhs['nohp']; ?>">
                            </div> <br>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $mhs['jk']; ?>">
                                <select class="form-control" name="jk" id="jk" required>
                                    <option value="laki-laki"> => Laki-laki</option>
                                    <option value="perempuan"> => Perempuan </option>
                                </select>
                            </div> <br>
                            <div class="form-group">
                                <label for="pesan">Pesan</label>
                                <input type="text" class="form-control" id="pesan" name="pesan" value="<?php echo $mhs['pesan']; ?>">
                            </div> <br>
                            <button type="submit" name="submit" class="btn btn-primary" style="width: 100px;"><i class="far fa-save"></i> Simpan</button>
                            <a href="tabeltamu_admin.php" class="btn btn-secondary" style="width: 90px;"><i class="fas fa-window-close"></i> Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        Copyright &copy; 2021 | David Nasrulloh | 190441100060
    </footer>

    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/david.js"></script>
    <script src="../js/tugas.js"></script>
    <!-- <script src="../js/script.js"></script> -->
</body>

</html>