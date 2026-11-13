<?php
session_start();

if (
    !isset($_SESSION['login']) ||
    $_SESSION['role'] !== 'mahasiswa'
) {
    header('Location: ../index.php');
    exit;
}

require_once '../config/Database.php';

$db = new Database();
$conn = $db->connect();

$error = '';

$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = trim($_POST['password'] ?? '');
    $konfirmasi = trim($_POST['konfirmasi_password'] ?? '');

    if ($password === '' || $konfirmasi === '') {

        $error = 'Password dan konfirmasi password wajib diisi.';

    } elseif (strlen($password) < 5) {

        $error = 'Password minimal 5 karakter.';

    } elseif ($password !== $konfirmasi) {

        $error = 'Konfirmasi password tidak sesuai.';

    } else {

        $stmt = $conn->prepare("
            UPDATE users
            SET password = ?
            WHERE id_user = ?
        ");

        $stmt->bind_param(
            "si",
            $password,
            $id_user
        );

        if ($stmt->execute()) {

            header('Location: dashboard_mahasiswa.php');
            exit;

        } else {

            $error = 'Password gagal disimpan.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buat Password | KasKita</title>

    <link rel="stylesheet" href="/kaskita/assets/css/style.css">

</head>

<body>

<div class="app">

    <main class="main-content">

        <div class="content-card">

            <div class="content-header">

                <div>

                    <h2>
                        Buat Password
                    </h2>

                    <p>
                        Silakan buat password untuk akun KasKita kamu.
                    </p>

                </div>

            </div>


            <?php if ($error !== ''): ?>

                <div class="error-message">
                    <?= htmlspecialchars($error) ?>
                </div>

            <?php endif; ?>


            <form method="POST" action="buat_password.php">

                <div class="form-group">

                    <label for="password">
                        Password Baru
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password baru"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="konfirmasi_password">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        id="konfirmasi_password"
                        name="konfirmasi_password"
                        placeholder="Ulangi password baru"
                        required
                    >

                </div>


                <div class="form-actions">

                    <button type="submit" class="btn-primary">
                        Simpan Password
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>

</html>