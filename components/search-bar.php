<form action="" method="GET" class="flex gap-2 w-full md:w-1/2">
    <input type="text" name="search"
        value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
        class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-200"
        placeholder="Cari judul, penulis, atau ISBN...">
    <button type="submit"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl font-semibold text-sm transition-all">
        <i class="ph-bold ph-magnifying-glass"></i>
    </button>
</form>