<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../tabeltamu_admin.php");
    exit;
}

require '../functions.php';
$bukutamu = query("SELECT * FROM bukutamu ORDER BY id DESC");

if (isset($_POST["tambah"])) {
    if (tambahtamu($_POST) > 0) {
        echo "
            <script>
                alert('Data tamu berhasil ditambah :)');
                document.location.href = 'tabeltamu_admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal di masukkan');
                document.location.href = '../bukutamu.php';
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
    <!-- <link rel="stylesheet" href="css/utama.css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../gambar/v.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>David Nasruloh | 190441100060 </title>
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
            <a class="nav-link show2" id="btn-sidebar" href="#">Show or Close Side Bar <i class="fas fa-angle-left"></i><i class="fas fa-angle-right"></i></a>
        </nav>
    </div>
    <div style="display: flex;">
        <aside style="display: block;">
            <ul class="sidebar">
                <li><a href="../utama.html">Menu</a></li>
                <li><a href="../datamahasiswa.php">Data Mahasiswa</a></li>
                <li><a href="../profile.html">Profile</a></li>
                <li><a href="../bukutamu.php">Form Buku Tamu</a></li>
                <li><a href="tabeltamu_admin.php">Tabel Buku Tamu</a></li>
                <li><a href="../berita.html">Berita</a></li>
                <li><a href="../pengguna.html">Pihak Terkait</a></li>
                <li><a href="../setting.html">Setting</a></li>
            </ul>
        </aside>
        <main class="containerku" style="display: block;">
            <div class="container">
                <div class="tengah">
                    <div style="text-align: center;">
                        <h2>Tabel Buku Tamu | Halaman Admin</h2> <br>
                    </div>
                    <div class="button-utama" style=" text-align:left;">
                        <button style="width:150px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-user-plus"></i> Tambah Data</button>
                        <a target="_BLANK" style="width:100px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-secondary" href="cetak_tamu.php"><i class="fas fa-print"></i> Cetak</a>
                        <a style="margin-right: 10px; margin-bottom: 10px;" href="logout_tabeltamu.php" type="button" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>

                        <!-- <button style="width:150px; margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-user-plus"></i> Tambah Data</button> -->
                        <!-- <button style="margin-right: 10px; margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> Login</button> -->
                    </div>
                    <!-- <form class="input-keyword" action="" method="POST">
                        <label for="keyword"><i class="fas fa-search"></i></label>
                        <input class="cari" type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword" value="">
                        <button type="submit" hidden name="cari" id="tombolCari">Cari!</button>
                        <img src="gambar/loader.gif" class="loader">
                    </form> -->
                </div>

                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-dark">
                        <thead class="bg-primary" style="color: white; font-weight: bold;">
                            <tr>
                                <td>No</td>
                                <td>Nama Lengkap</td>
                                <td>Email</td>
                                <td>No Hp</td>
                                <td>Jenis Kelamin</td>
                                <td>Pesan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <?php foreach ($bukutamu as $row) : ?>
                            <tbody>
                                <tr>
                                    <td> <?= $i; ?> </td>
                                    <td> <?= $row['nama']; ?> </td>
                                    <td> <?= $row['email']; ?> </td>
                                    <td> <?= $row['nohp']; ?> </td>
                                    <td> <?= $row['jk']; ?> </td>
                                    <td> <?= $row['pesan']; ?> </td>
                                    <td>
                                        <a href="ubah_tabeltamu.php?id=<?= $row['id']; ?>" class="btn btn-success"><i class="far fa-edit"></i> Ubah</a> |
                                        <a href="hapus_tabeltamu.php?id=<?= $row['id']; ?>" onclick="return confirm(' yakin ?');" class="btn btn-danger"><i class="far fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <tfoot>
                            <tr>
                                <td>No</td>
                                <td>Nama Lengkap</td>
                                <td>Email</td>
                                <td>No Hp</td>
                                <td>Jenis Kelamin</td>
                                <td>Pesan</td>
                                <td>Aksi</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Tambah Proses -->
            <div style="margin: 10px auto;" class="modal" id="tambahModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Tamu</h5>
                            <button style="border: none; height:30px; width:30px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="tbhMhs" style="text-align: left;">
                                <!-- <input type="hidden" name="action" value="tambah"> -->
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" required class="form-control" id="nama" name="nama" value="" placeholder="Nama">
                                </div><br>
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input placeholder="Tulis email anda disini" class="form-control" id="email" name="email" type="email" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="nohp">No HP</label>
                                    <input type="text" required class="form-control" id="nohp" name="nohp" maxlength="12" onkeypress="return hanyaAngka(event)" value="" placeholder="No HP">
                                </div> <br>
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <div>
                                        <select class="form-control" name="jk" id="jk" required>
                                            <option value="laki-laki"> => Laki-laki</option>
                                            <option value="perempuan"> => Perempuan</option>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pesan">Pesan</label>
                                    <input type="text" required class="form-control" id="pesan" name="pesan" value="" placeholder="Pesan">
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
    <script src="../js/script.js"></script>
</body>

</html>