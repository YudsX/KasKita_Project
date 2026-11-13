<?php

$mahasiswa = $_GET['mahasiswa'] ?? 'ahmad';

$data = [

    'ahmad' => [
        'nama' => 'Ahmad Fauzan',
        'nim' => '2530521001',
        'tagihan' => 'Kas November 2026',
        'nominal' => 'Rp 6.000',
        'tanggal' => '12 November 2026',
        'metode' => 'Transfer'
    ],

    'aisyah' => [
        'nama' => 'Aisyah Putri',
        'nim' => '2530521002',
        'tagihan' => 'Kas November 2026',
        'nominal' => 'Rp 6.000',
        'tanggal' => '11 November 2026',
        'metode' => 'QRIS'
    ],

    'raihan' => [
        'nama' => 'Raihan Fadhilah',
        'nim' => '2530521003',
        'tagihan' => 'Kas November 2026',
        'nominal' => 'Rp 6.000',
        'tanggal' => '10 November 2026',
        'metode' => 'Tunai'
    ]

];

if (!isset($data[$mahasiswa])) {
    $mahasiswa = 'ahmad';
}

$detail = $data[$mahasiswa];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Periksa Pembayaran | KasKita</title>

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

                    <a href="dashboard.php">
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

                    <a href="pembayaran.php" class="active">
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


        <!-- MAIN -->
        <main class="main-content">


            <!-- TOPBAR -->
            <header class="topbar">

                <div class="page-title">

                    <h1>
                        Periksa Pembayaran
                    </h1>

                    <p>
                        Periksa bukti pembayaran sebelum melakukan verifikasi.
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
                            Informasi Pembayaran
                        </h2>

                        <p>
                            Periksa data pembayaran dari mahasiswa.
                        </p>

                    </div>


                    <a href="pembayaran.php" class="btn-cancel">
                        ← Kembali
                    </a>

                </div>


                <!-- DETAIL -->
                <div class="form-card">

                    <div class="form-header">

                        <h2>
                            Data Pembayaran
                        </h2>

                        <p>
                            Pembayaran dari
                            <?php echo $detail['nama']; ?>.
                        </p>

                    </div>


                    <div class="form-grid">


                        <div class="form-group">

                            <label>
                                Nama Mahasiswa
                            </label>

                            <input type="text" value="<?php echo $detail['nama']; ?>" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                NIM
                            </label>

                            <input type="text" value="<?php echo $detail['nim']; ?>" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                Tagihan
                            </label>

                            <input type="text" value="<?php echo $detail['tagihan']; ?>" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                Nominal
                            </label>

                            <input type="text" value="<?php echo $detail['nominal']; ?>" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                Tanggal Pembayaran
                            </label>

                            <input type="text" value="<?php echo $detail['tanggal']; ?>" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                Metode Pembayaran
                            </label>

                            <input type="text" value="<?php echo $detail['metode']; ?>" readonly>

                        </div>

                    </div>


                    <!-- BUKTI -->
                    <div class="form-group">

                        <label>
                            Bukti Pembayaran
                        </label>

                        <div class="payment-proof">

                            <p>
                                Bukti pembayaran mahasiswa.
                            </p>

                            <p>
                                <strong>
                                    bukti_pembayaran.jpg
                                </strong>
                            </p>

                        </div>

                    </div>


                    <!-- AKSI -->
                    <div class="form-actions">

                        <a href="pembayaran.php?mahasiswa=<?php echo $mahasiswa; ?>&status=ditolak" class="btn-cancel">

                            Tolak

                        </a>


                        <a href="pembayaran.php?mahasiswa=<?php echo $mahasiswa; ?>&status=disetujui"
                            class="btn-primary">

                            Setujui Pembayaran

                        </a>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>