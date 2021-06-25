<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../datamahasiswa.php");
    exit;
}

require '../functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["tambah"])) {
    if (tambahmhs($_POST) > 0) {
        echo "
					<script> 
						alert('data berhasil ditambahkan :)');
						document.location.href='datamahasiswa_admin.php';
					</script>	
				";
    } else {
        echo "
					<script> 
						alert('data gagal ditambahkan :)');
						document.location.href='datamahasiswa_admin.php';
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
                <li><a href="datamahasiswa_admin.php">Data Mahasiswa</a></li>
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
                <div style="text-align: center;">
                    <h1>Halaman Admin</h1>
                </div>
                <h3 style="text-align:center; color:black;">Daftar Mahasiswa Universitas David Office</h3>
                <div class="tengah">
                    <div class="button-utama">
                        <button style="width:150px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-user-plus"></i> Tambah Data</button>
                        <a target="_BLANK" style="width:100px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-secondary" href="cetak_mhs.php"><i class="fas fa-print"></i> Cetak</a>
                        <a style="margin-right: 10px; margin-bottom: 10px;" onclick="return confirm(' yakin keluar ?');" href="logout.php" type="button" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        <!-- <button style="margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Login</button> -->
                    </div>
                    <form class="input-keyword" action="" method="POST">
                        <label for="keyword"><i class="fas fa-search"></i></label>
                        <input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword" value="">
                        <button type="submit" hidden name="cari" id="tombolCari">Cari!</button>
                        <img src="gambar/loader.gif" class="loader">
                    </form>
                </div>

                <div class="table-responsive">
                    <div id="container">
                        <table class="table table-hover table-dark">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tbody>
                                    <tr>
                                        <td scope="row"> <?= $i; ?> </td>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['jurusan']; ?> </td>
                                        <td>
                                            <a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-success"><i class="far fa-edit"></i> Ubah</a> |
                                            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm(' yakin ?');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </table> <br> <br>
                    </div>
                </div>
            </div>


            <!-- Tambah Proses -->
            <div style="margin: 110px auto;" class="modal" id="tambahModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data</h5>
                            <button style="border: none; height:30px; width:30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="tbhMhs" style="text-align: left;">
                                <!-- <input type="hidden" name="action" value="tambah"> -->
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" required class="form-control" id="nim" name="nim" maxlength="12" onkeypress="return hanyaAngka(event)" value="" placeholder="NIM">
                                </div> <br>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" required class="form-control" id="nama" name="nama" value="" placeholder="Nama">
                                </div><br>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" required class="form-control" id="jurusan" name="jurusan" value="" placeholder="Jurusan">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambah" id="tblSimpan" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                        </div>
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
    <script src="js/script.js"></script>
</body>

</html>