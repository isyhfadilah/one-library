<?php
if (isset($_POST['tambah_buku'])) {
    $judul        = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis      = mysqli_real_escape_string($conn, $_POST['penulis']);
    $isbn         = mysqli_real_escape_string($conn, $_POST['isbn']);
    $kategori     = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];
    $penerbit     = mysqli_real_escape_string($conn, $_POST['penerbit']);
    $stok         = (int)$_POST['stok'];
    $sinopsis     = mysqli_real_escape_string($conn, $_POST['sinopsis']);

    $cover_url = "default_cover.jpg";
    if (isset($_FILES['cover_url']) && $_FILES['cover_url']['error'] == 0) {
        $target_dir = "../assets/img/covers/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES["cover_url"]["name"], PATHINFO_EXTENSION);
        $file_name = time() . "_" . $isbn . "." . $file_extension;
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["cover_url"]["tmp_name"], $target_file)) {
            $cover_url = $file_name;
        }
    }

    $sql = "INSERT INTO buku (judul, penulis, isbn, kategori, tahun_terbit, penerbit, stok, sinopsis, cover_url) 
            VALUES ('$judul', '$penulis', '$isbn', '$kategori', '$tahun_terbit', '$penerbit', '$stok', '$sinopsis', '$cover_url')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../views/katalog.php?status=tambah_berhasil");
        exit();
    } else {
        header("Location: buku.php?status=error");
    }
}

if (isset($_POST['edit_buku'])) {
    $id           = $_POST['id_buku'];
    $judul        = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis      = mysqli_real_escape_string($conn, $_POST['penulis']);
    $stok         = (int)$_POST['stok'];
    $kategori     = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];

    $sql = "UPDATE buku SET 
            judul='$judul', 
            penulis='$penulis', 
            stok='$stok', 
            kategori='$kategori', 
            tahun_terbit='$tahun_terbit' 
            WHERE id_buku=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: buku.php?status=edit_berhasil");
        exit();
    }
}

if (isset($_GET['hapus_id'])) {
    $id = (int)$_GET['hapus_id'];

    $cek = mysqli_query($conn, "SELECT cover_url FROM buku WHERE id_buku=$id");
    $data = mysqli_fetch_assoc($cek);
    if ($data['cover_url'] != 'default_cover.jpg') {
        unlink("../assets/img/covers/" . $data['cover_url']);
    }

    $sql = "DELETE FROM buku WHERE id_buku=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: buku.php?status=hapus_berhasil");
        exit();
    }
}
$keyword = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$query_buku = "SELECT * FROM buku WHERE 
               judul LIKE '%$keyword%' OR 
               penulis LIKE '%$keyword%' OR 
               isbn LIKE '%$keyword%'
               ORDER BY id_buku DESC";
$result_buku = mysqli_query($conn, $query_buku);
