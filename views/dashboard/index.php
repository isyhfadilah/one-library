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
      $header_button_link = "../transaksi/transaksi-form.php";

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
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">ID Transaksi</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Mahasiswa</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Judul Buku</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Tgl Pinjam</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Tgl Kembali</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase">Status</th>
                  <th class="px-6 py-4 text-[13px] font-bold text-slate-400 uppercase ">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50">
              <?php

              $query = "
                  SELECT 
                      t.id_transaksi,
                      t.tgl_pinjam,
                      t.tgl_kembali,
                      t.status_pinjam,
                      a.nama,
                      a.nim_nip,
                      b.judul
                  FROM transaksi t
                  JOIN anggota a ON t.id_anggota = a.id_anggota
                  JOIN buku b ON t.id_buku = b.id_buku
                  ORDER BY t.id_transaksi DESC
              ";

              $result = $conn->query($query);

              if ($result && $result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {

                      renderTransactionRow(
                          '#TRX-' . str_pad($row['id_transaksi'], 4, '0', STR_PAD_LEFT),
                          $row['nama'],
                          $row['nim_nip'],
                          $row['judul'],
                          formatTanggal($row['tgl_pinjam']),
                          formatTanggal($row['tgl_kembali']),
                          ucfirst($row['status_pinjam'])
                      );
                  }
              } else {
                  echo "
                  <tr>
                      <td colspan='7' class='px-6 py-8 text-center text-slate-400 text-sm'>
                          Belum ada data transaksi
                      </td>
                  </tr>";
              }
              ?>
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