<?php
include '../config/db.php';
include '../modules/buku.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Buku Baru | OneLib</title>
    <?php include '../components/meta.php'; ?>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <?php include '../components/sidebar.php'; ?>

        <main class="flex-1 overflow-y-auto">
            <?php
            $header_title = "Tambah Koleksi Buku";
            $header_subtitle = "Input data buku baru ke dalam katalog perpustakaan.";

            include '../components/header.php';
            ?>

            <section class="p-8 max-w-6xl mx-auto">
                <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                            <label
                                class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-4 block">Sampul
                                Buku</label>

                            <div
                                class="relative aspect-[3/4] w-full bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex flex-col items-center justify-center overflow-hidden group hover:border-indigo-300 transition-all">
                                <img id="coverPreview" src=""
                                    class="absolute inset-0 w-full h-full object-cover hidden">

                                <div id="uploadPlaceholder" class="text-center p-6">
                                    <div
                                        class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="ph-bold ph-image text-3xl"></i>
                                    </div>
                                    <p class="text-sm font-bold text-slate-700">Pilih File Sampul</p>
                                    <p class="text-xs text-slate-400 mt-1">Format JPG atau PNG (Maks. 2MB)</p>
                                </div>

                                <input type="file" name="cover_url" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*"
                                    onchange="previewCover(event)">
                            </div>

                            <button type="button" onclick="window.location.reload()"
                                class="w-full mt-4 py-2 text-xs font-bold text-rose-500 hover:bg-rose-50 rounded-xl transition">Hapus
                                Foto</button>
                        </div>

                        <div class="bg-indigo-600 p-6 rounded-3xl shadow-lg shadow-indigo-100 text-white">
                            <div class="flex items-start gap-4">
                                <i class="ph-fill ph-info text-2xl"></i>
                                <div>
                                    <p class="font-bold mb-1">Tips Input ISBN</p>
                                    <p class="text-xs text-indigo-100 leading-relaxed">Gunakan pemindai barcode untuk
                                        input ISBN yang lebih cepat dan akurat.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                            <h3
                                class="text-sm font-bold text-indigo-600 uppercase tracking-widest mb-6 flex items-center gap-2">
                                <i class="ph-fill ph-identification-card"></i> Informasi Bibliografi
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2 space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Judul Buku</label>
                                    <input type="text" name="judul" placeholder="Masukkan judul lengkap buku"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Penulis / Pengarang</label>
                                    <input type="text" name="penulis" placeholder="Nama penulis"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">ISBN-13</label>
                                    <input type="text" name="isbn" placeholder="978-xxxxxxxxxx"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all font-mono">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Kategori / Genre</label>
                                    <select
                                        name="kategori"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none bg-white">
                                        <option>Pilih Kategori</option>
                                        <option>Teknologi</option>
                                        <option>Sains</option>
                                        <option>Fiksi</option>
                                        <option>Ekonomi</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Tahun Terbit</label>
                                    <input name="tahun_terbit" type="number" placeholder="2024"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Penerbit</label>
                                    <input type="text" name="penerbit" placeholder="Nama penerbit"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>

                                <div class="space-y-2">
                                    <label class="text-sm font-bold text-slate-700">Jumlah Stok</label>
                                    <input type="number" name="stok" value="1"
                                        class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all">
                                </div>
                            </div>

                            <div class="mt-6 space-y-2">
                                <label class="text-sm font-bold text-slate-700">Ringkasan / Sinopsis</label>
                                <textarea name="sinopsis" rows="4" placeholder="Tuliskan deskripsi singkat mengenai isi buku..."
                                    class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 outline-none transition-all resize-none"></textarea>
                            </div>

                            <div class="flex justify-end gap-3 pt-8 border-t border-slate-50 mt-8">
                                <button type="button"
                                    class="px-6 py-3.5 rounded-2xl font-bold text-slate-400 hover:bg-slate-50 transition">Batal</button>
                                <button type="submit" name="tambah_buku"
                                    class="px-10 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition transform active:scale-95 flex items-center gap-2">
                                    <i class="ph-bold ph-floppy-disk"></i> Simpan ke Katalog
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