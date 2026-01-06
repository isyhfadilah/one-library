<?php
include '../../config/db.php';
include '../../config/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id");
$buku = mysqli_fetch_assoc($query);

if (!$buku) {
    header("Location: katalog.php?status=error");
    exit();
}

$cover_path = "../../assets/img/covers/" . $buku['cover_url'];
$cover_img = (!empty($buku['cover_url']) && file_exists($cover_path)) ? $cover_path : "https://via.placeholder.com/300x400?text=No+Cover";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $buku['judul'] ?> | OneLib</title>
    <?php include '../../components/meta.php'; ?>
</head>

<body class="bg-[#F8FAFC] text-[#1E293B]">
    <div class="min-h-screen flex">
        <?php include '../../components/sidebar.php'; ?>

        <main class="flex-1 overflow-y-auto">
            <?php
            $show_back = true;
            $header_title = $buku['judul'];
            $header_subtitle = "Karya " . $buku['penulis'] . " • " . $buku['kategori'];

            if ($buku['stok'] > 0) {
                $header_button_label = "Pinjam Buku";
                $header_button_link = "../transaksi/transaksi-form.php?isbn=" . $buku['isbn'];
            } else {
                $header_button_label = "Stok Habis";
                $header_button_link = "#";
            }

            include '../../components/header.php';
            ?>

            <div class="max-w-6xl mx-auto p-10">
                <div class="flex flex-col lg:flex-row gap-12">

                    <div class="w-full lg:w-80 flex-shrink-0">
                        <div class="bg-white p-3 rounded-3xl border border-slate-200 shadow-sm">
                            <img src="<?= $cover_img ?>"
                                class="w-full aspect-[3/4.5] object-cover rounded-xl shadow-md"
                                alt="<?= $buku['judul'] ?>">
                        </div>

                        <div class="mt-8 space-y-4">
                            <div class="flex justify-between items-center px-2">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Status Stok</span>
                                <span class="text-sm font-bold <?= $buku['stok'] > 0 ? 'text-emerald-600' : 'text-rose-500' ?>">
                                    <?= $buku['stok'] > 0 ? $buku['stok'] . ' Tersedia' : 'Kosong' ?>
                                </span>
                            </div>
                            <div class="h-px bg-slate-200"></div>
                            <div class="flex justify-between items-center px-2">
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tahun Terbit</span>
                                <span class="text-sm font-bold text-slate-700"><?= $buku['tahun_terbit'] ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="mb-10">
                            <span class="inline-block px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-[10px] font-bold uppercase tracking-widest mb-4">
                                <?= $buku['kategori'] ?>
                            </span>
                            <h2 class="text-3xl font-bold text-slate-800 leading-tight mb-4 tracking-tight">
                                <?= $buku['judul'] ?>
                            </h2>
                            <p class="text-slate-500 font-medium">Ditulis oleh <span class="text-slate-900 font-bold"><?= $buku['penulis'] ?></span></p>
                        </div>

                        <div class="mb-12">
                            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                                <i class="ph-bold ph-text-align-left text-base text-indigo-500"></i>
                                Sinopsis Buku
                            </h3>
                            <div class="text-slate-600 leading-relaxed text-[15px]">
                                <?= !empty($buku['sinopsis']) ? nl2br($buku['sinopsis']) : '<span class="italic text-slate-400">Belum ada sinopsis untuk buku ini.</span>' ?>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-8 border-t border-slate-200">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-barcode text-slate-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Nomor ISBN</p>
                                    <p class="text-sm font-bold text-slate-700"><?= $buku['isbn'] ?></p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <i class="ph-bold ph-buildings text-slate-500 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Penerbit</p>
                                    <p class="text-sm font-bold text-slate-700"><?= $buku['penerbit'] ?></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>