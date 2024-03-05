<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<!--CREATE TABLE jurusan-->
<!--(-->
<!--id_jurusan   INT(10) AUTO_INCREMENT PRIMARY KEY,-->
<!--nama_jurusan VARCHAR(50) NOT NULL-->
<!--);-->

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Jurusan</h1>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
        ?>

        <?php
        if (!isset($_GET["id_jurusan"])) {
            ?>
            <!--        Form Tambah Jurusan -->
            <form id="form-tambah-jurusan" method="POST" action="../controller/jurusan_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_jurusan">ID Jurusan</label>
                        <input type="text" class="form-control" id="id_jurusan" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_jurusan" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nama_jurusan" placeholder="Masukkan Angka Jurusan"
                               autocomplete="off"
                               required="required" name="nama_jurusan">
                    </div>
                    <input type="submit" value="Tambah Jurusan" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {
            $id_jurusan = $_GET["id_jurusan"];
            $sql = "SELECT * FROM jurusan WHERE id_jurusan = '$id_jurusan'";
            $result = $conn->query($sql);
            $jurusan_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-jurusan" method="POST" action="../controller/jurusan_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_jurusan">ID Jurusan</label>
                        <input type="text" class="form-control" id="id_jurusan" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_jurusan" value="<?php echo $jurusan_individual['id_jurusan'] ?>"
                               disabled>
                    </div>
                    <input type="hidden" name="id_jurusan" value="<?php echo $jurusan_individual['id_jurusan'] ?>">
                    <div class="form-group">
                        <label for="nama_jurusan">Nama Jurusan</label>
                        <input type="text" class="form-control" id="nama_jurusan" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_jurusan" value="<?php echo $jurusan_individual['nama_jurusan'] ?>">
                    </div>
                </div>
                <input type="submit" name="update" value="Update Jurusan" class="btn btn-primary w-100 mt-3"/>
                <a href="jurusan.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Jurusan</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID Jurusan</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM jurusan";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($jurusan = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $jurusan['id_jurusan'] . "</td>";
                    echo "<td>" . $jurusan['nama_jurusan'] . "</td>";
                    echo "<td>
<a href='./jurusan.php?id_jurusan=" . $jurusan['id_jurusan'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/jurusan_controller.php?delete=" . $jurusan['id_jurusan'] . "' class='btn btn-danger'>Delete</a>
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
