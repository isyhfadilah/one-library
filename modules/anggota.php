<?php
include __DIR__ . '/../config/db.php';

$redirect_base = "/one-library/views/anggota/";
$upload_path   = __DIR__ . "/../assets/img/anggota/";

if (isset($_POST['tambah_anggota'])) {

    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $nim_nip = mysqli_real_escape_string($conn, $_POST['nim_nip']);
    $prodi   = mysqli_real_escape_string($conn, $_POST['prodi']);
    $status  = mysqli_real_escape_string($conn, $_POST['status']);

    $cek = mysqli_query($conn, "SELECT nim_nip FROM anggota WHERE nim_nip = '$nim_nip'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: {$redirect_base}index.php?status=nim_duplikat");
        exit();
    }

    $foto = "default.png";

    if (!empty($_FILES['foto']['name'])) {
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $ext  = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = time() . "_" . $nim_nip . "." . $ext;

        move_uploaded_file($_FILES['foto']['tmp_name'], $upload_path . $foto);
    }

    $sql = "INSERT INTO anggota (nama, nim_nip, prodi, status, foto)
            VALUES ('$nama', '$nim_nip', '$prodi', '$status', '$foto')";

    if (!mysqli_query($conn, $sql)) {
        header("Location: {$redirect_base}index.php?status=error");
        exit();
    }

    header("Location: {$redirect_base}index.php?status=tambah_berhasil");
    exit();
}
if (isset($_POST['edit_anggota'])) {

    $id = (int) $_POST['id_anggota'];
    if ($id <= 0) {
        header("Location: {$redirect_base}index.php?status=id_tidak_valid");
        exit();
    }

    $nama    = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $nim_nip = trim(mysqli_real_escape_string($conn, $_POST['nim_nip']));
    $prodi   = trim(mysqli_real_escape_string($conn, $_POST['prodi']));
    $status  = trim(mysqli_real_escape_string($conn, $_POST['status']));

    /* CEK NIM DUPLIKAT (AMAN) */
    $cek = mysqli_query($conn, "
        SELECT id_anggota FROM anggota
        WHERE nim_nip = '$nim_nip'
          AND id_anggota <> $id
        LIMIT 1
    ");

    if (mysqli_num_rows($cek) > 0) {
        header("Location: {$redirect_base}index.php?status=nim_duplikat");
        exit();
    }

    /* FOTO (OPSIONAL) */
    $foto_sql = "";

    if (!empty($_FILES['foto']['name'])) {
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $ext  = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = time() . "_" . $nim_nip . "." . $ext;

        move_uploaded_file($_FILES['foto']['tmp_name'], $upload_path . $foto);

        $foto_sql = ", foto = '$foto'";
    }

    /* UPDATE DATA */
    $sql = "
        UPDATE anggota SET
            nama    = '$nama',
            prodi   = '$prodi',
            status  = '$status'
            $foto_sql
        WHERE id_anggota = $id
    ";

    if (!mysqli_query($conn, $sql)) {
        header("Location: {$redirect_base}index.php?status=error");
        exit();
    }

    header("Location: {$redirect_base}index.php?status=edit_berhasil");
    exit();
}
if (isset($_GET['hapus_id'])) {

    $id = (int) $_GET['hapus_id'];

    mysqli_query($conn, "
        DELETE FROM anggota
        WHERE id_anggota = $id
    ");

    header("Location: {$redirect_base}index.php?status=hapus_berhasil");
    exit();
}