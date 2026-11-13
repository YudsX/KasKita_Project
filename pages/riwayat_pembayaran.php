<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'mahasiswa') {
    header('Location: ../index.php');
    exit;
}

$namaMahasiswa = $_SESSION['username'] ?? 'Raihan Fadhilah';

$riwayat = [
    [
        'tagihan' => 'Kas Oktober 2026',
        'nominal' => 6000,
        'tanggal' => '11 Oktober 2026',
        'metode' => 'QRIS',
        'status' => 'Disetujui'
    ],
    [
        'tagihan' => 'Kas September 2026',
        'nominal' => 6000,
        'tanggal' => '10 September 2026',
        'metode' => 'Transfer',
        'status' => 'Disetujui'
    ],
    [
        'tagihan' => 'Kas Agustus 2026',
        'nominal' => 6000,
        'tanggal' => '12 Agustus 2026',
        'metode' => 'Tunai',
        'status' => 'Ditolak'
    ]
];

$totalPembayaran = 0;

foreach ($riwayat as $item) {
    if ($item['status'] === 'Disetujui') {
        $totalPembayaran += $item['nominal'];
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pembayaran | KasKita</title>

    <link rel="stylesheet" href="/kaskita/assets/css/style.css">
</head>

<body>

    <div class="app">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="brand">
                <div class="brand-icon">K</div>

                <div class="brand-name">
                    <span>Kas</span>Kita
                </div>
            </div>


            <div class="menu-section">

                <p class="menu-title">MENU UTAMA</p>

                <nav class="menu">

                    <a href="dashboard_mahasiswa.php">
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

                    <a href="riwayat_pembayaran.php" class="active">
                        <span class="menu-icon">▥</span>
                        <span>Riwayat Pembayaran</span>
                    </a>

                </nav>

            </div>


            <div class="menu-section">

                <p class="menu-title">LAINNYA</p>

                <nav class="menu">

                    <a href="#">
                        <span class="menu-icon">♙</span>
                        <span>Profil</span>
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

                    <h1>Riwayat Pembayaran</h1>

                    <p>
                        Daftar pembayaran kas yang pernah kamu lakukan
                    </p>

                </div>


                <div class="profile">

                    <div class="profile-icon">
                        M
                    </div>

                    <div class="profile-info">

                        <strong>
                            <?php echo htmlspecialchars($namaMahasiswa); ?>
                        </strong>

                        <span>
                            Mahasiswa
                        </span>

                    </div>

                </div>

            </header>


            <!-- STATISTIK -->
            <section class="stats">

                <div class="stat-card">

                    <div class="stat-icon blue">
                        Rp
                    </div>

                    <div class="stat-content">

                        <span>
                            Total Dibayar
                        </span>

                        <h3>
                            Rp
                            <?php echo number_format($totalPembayaran, 0, ',', '.'); ?>
                        </h3>

                        <small>
                            Pembayaran disetujui
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon green">
                        ✓
                    </div>

                    <div class="stat-content">

                        <span>
                            Disetujui
                        </span>

                        <h3>
                            2
                        </h3>

                        <small>
                            Pembayaran berhasil
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon orange">
                        !
                    </div>

                    <div class="stat-content">

                        <span>
                            Ditolak
                        </span>

                        <h3>
                            1
                        </h3>

                        <small>
                            Perlu diperiksa kembali
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon purple">
                        ▤
                    </div>

                    <div class="stat-content">

                        <span>
                            Total Transaksi
                        </span>

                        <h3>
                            <?php echo count($riwayat); ?>
                        </h3>

                        <small>
                            Riwayat pembayaran
                        </small>

                    </div>

                </div>

            </section>


            <!-- RIWAYAT -->
            <section class="dashboard-card">

                <div class="card-header">

                    <div>

                        <h3>
                            Daftar Riwayat Pembayaran
                        </h3>

                        <p>
                            Semua pembayaran yang pernah kamu kirim
                        </p>

                    </div>

                </div>


                <div class="student-history-table">

                    <!-- HEADER -->
                    <div class="table-head">

                        <span>
                            Tagihan
                        </span>

                        <span>
                            Nominal
                        </span>

                        <span>
                            Tanggal
                        </span>

                        <span>
                            Metode
                        </span>

                        <span>
                            Status
                        </span>

                    </div>


                    <!-- DATA -->
                    <?php foreach ($riwayat as $item): ?>

                        <div class="student-history-row">

                            <div>

                                <strong>
                                    <?php echo $item['tagihan']; ?>
                                </strong>

                            </div>


                            <div>

                                <strong>
                                    Rp
                                    <?php echo number_format($item['nominal'], 0, ',', '.'); ?>
                                </strong>

                            </div>


                            <div>

                                <span>
                                    <?php echo $item['tanggal']; ?>
                                </span>

                            </div>


                            <div>

                                <span>
                                    <?php echo $item['metode']; ?>
                                </span>

                            </div>


                            <div>

                                <?php if ($item['status'] === 'Disetujui'): ?>

                                    <span class="status approved-status">
                                        Disetujui
                                    </span>

                                <?php else: ?>

                                    <span class="status rejected-status">
                                        Ditolak
                                    </span>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

        </main>

    </div>

</body>

</html>