<?php
function renderStatCard($title, $value, $icon, $colorClass) {
    echo '
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-5">
        <div class="w-12 h-12 '.$colorClass.' rounded-xl flex items-center justify-center">
            <i class="ph-fill '.$icon.' text-2xl"></i>
        </div>
        <div>
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">'.$title.'</span>
            <span class="text-2xl font-bold text-slate-800 block">'.$value.'</span>
        </div>
    </div>';
}
?>