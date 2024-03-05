<?php require 'connection.php'; ?>
<?php require './layout/header.php'; ?>

<main class="d-flex">
    <?php require './layout/sidebar.php'; ?>
    <article class="m-3 flex-grow-1">
        <h1 class="mb-3">Selamat Datang</h1>
        <div>
            <a href="view/siswa.php" class="btn btn-primary">Siswa</a>
            <a href="view/guru.php" class="btn btn-primary">Guru</a>
            <a href="view/kelas.php" class="btn btn-primary">Kelas</a>
            <a href="view/mapel.php" class="btn btn-primary">Mata Pelajaran</a>
            <a href="view/jurusan.php" class="btn btn-primary">Jurusan</a>
            <a href="view/mengajar.php" class="btn btn-primary">Mengajar</a>
        </div>
    </article>
</main>

<?php require './layout/footer.php'; ?>
