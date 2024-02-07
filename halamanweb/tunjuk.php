<?php
include('konek.php');

// Inisialisasi variabel
$nama = $alamat = $no_telepon = $email = $tanggal_lahir = '';
$pesan_error = '';

// Cek apakah formulir dikirimkan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil nilai dari formulir
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal_lahir = $_POST['tanggal_lahir'];

    // Validasi formulir
    if (empty($nama) || empty($alamat) || empty($no_telepon) || empty($email) || empty($tanggal_lahir)) {
        $pesan_error = 'Semua field harus diisi';
    } else {
        // Simpan informasi santri ke database
        $query = "INSERT INTO santri (nama, alamat, no_telepon, email, tanggal_lahir) VALUES ('$nama', '$alamat', '$no_telepon', '$email', '$tanggal_lahir')";
        $result = $conn->query($query);

        if ($result) {
            // Redirect ke halaman sukses atau halaman lain yang diinginkan
            header('Location: sukses.php');
            exit();
        } else {
            $pesan_error = 'Gagal menyimpan data. Silakan coba lagi.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Santri</title>
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
        <h2>Form Pendaftaran Santri</h2>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>">

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $alamat; ?>">

        <label for="no_telepon">No. Telepon:</label>
        <input type="text" name="no_telepon" value="<?php echo $no_telepon; ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>">

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">

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
