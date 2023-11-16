<?php
include 'templates.php';
?>

<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%; margin: 50px auto; margin-left: 270px">
        <h3>Product</h3>
        <form method="POST" action="produk.php">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Product</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                    placeholder="Tulis disini..." required>
            </div>
            <div class="mb-3">
                <label for="gambar_produk" class="form-label">URL Gambar Product</label>
                <input type="text" class="form-control" id="gambar_produk" name="gambar_produk"
                    placeholder="Paste disini..." required>
            </div>
            <div class="mb-3">
                <label for="select_kategori" class="form-label">Jenis Kategori</label>
                <select class="form-select mb-3" id="select_kategori" name="select_kategori">
                    <?php
                    $sql = 'SELECT * FROM kategori';
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value=" . $row["id_kategori"] . ">" . $row["nama_kategori"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </div>
            <?php
            if (isset($_POST['submit_produk'])) {
                $nama_produk = $_POST['nama_produk'];
                $gambar_produk = $_POST['gambar_produk'];
                $id_kategori = $_POST['select_kategori'];

                $sql = "INSERT INTO produk (nama_produk, gambar_produk, id_kategori) VALUES ('$nama_produk', '$gambar_produk', '$id_kategori')";

                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script>
                        Toastify({
                            text: "Produk berhasil ditambahkan",
                            duration: 3000
                        }).showToast();
                    </script>
                    <?php
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

            ?>
            <button type="submit" name="submit_produk" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div style="width: 80%; margin-left: 270px">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT produk.*, kategori.nama_kategori FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori';
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $i . "</th>";
                        echo "<td>" . $row["nama_produk"] . "</td>";
                        echo "<td>" . ($row["nama_kategori"] ? $row["nama_kategori"] : "Tidak ada kategori") . "</td>";
                        echo "<td><a href='produk_edit.php?id_produk=" . $row["id_produk"] . "'>Edit</a> | <a href='produk_del.php?id_produk=" . $row["id_produk"] . "'>Delete</a></td>";
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