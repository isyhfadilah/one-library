<?php
// DO NOT include modules here
include '../../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tambah Anggota Baru | OneLib</title>

    <!-- IMPORTANT: meta.php MUST use absolute asset paths -->
    <?php include '../../components/meta.php'; ?>
</head>

<body>
<div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
    <?php include '../../components/sidebar.php'; ?>

    <main class="flex-1 overflow-y-auto">
        <?php
        $header_title = "Tambah Anggota Baru";
        $header_subtitle = "Input data anggota baru perpustakaan.";
        include '../../components/header.php';
        ?>

        <section class="p-8 max-w-6xl mx-auto">

            <form
                action="/one-library/modules/anggota.php"
                method="POST"
                enctype="multipart/form-data"
                class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- FOTO -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-4 block">
                            Foto Profil
                        </label>

                        <div class="relative aspect-square w-full bg-slate-50 rounded-2xl border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden">
                            <img id="coverPreview" class="absolute inset-0 w-full h-full object-cover hidden">

                            <div id="uploadPlaceholder" class="text-center p-6">
                                <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="ph-bold ph-user text-3xl"></i>
                                </div>
                                <p class="text-sm font-bold text-slate-700">Upload Foto</p>
                                <p class="text-xs text-slate-400 mt-1">JPG / PNG</p>
                            </div>

                            <input
                                type="file"
                                name="foto"
                                accept="image/*"
                                class="absolute inset-0 opacity-0 cursor-pointer"
                                onchange="previewCover(event)">
                        </div>
                    </div>
                </div>

                <!-- FORM DATA -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
                        <h3 class="text-sm font-bold text-indigo-600 uppercase tracking-widest mb-6 flex items-center gap-2">
                            <i class="ph-fill ph-users"></i> Informasi Anggota
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="md:col-span-2">
                                <label class="text-sm font-bold text-slate-700">Nama Lengkap</label>
                                <input
                                    type="text"
                                    name="nama"
                                    required
                                    class="w-full px-4 py-3.5 rounded-2xl border border-slate-200">
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700">NIM</label>
                                <input
                                    type="text"
                                    name="nim_nip"
                                    required
                                    class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 font-mono">
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700">Program Studi</label>
                                <input
                                    type="text"
                                    name="prodi"
                                    required
                                    class="w-full px-4 py-3.5 rounded-2xl border border-slate-200">
                            </div>

                            <div>
                                <label class="text-sm font-bold text-slate-700">Status</label>
                                <select
                                    name="status"
                                    class="w-full px-4 py-3.5 rounded-2xl border border-slate-200 bg-white">
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Nonaktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-8 border-t border-slate-50 mt-8">
                            <button
                                type="button"
                                onclick="history.back()"
                                class="px-6 py-3.5 rounded-2xl font-bold text-slate-400 hover:bg-slate-50">
                                Batal
                            </button>

                            <button
                                type="submit"
                                name="tambah_anggota"
                                class="px-10 py-3.5 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg">
                                Tambah Anggota
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
    reader.onload = () => {
        document.getElementById('coverPreview').src = reader.result;
        document.getElementById('coverPreview').classList.remove('hidden');
        document.getElementById('uploadPlaceholder').classList.add('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>