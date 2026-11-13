<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'bendahara') {
    header('Location: ../index.php');
    exit;
}

/*
|--------------------------------------------------------------------------
| DATA PEMBAYARAN
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION['pembayaran'])) {
    $_SESSION['pembayaran'] = [
        'ahmad' => 'menunggu',
        'aisyah' => 'disetujui',
        'raihan' => 'menunggu'
    ];
}

/*
|--------------------------------------------------------------------------
| AMBIL DATA PEMBAYARAN MAHASISWA
|--------------------------------------------------------------------------
*/

if (isset($_SESSION['pembayaran_mahasiswa'][0])) {

    $dataMahasiswa = $_SESSION['pembayaran_mahasiswa'][0];

    if (
        $dataMahasiswa['tanggal'] !== '' &&
        $dataMahasiswa['metode'] !== ''
    ) {
        $_SESSION['pembayaran']['raihan'] =
            $dataMahasiswa['status'];
    }
}

/*
|--------------------------------------------------------------------------
| PERUBAHAN STATUS
|--------------------------------------------------------------------------
*/

if (
    isset($_GET['status']) &&
    isset($_GET['mahasiswa'])
) {

    $mahasiswa = $_GET['mahasiswa'];
    $status = $_GET['status'];

    if (isset($_SESSION['pembayaran'][$mahasiswa])) {

        $_SESSION['pembayaran'][$mahasiswa] = $status;

        /*
        |--------------------------------------------------------------------------
        | SINKRONKAN STATUS KE DATA MAHASISWA
        |--------------------------------------------------------------------------
        */

        if (
            $mahasiswa === 'raihan' &&
            isset($_SESSION['pembayaran_mahasiswa'][0])
        ) {
            $_SESSION['pembayaran_mahasiswa'][0]['status'] =
                $status;
        }
    }
}

$statusAhmad =
    $_SESSION['pembayaran']['ahmad'];

$statusAisyah =
    $_SESSION['pembayaran']['aisyah'];

$statusRaihan =
    $_SESSION['pembayaran']['raihan'];

/*
|--------------------------------------------------------------------------
| FUNGSI STATUS
|--------------------------------------------------------------------------
*/

function tampilStatus($status)
{
    if ($status == 'disetujui') {
        return '<span class="status approved-status">
                    Disetujui
                </span>';
    }

    if ($status == 'ditolak') {
        return '<span class="status rejected-status">
                    Ditolak
                </span>';
    }

    return '<span class="status waiting-status">
                Menunggu
            </span>';
}

/*
|--------------------------------------------------------------------------
| FUNGSI AKSI
|--------------------------------------------------------------------------
*/

function tampilAksi($status, $mahasiswa)
{
    if ($status == 'menunggu') {
        return '
            <a href="periksa_pembayaran.php?mahasiswa='
            . $mahasiswa .
            '" class="btn-edit">
                Periksa
            </a>
        ';
    }

    if ($status == 'disetujui') {
        return '
            <a href="periksa_pembayaran.php?mahasiswa='
            . $mahasiswa .
            '" class="btn-edit">
                Detail
            </a>
        ';
    }

    return '
        <a href="periksa_pembayaran.php?mahasiswa='
        . $mahasiswa .
        '" class="btn-edit">
            Periksa Ulang
        </a>
    ';
}

/*
|--------------------------------------------------------------------------
| HITUNG STATUS
|--------------------------------------------------------------------------
*/

$totalMenunggu = 0;
$totalDisetujui = 0;
$totalDitolak = 0;

