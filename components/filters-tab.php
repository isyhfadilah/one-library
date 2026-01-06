<div class="flex gap-4 mb-6 overflow-x-auto pb-2">
    <?php
    $current_status = $_GET['status'] ?? 'semua';
    $filters = [
        'semua'     => 'Semua',
        'dipinjam'  => 'Dipinjam',
        'kembali'   => 'Kembali',
        'terlambat' => 'Terlambat'
    ];
    
    foreach ($filters as $key => $label) :
        $isActive = ($current_status == $key);
        $class = $isActive
            ? "bg-indigo-600 text-white shadow-md shadow-indigo-100"
            : "bg-white text-slate-500 border border-slate-200 hover:bg-slate-50";
        
        $url = "index.php" . ($key === 'semua' ? '' : "?status=$key");
    ?>
        <a href="<?= $url ?>" class="px-5 py-2 rounded-full text-xs font-bold transition whitespace-nowrap <?= $class ?>">
            <?= $label ?>
        </a>
    <?php endforeach; ?>
</div>