<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<!--CREATE TABLE kelas-->
<!--(-->
<!--id_kelas   INT(10) AUTO_INCREMENT PRIMARY KEY,-->
<!--nama_kelas VARCHAR(10) NOT NULL-->
<!--);-->

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Kelas</h1>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
        ?>

        <?php
        if (!isset($_GET["id_kelas"])) {
            ?>
            <!--        Form Tambah Kelas -->
            <form id="form-tambah-kelas" method="POST" action="../controller/kelas_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_kelas">ID Kelas</label>
                        <input type="text" class="form-control" id="id_kelas" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_kelas" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" placeholder="Masukkan Angka Kelas"
                               autocomplete="off"
                               required="required" name="nama_kelas">
                    </div>
                    <input type="submit" value="Tambah Kelas" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {
            $id_kelas = $_GET["id_kelas"];
            $sql = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
            $result = $conn->query($sql);
            $kelas_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-kelas" method="POST" action="../controller/kelas_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_kelas">ID Kelas</label>
                        <input type="text" class="form-control" id="id_kelas" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_kelas" value="<?php echo $kelas_individual['id_kelas'] ?>"
                               disabled>
                    </div>
                    <input type="hidden" name="id_kelas" value="<?php echo $kelas_individual['id_kelas'] ?>">
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_kelas" value="<?php echo $kelas_individual['nama_kelas'] ?>">
                    </div>
                </div>
                <input type="submit" name="update" value="Update Kelas" class="btn btn-primary w-100 mt-3"/>
                <a href="kelas.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Kelas</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID Kelas</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM kelas";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($kelas = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $kelas['id_kelas'] . "</td>";
                    echo "<td>" . $kelas['nama_kelas'] . "</td>";
                    echo "<td>
<a href='./kelas.php?id_kelas=" . $kelas['id_kelas'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/kelas_controller.php?delete=" . $kelas['id_kelas'] . "' class='btn btn-danger'>Delete</a>
</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </article>
</main>

<?php require '../layout/footer.php'; ?>
