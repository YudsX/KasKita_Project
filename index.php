<?php
session_start();

require_once 'config/Database.php';

$db = new Database();
$conn = $db->connect();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '') {

        $error = 'Username wajib diisi.';

    } else {

        $stmt = $conn->prepare("
            SELECT id_user, username, password, role, nama
            FROM users
            WHERE username = ?
        ");

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $user = $result->fetch_assoc();

            /*
            |--------------------------------------------------------------------------
            | MAHASISWA BELUM MEMILIKI PASSWORD
            |--------------------------------------------------------------------------
            */

            if (
                $user['role'] === 'mahasiswa' &&
                is_null($user['password'])
            ) {

                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['username'] = $user['nama'];
                $_SESSION['role'] = 'mahasiswa';

                header('Location: pages/buat_password.php');
                exit;
            }

            /*
            |--------------------------------------------------------------------------
            | LOGIN BIASA
            |--------------------------------------------------------------------------
            */

            if ($password === '') {

                $error = 'Password wajib diisi.';

            } elseif ($password === $user['password']) {

                $_SESSION['login'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['username'] = $user['nama'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'bendahara') {

                    header('Location: pages/dashboard.php');
                    exit;

                } elseif ($user['role'] === 'mahasiswa') {

                    header('Location: pages/dashboard_mahasiswa.php');
                    exit;
                }

            } else {

                $error = 'Username atau password salah.';
            }

        } else {

            $error = 'Username atau password salah.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | KasKita</title>

    <link rel="stylesheet" href="/kaskita/assets/css/style.css">
</head>

<body class="login-page">

    <div class="login-container">

        <div class="login-card">

            <!-- LOGO -->
            <div class="login-header">

                <div class="login-logo">
                    K
                </div>

                <h1>KasKita</h1>

                <p>
                    Manajemen Kas Kelas
                </p>

            </div>


            <!-- ERROR -->
            <?php if ($error !== ''): ?>

                <div class="error-message">
                    <?php echo $error; ?>
                </div>

            <?php endif; ?>


            <!-- FORM -->
            <form method="POST">

                <div class="form-group">

                    <label>
                        Masuk sebagai
                    </label>

                    <div class="role-choice">

                        <label class="role-option">

                            <input type="radio" name="role" value="bendahara" checked>

                            <span>
                                Bendahara
                            </span>

                        </label>


                        <label class="role-option">

                            <input type="radio" name="role" value="mahasiswa">

                            <span>
                                Mahasiswa
                            </span>

                        </label>

                    </div>

                </div>


                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <input type="text" id="username" name="username" placeholder="Masukkan username" required>

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>

                </div>


                <button type="submit" class="btn-login">
                    Login
                </button>

            </form>


            <!-- AKUN DUMMY -->
            <div class="login-info">

                <p>
                    <strong>Akun demo</strong>
                </p>

                <p>
                    Bendahara: bendahara / 12345
                </p>

                <p>
                    Mahasiswa: mahasiswa / 12345
                </p>

            </div>

        </div>

    </div>

</body>

</html>