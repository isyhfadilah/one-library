<?php
include '../../config/functions.php';
include '../../modules/auth.php';
cekLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SATU University | OneLib</title>
  <?php include '../../components/meta.php'; ?>
</head>

<body>
  <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
    <?php include '../../components/sidebar.php'; ?>

    <main class="flex-1 overflow-y-auto">
      <?php
      $header_title = "Selamat Pagi, Admin";
      $header_subtitle = "Berikut adalah ringkasan aktivitas perpustakaan hari ini.";
      $header_button_label = "Transaksi Baru";
      $header_button_link = "tambah-transaksi.php";

      include '../../components/header.php';
      ?>

      <section class="p-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
          <?php
          renderStatCard("Total Koleksi", "2,540", "ph-book", "blue");
          renderStatCard("Dipinjam", "142", "ph-hand-pointing", "amber");
          renderStatCard("Mhs Aktif", "890", "ph-user-plus", "emerald");
          renderStatCard("Terlambat", "12", "ph-warning-circle", "rose");
          ?>
        </div>

        <section class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden"
          aria-labelledby="peminjaman-terbaru-title">
          <div class="p-6 border-b border-slate-50 flex justify-between items-center">
            <h3 class="font-bold text-slate-800" id="peminjaman-terbaru-title">Peminjaman Terbaru</h3>
            <a href="#" class="text-sm font-semibold text-indigo-600 hover:underline">Lihat Semua</a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left" aria-describedby="peminjaman-terbaru-title">
              <thead class="bg-slate-50/50">
                <tr>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Mahasiswa</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Judul Buku</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Tgl Pinjam</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50">
                <tr>
                  <td class="px-6 py-4 flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold"
                      aria-hidden="true">AS</span>
                    <span class="font-semibold text-sm">Aditya Saputra</span>
                  </td>
                  <td class="px-6 py-4 text-sm text-slate-600">The Pragmatic Programmer</td>
                  <td class="px-6 py-4 text-sm text-slate-500">12 Des 2025</td>
                  <td class="px-6 py-4">
                    <span
                      class="bg-amber-100 text-amber-700 text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">Berjalan</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </section>
    </main>
  </div>
  <?php include '../../components/alert.php'; ?>
</body>

</html>