<?php
include '../../config/db.php';
include '../../modules/anggota.php';
include '../../config/functions.php';

$total_anggota = mysqli_num_rows($result_anggota);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kelola Data Anggota | OneLib</title>
    <?php include '../../components/meta.php'; ?>
</head>

<body class="bg-[#F8FAFC]">
    <div class="min-h-screen flex text-[#1E293B]">
        <?php include '../../components/sidebar.php'; ?>

        <main class="flex-1 overflow-y-auto">
            <?php
            $header_title = "Manajemen Data Anggota";
            $header_subtitle = "Total terdapat " . number_format($total_anggota) . " anggota terdaftar.";
            $header_button_label = "Tambah Anggota Baru";
            $header_button_link = "tambah-anggota.php";
            include '../../components/header.php';
            ?>

            <section class="p-8">
                <div class="mb-8 flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                    <?php include '../../components/search-bar.php'; ?>

                    <div class="flex items-center bg-slate-100 p-1.5 rounded-2xl gap-1 self-start lg:self-center">
                        <a href="index.php"
                            class="flex items-center gap-2 px-4 py-2 text-slate-500 hover:text-slate-700 rounded-xl text-xs font-bold transition-all">
                            <i class="ph-bold ph-grid-four text-base"></i>
                            Daftar
                        </a>

                        <a href="kelola-anggota.php"
                            class="flex items-center gap-2 px-4 py-2 bg-white text-indigo-600 rounded-xl shadow-sm text-xs font-bold transition-all border border-slate-200/50">
                            <i class="ph-fill ph-list-bullets text-base"></i>
                            Kelola Data
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/50 border-b border-slate-100">
                                    <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                                        Informasi Anggota
                                    </th>
                                    <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                                        Program Studi
                                    </th>
                                    <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-center">
                                        Status
                                    </th>
                                    <th class="p-5 text-[11px] font-bold text-slate-400 uppercase tracking-widest text-right">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-slate-50">
                                <?php if (mysqli_num_rows($result_anggota) > 0): ?>
                                    <?php while ($row = mysqli_fetch_assoc($result_anggota)): ?>
                                        <tr class="hover:bg-slate-50/50 transition-colors group">
                                            <td class="p-5">
                                                <div class="flex items-center gap-4">
                                                    <img src="../../assets/img/anggota/<?= $row['foto'] ?>"
                                                        class="w-10 h-10 rounded-full object-cover shadow-sm group-hover:scale-105 transition-transform">

                                                    <div class="flex flex-col">
                                                        <span class="font-bold text-slate-800 text-sm">
                                                            <?= $row['nama'] ?>
                                                        </span>
                                                    <p class="text-xs text-slate-500 mt-0.5">
                                                        <?= $row['nim_nip'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="p-5">
                                                <span class="text-sm text-slate-600 font-medium">
                                                    <?= $row['prodi'] ?>
                                                </span>
                                            </td>

                                            <td class="p-5 text-center">
                                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                                    <?= $row['status'] === 'aktif'
                                                        ? 'bg-emerald-100 text-emerald-600'
                                                        : 'bg-slate-100 text-slate-500' ?>">
                                                    <?= $row['status'] ?>
                                                </span>
                                            </td>

                                            <td class="p-5">
                                                <div class="flex justify-end gap-1">
                                                    <a href="edit-anggota.php?id=<?= $row['id_anggota'] ?>"
                                                        class="p-2.5 text-amber-500 hover:bg-amber-50 rounded-xl transition-all"
                                                        title="Edit Data">
                                                        <i class="ph-bold ph-pencil-simple text-lg"></i>
                                                    </a>

                                                    <button type="button"
                                                        onclick="confirmDelete(<?= $row['id_anggota'] ?>, '<?= $row['nama'] ?>')"
                                                        class="p-2.5 text-rose-500 hover:bg-rose-50 rounded-xl transition-all"
                                                        title="Hapus Data">
                                                        <i class="ph-bold ph-trash text-lg"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="p-24 text-center">
                                            <div class="flex flex-col items-center">
                                                <i class="ph-bold ph-users text-5xl text-slate-200 mb-4"></i>
                                                <p class="text-slate-500 font-medium">Anggota tidak ditemukan.</p>
                                                <a href="kelola-anggota.php"
                                                    class="mt-2 text-sm text-indigo-600 font-bold hover:underline">
                                                    Reset Pencarian
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php include '../../components/alert.php'; ?>
</body>

</html>