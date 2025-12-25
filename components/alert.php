<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_GET['status'])): ?>
    <script>
        const status = "<?= $_GET['status'] ?>";

        const Toast = Swal.mixin({
            background: '#ffffff',
            color: '#1E293B',
            borderRadius: '24px',
            confirmButtonColor: '#4F46E5',
        });

        // Logika pesan berdasarkan status yang dikirim Logic
        if (status === 'tambah_berhasil') {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Buku baru telah ditambahkan ke katalog.',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        } else if (status === 'success' || status === 'edit_berhasil') {
            // --- INI UNTUK UPDATE/EDIT ---
            Toast.fire({
                icon: 'success',
                title: 'Update Berhasil!',
                text: 'Informasi buku telah diperbarui.',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        } else if (status === 'hapus_berhasil') {
            Toast.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Buku telah dihapus dari sistem.',
                timer: 2000
            });
        } else if (status === 'error') {
            Toast.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan sistem, silakan coba lagi.',
            });
        }

        // Bersihkan URL agar notif tidak muncul lagi saat refresh
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
<?php endif; ?>