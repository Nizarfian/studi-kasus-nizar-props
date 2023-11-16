<?php
include 'templates.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Periksa apakah user dengan ID tertentu ada sebelum menampilkan formulir edit
    $check_sql = "SELECT * FROM user WHERE id_user = '$id_user'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // user ditemukan, ambil data untuk ditampilkan di formulir
        $user_data = mysqli_fetch_assoc($check_result);
    } else {
        echo "user tidak ditemukan";
        exit();
    }
} else {
    echo "ID user tidak valid";
    exit();
}

// Proses formulir edit ketika dikirim
if (isset($_POST['submit_edit_user'])) {
    $nama_user_baru = $_POST['nama_user'];

    // Update data user
    $update_sql = "UPDATE user SET nama_user = '$nama_user_baru' WHERE id_user = '$id_user'";

    if (mysqli_query($conn, $update_sql)) {
        echo "user berhasil diupdate";
        // Redirect kembali ke halaman user setelah proses update selesai
        header("Location: pelanggan.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3>Edit user</h3>
        <form method="POST" action="pelanggan_edit.php?id_user=<?php echo $id_user; ?>">
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama user</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user"
                    value="<?php echo $user_data['nama_user']; ?>">
            </div>
            <button type="submit" name="submit_edit_user" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>