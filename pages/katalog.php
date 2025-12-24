<?php
include '../config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Katalog Buku | OneLib</title>
    <?php include '../components/meta.php'; ?>
</head>

<body>
    <div class="min-h-screen bg-[#F8FAFC] flex text-[#1E293B]">
        <?php include '../components/sidebar.php'; ?>
        <main class="flex-1 overflow-y-auto">
            <?php include '../components/header.php'; ?>

            <section class="p-8">
                <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <form class="flex gap-2 w-full md:w-1/2" role="search" aria-label="Cari Buku">
                        <input type="text"
                            class="flex-1 px-4 py-2 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                            placeholder="Cari judul, penulis, atau ISBN..." aria-label="Cari Buku">
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-xl font-semibold text-sm transition-all">
                            <i class="ph-bold ph-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php
                    renderBookCard(
                        "The Pragmatic Programmer",
                        "Andrew Hunt, David Thomas",
                        "978-0135957059",
                        "Tersedia",
                        "https://covers.openlibrary.org/b/id/10523338-L.jpg"
                    );

                    renderBookCard(
                        "Clean Code",
                        "Robert C. Martin",
                        "978-0132350884",
                        "Tersedia",
                        "https://covers.openlibrary.org/b/id/11153223-L.jpg"
                    );

                    renderBookCard(
                        "Atomic Habits",
                        "James Clear",
                        "978-0735211292",
                        "Dipinjam",
                        "https://covers.openlibrary.org/b/id/10958382-L.jpg"
                    );
                    ?>
                </div>
            </section>
        </main>
    </div>
</body>

</html>