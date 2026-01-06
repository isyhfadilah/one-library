<?php
function renderStatCard($label, $value, $icon, $color)
{
    $colors = [
        'indigo' => 'bg-indigo-50 text-indigo-600',
        'emerald' => 'bg-emerald-50 text-emerald-600',
        'rose' => 'bg-rose-50 text-rose-600'
    ];
    $selectedColor = $colors[$color] ?? $colors['indigo'];

    echo "
    <div class='flex-1 bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4'>
        <div class='w-10 h-10 $selectedColor rounded-lg flex items-center justify-center'>
            <i class='ph-bold $icon text-xl'></i>
        </div>
        <div>
            <span class='text-[10px] font-bold text-slate-400 uppercase tracking-wider block'>$label</span>
            <span class='text-lg font-bold text-slate-800'>$value</span>
        </div>
    </div>";
}

function renderBookCard($id, $title, $author, $isbn, $status, $cover)
{
    $isAvailable = (strtolower($status) == 'tersedia');
    $statusClass = $isAvailable ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700';
    $buttonClass = $isAvailable ? 'bg-indigo-600 hover:bg-indigo-700 text-white' : 'bg-slate-300 text-slate-500 cursor-not-allowed';
    $buttonText  = $isAvailable ? 'Pinjam Buku' : 'Dipinjam';
    $disabled    = $isAvailable ? '' : 'disabled';

    echo "
    <div class='group relative bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-col transition-all duration-300 hover:border-indigo-300 hover:shadow-md'>
        
        <div class='relative w-full h-48 overflow-hidden rounded-xl mb-4'>
            <img src='$cover' alt='$title' class='w-full h-full object-cover transition-transform duration-700 group-hover:scale-105'>
        </div>

        <div class='flex-1'>
            <a href='detail-buku.php?id=$id' class='absolute inset-0 z-10' aria-label='Lihat detail $title'></a>
            
            <h3 class='font-bold text-lg text-slate-800 mb-1 leading-tight transition-colors duration-300 group-hover:text-indigo-600'>$title</h3>
            <p class='text-sm text-slate-500 mb-2'>$author</p>
            <span class='inline-block $statusClass text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2'>$status</span>
            <p class='text-xs text-slate-400 font-mono italic'>ISBN: $isbn</p>
        </div>

        <button $disabled class='relative z-20 mt-4 $buttonClass px-4 py-2.5 rounded-xl font-bold text-sm transition-all active:scale-95'>
            $buttonText
        </button>
    </div>";
}

function renderTransactionRow($id, $name, $nim, $book, $date_pinjam, $date_kembali, $status)
{
    $status = ucfirst(strtolower($status));
    $statusMap = [
        'Dipinjam' => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700'],
        'Kembali'  => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-700'],
        'Terlambat' => ['bg' => 'bg-rose-100', 'text' => 'text-rose-700'],
    ];

    $colors = $statusMap[$status] ?? ['bg' => 'bg-slate-100', 'text' => 'text-slate-700'];
    $initials = strtoupper(substr($name, 0, 1) . substr(explode(' ', $name)[1] ?? '', 0, 1));

    $rawId = str_replace(['#TRX-', ' '], '', $id); 

    $actionButton = "";
    if (strtolower($status) === 'dipinjam') {
        $actionButton = "
        <button onclick=\"confirmReturn('$rawId', '$name')\" 
            class='group flex items-center gap-1.5 px-3 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg transition-all text-[11px] font-bold uppercase tracking-wider border border-indigo-100'>
            <i class='ph-bold ph-arrow-u-up-left'></i>
            <span>Kembalikan</span>
        </button>";
    } else {
        $actionButton = "
        <span class='flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 text-slate-400 rounded-lg text-[11px] font-bold uppercase tracking-wider border border-slate-100'>
            <i class='ph-bold ph-check'></i>
            <span>Selesai</span>
        </span>";
    }

    echo "
    <tr class='hover:bg-slate-50/50 transition'>
        <td class='px-6 py-4 text-sm font-mono text-indigo-600 font-medium'>$id</td>
        <td class='px-6 py-4 flex items-center gap-3'>
            <span class='w-8 h-8 rounded-full {$colors['bg']} {$colors['text']} flex items-center justify-center text-xs font-bold'>$initials</span>
            <div>
                <span class='font-semibold text-sm block'>$name</span>
                <span class='text-[10px] text-slate-400'>$nim</span>
            </div>
        </td>
        <td class='px-6 py-4'>
            <span class='text-sm text-slate-700 font-medium line-clamp-1'>$book</span>
        </td>
        <td class='px-6 py-4 text-sm text-slate-500'>$date_pinjam</td>
        <td class='px-6 py-4 text-sm text-slate-500'>$date_kembali</td>
        <td class='px-6 py-4'>
            <span class='{$colors['bg']} {$colors['text']} text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-tight'>$status</span>
        </td>
        <td class='px-6 py-4 text-right'>
           $actionButton
        </td>
    </tr>";
}
function formatTanggal($date)
{
    return date('d M Y', strtotime($date));
}

function renderMemberRow($id, $name, $nim, $prodi, $email, $status)
{
    $isAktif = strtolower($status) === 'aktif';

    $statusClass = $isAktif
        ? 'bg-emerald-100 text-emerald-700'
        : 'bg-rose-100 text-rose-700';

    $nextStatus = $isAktif ? 'nonaktif' : 'aktif';

    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($name) . "&background=random";

    echo "
    <tr class='hover:bg-slate-50/30 transition'>
        <td class='px-6 py-4 flex items-center gap-3'>
            <img src='{$avatarUrl}' class='w-9 h-9 rounded-full shadow-sm'>
            <span class='font-semibold text-sm'>{$name}</span>
        </td>

        <td class='px-6 py-4 text-sm text-slate-600 font-medium'>{$nim}</td>

        <td class='px-6 py-4 text-sm text-slate-500'>{$prodi}</td>

        <td class='px-6 py-4 text-sm text-slate-500'>{$email}</td>

        <td class='px-6 py-4'>
            <span class='{$statusClass} text-[10px] font-bold px-3 py-1 rounded-full uppercase'>
                {$status}
            </span>
        </td>

        <td class='px-6 py-4 text-right'>
            <!-- EDIT ANGGOTA -->
                <a href='edit-anggota.php?id={$id}'
                class='text-slate-400 hover:text-indigo-600 p-2 rounded-lg transition'>
                <i class='ph-bold ph-pencil-simple text-lg'></i>
                </a>

            <!-- DELETE -->
            <button
                onclick=\"confirmDeleteAnggota({$id}, '{$name}')\"
                class='text-slate-400 hover:text-rose-600 p-2 rounded-lg transition ml-1'>
                <i class='ph-bold ph-trash text-lg'></i>
            </button>
        </td>
    </tr>";
}