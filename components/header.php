<header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-10">
  <div class="flex items-center gap-4">
    <?php if (isset($show_back)) : ?>
      <button onclick="history.back()" class="p-2.5 bg-slate-50 hover:bg-slate-100 rounded-xl text-slate-500 transition-all">
        <i class="ph-bold ph-arrow-left"></i>
      </button>
    <?php endif; ?>

    <div>
      <h2 class="text-lg font-bold text-slate-800"><?= $header_title ?? 'Selamat Pagi, Admin' ?></h2>
      <p class="text-xs text-slate-500"><?= $header_subtitle ?? 'Berikut adalah aktivitas perpustakaan hari ini.' ?></p>
    </div>
  </div>

  <div class="flex items-center gap-4">
    <div class="relative group">
      <i class="ph ph-bell text-2xl text-slate-400 group-hover:text-indigo-600 cursor-pointer transition"></i>
      <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 border-2 border-white rounded-full"></span>
    </div>

    <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>

    <?php if (!empty($header_button_label)) : ?>
      <a href="<?= $header_button_link ?? '#' ?>"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-all shadow-lg shadow-indigo-100 flex items-center gap-2">
        <i class="ph-bold <?= $header_button_label == 'Pinjam Buku' ? 'ph-hand-pointing' : 'ph-plus' ?>"></i>
        <?= $header_button_label ?>
      </a>
    <?php endif; ?>
  </div>
</header>