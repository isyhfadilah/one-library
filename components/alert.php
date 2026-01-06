<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const oneLibPopup = {
        background: '#ffffff',
        color: '#1E293B',
        borderRadius: '24px',
        confirmButtonColor: '#4F46E5',
        cancelButtonColor: '#94A3B8',
        customClass: {
            popup: 'rounded-[24px] border border-slate-100 shadow-xl',
            confirmButton: 'px-6 py-2.5 rounded-xl font-bold text-sm',
            cancelButton: 'px-6 py-2.5 rounded-xl font-bold text-sm'
        }
    };

    function confirmDelete(id, judul) {
        Swal.fire({
            ...oneLibPopup,
            title: 'Apakah anda yakin?',
            text: `Buku "${judul}" akan dihapus permanen.`,
            icon: 'warning',
            iconColor: '#F43F5E',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../../modules/buku.php?hapus_id=" + id;
            }
        });
    }

    function confirmReturn(id, nama) {
        Swal.fire({
            ...oneLibPopup,
            title: 'Kembalikan Buku?',
            text: `Pastikan buku yang dipinjam ${nama} telah diterima kembali.`,
            icon: 'question',
            iconColor: '#4F46E5',
            showCancelButton: true,
            confirmButtonText: 'Ya, Kembalikan!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke module untuk proses
                window.location.href = `../../modules/transaksi.php?action=kembalikan&id=${id}&redirect=${window.location.pathname}`;
            }
        });
    }

    function confirmDeleteAnggota(id, nama) {
        Swal.fire({
            ...oneLibPopup,
            title: 'Hapus Anggota?',
            text: `Data anggota "${nama}" akan dihapus permanen.`,
            icon: 'warning',
            iconColor: '#F43F5E',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../../modules/anggota.php?hapus_id=" + id;
            }
        });
    }

    function confirmLogout(url) {
        Swal.fire({
            ...oneLibPopup,
            title: 'Keluar Sistem?',
            text: 'Anda perlu login kembali untuk mengakses dashboard.',
            icon: 'question',
            iconColor: '#4F46E5',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    <?php if (isset($_GET['status'])): ?>
        const status = "<?= $_GET['status'] ?>";

        const Toast = Swal.mixin({
            ...oneLibPopup,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

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