<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Kas | KasKita</title>

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

                    <a href="pembayaran.php">
                        <span class="menu-icon">▤</span>
                        <span>Pembayaran</span>
                    </a>

                    <a href="transaksi.php" class="active">
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
                        Transaksi Kas
                    </h1>

                    <p>
                        Catatan pemasukan dan pengeluaran kas kelas 3A.
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
                            Riwayat Transaksi Kas
                        </h2>

                        <p>
                            Catatan seluruh transaksi keuangan kelas.
                        </p>

                    </div>


                    <a href="#" class="btn-primary">
                        + Tambah Transaksi
                    </a>

                </div>



                <!-- SUMMARY -->
                <div class="mini-summary">

                    <div class="mini-card">

                        <span>
                            Total Pemasukan
                        </span>

                        <strong class="text-success">
                            Rp 0
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Total Pengeluaran
                        </span>

                        <strong class="text-danger">
                            Rp 0
                        </strong>

                    </div>


                    <div class="mini-card">

                        <span>
                            Saldo Kas
                        </span>

                        <strong class="text-primary">
                            Rp 0
                        </strong>

                    </div>

                </div>



                <!-- FILTER -->
                <div class="filter-area">

                    <div class="filter-item">

                        <label>
                            Jenis Transaksi
                        </label>

                        <select>

                            <option>
                                Semua Transaksi
                            </option>

                            <option>
                                Pemasukan
                            </option>

                            <option>
                                Pengeluaran
                            </option>

                        </select>

                    </div>


                    <div class="filter-item">

                        <label>
                            Cari Transaksi
                        </label>

                        <input type="text" placeholder="Cari keterangan transaksi...">

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
                                    Tanggal
                                </th>

                                <th>
                                    Jenis
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th>
                                    Nominal
                                </th>

                                <th>
                                    Sumber
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
                                    12 Nov 2026
                                </td>

                                <td>

                                    <span class="transaction-income">
                                        Pemasukan
                                    </span>

                                </td>

                                <td>
                                    Pembayaran Kas November - Ahmad Fauzan
                                </td>

                                <td>

                                    <strong class="text-success">
                                        + Rp 6.000
                                    </strong>

                                </td>

                                <td>
                                    Pembayaran
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="#" class="btn-edit">
                                            Detail
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    2
                                </td>

                                <td>
                                    12 Nov 2026
                                </td>

                                <td>

                                    <span class="transaction-expense">
                                        Pengeluaran
                                    </span>

                                </td>

                                <td>
                                    Pembelian perlengkapan kelas
                                </td>

                                <td>

                                    <strong class="text-danger">
                                        - Rp 50.000
                                    </strong>

                                </td>

                                <td>
                                    Bendahara
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="#" class="btn-edit">
                                            Detail
                                        </a>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>
                                    3
                                </td>

                                <td>
                                    10 Nov 2026
                                </td>

                                <td>

                                    <span class="transaction-income">
                                        Pemasukan
                                    </span>

                                </td>

                                <td>
                                    Pembayaran Kas November - Aisyah Putri
                                </td>

                                <td>

                                    <strong class="text-success">
                                        + Rp 6.000
                                    </strong>

                                </td>

                                <td>
                                    Pembayaran
                                </td>

                                <td>

                                    <div class="action-buttons">

                                        <a href="#" class="btn-edit">
                                            Detail
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