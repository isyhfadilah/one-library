<?php
include '../config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Anggota | OneLib SATU University</title>
    <?php include '../components/meta.php'; ?>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <?php include '../components/sidebar.php'; ?>

        <main class="flex-1 overflow-y-auto">
            <?php
            $header_title = "Manajemen Anggota";
            $header_subtitle = "Kelola data mahasiswa dan status keanggotaan perpus.";
            $header_button_label = "Tambah Anggota";
            $header_button_link = "tambah-anggota.php";

            include '../components/header.php';
            ?>

            <section class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <?php
                    renderStatCard("Total Anggota", "1,240", "ph-users-three", "indigo");
                    renderStatCard("Aktif", "1,192", "ph-check-circle", "emerald");
                    renderStatCard("Ditangguhkan", "48", "ph-prohibit", "rose");
                    ?>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800">Daftar Mahasiswa</h3>
                        <button
                            class="text-sm font-semibold text-slate-500 hover:text-indigo-600 flex items-center gap-2">
                            <i class="ph ph-funnel"></i> Filter
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50">
                                <tr>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        NIM</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Program Studi</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Email</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <?php
                                renderMemberRow("Aditya Saputra", "240192831", "Teknik Informatika", "aditya.s@binus.ac.id", "Aktif");
                                renderMemberRow("Budi Kusuma", "240192110", "Desain Komunikasi Visual", "budi.k@binus.ac.id", "Suspended");
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <?php include '../components/pagination.php'; ?>
                </div>
            </section>
        </main>
    </div>
</body>

</html>