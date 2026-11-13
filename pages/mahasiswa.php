<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'bendahara') {
    header('Location: ../index.php');
    exit;
}

require_once '../config/Database.php';

$db = new Database();

if (!method_exists($db, 'connect')) {
    die('Method connect() tidak ditemukan.');
}

$conn = $db->connect();
/*
|--------------------------------------------------------------------------
| AMBIL DATA MAHASISWA
|--------------------------------------------------------------------------
*/

$dataMahasiswa = [];

$query = "
    SELECT
        m.id_mahasiswa,
        m.nim,
        m.nama_mahasiswa,
        m.no_hp,
        m.status
    FROM mahasiswa m
    ORDER BY m.id_mahasiswa ASC
";

$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    $dataMahasiswa[] = $row;
}

/*
|--------------------------------------------------------------------------
| PESAN
|--------------------------------------------------------------------------
*/

$pesan = '';

if (isset($_GET['status']) && $_GET['status'] === 'berhasil') {
    $pesan = 'Data mahasiswa berhasil ditambahkan.';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mahasiswa | KasKita</title>

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


                    <a href="mahasiswa.php" class="active">

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

                    <h1>Mahasiswa</h1>

                    <p>
                        Kelola data mahasiswa kelas 3A
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
                            Data Mahasiswa
                        </h2>

                        <p>
                            Daftar mahasiswa yang terdaftar dalam KasKita.
                        </p>

                    </div>


                    <a href="tambah_mahasiswa.php" class="btn-primary">
                     + Tambah Mahasiswa
                    </a>

                </div>



                <!-- SEARCH -->
                <div class="search-area">

                    <input type="text" placeholder="Cari berdasarkan NIM atau nama mahasiswa...">

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
                                    NIM
                                </th>

                                <th>
                                    Nama Mahasiswa
                                </th>

                                <th>
                                    No. HP
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

                            <?php if (count($dataMahasiswa) > 0): ?>

                                <?php $no = 1; ?>

                                <?php foreach ($dataMahasiswa as $mhs): ?>

                                    <tr>

                                        <td>
                                            <?= $no++ ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($mhs["nim"]) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($mhs["nama_mahasiswa"]) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($mhs["no_hp"]) ?>
                                        </td>

                                        <td>

                                            <?php if ($mhs["status"] === "Aktif"): ?>

                                                <span class="status active-status">
                                                    Aktif
                                                </span>

                                            <?php else: ?>

                                                <span class="status rejected-status">
                                                    Nonaktif
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td>

                                            <div class="action-buttons">

                                                <a href="#" class="btn-edit">
                                                    Edit
                                                </a>

                                                <a href="#" class="btn-delete">
                                                    Hapus
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="6" style="text-align:center; padding:30px;">
                                        Belum ada data mahasiswa.
                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


            </section>


        </main>

    </div>

</body>

</html>