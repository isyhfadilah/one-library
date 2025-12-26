<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // 1. Definisikan Konfigurasi Dasar agar senada dengan UI OneLib
    const oneLibPopup = {
        background: '#ffffff',
        color: '#1E293B',
        borderRadius: '24px', // Radius besar sesuai UI modern kamu
        confirmButtonColor: '#4F46E5', // Indigo-600
        cancelButtonColor: '#94A3B8', // Slate-400
        customClass: {
            popup: 'rounded-[24px] border border-slate-100 shadow-xl',
            confirmButton: 'px-6 py-2.5 rounded-xl font-bold text-sm',
            cancelButton: 'px-6 py-2.5 rounded-xl font-bold text-sm'
        }
    };

    // 2. Fungsi Konfirmasi Hapus yang Senada
    function confirmDelete(id, judul) {
        Swal.fire({
            ...oneLibPopup, // Ambil base style
            title: 'Apakah anda yakin?',
            text: `Buku "${judul}" akan dihapus permanen.`,
            icon: 'warning',
            iconColor: '#F43F5E', // Rose-500
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../../modules/buku.php?hapus_id=" + id;
            }
        });
    }

    // 3. Logika Notifikasi (Status dari URL)
    <?php if (isset($_GET['status'])): ?>
        const status = "<?= $_GET['status'] ?>";

        // Setup Toast Mixin
        const Toast = Swal.mixin({
            ...oneLibPopup, // Gunakan radius dan warna yang sama
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        // Mapping Pesan
        const alerts = {
            'tambah_berhasil': {
                icon: 'success',
                title: 'Berhasil!',
                text: 'Buku ditambahkan ke katalog.'
            },
            'edit_berhasil': {
                icon: 'success',
                title: 'Update Berhasil!',
                text: 'Informasi buku telah diperbarui.'
            },
            'hapus_berhasil': {
                icon: 'success',
                title: 'Terhapus!',
                text: 'Buku telah dihapus dari sistem.'
            },
            'error': {
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan sistem.'
            }
        };

        if (alerts[status]) {
            Toast.fire(alerts[status]);
        }

        window.history.replaceState({}, document.title, window.location.pathname);
    <?php endif; ?>
</script>