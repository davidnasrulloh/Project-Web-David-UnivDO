<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../tabeltamu.php");
    exit;
}

require '../functions.php';

$id = $_GET["id"];

if (hapusmhs($id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus :)');
            document.location.href = 'tabeltamu_admin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus :)');
            document.location.href = 'tabeltamu_admin.php';
        </script>
    ";
}
