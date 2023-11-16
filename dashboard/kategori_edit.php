<?php
include 'templates.php';

if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Periksa apakah kategori dengan ID tertentu ada sebelum menampilkan formulir edit
    $check_sql = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Kategori ditemukan, ambil data untuk ditampilkan di formulir
        $kategori_data = mysqli_fetch_assoc($check_result);
    } else {
        echo "Kategori tidak ditemukan";
        exit();
    }
} else {
    echo "ID Kategori tidak valid";
    exit();
}

// Proses formulir edit ketika dikirim
if (isset($_POST['submit_edit_kategori'])) {
    $nama_kategori_baru = $_POST['nama_kategori'];

    // Update data kategori
    $update_sql = "UPDATE kategori SET nama_kategori = '$nama_kategori_baru' WHERE id_kategori = '$id_kategori'";

    if (mysqli_query($conn, $update_sql)) {
        echo "Kategori berhasil diupdate";
        // Redirect kembali ke halaman kategori setelah proses update selesai
        header("Location: kategori.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3>Edit Kategori</h3>
        <form method="POST" action="kategori_edit.php?id_kategori=<?php echo $id_kategori; ?>">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                    value="<?php echo $kategori_data['nama_kategori']; ?>">
            </div>
            <button type="submit" name="submit_edit_kategori" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>