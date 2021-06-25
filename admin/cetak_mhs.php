<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../datamahasiswa.php");
    exit;
}

require '../functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../gambar/v.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Cetak MHS</title>
</head>

<body>
    <header style="text-align: center; padding: 50px 20px 0px 20px;">
        <div style="display: flex;">
            <div style="width: 20%;">
                <img src="../gambar/utm.png" width="100px" height="100px" alt="">
            </div>
            <div style="width: 60%; padding-top: 15px; ">
                <h3>Universitas David Office Website</h3>
                <h5>Daftar Mahasiswa Univ. David Nasrulloh</h5>
            </div>
            <div style="width: 20%;">
                <img src="../gambar/himasi.png" width="100px" height="100px" alt="">
            </div>
            <br>
        </div>
        <div style="text-align: center;" class="container">
            <div style="text-align:center; display:block; border-bottom: 4px solid black; padding: 10px;"></div>
        </div>
    </header>
    <main class="containerku" style="display: block; padding:20px;">
        <div class="container">
            <hr>
            <div id="container">
                <table class="table table-hover">
                    <thead class="head-table">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
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
                            </tr>
                        </tbody>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div style="display: block;">
            <div style="position: absolute; right: -980px; text-align:center; padding: 30px 100px; right:0;">
                <p>Mengetahui</p>
                <p>Rektor Univ. DO</p>
                <br><br><br>
                <p style="text-decoration:underline;">(David Nasrulloh)</p>
            </div>
            <footer style="text-align: center; padding-top:250px;">
                Copyright &copy; 2021 | David Nasrulloh | 190441100060
            </footer> <br> <br>
        </div>
        <script>
            window.print();
        </script>
</body>

</html>