<?php
include '../config/db.php'; // Pastikan koneksi dipanggil
include '../modules/buku.php'; // Berisi logic SELECT & SEARCH yang kita buat tadi
include '../config/functions.php';

// Hitung total buku untuk ditampilkan di header
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
                    <form action="" method="GET" class="flex gap-2 w-full md:w-1/2">
                        <input type="text" name="search"
                            value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
                            class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                            placeholder="Cari judul, penulis, atau ISBN...">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl font-semibold text-sm transition-all">
                            <i class="ph-bold ph-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php if (mysqli_num_rows($result_buku) > 0): ?>
                        <?php while ($row = mysqli_fetch_assoc($result_buku)): ?>
                            <?php
                            // Tentukan status berdasarkan stok
                            $status = ($row['stok'] > 0) ? "Tersedia" : "Kosong";

                            // Tentukan URL gambar
                            $cover_path = "../assets/img/covers/" . $row['cover_url'];
                            // Cek apakah file ada, jika tidak pakai placeholder
                            $cover_img = (!empty($row['cover_url']) && file_exists($cover_path)) ? $cover_path : "https://via.placeholder.com/300x400?text=No+Cover";

                            // Panggil fungsi render yang kamu punya
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