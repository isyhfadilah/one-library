<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota | OneLib SATU University</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <aside class="w-72 bg-white border-r border-slate-200 flex flex-col sticky top-0 h-screen" aria-label="Sidebar">
            <div class="p-8 flex items-center gap-3">
                <div class="bg-indigo-600 p-2 rounded-xl" aria-hidden="true">
                    <i class="ph-fill ph-books text-white text-2xl" aria-hidden="true"></i>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900">OneLib</span>
            </div>

            <nav class="flex-1 px-6 space-y-1" aria-label="Main menu">
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest ml-3 mb-4">Menu Utama</p>
                <a href="index.html"
                    class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-xl font-medium transition-all group">
                    <i class="ph ph-squares-four text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
                <a href="katalog.html"
                    class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-xl font-medium transition-all group">
                    <i class="ph ph-book-open text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
                    <span>Katalog Buku</span>
                </a>
                <a href="transaksi.html"
                    class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-xl font-medium transition-all group">
                    <i class="ph ph-arrows-left-right text-xl group-hover:text-indigo-600" aria-hidden="true"></i>
                    <span>Transaksi</span>
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 bg-indigo-50 text-indigo-600 rounded-xl font-semibold group transition-all"
                    aria-current="page">
                    <i class="ph-bold ph-users text-xl" aria-hidden="true"></i>
                    <span>Anggota</span>
                </a>
            </nav>

            <footer class="p-6 border-t border-slate-100">
                <div class="flex items-center gap-3 p-2">
                    <img src="https://ui-avatars.com/api/?name=Admin+Perpus&background=6366f1&color=fff"
                        class="w-10 h-10 rounded-full shadow-sm" alt="Admin Perpus">
                    <div class="overflow-hidden">
                        <span class="text-sm font-bold truncate block">Admin Perpus</span>
                        <span class="text-xs text-slate-400 truncate block">admin@kampus.id</span>
                    </div>
                </div>
            </footer>
        </aside>

        <main class="flex-1 overflow-y-auto">
            <header
                class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 px-8 flex items-center justify-between sticky top-0 z-10">
                <div>
                    <h2 class="text-lg font-bold">Manajemen Anggota</h2>
                    <p class="text-xs text-slate-500">Kelola data mahasiswa dan status keanggotaan.</p>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        class="relative flex items-center bg-slate-100 px-4 py-2 rounded-xl border border-slate-200 focus-within:ring-2 focus-within:ring-indigo-100 transition-all">
                        <i class="ph ph-magnifying-glass text-slate-400 mr-2"></i>
                        <input type="text" placeholder="Cari NIM atau nama..."
                            class="bg-transparent border-none outline-none text-sm w-56">
                    </div>
                    <a href="tambah-anggota.html"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition-all shadow-lg shadow-indigo-100 flex items-center gap-2">
                        <i class="ph-bold ph-user-plus"></i>
                        Tambah Anggota
                    </a>
                </div>
            </header>

            <section class="p-8">
                <div class="flex gap-6 mb-8">
                    <div
                        class="flex-1 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                            <i class="ph-bold ph-users-three text-xl"></i>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Total
                                Anggota</span>
                            <span class="text-lg font-bold text-slate-800">1,240</span>
                        </div>
                    </div>
                    <div
                        class="flex-1 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div
                            class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center">
                            <i class="ph-bold ph-check-circle text-xl"></i>
                        </div>
                        <div>
                            <span
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Aktif</span>
                            <span class="text-lg font-bold text-slate-800">1,192</span>
                        </div>
                    </div>
                    <div
                        class="flex-1 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4">
                        <div class="w-10 h-10 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center">
                            <i class="ph-bold ph-prohibit text-xl"></i>
                        </div>
                        <div>
                            <span
                                class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Ditangguhkan</span>
                            <span class="text-lg font-bold text-slate-800">48</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800">Daftar Mahasiswa</h3>
                        <button
                            class="text-sm font-semibold text-slate-500 hover:text-indigo-600 flex items-center gap-2">
                            <i class="ph ph-funnel"></i> Filter
                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50">
                                <tr>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Mahasiswa</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        NIM</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Program Studi</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Email</th>
                                    <th class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <tr class="hover:bg-slate-50/30 transition">
                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=Aditya+Saputra&background=E0E7FF&color=4338CA"
                                            class="w-9 h-9 rounded-full shadow-sm">
                                        <span class="font-semibold text-sm">Aditya Saputra</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">240192831</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">Teknik Informatika</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">aditya.s@binus.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-3 py-1 rounded-full uppercase">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-indigo-600 p-2 rounded-lg transition">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </button>
                                        <button
                                            class="text-slate-400 hover:text-rose-600 p-2 rounded-lg transition ml-1">
                                            <i class="ph-bold ph-trash text-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50/30 transition">
                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=Rina+Rose&background=D1FAE5&color=059669"
                                            class="w-9 h-9 rounded-full shadow-sm">
                                        <span class="font-semibold text-sm">Rina Rose</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">240192552</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">Sistem Informasi</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">rina.rose@binus.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-3 py-1 rounded-full uppercase">Aktif</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-indigo-600 p-2 rounded-lg transition">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </button>
                                        <button
                                            class="text-slate-400 hover:text-rose-600 p-2 rounded-lg transition ml-1">
                                            <i class="ph-bold ph-trash text-lg"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr class="hover:bg-slate-50/30 transition">
                                    <td class="px-6 py-4 flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=Budi+Kusuma&background=FEE2E2&color=B91C1C"
                                            class="w-9 h-9 rounded-full shadow-sm">
                                        <span class="font-semibold text-sm">Budi Kusuma</span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-slate-600 font-medium">240192110</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">Desain Komunikasi Visual</td>
                                    <td class="px-6 py-4 text-sm text-slate-500">budi.k@binus.ac.id</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="bg-rose-100 text-rose-700 text-[10px] font-bold px-3 py-1 rounded-full uppercase">Suspended</span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-slate-400 hover:text-indigo-600 p-2 rounded-lg transition">
                                            <i class="ph-bold ph-pencil-simple text-lg"></i>
                                        </button>
                                        <button
                                            class="text-slate-400 hover:text-rose-600 p-2 rounded-lg transition ml-1">
                                            <i class="ph-bold ph-trash text-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="p-6 border-t border-slate-50 flex items-center justify-between bg-slate-50/30">
                        <span class="text-xs text-slate-400">Menampilkan 1-10 dari 1,240 Anggota</span>
                        <div class="flex gap-1">
                            <button
                                class="px-3 py-1 text-xs font-bold bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition">Prev</button>
                            <button class="px-3 py-1 text-xs font-bold bg-indigo-600 text-white rounded-md">1</button>
                            <button
                                class="px-3 py-1 text-xs font-bold bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition">2</button>
                            <button
                                class="px-3 py-1 text-xs font-bold bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition">Next</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>

</html>