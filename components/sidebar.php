<?php
$current_page = basename($_SERVER['PHP_SELF']);
$current_dir = basename(dirname($_SERVER['PHP_SELF']));

$base_url = "/one-library/views";
?>

<aside class="w-72 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen">
  <div class="p-8 flex items-center gap-3">
    <div class="bg-indigo-600 p-2 rounded-xl">
      <i class="ph-fill ph-books text-white text-2xl"></i>
    </div>
    <span class="text-xl font-bold tracking-tight text-slate-900">OneLib</span>
  </div>

  <nav class="flex-1 px-6 space-y-1">
    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-3 mb-4 text-xs">Menu Utama</p>

    <a href="<?= $base_url ?>/dashboard/index.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_dir == 'dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>">
      <i class="ph-bold ph-squares-four text-xl"></i>
      <span>Dashboard</span>
    </a>

    <a href="<?= $base_url ?>/buku/katalog.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_dir == 'buku') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>">
      <i class="ph-bold ph-book-open text-xl"></i>
      <span>Katalog Buku</span>
    </a>

    <a href="<?= $base_url ?>/transaksi/index.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_dir == 'transaksi') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>">
      <i class="ph-bold ph-arrows-left-right text-xl"></i>
      <span>Transaksi</span>
    </a>

    <a href="<?= $base_url ?>/anggota/index.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_dir == 'mahasiswa') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>">
      <i class="ph-bold ph-users text-xl"></i>
      <span>Anggota</span>
    </a>
  </nav>

  <footer class="p-6 border-t border-slate-100">
    <div class="flex items-center gap-3 p-2">
      <img src="https://ui-avatars.com/api/?name=Admin+Perpus&background=6366f1&color=fff"
        class="w-10 h-10 rounded-full shadow-sm" alt="Profile">
      <div class="overflow-hidden">
        <p class="text-sm font-bold truncate text-slate-900">Admin Perpus</p>
        <p class="text-xs text-slate-400 truncate block">admin@kampus.id</p>
      </div>
    </div>
  </footer>
</aside>