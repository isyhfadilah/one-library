<?php
include '../../config/db.php';
include '../../config/functions.php';

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
    ORDER BY t.id_transaksi DESC
";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laporan Transaksi | OneLib</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            body { background: white; }
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 p-8 min-h-screen">

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-sm border border-slate-100 print:shadow-none print:border-none print:p-0">
        
        <div class="flex justify-between items-start mb-8 pb-8 border-b border-slate-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                    <i class="ph-fill ph-books text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">OneLib SATU University</h1>
                    <p class="text-sm text-slate-500">Laporan Riwayat Transaksi Perpustakaan</p>
                </div>
            </div>
            <div class="text-right">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tanggal Cetak</p>
                <p class="font-bold text-slate-800"><?= date('d F Y') ?></p>
            </div>
        </div>

        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b-2 border-slate-100">
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">ID</th>
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">Mahasiswa</th>
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">Buku</th>
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">Pinjam</th>
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">Kembali</th>
                    <th class="py-3 font-bold text-slate-500 uppercase text-xs">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <?php
                        $statusClass = match(strtolower($row['status_pinjam'])) {
                            'dipinjam' => 'text-amber-600 bg-amber-50',
                            'kembali' => 'text-emerald-600 bg-emerald-50',
                            default => 'text-slate-600 bg-slate-50'
                        };
                        
                        // Cek terlambat
                        if (strtolower($row['status_pinjam']) == 'dipinjam' && date('Y-m-d') > $row['tgl_kembali']) {
                            $statusClass = 'text-rose-600 bg-rose-50';
                            $row['status_pinjam'] = 'Terlambat';
                        }
                        ?>
                        <tr class="group print:break-inside-avoid">
                            <td class="py-3 font-mono text-xs text-slate-500">
                                #TRX-<?= str_pad($row['id_transaksi'], 4, '0', STR_PAD_LEFT) ?>
                            </td>
                            <td class="py-3">
                                <span class="block font-bold text-slate-800"><?= $row['nama'] ?></span>
                                <span class="text-xs text-slate-400"><?= $row['nim_nip'] ?></span>
                            </td>
                            <td class="py-3 font-medium text-slate-700 max-w-[200px] truncate">
                                <?= $row['judul'] ?>
                            </td>
                            <td class="py-3 text-slate-500">
                                <?= date('d M Y', strtotime($row['tgl_pinjam'])) ?>
                            </td>
                            <td class="py-3 text-slate-500">
                                <?= date('d M Y', strtotime($row['tgl_kembali'])) ?>
                            </td>
                            <td class="py-3">
                                <span class="px-2 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider <?= $statusClass ?>">
                                    <?= ucfirst($row['status_pinjam']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="py-8 text-center text-slate-400 italic">
                            Tidak ada data transaksi.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="mt-12 pt-8 border-t border-slate-100 flex justify-between items-center text-xs text-slate-400">
            <p>Dicetak otomatis oleh sistem OneLib.</p>
            <p>Page <span class="page-number"></span></p>
        </div>
    </div>

    <div class="fixed bottom-8 right-8 flex gap-3 no-print">
        <a href="index.php" class="bg-white text-slate-600 px-6 py-3 rounded-full font-bold shadow-lg border border-slate-100 hover:bg-slate-50 transition">
            Kembali
        </a>
        <button onclick="window.print()" class="bg-indigo-600 text-white px-6 py-3 rounded-full font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256"><path d="M216,40H184V24a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8V40H40A16,16,0,0,0,24,56V176a16,16,0,0,0,16,16H48v40a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V192h24a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM88,32h80V40H88ZM192,232H64V160H192v72Zm24-56H192V152a8,8,0,0,0-8-8H72a8,8,0,0,0-8,8v24H40V56H216V176Z"></path></svg>
            Cetak PDF
        </button>
    </div>

</body>
</html>
