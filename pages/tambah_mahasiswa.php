<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'bendahara') {
    header('Location: ../index.php');
    exit;
}

require_once '../config/Database.php';

$db = new Database();
$conn = $db->connect();

$pesan = '';
$jenisPesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $status = $_POST['status'] ?? 'Aktif';

    /*
    |--------------------------------------------------------------------------
    | VALIDASI
    |--------------------------------------------------------------------------
    */

    if ($nim === '' || $nama === '' || $no_hp === '') {

        $pesan = 'Data mahasiswa belum lengkap.';
        $jenisPesan = 'error';

    } else {

        /*
        |--------------------------------------------------------------------------
        | CEK NIM
        |--------------------------------------------------------------------------
        */

        $cek = $conn->prepare("
            SELECT id_mahasiswa
            FROM mahasiswa
            WHERE nim = ?
        ");

        $cek->bind_param("s", $nim);
        $cek->execute();

        $hasil = $cek->get_result();

        if ($hasil->num_rows > 0) {

            $pesan = 'NIM tersebut sudah terdaftar.';
            $jenisPesan = 'error';

        } else {

            /*
            |--------------------------------------------------------------------------
            | BUAT AKUN USER MAHASISWA
            |--------------------------------------------------------------------------
            */

            $username = $nim;
            $password = null;
            $role = 'mahasiswa';

            $stmtUser = $conn->prepare("
                INSERT INTO users
                (username, password, role, nama)
                VALUES (?, ?, ?, ?)
            ");

            $stmtUser->bind_param(
                "ssss",
                $username,
                $password,
                $role,
                $nama
            );

            if ($stmtUser->execute()) {

                $id_user = $conn->insert_id;

                /*
                |--------------------------------------------------------------------------
                | SIMPAN DATA MAHASISWA
                |--------------------------------------------------------------------------
                */

                $stmtMahasiswa = $conn->prepare("
                    INSERT INTO mahasiswa
                    (id_user, nim, nama_mahasiswa, no_hp, status)
                    VALUES (?, ?, ?, ?, ?)
                ");

                $stmtMahasiswa->bind_param(
                    "issss",
                    $id_user,
                    $nim,
                    $nama,
                    $no_hp,
                    $status
                );

                if ($stmtMahasiswa->execute()) {

                    header('Location: mahasiswa.php?status=berhasil');
                    exit;

                } else {

                    $pesan = 'Data mahasiswa gagal disimpan: ' . $stmtMahasiswa->error;
                    $jenisPesan = 'error';
                }

            } else {

                $pesan = 'Akun mahasiswa gagal dibuat: ' . $stmtUser->error;
                $jenisPesan = 'error';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Mahasiswa | KasKita</title>

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

                    <h1>
                        Tambah Mahasiswa
                    </h1>

                    <p>
                        Tambahkan data mahasiswa ke dalam KasKita.
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



            <!-- FORM -->
            <section class="form-card">

                <div class="form-header">

                    <h2>
                        Data Mahasiswa
                    </h2>

                    <p>
                        Isi data mahasiswa dengan lengkap.
                    </p>

                </div>


                <form action="tambah_mahasiswa.php" method="POST">


                    <div class="form-grid">

                        <!-- NIM -->
                        <div class="form-group">

                            <label for="nim">
                                NIM
                            </label>

                            <input type="text" id="nim" name="nim" placeholder="Contoh: 2530521001" required>

                        </div>


                        <!-- NAMA -->
                        <div class="form-group">

                            <label for="nama">
                                Nama Mahasiswa
                            </label>

                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama mahasiswa" required>

                        </div>


                        <!-- NO HP -->
                        <div class="form-group">

                            <label for="no_hp">
                                Nomor HP
                            </label>

                            <input type="text" id="no_hp" name="no_hp" placeholder="Contoh: 081234567890" required>

                        </div>


                        <!-- STATUS -->
                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select id="status" name="status">

                                <option value="Aktif">
                                    Aktif
                                </option>

                                <option value="Nonaktif">
                                    Nonaktif
                                </option>

                            </select>

                        </div>

                    </div>



                    <!-- BUTTON -->
                    <div class="form-actions">

                        <a href="mahasiswa.php" class="btn-cancel">
                            Batal
                        </a>

                        <button type="submit" class="btn-primary">
                            Simpan Mahasiswa
                        </button>

                    </div>


                </form>

            </section>


        </main>

    </div>

</body>

</html>