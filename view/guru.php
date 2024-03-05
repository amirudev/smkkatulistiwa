<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Guru</h1>
        <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
        ?>

        <?php
        if (!isset($_GET["id_guru"])) {
            ?>
            <!--        Form Tambah Guru -->
            <form id="form-tambah-guru" method="POST" action="../controller/guru_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_guru">ID Guru</label>
                        <input type="text" class="form-control" id="id_guru" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_guru" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_guru">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control"
                                  placeholder="Masukkan Alamat Anda"></textarea>
                    </div>
                    <input type="submit" value="Tambah Guru" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {
            $id_guru = $_GET["id_guru"];
            $sql = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
            $result = $conn->query($sql);
            $guru_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-guru" method="POST" action="../controller/guru_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="id_guru">ID Guru</label>
                        <input type="text" class="form-control" id="id_guru" placeholder="Otomatis"
                               autocomplete="off"
                               required="required" name="id_guru" value="<?php echo $guru_individual['id_guru'] ?>"
                               disabled>
                    </div>
                    <input type="hidden" name="id_guru" value="<?php echo $guru_individual['id_guru'] ?>">
                    <div class="form-group">
                        <label for="nama_guru">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_guru" value="<?php echo $guru_individual['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" <?php if ($guru_individual['jk'] == "Laki-laki") echo "selected" ?>>
                                Laki-laki
                            </option>
                            <option value="Perempuan" <?php if ($guru_individual['jk'] == "Perempuan") echo "selected" ?>>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control"
                                  placeholder="Masukkan Alamat Anda"><?php echo $guru_individual['alamat'] ?></textarea>
                    </div>
                </div>
                <input type="submit" name="update" value="Update Guru" class="btn btn-primary w-100 mt-3"/>
                <a href="guru.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Guru</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID Guru</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM guru";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($guru = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $guru['id_guru'] . "</td>";
                    echo "<td>" . $guru['nama_guru'] . "</td>";
                    echo "<td>" . $guru['jk'] . "</td>";
                    echo "<td>" . $guru['alamat'] . "</td>";
                    echo "<td>
<a href='./guru.php?id_guru=" . $guru['id_guru'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/guru_controller.php?delete=" . $guru['id_guru'] . "' class='btn btn-danger'>Delete</a>
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
