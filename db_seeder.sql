# CREATE TABLE guru
# (
#     id_guru   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     nama_guru VARCHAR(50)  NOT NULL,
#     jk        VARCHAR(15)  NOT NULL,
#     alamat    VARCHAR(100) NOT NULL
# );
#
# CREATE TABLE mapel
# (
#     id_mapel   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     nama_mapel VARCHAR(10) NOT NULL
# );
#
# CREATE TABLE kelas
# (
#     id_kelas   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     nama_kelas VARCHAR(10) NOT NULL
# );
#
# CREATE TABLE jurusan
# (
#     id_jurusan   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     nama_jurusan VARCHAR(50) NOT NULL
# );
#
# CREATE TABLE murid
# (
#     nis        VARCHAR(10) PRIMARY KEY,
#     nama_siswa VARCHAR(50)  NOT NULL,
#     jk         VARCHAR(15)  NOT NULL,
#     alamat     VARCHAR(100) NOT NULL
# );
#
#
# CREATE TABLE mengajar
# (
#     id_mengajar INT(10) AUTO_INCREMENT PRIMARY KEY,
#     id_guru     VARCHAR(10) NOT NULL,
#     id_mapel    VARCHAR(10) NOT NULL,
#     id_jurusan  VARCHAR(10) NOT NULL,
#     id_kelas    VARCHAR(10) NOT NULL,
#     FOREIGN KEY (id_guru) REFERENCES guru (id_guru),
#     FOREIGN KEY (id_mapel) REFERENCES mapel (id_mapel),
#     FOREIGN KEY (id_jurusan) REFERENCES jurusan (id_jurusan),
#     FOREIGN KEY (id_kelas) REFERENCES kelas (id_kelas)
# );
#
# CREATE TABLE nilai
# (
#     id_nilai   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     id_kelas   INT(10)     NOT NULL,
#     nis        VARCHAR(10) NOT NULL,
#     id_jurusan INT(10)     NOT NULL,
#     id_mapel   INT(10)     NOT NULL,
#     id_guru    INT(10)     NOT NULL,
#     uh         DOUBLE      NOT NULL,
#     uts        DOUBLE      NOT NULL,
#     uas        DOUBLE      NOT NULL,
#     na         DOUBLE      NOT NULL,
#     FOREIGN KEY (id_kelas) REFERENCES kelas (id_kelas),
#     FOREIGN KEY (nis) REFERENCES murid (nis),
#     FOREIGN KEY (id_jurusan) REFERENCES jurusan (id_jurusan),
#     FOREIGN KEY (id_mapel) REFERENCES mapel (id_mapel),
#     FOREIGN KEY (id_guru) REFERENCES guru (id_guru)
# );
#
# # Add Credentials for Guru, Murid, and Admin
#
# ALTER TABLE guru
#     ADD COLUMN username VARCHAR(255) NOT NULL,
#     ADD COLUMN password VARCHAR(255) NOT NULL;
#
# ALTER TABLE murid
#     ADD COLUMN username VARCHAR(255) NOT NULL,
#     ADD COLUMN password VARCHAR(255) NOT NULL;
#
# CREATE TABLE admin
# (
#     id_admin   INT(10) AUTO_INCREMENT PRIMARY KEY,
#     username   VARCHAR(255) NOT NULL,
#     password   VARCHAR(255) NOT NULL
# );

# guru
INSERT INTO guru (nama_guru, jk, alamat, username, password) VALUES ('Heri', 'Laki-laki', 'Jl. Kayu Jati 2 No. 1', 'heri', 'heri');
INSERT INTO guru (nama_guru, jk, alamat, username, password) VALUES ('Trian', 'Perempuan', 'Jl. Kayu Jati 2 No. 2', 'Trian', 'Trian');

# mapel
INSERT INTO mapel (nama_mapel) VALUES ('Matematika');
INSERT INTO mapel (nama_mapel) VALUES ('Bahasa Indonesia');

# kelas
INSERT INTO kelas (nama_kelas) VALUES ('X');
INSERT INTO kelas (nama_kelas) VALUES ('XI');
INSERT INTO kelas (nama_kelas) VALUES ('XII');

# jurusan
INSERT INTO jurusan (nama_jurusan) VALUES ('RPL');
INSERT INTO jurusan (nama_jurusan) VALUES ('Elektro');

# murid
INSERT INTO murid (nis, nama_siswa, jk, alamat, username, password) VALUES ('123', 'Wahyu', 'Laki-laki', 'Jl. Kayu Jati 1 No. 1', 'wahyu', 'wahyu');
INSERT INTO murid (nis, nama_siswa, jk, alamat, username, password) VALUES ('124', 'Riska', 'Laki-laki', 'Jl. Kayu Jati', 'riska', 'riska');