<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | KasKita</title>

    <link rel="stylesheet" href="/kaskita/assets/css/style.css">

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

                    <a href="dashboard.php" class="active">

                        <span class="menu-icon">⌂</span>

                        <span>Dashboard</span>

                    </a>


                    <a href="mahasiswa.php">

                        <span class="menu-icon">♙</span>

                        <span>Mahasiswa</span>

                    </a>


                    <a href="tagihan.php">

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

                    <span class="menu-icon">↪</span>

                    <span>Keluar</span>

                </a>

            </div>

        </aside>



        <!-- MAIN CONTENT -->
        <main class="main-content">


            <!-- TOPBAR -->
            <header class="topbar">

                <div class="page-title">

                    <h1>Dashboard</h1>

                    <p>
                        Ringkasan pengelolaan kas kelas 3A
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



            <!-- WELCOME -->
            <section class="welcome">

                <div class="welcome-text">

                    <p class="welcome-small">
                        Selamat datang kembali 👋
                    </p>

                    <h2>
                        Kelola kas kelas dengan lebih mudah
                    </h2>

                    <p>
                        Pantau pembayaran, verifikasi transaksi,
                        dan kelola keuangan kelas melalui KasKita.
                    </p>

                </div>

            </section>



            <!-- STATISTIK -->
            <section class="stats">


                <div class="stat-card">

                    <div class="stat-icon blue">
                        ♙
                    </div>

                    <div class="stat-content">

                        <span>
                            Total Mahasiswa
                        </span>

                        <h3>
                            59
                        </h3>

                        <small>
                            Mahasiswa terdaftar
                        </small>

                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-icon green">
                        Rp
                    </div>

                    <div class="stat-content">

                        <span>
                            Kas Masuk
                        </span>

                        <h3>
                            Rp 0
                        </h3>

                        <small>
                            Total pemasukan
                        </small>

                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-icon orange">
                        !
                    </div>

                    <div class="stat-content">

                        <span>
                            Verifikasi
                        </span>

                        <h3>
                            0
                        </h3>

                        <small>
                            Menunggu pemeriksaan
                        </small>

                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-icon purple">
                        Rp
                    </div>

                    <div class="stat-content">

                        <span>
                            Saldo Kas
                        </span>

                        <h3>
                            Rp 0
                        </h3>

                        <small>
                            Saldo saat ini
                        </small>

                    </div>

                </div>

            </section>



            <!-- BAGIAN BAWAH -->
            <section class="dashboard-grid">


                <!-- PEMBAYARAN -->
                <div class="dashboard-card payment-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Pembayaran Terbaru
                            </h3>

                            <p>
                                Daftar pembayaran yang masuk
                            </p>

                        </div>

                        <a href="pembayaran.php">
                            Lihat semua
                        </a>

                    </div>


                    <div class="payment-table">

                        <div class="table-head">

                            <span>
                                Mahasiswa
                            </span>

                            <span>
                                Nominal
                            </span>

                            <span>
                                Status
                            </span>

                        </div>


                        <div class="empty-payment">

                            <div class="empty-icon">
                                ✓
                            </div>

                            <h4>
                                Belum ada pembayaran
                            </h4>

                            <p>
                                Pembayaran mahasiswa akan muncul di sini.
                            </p>

                        </div>

                    </div>

                </div>



                <!-- INFORMASI KAS -->
                <div class="dashboard-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Informasi Kas
                            </h3>

                            <p>
                                Ringkasan keuangan kelas
                            </p>

                        </div>

                    </div>


                    <div class="cash-info">

                        <div class="cash-row">

                            <div>

                                <span class="cash-label">
                                    Total pemasukan
                                </span>

                            </div>

                            <strong class="income">
                                Rp 0
                            </strong>

                        </div>


                        <div class="cash-row">

                            <div>

                                <span class="cash-label">
                                    Total pengeluaran
                                </span>

                            </div>

                            <strong class="expense">
                                Rp 0
                            </strong>

                        </div>


                        <div class="cash-row total">

                            <div>

                                <span class="cash-label">
                                    Saldo kas
                                </span>

                            </div>

                            <strong>
                                Rp 0
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


        </main>

    </div>


</body>

</html>