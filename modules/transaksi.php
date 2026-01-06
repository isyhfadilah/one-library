<?php
include __DIR__ . '/../config/db.php';

if (isset($_GET['action']) && $_GET['action'] === 'getAnggota') {
    $nim = $_GET['nim'] ?? '';

    $stmt = $conn->prepare("
        SELECT id_anggota, foto, nama, nim_nip, prodi
        FROM anggota
        WHERE nim_nip = ?
        LIMIT 1
    ");
    $stmt->bind_param("s", $nim);
    $stmt->execute();

    echo json_encode($stmt->get_result()->fetch_assoc());
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'getBuku') {
    $isbn = $_GET['isbn'] ?? '';

    $stmt = $conn->prepare("
        SELECT id_buku, cover_url, judul, penulis, isbn, stok
        FROM buku
        WHERE isbn = ?
        LIMIT 1
    ");
    $stmt->bind_param("s", $isbn);
    $stmt->execute();

    echo json_encode($stmt->get_result()->fetch_assoc());
    exit;
}

function prosesTransaksi($data, $conn)
{
    if (empty($data['id_anggota']) || empty($data['id_buku'])) {
        return ['status' => false, 'message' => 'Data anggota atau buku belum lengkap'];
    }

    $idAnggota  = (int) $data['id_anggota'];
    $idBuku     = (int) $data['id_buku'];
    $tglKembali = $data['tgl_kembali'];

    $conn->begin_transaction();

    try {
        $cek = $conn->prepare("
            SELECT stok FROM buku
            WHERE id_buku = ?
            FOR UPDATE
        ");
        $cek->bind_param("i", $idBuku);
        $cek->execute();
        $result = $cek->get_result()->fetch_assoc();

        if (!$result || $result['stok'] <= 0) {
            throw new Exception('Stok buku habis');
        }

        $insert = $conn->prepare("
            INSERT INTO transaksi
            (id_anggota, id_buku, tgl_pinjam, tgl_kembali, status_pinjam)
            VALUES (?, ?, CURDATE(), ?, 'dipinjam')
        ");
        $insert->bind_param("iis", $idAnggota, $idBuku, $tglKembali);
        $insert->execute();

        $update = $conn->prepare("
            UPDATE buku SET stok = stok - 1
            WHERE id_buku = ?
        ");
        $update->bind_param("i", $idBuku);
        $update->execute();

        $conn->commit();

        return ['status' => true, 'message' => 'Transaksi berhasil'];

    } catch (Exception $e) {
        $conn->rollback();
        return ['status' => false, 'message' => $e->getMessage()];
    }
}

function getTanggalHariIni()
{
    return date('d M Y');
}

function defaultTanggalKembali($hari = 7)
{
    return date('Y-m-d', strtotime("+$hari days"));
}

if (isset($_GET['action']) && $_GET['action'] === 'kembalikan') {
    $idTransaksi = (int) ($_GET['id'] ?? 0);
    $redirect    = $_GET['redirect'] ?? '../views/transaksi/index.php';

    if ($idTransaksi > 0) {
        $conn->begin_transaction();
        try {
            $stmt = $conn->prepare("SELECT id_buku FROM transaksi WHERE id_transaksi = ? AND status_pinjam = 'dipinjam'");
            $stmt->bind_param("i", $idTransaksi);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                $idBuku = $row['id_buku'];

                $updateTrx = $conn->prepare("UPDATE transaksi SET status_pinjam = 'kembali' WHERE id_transaksi = ?");
                $updateTrx->bind_param("i", $idTransaksi);
                $updateTrx->execute();

                $updateStok = $conn->prepare("UPDATE buku SET stok = stok + 1 WHERE id_buku = ?");
                $updateStok->bind_param("i", $idBuku);
                $updateStok->execute();

                $conn->commit();
                header("Location: $redirect?status=kembali_berhasil");
            } else {
                throw new Exception("Transaksi tidak valid atau sudah dikembalikan.");
            }

        } catch (Exception $e) {
            $conn->rollback();
            header("Location: $redirect?status=error&msg=" . urlencode($e->getMessage()));
        }
    }
    exit;
}