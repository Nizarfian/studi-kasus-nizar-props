<?php
include 'templates.php';
?>


<main class="d-flex align-items-center justify-content-center flex-column">
    <div style="width: 100%; margin: 50px auto; margin-left: 270px">
        <h3>Pelanggan</h3>
        <form method="POST" action="pelanggan.php">
            <div class="mb-3">
                <label for="nama_user" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Tulis disini.."
                    required>
            </div>
            <?php
            if (isset($_POST['submit_user'])) {
                $nama_user = $_POST['nama_user'];

                $sql = "INSERT INTO user (nama_user) VALUES ('$nama_user')";

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
            <button type="submit" name="submit_user" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div style="width: 100%; margin:auto; margin-left: 270px">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT * FROM user';
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $i . "</th>";
                        echo "<td>" . $row["nama_user"] . "</td>";
                        echo "<td><a href='pelanggan_edit.php?id_user=" . $row["id_user"] . "'>Edit</a> | <a href='pelanggan_del.php?id_user=" . $row["id_user"] . "'>Delete</a></td>";
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
</main>