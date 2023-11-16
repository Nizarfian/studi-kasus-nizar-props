<?php
include 'templates.php';

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    // Periksa apakah transaksi dengan ID tertentu ada sebelum menghapus
    $check_sql = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // transaksi ditemukan, lakukan penghapusan
        $delete_sql = "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'";

        if (mysqli_query($conn, $delete_sql)) {
            echo "transaksi berhasil dihapus";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "transaksi tidak ditemukan";
    }
} else {
    echo "ID transaksi tidak valid";
}

// Redirect kembali ke halaman transaksi setelah proses penghapusan
header("Location: transaksi.php");
exit();
?>