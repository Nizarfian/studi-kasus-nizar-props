<?php
include 'templates.php';
?>


<body class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 80%;  margin: 50px auto; margin-left: 270px">
        <h3>Kategori</h3>
        <form method="POST" action="kategori.php">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                    placeholder="Tulis disini.." required>
            </div>
            <?php
            if (isset($_POST['submit_kategori'])) {
                $nama_kategori = $_POST['nama_kategori'];

                $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";

                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script>
                        Toastify({
                            text: "Data berhasil ditambahkan",
                            duration: 3000
                        }).showToast();
                    </script>
                    <?php
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

            ?>
            <button type="submit" name="submit_kategori" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div style="width: 80%; margin-left: 270px">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT * FROM kategori';
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $i . "</th>";
                        echo "<td>" . $row["nama_kategori"] . "</td>";
                        echo "<td><a href='kategori_edit.php?id_kategori=" . $row["id_kategori"] . "'>Edit</a> | <a href='kategori_del.php?id_kategori=" . $row["id_kategori"] . "'>Delete</a></td>";
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