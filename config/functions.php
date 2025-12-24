<?php
function renderStatCard($title, $value, $icon, $colorClass)
{
    echo '
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-5">
        <div class="w-12 h-12 ' . $colorClass . ' rounded-xl flex items-center justify-center">
            <i class="ph-fill ' . $icon . ' text-2xl"></i>
        </div>
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">' . $title . '</span>
            <span class="text-2xl font-bold text-slate-800 block">' . $value . '</span>
        </div>
    </div>';
}

function renderBookCard($title, $author, $isbn, $status, $cover)
{
    $isAvailable = (strtolower($status) == 'tersedia');
    $statusClass = $isAvailable ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700';
    $buttonClass = $isAvailable ? 'bg-indigo-600 hover:bg-indigo-700 text-white' : 'bg-slate-300 text-slate-500 cursor-not-allowed';
    $buttonText  = $isAvailable ? 'Pinjam Buku' : 'Dipinjam';
    $disabled    = $isAvailable ? '' : 'disabled';

    echo "
    <div class='bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-col'>
        <img src='$cover' alt='$title' class='w-full h-48 object-cover rounded-xl mb-4'>
        <div class='flex-1'>
            <h3 class='font-bold text-lg text-slate-800 mb-1 leading-tight'>$title</h3>
            <p class='text-sm text-slate-500 mb-2'>$author</p>
            <span class='inline-block $statusClass text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-2'>$status</span>
            <p class='text-xs text-slate-400 font-mono italic'>ISBN: $isbn</p>
        </div>
        <button $disabled class='mt-4 $buttonClass px-4 py-2.5 rounded-xl font-bold text-sm transition-all active:scale-95'>
            $buttonText
        </button>
    </div>";
}
