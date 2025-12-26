<?php
include '../../config/db.php';
include '../../modules/buku.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

// Ambil data buku yang akan diedit
if ($id) {
    $query = "SELECT * FROM buku WHERE id_buku = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    // Jika data tidak ditemukan, balikkan ke halaman kelola
    if (!$data) {
        header("Location: kelola.php");
        exit;
    }
} else {
    header("Location: kelola.php");
    exit;
}

// Tentukan path cover
$cover_path = "../../assets/img/covers/" . $data['cover_url'];
$cover_img = (!empty($data['cover_url']) && file_exists($cover_path)) ? $cover_path : null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Buku: <?= $data['judul'] ?> | OneLib</title>
    <?php include '../../components/meta.php'; ?>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <?php include '../../components/sidebar.php'; ?>

        <main class="flex-1 overflow-y-auto">
            <?php
            $header_title = "Edit Data Buku";
            $header_subtitle = "Perbarui informasi detail untuk buku '" . $data['judul'] . "'";
            include '../../components/header.php';
            ?>

            <section class="p-8 max-w-6xl mx-auto">
                <form action="../../modules/buku.php" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">

                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                            <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-4 block">Sampul Buku</label>

                            <div class="relative aspect-[3/4] w-full bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden group hover:border-indigo-300 transition-all">
                                <img id="coverPreview" src="<?= $cover_img ?>"
                                    class="absolute inset-0 w-full h-full object-cover <?= $cover_img ? '' : 'hidden' ?>">

                                <div id="uploadPlaceholder" class="text-center p-6 <?= $cover_img ? 'hidden' : '' ?>">
                                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="ph-bold ph-image text-3xl"></i>
                                    </div>
                                    <p class="text-sm font-bold text-slate-700">Ganti File Sampul</p>
                                    <p class="text-xs text-slate-400 mt-1">Format JPG/PNG (Maks. 2MB)</p>
                                </div>

                                <input type="file" name="cover_url" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" onchange="previewCover(event)">
                            </div>

                            <p class="mt-4 text-[10px] text-center text-slate-400 italic">*Biarkan kosong jika tidak ingin mengganti sampul</p>
                        </div>

                        <div class="bg-amber-50 p-6 rounded-3xl border border-amber-100 text-amber-800">
                            <div class="flex items-start gap-4">
                                <i class="ph-fill ph-warning-circle text-2xl"></i>
                                <div>
                                    <p class="font-bold mb-1 italic text-sm">Perhatian</p>
                                    <p class="text-xs leading-relaxed opacity-80">Pastikan ISBN tidak duplikat dengan buku lain agar sistem pencarian tetap akurat.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                            <h3 class="text-sm font-bold text-indigo-600 uppercase tracking-widest mb-6 flex items-center gap-2">
                                <i class="ph-fill ph-note-pencil"></i> Formulir Pembaruan Data
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Judul Buku</label>
                                    <input type="text" name="judul" value="<?= $data['judul'] ?>" required
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Penulis / Pengarang</label>
                                    <input type="text" name="penulis" value="<?= $data['penulis'] ?>" required
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">ISBN-13</label>
                                    <input type="text" name="isbn" value="<?= $data['isbn'] ?>" required
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all font-mono">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Kategori</label>
                                    <select name="kategori" class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none bg-white">
                                        <?php
                                        $categories = ['Teknologi', 'Sains', 'Fiksi', 'Ekonomi', 'Sejarah'];
                                        foreach ($categories as $cat): ?>
                                            <option value="<?= $cat ?>" <?= ($data['kategori'] == $cat) ? 'selected' : '' ?>><?= $cat ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Stok Tersedia</label>
                                    <input type="number" name="stok" value="<?= $data['stok'] ?>" required
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>
                            </div>

                            <div class="mt-6 space-y-2">
                                <label class="text-sm font-bold text-slate-700">Ringkasan / Sinopsis</label>
                                <textarea name="sinopsis" rows="4" class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all resize-none"><?= $data['sinopsis'] ?></textarea>
                            </div>

                            <div class="flex justify-end gap-3 pt-8 border-t border-slate-50 mt-8">
                                <a href="kelola-buku.php" class="px-6 py-3.5 rounded-2xl font-bold text-slate-400 hover:bg-slate-50 transition">Batal</a>
                                <button type="submit" name="edit_buku"
                                    class="px-10 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95 flex items-center gap-2">
                                    <i class="ph-bold ph-check-circle"></i> Perbarui Data
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        function previewCover(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('coverPreview');
                const placeholder = document.getElementById('uploadPlaceholder');
                output.src = reader.result;
                output.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>