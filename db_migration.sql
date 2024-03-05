CREATE TABLE guru
(
    id_guru   INT(10) AUTO_INCREMENT PRIMARY KEY,
    nama_guru VARCHAR(50)  NOT NULL,
    jk        VARCHAR(15)  NOT NULL,
    alamat    VARCHAR(100) NOT NULL
);

CREATE TABLE mapel
(
    id_mapel   INT(10) AUTO_INCREMENT PRIMARY KEY,
    nama_mapel VARCHAR(10) NOT NULL
);

CREATE TABLE kelas
(
    id_kelas   INT(10) AUTO_INCREMENT PRIMARY KEY,
    nama_kelas VARCHAR(10) NOT NULL
);

CREATE TABLE jurusan
(
    id_jurusan   INT(10) AUTO_INCREMENT PRIMARY KEY,
    nama_jurusan VARCHAR(50) NOT NULL
);

CREATE TABLE murid
(
    nis        VARCHAR(10) PRIMARY KEY,
    nama_siswa VARCHAR(50)  NOT NULL,
    jk         VARCHAR(15)  NOT NULL,
    alamat     VARCHAR(100) NOT NULL
);


CREATE TABLE mengajar
(
    id_mengajar INT(10) AUTO_INCREMENT PRIMARY KEY,
    id_guru     VARCHAR(10) NOT NULL,
    id_mapel    VARCHAR(10) NOT NULL,
    id_jurusan  VARCHAR(10) NOT NULL,
    id_kelas    VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_guru) REFERENCES guru (id_guru),
    FOREIGN KEY (id_mapel) REFERENCES mapel (id_mapel),
    FOREIGN KEY (id_jurusan) REFERENCES jurusan (id_jurusan),
    FOREIGN KEY (id_kelas) REFERENCES kelas (id_kelas)
);

CREATE TABLE nilai
(
    id_nilai   INT(10) AUTO_INCREMENT PRIMARY KEY,
    id_kelas   INT(10)     NOT NULL,
    nis        VARCHAR(10) NOT NULL,
    id_jurusan INT(10)     NOT NULL,
    id_mapel   INT(10)     NOT NULL,
    id_guru    INT(10)     NOT NULL,
    uh         DOUBLE      NOT NULL,
    uts        DOUBLE      NOT NULL,
    uas        DOUBLE      NOT NULL,
    na         DOUBLE      NOT NULL,
    FOREIGN KEY (id_kelas) REFERENCES kelas (id_kelas),
    FOREIGN KEY (nis) REFERENCES murid (nis),
    FOREIGN KEY (id_jurusan) REFERENCES jurusan (id_jurusan),
    FOREIGN KEY (id_mapel) REFERENCES mapel (id_mapel),
    FOREIGN KEY (id_guru) REFERENCES guru (id_guru)
);

# Add Credentials for Guru, Murid, and Admin

ALTER TABLE guru
    ADD COLUMN username VARCHAR(255) NOT NULL,
    ADD COLUMN password VARCHAR(255) NOT NULL;

ALTER TABLE murid
    ADD COLUMN username VARCHAR(255) NOT NULL,
    ADD COLUMN password VARCHAR(255) NOT NULL;

CREATE TABLE admin
(
    id_admin   INT(10) AUTO_INCREMENT PRIMARY KEY,
    username   VARCHAR(255) NOT NULL,
    password   VARCHAR(255) NOT NULL
);

# Make Adjustment on Nama Kelas, Nama Mapel
ALTER TABLE kelas
    CHANGE nama_kelas nama_kelas VARCHAR(50) NOT NULL;
ALTER TABLE mapel
    CHANGE nama_mapel nama_mapel VARCHAR(50) NOT NULL;