<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<!--CREATE TABLE mapel-->
<!--(-->
<!--id_mapel   INT(10) AUTO_INCREMENT PRIMARY KEY,-->
<!--nama_mapel VARCHAR(10) NOT NULL-->
<!--);-->

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Mata Pelajaran</h1>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
        ?>

        <?php
        if (!isset($_GET["id_mapel"])) {
            ?>
            <!--        Form Tambah Mapel -->
            <form id="form-tambah-mapel" method="POST" action="../controller/mapel_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_mapel">ID Mapel</label>
                        <input type="text" class="form-control" id="id_mapel" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_mapel" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" id="nama_mapel" placeholder="Masukkan Angka Mapel"
                               autocomplete="off"
                               required="required" name="nama_mapel">
                    </div>
                    <input type="submit" value="Tambah Mapel" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {
            $id_mapel = $_GET["id_mapel"];
            $sql = "SELECT * FROM mapel WHERE id_mapel = '$id_mapel'";
            $result = $conn->query($sql);
            $mapel_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-mapel" method="POST" action="../controller/mapel_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_mapel">ID Mapel</label>
                        <input type="text" class="form-control" id="id_mapel" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_mapel" value="<?php echo $mapel_individual['id_mapel'] ?>"
                               disabled>
                    </div>
                    <input type="hidden" name="id_mapel" value="<?php echo $mapel_individual['id_mapel'] ?>">
                    <div class="form-group">
                        <label for="nama_mapel">Nama Mapel</label>
                        <input type="text" class="form-control" id="nama_mapel" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_mapel" value="<?php echo $mapel_individual['nama_mapel'] ?>">
                    </div>
                </div>
                <input type="submit" name="update" value="Update Mapel" class="btn btn-primary w-100 mt-3"/>
                <a href="mapel.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Mapel</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID Mapel</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM mapel";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($mapel = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $mapel['id_mapel'] . "</td>";
                    echo "<td>" . $mapel['nama_mapel'] . "</td>";
                    echo "<td>
<a href='./mapel.php?id_mapel=" . $mapel['id_mapel'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/mapel_controller.php?delete=" . $mapel['id_mapel'] . "' class='btn btn-danger'>Delete</a>
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
