<?php
include 'templates.php';

if (isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    // Retrieve transaction details from the database
    $sql = "SELECT transaksi.*, produk.nama_produk, user.nama_user
            FROM transaksi
            LEFT JOIN produk ON transaksi.id_produk = produk.id_produk
            LEFT JOIN user ON transaksi.id_user = user.id_user
            WHERE transaksi.id_transaksi = '$id_transaksi'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $transaction_data = mysqli_fetch_assoc($result);
    } else {
        echo "Transaction not found";
        exit();
    }
} else {
    echo "Invalid Transaction ID";
    exit();
}

// Update transaction details when the form is submitted
if (isset($_POST['submit_edit_transaksi'])) {
    $jumlah_transaksi_baru = $_POST['jumlah_transaksi'];

    // Update the transaction
    $update_sql = "UPDATE transaksi SET jumlah = '$jumlah_transaksi_baru' WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($conn, $update_sql)) {
        ?>
        <script>
            Toastify({
                text: "Transaction updated successfully",
                duration: 3000
            }).showToast();
        </script>
        <?php
        // Redirect back to the transactions page after the update
        header("Location: transaksi.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3>Edit Transaction</h3>
        <form method="POST" action="transaksi_edit.php?id_transaksi=<?php echo $id_transaksi; ?>"
            class="d-flex flex-column">

            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user"
                    value="<?php echo $transaction_data['nama_user']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    value="<?php echo $transaction_data['nama_produk']; ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                <input type="number" class="form-control" id="jumlah_transaksi" name="jumlah_transaksi"
                    value="<?php echo $transaction_data['jumlah']; ?>" required>
            </div>
            <button type="submit" name="submit_edit_transaksi" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>