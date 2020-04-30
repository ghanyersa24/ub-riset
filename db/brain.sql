CREATE TABLE guest (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  fcm VARCHAR(255) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE produk (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nama_produk TINYTEXT NOT NULL,
  bidang ENUM('Kesehatan','Pertahanan Keamanan','Material Maju','Kemaritiman',  'Sosial Budaya') NULL,
  kategori TINYTEXT NULL,
  jenis ENUM('digital','non digital') NULL,
  produksi_barang_fisik ENUM('ada','tidak') NULL,
  logo_produk TINYTEXT NULL,
  website VARCHAR(30) NULL,
  media_sosial TINYTEXT NULL,
  deskripsi_singkat TINYTEXT NULL,
  deskripsi_lengkap TEXT NULL,
  latar_belakang TEXT NULL,
  keterbaruan_produk TEXT NULL,
  masalah TEXT NULL,
  solusi TEXT NULL,
  spesifikasi_teknis TEXT NULL,
  kegunaan_manfaat TEXT NULL,
  keunggulan TEXT NULL,
  keunikan TEXT NULL,
  kesiapan_teknologi ENUM('masih riset','prototype','siap komersil') NULL,
  kepemilikan_teknologi ENUM('sendiri','perguruan tinggi') NULL,
  pemilik_teknologi ENUM('individu','institusi') NULL,
  teknologi_yang_dikembangkan TEXT NULL,
  rencana_pengembangan TEXT NULL,
  tautan_video TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE kategori (
  id TINYINT UNSIGNED NOT NULL,
  kategori TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE calon_perusahaan (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nama VARCHAR(100) NULL,
  kota_kabupaten VARCHAR(100) NULL,
  alamat TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE users (
  id VARCHAR(15) NOT NULL,
  nama VARCHAR(100) NULL,
  nik VARCHAR(20) NULL,
  jenis_kelamin ENUM('laki-laki','perempuan') NULL,
  tanggal_lahir DATE NULL,
  foto_ktp TINYTEXT NULL,
  cv TINYTEXT NULL,
  foto TINYTEXT NULL,
  pendidikan_terakhir ENUM('SD','SMP/Sederajat','SMA/Sederajat','D1','D2','D3','S1','S2','S3') NULL,
  status  ENUM('mahasiswa','dosen') NULL,
  fcm VARCHAR(255) NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id)
);

CREATE TABLE pengujian (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  nama VARCHAR(100) NULL,
  tahun YEAR NULL,
  status  ENUM('sedang dilakukan','belum dilakukan','sudah dilakukan') NULL,
  jenis VARCHAR(50) NULL,
  lembaga VARCHAR(100) NULL,
  tujuan TEXT NULL,
  hasil TEXT NULL,
  created_by CHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by CHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX pengujian_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE seen (
  produk_id INTEGER UNSIGNED NOT NULL,
  created_at TIMESTAMP NOT NULL,
  created_by VARCHAR(15) NULL,
  INDEX seen_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE sertifikasi (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  nama VARCHAR(100) NULL,
  deskripsi TEXT NULL,
  status  ENUM('belum diperoleh','permohonan','disetujui') NULL,
  tahun_perolehan YEAR NULL,
  no_sertifikat VARCHAR(30) NULL,
  tanggal_mulai DATE NULL,
  tanggal_selesai DATE NULL,
  lembaga_penerbit VARCHAR(100) NULL,
  file_sertifikasi TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX sertifikasi_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE roadmap (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  nama TINYTEXT NULL,
  tahun_mulai YEAR NULL,
  tahun_selesai YEAR NULL,
  sumber_pendanaan VARCHAR(50) NULL,
  skema VARCHAR(50) NULL,
  nilai_pendanaan INT NULL,
  aktivitas TEXT NULL,
  tujuan TEXT NULL,
  hasil TEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX roadmap_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE foto_kegiatan (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  foto TINYTEXT NULL,
  keterangan TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX foto_kegiatan_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE foto_produk (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  foto TINYTEXT NULL,
  keterangan TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX foto_produk_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE kekayaan_intelektual (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  jenis VARCHAR(50) NULL,
  deskripsi TINYTEXT NULL,
  status_perolehan ENUM('belum diperoleh','permohonan','disetujui') NULL,
  no_pemohon VARCHAR(40) NULL,
  file_formulir TINYTEXT NULL,
  no_sertifikat VARCHAR(40) NULL,
  file  TINYTEXT NULL,
  pemegang VARCHAR(50) NULL,
  tanggal_mulai DATE NULL,
  tanggal_selesai DATE NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX kekayaan_intelektual_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE izin_produk (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produk_id INTEGER UNSIGNED NOT NULL,
  nama VARCHAR(50) NULL,
  deskripsi TEXT NULL,
  status  ENUM('belum diperoleh','permohonan','disetujui') NULL,
  tahun_perolehan YEAR NULL,
  no_izin VARCHAR(30) NULL,
  tanggal_mulai DATE NULL,
  tanggal_selesai DATE NULL,
  lembaga VARCHAR(100) NULL,
  file  TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX izin_produk_FKIndex1(produk_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE aspek_bisnis (
  produk_id INTEGER UNSIGNED NOT NULL,
  calon_perusahaan_id INTEGER UNSIGNED NOT NULL,
  kompetitor TEXT NULL,
  target_pasar TEXT NULL,
  pangsa_pasar TEXT NULL,
  dampak_sosial_ekonomi TEXT NULL,
  biaya_produksi_harga TEXT NULL,
  rencana_pemasaran TEXT NULL,
  bmc TINYTEXT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(produk_id, calon_perusahaan_id),
  INDEX aspek_bisnis_FKIndex1(produk_id),
  INDEX aspek_bisnis_FKIndex2(calon_perusahaan_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(calon_perusahaan_id)
    REFERENCES calon_perusahaan(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE ulasan (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  users_id VARCHAR(15) NOT NULL,
  produk_id INTEGER UNSIGNED NOT NULL,
  ulasan TEXT NOT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(id),
  INDEX ulasan_FKIndex1(produk_id),
  INDEX ulasan_FKIndex2(users_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(users_id)
    REFERENCES users(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE rating (
  produk_id INTEGER UNSIGNED NOT NULL,
  users_id VARCHAR(15) NOT NULL,
  rating TINYINT UNSIGNED NOT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(produk_id, users_id),
  INDEX produk_has_users_FKIndex1(produk_id),
  INDEX produk_has_users_FKIndex2(users_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(users_id)
    REFERENCES users(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE inventor (
  produk_id INTEGER UNSIGNED NOT NULL,
  users_id VARCHAR(15) NOT NULL,
  created_by VARCHAR(15) NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_by VARCHAR(15) NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY(produk_id, users_id),
  INDEX produk_has_users_FKIndex1(produk_id),
  INDEX produk_has_users_FKIndex2(users_id),
  FOREIGN KEY(produk_id)
    REFERENCES produk(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(users_id)
    REFERENCES users(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