foreach ($_SESSION['pembayaran'] as $status) {

    if ($status == 'menunggu') {
        $totalMenunggu++;
    } elseif ($status == 'disetujui') {
        $totalDisetujui++;
    } elseif ($status == 'ditolak') {
        $totalDitolak++;
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
                        Pembayaran
                    </h1>

                    <p>
                        Kelola dan verifikasi pembayaran kas mahasiswa.
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


                <!-- NOTIFIKASI -->

                <?php if (isset($_GET['status'])): ?>

                    <?php if ($_GET['status'] == 'disetujui'): ?>

                        <div class="success-message">
                            Pembayaran berhasil disetujui.
                        </div>

                    <?php elseif ($_GET['status'] == 'ditolak'): ?>

                        <div class="error-message">
                            Pembayaran ditolak.
                        </div>

                    <?php endif; ?>

                <?php endif; ?>


                <!-- HEADER -->
                <div class="content-header">

                    <div>

                        <h2>
                            Daftar Pembayaran
                        </h2>

                        <p>
                            Periksa pembayaran yang masuk dari mahasiswa.
                        </p>

                    </div>

                </div>


                <!-- SUMMARY -->
                <div class="mini-summary">

                    <div class="mini-card">

                        <span>
                            Total Pembayaran
                        </span>

                        <strong>
                            3
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Menunggu Verifikasi
                        </span>

                        <strong class="text-warning">
                            <?php echo $totalMenunggu; ?>
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Disetujui
                        </span>

                        <strong class="text-success">
                            <?php echo $totalDisetujui; ?>
                        </strong>

                    </div>

                </div>


                <!-- FILTER -->
                <div class="filter-area">

                    <div class="filter-item">

                        <label>
                            Status
                        </label>

                        <select>

                            <option>
                                Semua Status
                            </option>

                            <option>
                                Menunggu Verifikasi
                            </option>

                            <option>
                                Disetujui
                            </option>

                            <option>
                                Ditolak
                            </option>

                        </select>

                    </div>


                    <div class="filter-item">

                        <label>
                            Cari Mahasiswa
                        </label>

                        <input type="text" placeholder="Masukkan nama atau NIM...">

                    </div>


                    <button class="btn-search">
                        Cari
                    </button>

                </div>


                <!-- TABLE -->
                <div class="table-container">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    No
                                </th>

                                <th>
                                    Mahasiswa
                                </th>

                                <th>
                                    Tagihan
                                </th>

                                <th>
                                    Nominal
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Metode
                                </th>

                                <th>
                                    Status
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <!-- AHMAD -->
                            <tr>

                                <td>
                                    1
                                </td>

                                <td>

                                    <strong>
                                        Ahmad Fauzan
                                    </strong>

                                    <br>

                                    <small>
                                        2530521001
                                    </small>

                                </td>

                                <td>
                                    Kas November 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    12 Nov 2026
                                </td>

                                <td>
                                    Transfer
                                </td>

                                <td>

                                    <?php
                                    echo tampilStatus($statusAhmad);
                                    ?>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <?php
                                        echo tampilAksi($statusAhmad, 'ahmad');
                                        ?>

                                    </div>

                                </td>

                            </tr>


                            <!-- AISYAH -->
                            <tr>

                                <td>
                                    2
                                </td>

                                <td>

                                    <strong>
                                        Aisyah Putri
                                    </strong>

                                    <br>

                                    <small>
                                        2530521002
                                    </small>

                                </td>

                                <td>
                                    Kas November 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    11 Nov 2026
                                </td>

                                <td>
                                    QRIS
                                </td>

                                <td>

                                    <?php
                                    echo tampilStatus($statusAisyah);
                                    ?>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <?php
                                        echo tampilAksi($statusAisyah, 'aisyah');
                                        ?>

                                    </div>

                                </td>

                            </tr>


                            <!-- RAIHAN -->
                            <tr>

                                <td>
                                    3
                                </td>

                                <td>

                                    <strong>
                                        Raihan Fadhilah
                                    </strong>

                                    <br>

                                    <small>
                                        2530521003
                                    </small>

                                </td>

                                <td>
                                    Kas November 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    10 Nov 2026
                                </td>

                                <td>
                                    Tunai
                                </td>

                                <td>

                                    <?php
                                    echo tampilStatus($statusRaihan);
                                    ?>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <?php
                                        echo tampilAksi($statusRaihan, 'raihan');
                                        ?>

                                    </div>

                                </td>

                            </tr>


                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

</body>

</html>