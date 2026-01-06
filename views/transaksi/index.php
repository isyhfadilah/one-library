<?php
include '../../config/functions.php';
include '../../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaksi | OneLib SATU University</title>
    <?php include '../../components/meta.php'; ?>
</head>

<body>
<div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
    <?php include '../../components/sidebar.php'; ?>

    <main class="flex-1 overflow-y-auto">
        <?php
        $header_title = "Riwayat Transaksi";
        $header_subtitle = "Pantau peminjaman dan pengembalian buku mahasiswa.";
        $header_button_label = "Ekspor Laporan";
        $header_button_link = "laporan.php";
        include '../../components/header.php';
        ?>

        <section class="p-8">
            <?php include '../../components/filters-tab.php'; ?>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50 border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">ID Transaksi</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Mahasiswa</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Buku</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Tgl Pinjam</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Tgl Kembali</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Status</th>
                                <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php
                            $statusFilter = $_GET['status'] ?? 'semua';
                            $whereClause  = "";

                            if ($statusFilter === 'dipinjam') {
                                $whereClause = "WHERE t.status_pinjam = 'dipinjam'";
                            } elseif ($statusFilter === 'kembali') {
                                $whereClause = "WHERE t.status_pinjam = 'kembali'";
                            } elseif ($statusFilter === 'terlambat') {
                                $whereClause = "WHERE t.status_pinjam = 'dipinjam' AND CURDATE() > t.tgl_kembali";
                            }

                            $query = "
                                SELECT 
                                    t.id_transaksi,
                                    t.tgl_pinjam,
                                    t.tgl_kembali,
                                    t.status_pinjam,
                                    a.nama,
                                    a.nim_nip,
                                    b.judul
                                FROM transaksi t
                                JOIN anggota a ON t.id_anggota = a.id_anggota
                                JOIN buku b ON t.id_buku = b.id_buku
                                $whereClause
                                ORDER BY t.id_transaksi DESC
                            ";

                            $result = $conn->query($query);

                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    
                                    $isTerlambat = ($row['status_pinjam'] === 'dipinjam' && date('Y-m-d') > $row['tgl_kembali']);
                                    $displayStatus = $isTerlambat ? 'Terlambat' : ucfirst($row['status_pinjam']);

                                    renderTransactionRow(
                                        '#TRX-' . str_pad($row['id_transaksi'], 4, '0', STR_PAD_LEFT),
                                        $row['nama'],
                                        $row['nim_nip'],
                                        $row['judul'],
                                        date('d M Y', strtotime($row['tgl_pinjam'])),
                                        date('d M Y', strtotime($row['tgl_kembali'])),
                                        $displayStatus
                                    );
                                }
                            } else {
                                echo "
                                <tr>
                                    <td colspan='7' class='px-6 py-10 text-center text-slate-400'>
                                        Belum ada data transaksi
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <?php include '../../components/pagination.php'; ?>
            </div>
        </section>
    </main>
</div>

<?php include '../../components/alert.php'; ?>
</body>
</html>