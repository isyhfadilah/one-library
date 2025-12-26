<?php
include '../../config/functions.php';
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
            $header_subtitle = "Pantau peminjaman, pengembalian, dan denda mahasiswa.";
            $header_button_label = "Ekspor Laporan";
            $header_button_link = "laporan.php";

            include '../../components/header.php'; ?>

            <section class="p-8">
                <?php include '../../components/filters-tab.php'; ?>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        ID Transaksi</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Buku</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Tgl Pinjam</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Tgl Kembali</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Status</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <?php
                                renderTransactionRow("#TRX-8821", "Aditya Saputra", "240192831", "The Pragmatic Programmer", "12 Des 2025", "19 Des 2025", "Dipinjam");
                                renderTransactionRow("#TRX-8819", "Rina Rose", "240192552", "Clean Code", "10 Des 2025", "17 Des 2025", "Kembali");
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php include '../../components/pagination.php'; ?>
                </div>

            </section>
        </main>
    </div>
</body>

</html>