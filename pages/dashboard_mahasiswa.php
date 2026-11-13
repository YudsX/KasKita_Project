<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'mahasiswa') {
    header('Location: ../index.php');
    exit;
}

$namaMahasiswa = $_SESSION['username'] ?? 'Raihan Fadhilah';

$tagihan = [
    [
        'nama' => 'Kas November 2026',
        'nominal' => 6000,
        'jatuh_tempo' => '25 November 2026',
        'status' => 'Belum Dibayar'
    ]
];

$totalTagihan = 0;

foreach ($tagihan as $item) {
    $totalTagihan += $item['nominal'];
}
?>

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


            <!-- BRAND -->
            <div class="brand">

                <div class="brand-icon">
                    K
                </div>

                <div class="brand-name">
                    <span>Kas</span>Kita
                </div>

            </div>



            <!-- MENU UTAMA -->
            <div class="menu-section">

                <p class="menu-title">
                    MENU UTAMA
                </p>


                <nav class="menu">

                    <a href="dashboard_mahasiswa.php" class="active">

                        <span class="menu-icon">⌂</span>

                        <span>Dashboard</span>

                    </a>


                    <a href="tagihan_mahasiswa.php">

                        <span class="menu-icon">▣</span>

                        <span>Tagihan Saya</span>

                    </a>


                    <a href="pembayaran_mahasiswa.php">

                        <span class="menu-icon">▤</span>

                        <span>Pembayaran</span>

                    </a>


                    <a href="riwayat_pembayaran.php">

                        <span class="menu-icon">▥</span>

                        <span>Riwayat Pembayaran</span>

                    </a>

                </nav>

            </div>



            <!-- MENU LAINNYA -->
            <div class="menu-section">

                <p class="menu-title">
                    LAINNYA
                </p>


                <nav class="menu">

                    <a href="#">

                        <span class="menu-icon">♙</span>

                        <span>Profil</span>

                    </a>

                </nav>

            </div>



            <!-- LOGOUT -->
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

                    <h1>
                        Dashboard
                    </h1>

                    <p>
                        Ringkasan tagihan dan pembayaran kas kelas 3A
                    </p>

                </div>


                <div class="profile">

                    <div class="profile-icon">
                        M
                    </div>

                    <div class="profile-info">

                        <strong>
                            <?php echo $namaMahasiswa; ?>
                        </strong>

                        <span>
                            Mahasiswa
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
                        Pantau tagihan dan pembayaran kas kamu
                    </h2>

                    <p>
                        Lihat tagihan, lakukan pembayaran,
                        dan pantau status pembayaran melalui KasKita.
                    </p>

                </div>

            </section>



            <!-- STATISTIK -->
            <section class="stats">


                <!-- TOTAL TAGIHAN -->
                <div class="stat-card">

                    <div class="stat-icon blue">
                        Rp
                    </div>

                    <div class="stat-content">

                        <span>
                            Total Tagihan
                        </span>

                        <h3>
                            Rp <?php echo number_format($totalTagihan, 0, ',', '.'); ?>
                        </h3>

                        <small>
                            Total tagihan kamu
                        </small>

                    </div>

                </div>



                <!-- TAGIHAN AKTIF -->
                <div class="stat-card">

                    <div class="stat-icon orange">
                        !
                    </div>

                    <div class="stat-content">

                        <span>
                            Tagihan Aktif
                        </span>

                        <h3>
                            <?php echo count($tagihan); ?>
                        </h3>

                        <small>
                            Tagihan belum dibayar
                        </small>

                    </div>

                </div>



                <!-- STATUS PEMBAYARAN -->
                <div class="stat-card">

                    <div class="stat-icon green">
                        ✓
                    </div>

                    <div class="stat-content">

                        <span>
                            Status Pembayaran
                        </span>

                        <h3>
                            Belum Bayar
                        </h3>

                        <small>
                            Status tagihan terbaru
                        </small>

                    </div>

                </div>



                <!-- RIWAYAT -->
                <div class="stat-card">

                    <div class="stat-icon purple">
                        ▤
                    </div>

                    <div class="stat-content">

                        <span>
                            Riwayat Pembayaran
                        </span>

                        <h3>
                            0
                        </h3>

                        <small>
                            Pembayaran tercatat
                        </small>

                    </div>

                </div>

            </section>



            <!-- BAGIAN BAWAH -->
            <section class="dashboard-grid">


            <!-- TAGIHAN TERBARU -->
            <div class="dashboard-card payment-card student-bill-card">

                <div class="card-header">

                    <div>
                        <h3>Tagihan Terbaru</h3>
                        <p>Tagihan kas yang perlu kamu bayarkan</p>
                    </div>

                    <a href="tagihan_mahasiswa.php">
                        Lihat semua
                    </a>

                </div>


                <div class="payment-table student-bill-table">

                    <!-- HEADER -->
                    <div class="table-head">

                        <span>Tagihan</span>
                        <span>Nominal</span>
                        <span>Status</span>

                    </div>


                    <!-- DATA -->
                    <div class="student-payment-row">

                        <div>
                            <strong>Kas November 2026</strong>

                            <small>
                                Jatuh tempo 25 November 2026
                            </small>
                        </div>


                        <div>
                            <strong>Rp 6.000</strong>
                        </div>


                        <div>
                            <span class="status waiting-status">
                                Belum Dibayar
                            </span>
                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="card-footer">

                        <a href="pembayaran_mahasiswa.php"
                        class="btn-primary">
                            Bayar Sekarang
                        </a>

                    </div>

                </div>

            </div>

                <!-- INFORMASI PEMBAYARAN -->
                <div class="dashboard-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Informasi Pembayaran
                            </h3>

                            <p>
                                Ringkasan tagihan kamu
                            </p>

                        </div>

                    </div>



                    <div class="cash-info">


                        <div class="cash-row">

                            <div>

                                <span class="cash-label">
                                    Total tagihan
                                </span>

                            </div>

                            <strong>
                                Rp 6.000
                            </strong>

                        </div>



                        <div class="cash-row">

                            <div>

                                <span class="cash-label">
                                    Status pembayaran
                                </span>

                            </div>

                            <strong class="expense">
                                Belum Dibayar
                            </strong>

                        </div>



                        <div class="cash-row total">

                            <div>

                                <span class="cash-label">
                                    Jatuh tempo
                                </span>

                            </div>

                            <strong>
                                25 Nov 2026
                            </strong>

                        </div>

                    </div>

                </div>

            </section>


        </main>

    </div>


</body>

</html>