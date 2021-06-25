<?php
$conn = mysqli_connect("localhost", "root", "", "db_univdo");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Bagian Olah Data Tamu

function tambahtamu($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = $data["email"];
    $nohp = htmlspecialchars($data["nohp"]);
    $jk = htmlspecialchars($data["jk"]);
    $pesan = htmlspecialchars($data["pesan"]);

    // Query tambah data tamu
    $query = "INSERT INTO bukutamu VALUES('','$nama', '$email', '$nohp', '$jk', '$pesan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahtamu($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = $data["email"];
    $nohp = htmlspecialchars($data["nohp"]);
    $jk = htmlspecialchars($data["jk"]);
    $pesan = htmlspecialchars($data["pesan"]);

    // query update data tamu
    $query = "UPDATE bukutamu SET nama = '$nama', email = '$email', nohp = '$nohp', jk = '$jk', pesan = '$pesan' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Bagian Olah Data Mahasiswa

function tambahmhs($data)
{
    global $conn;

    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $result = mysqli_query($conn, "SELECT nim FROM mahasiswa WHERE nim = '$nim'");
    // cek nim sama atau tidak
    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('nim yang dimasukkan sudah terdaftar');
            </script>
        ";

        return false;
    }

    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('','$nim', '$nama', '$jurusan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahmhs($data)
{
    global $conn;

    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // query ubah data
    $query = "UPDATE mahasiswa SET nim='$nim', nama = '$nama', jurusan = '$jurusan' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapusmhs($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


// registrasi
function registrasi($data)
{
    global $conn;

    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username ada atau tidak
    $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah terdaftar');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
            <script> 
                alert('Konfirmasi password tidak sesuai :(');
            </script>
        ";

        return false;
    }

    // enkripsi password nya
    $password = password_hash($password, PASSWORD_DEFAULT);

    // TAMBAHKAN USER ARU KE DATABASE 
    mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
