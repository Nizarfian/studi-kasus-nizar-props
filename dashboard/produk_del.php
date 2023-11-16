<?php
include 'templates.php';

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    // Periksa apakah produk dengan ID tertentu ada sebelum menghapus
    $check_sql = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // produk ditemukan, lakukan penghapusan
        $delete_sql = "DELETE FROM produk WHERE id_produk = '$id_produk'";

        if (mysqli_query($conn, $delete_sql)) {
            echo "produk berhasil dihapus";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "produk tidak ditemukan";
    }
} else {
    echo "ID produk tidak valid";
}

// Redirect kembali ke halaman produk setelah proses penghapusan
header("Location: produk.php");
exit();
?>