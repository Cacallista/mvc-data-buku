<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>

    <?php require __DIR__ . '/../partials/flash.php'; ?>

    <form method="post" action="index.php?page=buku&action=store">
        <label>Kode Buku</label><br>
        <input type="text" name="kode_buku" required><br><br>

        <label>Judul</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Penulis</label><br>
        <input type="text" name="penulis" required><br><br>

        <label>Penerbit</label><br>
        <input type="text" name="penerbit" required><br><br>

        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit" min="1000" max="2100" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=buku">Kembali</a>
    </form>
</body>
</html>