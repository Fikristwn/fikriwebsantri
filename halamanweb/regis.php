<?php
// Inisialisasi variabel
$nama = $email = $password = $konfirmasi_password = '';
$pesan_error = '';

// Cek apakah formulir dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai dari formulir
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Validasi formulir
    if (empty($nama) || empty($email) || empty($password) || empty($konfirmasi_password)) {
        $pesan_error = 'Semua field harus diisi';
    } elseif ($password != $konfirmasi_password) {
        $pesan_error = 'Konfirmasi password tidak sesuai';
    } else {
        // Simpan informasi pengguna (contoh: ke file teks)
        $data_pengguna = "Nama: $nama\nEmail: $email\nPassword: $password\n";
        file_put_contents('data_pengguna.txt', $data_pengguna, FILE_APPEND);

        // Redirect ke halaman sukses atau halaman lain yang diinginkan
        header('Location: sukses.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <h2>Registrasi Akun</h2>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">

        <label for="password">Password:</label>
        <input type="password" name="password">

        <label for="konfirmasi_password">Konfirmasi Password:</label>
        <input type="password" name="konfirmasi_password">

        <input type="submit" value="Daftar">

        <?php
        // Tampilkan pesan error jika ada
        if (!empty($pesan_error)) {
            echo "<p class='error-message'>$pesan_error</p>";
        }
        ?>
    </form>
</body>
</html>
