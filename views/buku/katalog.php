<?php
include '../config/db.php';
include '../modules/buku.php';
include '../config/functions.php';

$total_buku = mysqli_num_rows($result_buku);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Katalog Buku | OneLib</title>
    <?php include '../components/meta.php'; ?>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <?php include '../components/sidebar.php'; ?>
        <main class="flex-1 overflow-y-auto">
            <?php
            $header_title = "Katalog Koleksi Buku";
            $header_subtitle = "Total terdapat " . number_format($total_buku) . " judul buku yang terdaftar.";
            $header_button_label = "Tambah Buku";
            $header_button_link = "tambah-buku.php";

            include '../components/header.php';
            ?>

            <section class="p-8">
                <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <?php include '../components/search-bar.php'; ?>

                    <div class="flex items-center bg-slate-100 p-1.5 rounded-2xl gap-1">
                        <a href="katalog.php"
                            class="flex items-center gap-2 px-4 py-2 bg-white text-indigo-600 rounded-xl shadow-sm text-xs font-bold transition-all">
                            <i class="ph-fill ph-grid-four text-base"></i>
                            Katalog
                        </a>

                        <a href="kelola-buku.php"
                            class="flex items-center gap-2 px-4 py-2 text-slate-500 hover:text-slate-700 rounded-xl text-xs font-bold transition-all">
                            <i class="ph-bold ph-list-bullets text-base"></i>
                            Kelola Data
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php if (mysqli_num_rows($result_buku) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_buku)): ?>
                            <?php
                            $status = ($row['stok'] > 0) ? "Tersedia" : "Kosong";

                            $cover_path = "../assets/img/covers/" . $row['cover_url'];
                            $cover_img = (!empty($row['cover_url']) && file_exists($cover_path)) ? $cover_path : "https://via.placeholder.com/300x400?text=No+Cover";

                            renderBookCard(
                                $row['judul'],
                                $row['penulis'],
                                $row['isbn'],
                                $status,
                                $cover_img
                            );
                            ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-span-full py-20 text-center">
                            <i class="ph-bold ph-books text-64px text-slate-200 mb-4 block"></i>
                            <p class="text-slate-500 font-medium">Buku tidak ditemukan.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

    <?php include '../components/alert.php'; ?>
</body>

</html>