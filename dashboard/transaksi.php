<?php
include 'templates.php';
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3 class="mb-3">Transaksi</h3>
        <form method="POST" action="transaksi.php" class="d-flex flex-column">

            <div class="mb-3">
                <label for="select_produk" class="form-label">Pilih Produk</label>
                <select class="form-select" id="select_produk" name="select_produk" required>
                    <?php
                    $sql = 'SELECT * FROM produk';
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=" . $row["id_produk"] . ">" . $row["nama_produk"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="select_user" class="form-label">Nama Pelanggan</label>
                <select class="form-select" id="select_user" name="select_user" required>
                    <?php
                    $sql = 'SELECT * FROM user';
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=" . $row["id_user"] . ">" . $row["nama_user"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah_transaksi" class="form-label">Jumlah Transaksi</label>
                <input type="number" class="form-control" id="jumlah_transaksi" name="jumlah_transaksi"
                    placeholder="Tulis disini..." required>
            </div>
            <button type="submit" name="submit_produk" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if (isset($_POST['submit_produk'])) {
            $jumlah_transaksi = $_POST['jumlah_transaksi'];
            $id_produk = $_POST['select_produk'];
            $id_user = $_POST['select_user'];

            $sql = "INSERT INTO transaksi (jumlah, id_produk, id_user) VALUES ('$jumlah_transaksi', '$id_produk', '$id_user')";

            if (mysqli_query($conn, $sql)) {
                ?>
                <script>
                    Toastify({
                        text: "Transaksi berhasil ditambahkan",
                        duration: 3000
                    }).showToast();
                </script>
                <?php
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
    </div>

    <div style="width: 80%; margin-left: 270px">
        <table class=" table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah Transaksi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT transaksi.*, produk.nama_produk, user.nama_user
                    FROM transaksi
                    LEFT JOIN produk ON transaksi.id_produk = produk.id_produk
                    LEFT JOIN user ON transaksi.id_user = user.id_user';
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $i . "</th>";
                        echo "<td>" . $row["nama_user"] . "</td>";
                        echo "<td>" . $row["nama_produk"] . "</td>";
                        echo "<td>" . $row["jumlah"] . "</td>"; // Assuming the quantity column is named 'jumlah'
                        echo "<td><a href='transaksi_edit.php?id_transaksi=" . $row["id_transaksi"] . "'>Edit</a> | <a href='transaksi_del.php?id_transaksi=" . $row["id_transaksi"] . "'>Delete</a></td>";
                        echo "</tr>";
                        $i++;
                    }
                } else {
                    echo "<tr>";
                    echo "<td colspan='3'>Tidak ada data</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>




</body>