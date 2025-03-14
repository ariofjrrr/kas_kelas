<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header>
            <h1>Tambah Anggota</h1>
        </header>

        <!-- Formulir untuk Menambah Anggota -->
        <section class="form-container">
            <form action="" method="POST">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" required>

                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat">

                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp">

                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </section>

        <!-- Tombol Kembali -->
        <section class="back-button">
            <a href="anggota.php" class="btn btn-secondary">Kembali</a>
        </section>

        <?php
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];

            // Siapkan pernyataan dengan parameter
            $stmt = $conn->prepare("INSERT INTO anggota (nama, alamat, no_hp) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama, $alamat, $no_hp);

            // Eksekusi pernyataan
            if ($stmt->execute()) {
                echo "<p class='success'>Anggota berhasil ditambahkan!</p>";
                header("Location: anggota.php");
            } else {
                echo "<p class='error'>Error: " . $stmt->error . "</p>";
            }

            // Tutup pernyataan
            $stmt->close();
        }
        ?>
    </div>
</body>
</html>
<style>
    /* Reset Dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Warna Dasar */
:root {
    --primary-color: #3498db;
    --secondary-color: #2ecc71;
    --warning-color: #f1c40f;
    --danger-color: #e74c3c;
    --text-color: #333;
    --background-color: #f9f9f9;
    --light-gray: #f1f1f1;
}

/* Container Utama */
.container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

/* Header */
header {
    text-align: center;
    margin-bottom: 30px;
}

header h1 {
    font-size: 2em;
    color: white;
    background-color: var(--primary-color);
    padding: 20px;
    border-radius: 8px;
}

/* Formulir */
.form-container {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.form-container form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-container label {
    font-weight: bold;
    color: var(--text-color);
}

.form-container input {
    padding: 10px;
    font-size: 1em;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 100%;
}

.form-container button {
    background-color: var(--primary-color);
    color: white;
    padding: 12px;
    font-size: 1.1em;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container button:hover {
    background-color: #2980b9;
}

/* Tombol Kembali */
.back-button {
    text-align: center;
}

.back-button .btn {
    padding: 12px 20px;
    font-size: 1.1em;
    background-color: var(--secondary-color);
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.back-button .btn:hover {
    background-color: #27ae60;
}

/* Pesan Sukses dan Error */
.success {
    color: green;
    font-size: 1.2em;
    text-align: center;
    margin-top: 20px;
}

.error {
    color: red;
    font-size: 1.2em;
    text-align: center;
    margin-top: 20px;
}

/* Responsif */
@media (max-width: 768px) {
    .form-container {
        padding: 20px;
    }

    .form-container label {
        font-size: 0.9em;
    }

    .form-container input {
        font-size: 1em;
    }

    .form-container button {
        font-size: 1em;
    }
}

</style>