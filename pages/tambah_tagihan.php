<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tagihan | KasKita</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>


<body>

    <div class="app">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="brand">

                <div class="brand-icon">
                    K
                </div>

                <div class="brand-name">
                    <span>Kas</span>Kita
                </div>

            </div>


            <div class="menu-section">

                <p class="menu-title">
                    MENU UTAMA
                </p>

                <nav class="menu">

                    <a href="dashboard.php">
                        <span class="menu-icon">⌂</span>
                        <span>Dashboard</span>
                    </a>

                    <a href="mahasiswa.php">
                        <span class="menu-icon">♙</span>
                        <span>Mahasiswa</span>
                    </a>

                    <a href="tagihan.php" class="active">
                        <span class="menu-icon">▣</span>
                        <span>Tagihan Kas</span>
                    </a>

                    <a href="pembayaran.php">
                        <span class="menu-icon">▤</span>
                        <span>Pembayaran</span>
                    </a>

                    <a href="transaksi.php">
                        <span class="menu-icon">Rp</span>
                        <span>Transaksi Kas</span>
                    </a>

                </nav>

            </div>


            <div class="menu-section">

                <p class="menu-title">
                    LAINNYA
                </p>

                <nav class="menu">

                    <a href="#">
                        <span class="menu-icon">▥</span>
                        <span>Laporan</span>
                    </a>

                </nav>

            </div>


            <div class="sidebar-bottom">

                <a href="../index.php" class="logout">

                    <span class="menu-icon">
                        ↪
                    </span>

                    <span>
                        Keluar
                    </span>

                </a>

            </div>

        </aside>


        <!-- MAIN CONTENT -->
        <main class="main-content">

            <!-- TOPBAR -->
            <header class="topbar">

                <div class="page-title">

                    <h1>
                        Tambah Tagihan
                    </h1>

                    <p>
                        Buat tagihan kas baru untuk mahasiswa kelas 3A
                    </p>

                </div>


                <div class="profile">

                    <div class="profile-icon">
                        B
                    </div>

                    <div class="profile-info">

                        <strong>
                            Bendahara
                        </strong>

                        <span>
                            Kelas 3A
                        </span>

                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <section class="content-card">

                <div class="content-header">

                    <div>

                        <h2>
                            Form Tambah Tagihan
                        </h2>

                        <p>
                            Isi informasi tagihan kas yang akan diberlakukan.
                        </p>

                    </div>

                </div>


                <!-- FORM -->
                <div class="form-card">

                    <div class="form-header">

                        <h2>
                            Data Tagihan
                        </h2>

                        <p>
                            Lengkapi data berikut sebelum menyimpan tagihan.
                        </p>

                    </div>


                    <form action="#" method="POST">

                        <div class="form-grid">


                            <!-- NAMA TAGIHAN -->
                            <div class="form-group">

                                <label for="tagihan">
                                    Nama Tagihan
                                </label>

                                <input type="text" id="tagihan" name="tagihan" placeholder="Contoh: Kas November 2026"
                                    required>

                            </div>


                            <!-- NOMINAL -->
                            <div class="form-group">

                                <label for="nominal">
                                    Nominal Tagihan
                                </label>

                                <input type="number" id="nominal" name="nominal" placeholder="Contoh: 6000" required>

                            </div>


                            <!-- TANGGAL JATUH TEMPO -->
                            <div class="form-group">

                                <label for="tanggal">
                                    Tanggal Jatuh Tempo
                                </label>

                                <input type="date" id="tanggal" name="tanggal" required>

                            </div>


                            <!-- STATUS -->
                            <div class="form-group">

                                <label for="status">
                                    Status Tagihan
                                </label>

                                <select id="status" name="status" required>

                                    <option value="Aktif">
                                        Aktif
                                    </option>

                                    <option value="Nonaktif">
                                        Nonaktif
                                    </option>

                                </select>

                            </div>

                        </div>


                        <!-- BUTTON -->
                        <div class="form-actions">

                            <a href="tagihan.php" class="btn-cancel">
                                Batal
                            </a>

                            <button type="submit" class="btn-primary">
                                Simpan Tagihan
                            </button>

                        </div>

                    </form>

                </div>

            </section>

        </main>

    </div>

</body>

</html>