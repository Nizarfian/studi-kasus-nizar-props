<?php
include 'templates.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Periksa apakah user dengan ID tertentu ada sebelum menghapus
    $check_sql = "SELECT * FROM user WHERE id_user = '$id_user'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // user ditemukan, lakukan penghapusan
        $delete_sql = "DELETE FROM user WHERE id_user = '$id_user'";

        if (mysqli_query($conn, $delete_sql)) {
            echo "User berhasil dihapus";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "User tidak ditemukan";
    }
} else {
    echo "ID user tidak valid";
}

// Redirect kembali ke halaman user setelah proses penghapusan
header("Location: pelanggan.php");
exit();
?>