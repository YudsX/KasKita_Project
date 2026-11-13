<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tagihan Kas | KasKita</title>

    <link rel="stylesheet" href="../assets/css/style.css">
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
                        Tagihan Kas
                    </h1>

                    <p>
                        Kelola tagihan kas kelas 3A
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
                            Daftar Tagihan Kas
                        </h2>

                        <p>
                            Kelola tagihan kas yang berlaku untuk mahasiswa kelas 3A.
                        </p>

                    </div>


                    <a href="tambah_tagihan.php" class="btn-primary">
                        + Tambah Tagihan
                    </a>

                </div>



                <!-- RINGKASAN -->
                <div class="mini-summary">

                    <div class="mini-card">

                        <span>
                            Total Tagihan
                        </span>

                        <strong>
                            3
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Mahasiswa Terdaftar
                        </span>

                        <strong>
                            59
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Belum Lunas
                        </span>

                        <strong>
                            59
                        </strong>

                    </div>

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
                                    Tagihan
                                </th>

                                <th>
                                    Nominal
                                </th>

                                <th>
                                    Jatuh Tempo
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
                                    Kas November 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    25 November 2026
                                </td>

                                <td>

                                    <span class="status active-status">
                                        Aktif
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="detail_tagihan.php" class="btn-edit">
                                            Detail
                                        </a>

                                        <a href="#" class="btn-delete">
                                            Hapus
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    2
                                </td>

                                <td>
                                    Kas Oktober 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    25 Oktober 2026
                                </td>

                                <td>

                                    <span class="status active-status">
                                        Aktif
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="#" class="btn-edit">
                                            Detail
                                        </a>

                                        <a href="#" class="btn-delete">
                                            Hapus
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    3
                                </td>

                                <td>
                                    Kas September 2026
                                </td>

                                <td>
                                    Rp 6.000
                                </td>

                                <td>
                                    25 September 2026
                                </td>

                                <td>

                                    <span class="status active-status">
                                        Aktif
                                    </span>

                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="#" class="btn-edit">
                                            Detail
                                        </a>

                                        <a href="#" class="btn-delete">
                                            Hapus
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