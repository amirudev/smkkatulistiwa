<?php global $conn;
require '../connection.php'; ?>
<?php require '../layout/header.php'; ?>

<main class="d-flex">
    <?php require '../layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <a href="../index.php">Kembali ke Beranda</a>

        <h1 class="my-3">Siswa</h1>

        <?php
        if (!isset($_GET["nis"])) {
            ?>
            <!--        Form Tambah Siswa -->
            <form id="form-tambah-siswa" method="POST" action="../controller/siswa_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS Anda"
                               autocomplete="off"
                               required="required" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_siswa">
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
                        <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Anda"></textarea>
                    </div>
                    <input type="submit" value="Tambah Siswa" name="create" class="btn btn-primary w-100 mt-3"/>
                </div>
            </form>

            <?php
        } else {

            $nis = $_GET["nis"];
            $sql = "SELECT * FROM murid WHERE nis = '$nis'";
            $result = $conn->query($sql);
            $siswa_individual = $result->fetch_assoc();
            ?>
            <!--        Form Edit Siswa -->
            <form id="form-edit-siswa" method="POST" action="../controller/siswa_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" placeholder="Masukkan NIS Anda"
                               autocomplete="off"
                               required="required" name="nis" value="<?php echo $siswa_individual['nis'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda"
                               autocomplete="off"
                               required="required" name="nama_siswa"
                               value="<?php echo $siswa_individual['nama_siswa'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jk" id="jenis_kelamin" class="form-control">
                            <option value="Laki-laki" <?php if ($siswa_individual['jk'] == 'Laki-laki') echo "selected" ?>>
                                Laki-laki
                            </option>
                            <option value="Perempuan" <?php if ($siswa_individual['jk'] == 'Perempuan') echo "selected" ?>>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control"
                                  placeholder="Masukkan Alamat Anda"><?php echo $siswa_individual['alamat'] ?></textarea>
                    </div>
                </div>
                <input type="submit" name="update" value="Update Siswa" class="btn btn-primary w-100 mt-3"/>
                <a href="siswa.php" class="btn btn-secondary w-100 mt-1">Batal</a>
            </form>
            <?php
        }
        ?>

        <!--        Show all Siswa/Murid from Database with Table -->
        <h2>Daftar Siswa</h2>
        <table class="table">
            <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM murid";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($siswa = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $siswa['nis'] . "</td>";
                    echo "<td>" . $siswa['nama_siswa'] . "</td>";
                    echo "<td>" . $siswa['jk'] . "</td>";
                    echo "<td>" . $siswa['alamat'] . "</td>";
                    echo "<td>
<a href='./siswa.php?nis=" . $siswa['nis'] . "' class='btn btn-warning'>Edit</a>
<a href='../controller/siswa_controller.php?delete=" . $siswa['nis'] . "' class='btn btn-danger'>Delete</a>
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
