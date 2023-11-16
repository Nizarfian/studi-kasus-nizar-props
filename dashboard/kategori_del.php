<?php
include 'templates.php';

if (isset($_GET['id_kategori'])) {
    $id_kategori = $_GET['id_kategori'];

    // Periksa apakah kategori dengan ID tertentu ada sebelum menghapus
    $check_sql = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Kategori ditemukan, lakukan penghapusan
        $delete_sql = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";

        if (mysqli_query($conn, $delete_sql)) {
            echo "Kategori berhasil dihapus";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Kategori tidak ditemukan";
    }
} else {
    echo "ID Kategori tidak valid";
}

// Redirect kembali ke halaman kategori setelah proses penghapusan
header("Location: kategori.php");
exit();
?>