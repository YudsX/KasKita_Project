<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'mahasiswa') {
    header('Location: ../index.php');
    exit;
}

$namaMahasiswa = $_SESSION['username'] ?? 'Raihan Fadhilah';

$pesan = '';
$jenisPesan = '';

/*
|--------------------------------------------------------------------------
| DATA PEMBAYARAN MAHASISWA
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['pembayaran_mahasiswa'])) {

    $_SESSION['pembayaran_mahasiswa'] = [
        [
            'nama' => $namaMahasiswa,
            'nim' => '2530521003',
            'tagihan' => 'Kas November 2026',
            'nominal' => 6000,
            'tanggal' => '',
            'metode' => '',
            'status' => 'belum'
        ]
    ];
}

/*
|--------------------------------------------------------------------------
| PROSES KIRIM PEMBAYARAN
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $metode = $_POST['metode'] ?? '';
    $tanggal = $_POST['tanggal'] ?? '';

    if ($metode === '' || $tanggal === '') {

        $pesan = 'Silakan lengkapi metode dan tanggal pembayaran.';
        $jenisPesan = 'error';

    } else {

        $_SESSION['pembayaran_mahasiswa'][0]['nama'] =
            $namaMahasiswa;

        $_SESSION['pembayaran_mahasiswa'][0]['nim'] =
            '2530521003';

        $_SESSION['pembayaran_mahasiswa'][0]['tagihan'] =
            'Kas November 2026';

        $_SESSION['pembayaran_mahasiswa'][0]['nominal'] =
            6000;

        $_SESSION['pembayaran_mahasiswa'][0]['tanggal'] =
            $tanggal;

        $_SESSION['pembayaran_mahasiswa'][0]['metode'] =
            $metode;

        $_SESSION['pembayaran_mahasiswa'][0]['status'] =
            'menunggu';

        $pesan = 'Pembayaran berhasil dikirim dan sedang menunggu verifikasi bendahara.';
        $jenisPesan = 'success';
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran | KasKita</title>

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

                    <a href="pembayaran_mahasiswa.php" class="active">
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


        <!-- MAIN -->
        <main class="main-content">

            <header class="topbar">

                <div class="page-title">

                    <h1>Pembayaran</h1>

                    <p>
                        Lakukan pembayaran tagihan kas kamu
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


            <?php if ($pesan !== ''): ?>

                <?php if ($jenisPesan === 'success'): ?>

                    <div class="success-message">
                        <?php echo $pesan; ?>
                    </div>

                <?php else: ?>

                    <div class="error-message">
                        <?php echo $pesan; ?>
                    </div>

                <?php endif; ?>

            <?php endif; ?>


            <section class="dashboard-grid payment-form-grid">

                <!-- DETAIL TAGIHAN -->
                <div class="dashboard-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Detail Tagihan
                            </h3>

                            <p>
                                Tagihan yang akan dibayar
                            </p>

                        </div>

                    </div>

                    <div class="cash-info">

                        <div class="cash-row">

                            <div>
                                <span class="cash-label">
                                    Nama Tagihan
                                </span>
                            </div>

                            <strong>
                                Kas November 2026
                            </strong>

                        </div>

                        <div class="cash-row">

                            <div>
                                <span class="cash-label">
                                    Nominal
                                </span>
                            </div>

                            <strong>
                                Rp 6.000
                            </strong>

                        </div>

                        <div class="cash-row">

                            <div>
                                <span class="cash-label">
                                    Jatuh Tempo
                                </span>
                            </div>

                            <strong>
                                25 November 2026
                            </strong>

                        </div>

                        <div class="cash-row total">

                            <div>
                                <span class="cash-label">
                                    Status
                                </span>
                            </div>

                            <strong class="expense">
                                Belum Dibayar
                            </strong>

                        </div>

                    </div>

                </div>


                <!-- FORM -->
                <div class="dashboard-card">

                    <div class="card-header">

                        <div>

                            <h3>
                                Form Pembayaran
                            </h3>

                            <p>
                                Isi data pembayaran dengan benar
                            </p>

                        </div>

                    </div>


                    <form method="POST" enctype="multipart/form-data" class="payment-form">

                        <div class="form-group">

                            <label>
                                Metode Pembayaran
                            </label>

                            <select name="metode" required>

                                <option value="">
                                    Pilih metode pembayaran
                                </option>

                                <option value="Transfer">
                                    Transfer
                                </option>

                                <option value="QRIS">
                                    QRIS
                                </option>

                                <option value="Tunai">
                                    Tunai
                                </option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label>
                                Nominal Pembayaran
                            </label>

                            <input type="text" value="Rp 6.000" readonly>

                        </div>


                        <div class="form-group">

                            <label>
                                Tanggal Pembayaran
                            </label>

                            <input type="date" name="tanggal" required>

                        </div>


                        <div class="form-group">

                            <label>
                                Bukti Pembayaran
                            </label>

                            <input type="file" name="bukti" accept=".jpg,.jpeg,.png,.pdf">

                            <small>
                                Format JPG, PNG, atau PDF.
                            </small>

                        </div>


                        <div class="form-actions">

                            <a href="tagihan_mahasiswa.php" class="btn-cancel">
                                Batal
                            </a>

                            <button type="submit" class="btn-primary">
                                Kirim Pembayaran
                            </button>

                        </div>

                    </form>

                </div>

            </section>

        </main>

    </div>

</body>

</html>