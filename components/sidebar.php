<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="w-72 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen" aria-label="Sidebar">
  <div class="p-8 flex items-center gap-3">
    <div class="bg-indigo-600 p-2 rounded-xl" aria-hidden="true">
      <i class="ph-fill ph-books text-white text-2xl" aria-hidden="true"></i>
    </div>
    <span class="text-xl font-bold tracking-tight text-slate-900" aria-label="ONE LIB" role="heading"
      aria-level="1">OneLib</span>
  </div>

  <nav class="flex-1 px-6 space-y-1" aria-label="Main menu">
    <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-3 mb-4">Menu Utama</p>

    <a href="index.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_page == 'index.php') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>"
      <?= ($current_page == 'index.php') ? 'aria-current="page"' : '' ?>>
      <i class="ph-bold ph-squares-four text-xl" aria-hidden="true"></i>
      <span>Dashboard</span>
    </a>

    <a href="katalog.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_page == 'katalog.php') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>"
      <?= ($current_page == 'katalog.php') ? 'aria-current="page"' : '' ?>>
      <i class="ph ph-book-open text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
      <span>Katalog Buku</span>
    </a>

    <a href="transaksi.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_page == 'transaksi.php') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>"
      <?= ($current_page == 'transaksi.php') ? 'aria-current="page"' : '' ?>>
      <i class="ph ph-arrows-left-right text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
      <span>Transaksi</span>
    </a>

    <a href="anggota.php"
      class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold group transition-all 
      <?= ($current_page == 'anggota.php') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' ?>"
      <?= ($current_page == 'anggota.php') ? 'aria-current="page"' : '' ?>>
      <i class="ph ph-users text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
      <span>Anggota</span>
    </a>
  </nav>

  <footer class="p-6 border-t border-slate-100">
    <div class="flex items-center gap-3 p-2">
      <img src="https://ui-avatars.com/api/?name=Admin+Perpus&background=6366f1&color=fff"
        class="w-10 h-10 rounded-full shadow-sm" alt="Admin Perpus profile picture">
      <div class="overflow-hidden">
        <span class="text-sm font-bold truncate">Admin Perpus</span>
        <span class="text-xs text-slate-400 truncate block">admin@kampus.id</span>
      </div>
      <button class="ml-auto text-slate-400 hover:text-red-500 transition" aria-label="Sign out">
        <i class="ph-bold ph-sign-out text-lg" aria-hidden="true"></i>
      </button>
    </div>
  </footer>
</aside>