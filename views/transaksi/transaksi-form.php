<?php
include '../../config/functions.php';
include '../../modules/transaksi.php';

$tglHariIni = getTanggalHariIni();
$tglKembaliDefault = defaultTanggalKembali();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = prosesTransaksi($_POST, $conn);

    if ($result['status']) {
        header("Location: index.php?success=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Transaksi | OneLib SATU University</title>
    <?php include '../../components/meta.php'; ?>
</head>

<body>
<div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
    <?php include '../../components/sidebar.php'; ?>

    <main class="flex-1 overflow-y-auto">
        <?php
        $header_title = "Input Peminjaman Baru";
        $header_subtitle = "Pastikan data mahasiswa dan buku sudah benar.";
        include '../../components/header.php';
        ?>

        <section class="p-8 max-w-5xl mx-auto">
            <form method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <input type="hidden" name="id_anggota" id="id_anggota">
                <input type="hidden" name="id_buku" id="id_buku">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-8">
                        <div>
                            <label class="text-xs font-bold text-slate-400">Cari Anggota (NIM)</label>
                            <input id="search_anggota" placeholder="Masukkan NIM"
                                class="w-full mt-2 px-4 py-3 rounded-2xl border border-slate-200">
                            <div id="anggotaPreview"></div>
                            <div id="anggotaError" class="mt-2 text-sm text-rose-600 font-semibold hidden">
                                NIM tidak ditemukan
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-400">Cari Buku (ISBN)</label>
                            <input id="search_buku" placeholder="Masukkan ISBN"
                                class="w-full mt-2 px-4 py-3 rounded-2xl border border-slate-200">
                            <div id="bukuPreview"></div>
                            <div id="bukuError" class="mt-2 text-sm text-rose-600 font-semibold hidden">
                                ISBN tidak ditemukan
                            </div>
                        </div>

                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm space-y-6">

                        <div class="p-4 bg-indigo-50 rounded-2xl">
                            <span class="text-xs text-indigo-400 font-bold">Tanggal Pinjam</span>
                            <p class="font-bold text-indigo-700"><?= $tglHariIni ?></p>
                        </div>

                        <div>
                            <label class="text-xs font-bold text-slate-400">Batas Pengembalian</label>
                            <input type="date" name="tgl_kembali"
                                   value="<?= $tglKembaliDefault ?>"
                                   class="w-full mt-2 px-4 py-3 rounded-2xl border border-slate-200">
                        </div>

                        <button id="submitBtn" type="submit"
                                class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold">
                            Proses Transaksi
                        </button>

                        <a href="index.php"
                           class="block text-center py-4 border rounded-2xl font-bold text-slate-500">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </section>
    </main>
</div>

<?php if (isset($result) && !$result['status']): ?>
<script>alert("<?= $result['message'] ?>");</script>
<?php endif; ?>


<script>
const submitBtn = document.getElementById('submitBtn');

function triggerEvent(el, type) {
    if ('createEvent' in document) {
        var e = document.createEvent('HTMLEvents');
        e.initEvent(type, false, true);
        el.dispatchEvent(e);
    } else {
        var e = document.createEventObject();
        e.eventType = type;
        el.fireEvent('on' + e.eventType, e);
    }
}

document.getElementById('search_anggota').addEventListener('change', function () {
    fetch(`../../modules/transaksi.php?action=getAnggota&nim=${this.value}`)
        .then(res => res.json())
        .then(a => {
            const preview = document.getElementById('anggotaPreview');
            const error = document.getElementById('anggotaError');

            preview.innerHTML = '';
            error.classList.add('hidden');
            document.getElementById('id_anggota').value = '';

            if (!a) {
                error.classList.remove('hidden');
                return;
            }

            document.getElementById('id_anggota').value = a.id_anggota;

            const fotoPath = a.foto ? `../../assets/img/anggota/${a.foto}` : 'https://ui-avatars.com/api/?name=' + a.nama;

            preview.innerHTML = `
                <div class="flex gap-3 mt-3 p-3 bg-slate-50 rounded-xl">
                    <img src="${fotoPath}" class="w-12 h-12 rounded-full object-cover border border-slate-200">
                    <div>
                        <p class="font-bold">${a.nama}</p>
                        <p class="text-xs text-slate-500">${a.nim_nip} • ${a.prodi}</p>
                    </div>
                </div>`;
        });
});

document.getElementById('search_buku').addEventListener('change', function () {
    fetch(`../../modules/transaksi.php?action=getBuku&isbn=${this.value}`)
        .then(res => res.json())
        .then(b => {
            const preview = document.getElementById('bukuPreview');
            const error = document.getElementById('bukuError');

            preview.innerHTML = '';
            error.classList.add('hidden');
            document.getElementById('id_buku').value = '';
            submitBtn.disabled = true;

            if (!b) {
                error.classList.remove('hidden');
                return;
            }

            document.getElementById('id_buku').value = b.id_buku;

            const coverPath = b.cover_url ? `../../assets/img/covers/${b.cover_url}` : '../../assets/img/no-cover.png';

            preview.innerHTML = `
                <div class="flex gap-3 mt-3 p-3 bg-slate-50 rounded-xl">
                    <img src="${coverPath}" class="w-16 rounded object-cover border border-slate-200" onerror="this.src='https://via.placeholder.com/100x150?text=No+Cover'">
                    <div>
                        <p class="font-bold">${b.judul}</p>
                        <p class="text-xs">${b.penulis}</p>
                        <p class="text-xs">ISBN: ${b.isbn}</p>
                        <p class="text-xs ${b.stok == 0 ? 'text-red-600' : 'text-green-600'}">
                            Stok: ${b.stok}
                        </p>
                    </div>
                </div>`;

            submitBtn.disabled = b.stok == 0;
        });
});

window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const isbnParam = urlParams.get('isbn');

    if (isbnParam) {
        const bukuInput = document.getElementById('search_buku');
        bukuInput.value = isbnParam;
        bukuInput.dispatchEvent(new Event('change'));
    }
});
</script>

</body>
</html>