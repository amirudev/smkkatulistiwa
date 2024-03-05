<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<!--CREATE TABLE mengajar-->
<!--(-->
<!--id_mengajar   INT(10) AUTO_INCREMENT PRIMARY KEY,-->
<!--nama_mengajar VARCHAR(10) NOT NULL-->
<!--);-->

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Mengajar</h1>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
        ?>

        <?php
        if (!isset($_GET["id_mengajar"])) {
            ?>
            <!--        Form Tambah Mengajar -->
            <form id="form-tambah-mengajar" method="POST" action="../controller/mengajar_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_mengajar">ID Mengajar</label>
                        <input type="text" class="form-control" id="id_mengajar" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_mengajar" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_mengajar">Nama Mengajar</label>
                        <input type="text" class="form-control" id="nama_mengajar" placeholder="Masukkan Angka Mengajar"
                               autocomplete="off"
                               required="required" name="nama_mengajar">
                    </div>
                    <input type="submit" value="Tambah Mengajar" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {
            $id_mengajar = $_GET["id_mengajar"];
            $sql = "SELECT * FROM mengajar WHERE id_mengajar = '$id_mengajar'";
            $result = $conn->query($sql);
            $mengajar_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-mengajar" method="POST" action="../controller/mengajar_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_mengajar">ID Mengajar</label>
                        <input type="text" class="form-control" id="id_mengajar" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_mengajar" value="<?php echo $mengajar_individual['id_mengajar'] ?>"
                               disabled>
                    </div>
                    <input type="hidden" name="id_mengajar" value="<?php echo $mengajar_individual['id_mengajar'] ?>">
                    <div class="form-group">
                        <label for="nama_mengajar">Nama Mengajar</label>
                        <input type="text" class="form-control" id="nama_mengajar" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_mengajar" value="<?php echo $mengajar_individual['nama_mengajar'] ?>">
                    </div>
                </div>
                <input type="submit" name="update" value="Update Mengajar" class="btn btn-primary w-100 mt-3"/>
                <a href="mengajar.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Mengajar</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID Mengajar</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM mengajar";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($mengajar = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $mengajar['id_mengajar'] . "</td>";
                    echo "<td>" . $mengajar['nama_mengajar'] . "</td>";
                    echo "<td>
<a href='./mengajar.php?id_mengajar=" . $mengajar['id_mengajar'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/mengajar_controller.php?delete=" . $mengajar['id_mengajar'] . "' class='btn btn-danger'>Delete</a>
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
