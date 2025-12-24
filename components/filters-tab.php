<div class="flex gap-4 mb-6 overflow-x-auto pb-2">
    <?php
    $filters = ['Semua', 'Dipinjam', 'Kembali', 'Terlambat'];
    foreach ($filters as $f) :
        $isActive = ($f == 'Semua');
        $class = $isActive
            ? "bg-indigo-600 text-white shadow-md shadow-indigo-100"
            : "bg-white text-slate-500 border border-slate-200 hover:bg-slate-50";
    ?>
        <button class="px-5 py-2 rounded-full text-xs font-bold transition whitespace-nowrap <?= $class ?>">
            <?= $f ?>
        </button>
    <?php endforeach; ?>
</div>