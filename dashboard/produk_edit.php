<?php
include 'templates.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Periksa apakah produk dengan ID tertentu ada sebelum menampilkan formulir edit
    $check_sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // produk ditemukan, ambil data untuk ditampilkan di formulir
        $produk_data = mysqli_fetch_assoc($check_result);
    } else {
        echo "produk tidak ditemukan";
        exit();
    }
} else {
    echo "ID produk tidak valid";
    exit();
}

// Proses formulir edit ketika dikirim
if (isset($_POST['submit_edit_produk'])) {
    $nama_produk_baru = $_POST['nama_produk'];
    $id_kategori_baru = $_POST['select_kategori'];

    // Update data produk
    $update_sql = "UPDATE produk SET nama_produk = '$nama_produk_baru', id_kategori = '$id_kategori_baru' WHERE id_produk = '$id_produk'";

    if (mysqli_query($conn, $update_sql)) {
        echo "produk berhasil diupdate";
        // Redirect kembali ke halaman produk setelah proses update selesai
        header("Location: produk.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3>Edit produk</h3>
        <form method="POST" action="produk_edit.php?id_produk=<?php echo $id_produk; ?>">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="<?php echo $produk_data['nama_produk']; ?>">
            </div>
            <div class="mb-3">
                <label for="select_kategori" class="form-label">Jenis Kategori</label>
                <select class="form-select mb-3" id="select_kategori" name="select_kategori">
                    <?php
                    $sql = 'SELECT * FROM kategori';
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row["id_kategori"] == $produk_data["id_kategori"]) ? "selected" : "";
                            echo "<option value=" . $row["id_kategori"] . " $selected>" . $row["nama_kategori"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" name="submit_edit_produk" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>