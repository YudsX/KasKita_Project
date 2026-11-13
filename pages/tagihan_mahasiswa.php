<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'mahasiswa') {
    header('Location: ../index.php');
    exit;
}

$namaMahasiswa = $_SESSION['username'] ?? 'Raihan Fadhilah';

/*
|--------------------------------------------------------------------------
| CEK STATUS PEMBAYARAN NOVEMBER
|--------------------------------------------------------------------------
*/

$statusNovember = 'Belum Dibayar';

if (
    isset($_SESSION['pembayaran_mahasiswa'][0]) &&
    $_SESSION['pembayaran_mahasiswa'][0]['status'] === 'disetujui'
) {
    $statusNovember = 'Sudah Dibayar';
}

/*
|--------------------------------------------------------------------------
| DATA TAGIHAN
|--------------------------------------------------------------------------
*/

$tagihan = [
    [
        'nama' => 'Kas November 2026',
        'nominal' => 6000,
        'jatuh_tempo' => '25 November 2026',
        'status' => $statusNovember
    ],
    [
        'nama' => 'Kas Oktober 2026',
        'nominal' => 6000,
        'jatuh_tempo' => '25 Oktober 2026',
        'status' => 'Sudah Dibayar'
    ],
    [
        'nama' => 'Kas September 2026',
        'nominal' => 6000,
        'jatuh_tempo' => '25 September 2026',
        'status' => 'Sudah Dibayar'
    ]
];

/*
|--------------------------------------------------------------------------
| HITUNG TOTAL TAGIHAN
|--------------------------------------------------------------------------
*/

$totalTagihan = 0;
$totalBelumBayar = 0;
$totalSudahBayar = 0;

foreach ($tagihan as $item) {

    $totalTagihan += $item['nominal'];

    if ($item['status'] === 'Belum Dibayar') {
        $totalBelumBayar += $item['nominal'];
    }

    if ($item['status'] === 'Sudah Dibayar') {
        $totalSudahBayar++;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tagihan Saya | KasKita</title>

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

                    <a href="tagihan_mahasiswa.php" class="active">
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

                    <h1>Tagihan Saya</h1>

                    <p>
                        Daftar tagihan kas yang harus kamu bayarkan
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
                            Total Tagihan
                        </span>

                        <h3>
                            Rp
                            <?php echo number_format($totalTagihan, 0, ',', '.'); ?>
                        </h3>

                        <small>
                            Seluruh tagihan
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon orange">
                        !
                    </div>

                    <div class="stat-content">

                        <span>
                            Belum Dibayar
                        </span>

                        <h3>
                            Rp
                            <?php echo number_format($totalBelumBayar, 0, ',', '.'); ?>
                        </h3>

                        <small>
                            Tagihan yang harus dibayar
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon green">
                        ✓
                    </div>

                    <div class="stat-content">

                        <span>
                            Sudah Dibayar
                        </span>

                        <h3>
                            <?php echo $totalSudahBayar; ?>
                        </h3>

                        <small>
                            Tagihan lunas
                        </small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon purple">
                        ▣
                    </div>

                    <div class="stat-content">

                        <span>
                            Total Tagihan
                        </span>

                        <h3>
                            <?php echo count($tagihan); ?>
                        </h3>

                        <small>
                            Periode kas
                        </small>

                    </div>

                </div>

            </section>


            <!-- DAFTAR TAGIHAN -->
            <section class="dashboard-card">

                <div class="card-header">

                    <div>

                        <h3>
                            Daftar Tagihan
                        </h3>

                        <p>
                            Riwayat tagihan kas kelas 3A
                        </p>

                    </div>

                </div>


                <div class="student-bill-table">

                    <!-- HEADER TABEL -->
                    <div class="table-head">

                        <span>
                            Tagihan
                        </span>

                        <span>
                            Nominal
                        </span>

                        <span>
                            Jatuh Tempo
                        </span>

                        <span>
                            Status
                        </span>

                        <span>
                            Aksi
                        </span>

                    </div>


                    <?php foreach ($tagihan as $item): ?>

                        <div class="student-bill-row">

                            <div>

                                <strong>
                                    <?php echo $item['nama']; ?>
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
                                    <?php echo $item['jatuh_tempo']; ?>
                                </span>

                            </div>


                            <div>

                                <?php if ($item['status'] === 'Sudah Dibayar'): ?>

                                    <span class="status approved-status">
                                        Sudah Dibayar
                                    </span>

                                <?php else: ?>

                                    <span class="status waiting-status">
                                        Belum Dibayar
                                    </span>

                                <?php endif; ?>

                            </div>


                            <div>

                                <?php if ($item['status'] === 'Belum Dibayar'): ?>

                                    <a href="pembayaran_mahasiswa.php" class="btn-edit">
                                        Bayar
                                    </a>

                                <?php else: ?>

                                    <span style="color:#777;">
                                        Selesai
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