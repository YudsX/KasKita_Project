<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Tagihan | KasKita</title>

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
                        Detail Tagihan
                    </h1>

                    <p>
                        Lihat status tagihan mahasiswa kelas 3A
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

                <!-- HEADER DETAIL -->
                <div class="content-header">

                    <div>

                        <h2>
                            Kas November 2026
                        </h2>

                        <p>
                            Detail pembayaran tagihan kas mahasiswa.
                        </p>

                    </div>

                    <a href="tagihan.php" class="btn-cancel">
                        ← Kembali
                    </a>

                </div>


                <!-- INFORMASI TAGIHAN -->
                <div class="mini-summary">

                    <div class="mini-card">

                        <span>
                            Nominal
                        </span>

                        <strong>
                            Rp 6.000
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Jatuh Tempo
                        </span>

                        <strong>
                            25 Nov 2026
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Belum Lunas
                        </span>

                        <strong>
                            2 Mahasiswa
                        </strong>

                    </div>

                </div>


                <!-- STATUS MAHASISWA -->
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
                                    Nominal
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

                            <tr>

                                <td>
                                    1
                                </td>

                                <td>
                                    23100101
                                </td>

                                <td>
                                    Ahmad Fauzan
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>

                                    <span class="status approved-status">
                                        Lunas
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="pembayaran.php" class="btn-edit">
                                            Detail Pembayaran
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    2
                                </td>

                                <td>
                                    23100102
                                </td>

                                <td>
                                    Siti Aisyah
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>

                                    <span class="status waiting-status">
                                        Belum Lunas
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="pembayaran.php" class="btn-edit">
                                            Bayar
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    3
                                </td>

                                <td>
                                    23100103
                                </td>

                                <td>
                                    Rizky Ramadhan
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>

                                    <span class="status approved-status">
                                        Lunas
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="pembayaran.php" class="btn-edit">
                                            Detail Pembayaran
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    4
                                </td>

                                <td>
                                    23100104
                                </td>

                                <td>
                                    Nurul Hidayah
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>

                                    <span class="status waiting-status">
                                        Belum Lunas
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="pembayaran.php" class="btn-edit">
                                            Bayar
                                        </a>

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