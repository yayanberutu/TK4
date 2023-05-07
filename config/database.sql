CREATE DATABASE IF NOT EXISTS db_inventaris;
USE db_inventaris;

CREATE TABLE IF NOT EXISTS HakAkses (
    IdAkses INT AUTO_INCREMENT PRIMARY KEY,
    NamaAkses VARCHAR(50) NOT NULL,
    Keterangan VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Pengguna (
    IdPengguna INT AUTO_INCREMENT PRIMARY KEY,
    NamaPengguna VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    NamaDepan VARCHAR(50) NOT NULL,
    NamaBelakang VARCHAR(50),
    NoHp VARCHAR(20) NOT NULL,
    Alamat VARCHAR(100) NOT NULL,
    IdAkses INT NOT NULL,
    FOREIGN KEY (IdAkses) REFERENCES HakAkses(IdAkses)
);

CREATE TABLE IF NOT EXISTS Barang (
    IdBarang INT AUTO_INCREMENT PRIMARY KEY,
    NamaBarang VARCHAR(50) NOT NULL,
    Keterangan VARCHAR(100) NOT NULL,
    Satuan VARCHAR(10) NOT NULL,
    IdPengguna INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)
);

CREATE TABLE IF NOT EXISTS Pembelian (
    IdPembelian INT AUTO_INCREMENT PRIMARY KEY,
    TanggalPembelian DATE NOT NULL,
    JumlahPembelian INT NOT NULL,
    HargaBeli DECIMAL(10,2) NOT NULL,
    IdPengguna INT NOT NULL,
    IdBarang INT NOT NULL,
    IdSupplier INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),
    FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang),
    FOREIGN KEY (IdSupplier) REFERENCES Supplier(IdSupplier)
);

CREATE TABLE IF NOT EXISTS Penjualan (
    IdPenjualan INT AUTO_INCREMENT PRIMARY KEY,
    TanggalPenjualan DATE NOT NULL,
    JumlahPenjualan INT NOT NULL,
    HargaJual DECIMAL(10,2) NOT NULL,
    IdPengguna INT NOT NULL,
    IdBarang INT NOT NULL,
    IdPelanggan INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),
    FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang),
    FOREIGN KEY (IdPelanggan) REFERENCES Pelanggan(IdPelanggan)
);

CREATE TABLE IF NOT EXISTS Supplier (
	IdSupplier INT AUTO_INCREMENT PRIMARY KEY, 
    NamaSupplier VARCHAR(30), 
    Alamat TEXT, Kota VARCHAR(30), 
    Provinsi VARCHAR(30), 
    NoHp VARCHAR(18)
);	

CREATE TABLE IF NOT EXISTS Pelanggan (
	IdPelanggan INT AUTO_INCREMENT PRIMARY KEY, 
    NamaPelanggan VARCHAR(50), 
    Alamat TEXT, 
    NoHp VARCHAR(18)
);




INSERT INTO DATABASE

INSERT INTO HakAkses (NamaAkses, Keterangan)
VALUES ('admin1', 'admin1'), ('admin2', 'admin2'), ('admin3', 'keterangan admin3'), ('admin4', 'keterangan admin4');

INSERT INTO Pengguna(NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses)
VALUES ('admin1', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 'admin1', 'admin1', '087787', 'JL.JAMBU', 1),
('admin2', '0876dfca6d6fedf99b2ab87b6e2fed4bd4051ede78a8a9135b500b2e94d99b88', 'admin2', 'admin2', '087787878', 'JL.apel', 2),
('admin3', '0876dfca6d6fedf99b2ab87b6e2fed4bd4051ede78a8a9135b500b2e94d99b88', 'John', 'Doe', '081234567', 'Jl. Melati', 1),
('admin4', '0876dfca6d6fedf99b2ab87b6e2fed4bd4051ede78a8a9135b500b2e94d99b88', 'Jane', 'Smith', '082345678', 'Jl. Mawar', 2),
('admin5', '0876dfca6d6fedf99b2ab87b6e2fed4bd4051ede78a8a9135b500b2e94d99b88', 'Bob', 'Johnson', '083456789', 'Jl. Anggrek', 1);


-- INSERT INTO Pelanggan(NamaPelanggan, Alamat, NoHp) VALUES ('Kimetsu', 'Jl.Madiun', '0987665467'), ('Sola', 'Jl.Garuda', '0989786');
INSERT INTO Pelanggan(NamaPelanggan, Alamat, NoHp)
VALUES 
('Mawar', 'Jl. Pahlawan', '087766544'),
('Bunga', 'Jl. Kenanga', '089877665'),
('Anggrek', 'Jl. Rafflesia', '087655433'),
('Melati', 'Jl. Mawar', '081234567'),
('Dahlia', 'Jl. Anggrek', '089988776'),
('Lili', 'Jl. Bunga', '082345678'),
('Krisan', 'Jl. Melati', '085432109'),
('Edelweis', 'Jl. Dahlia', '081234567');

-- INSERT INTO Supplier(NamaSupplier, Alamat, Provinsi, NoHp) VALUES ('Marsudin Supplier', 'Jl. Bandung', 'Sumatera Utara', '0987788768'), ('Maringan Supplier', 'Jl.Merdeka', 'Sumatera Utara', '09876655');
INSERT INTO Supplier(NamaSupplier, Alamat, Provinsi, NoHp) 
VALUES
('Marsudin Supplier', 'Jl. Bandung', 'Sumatera Utara', '0987788768'),
('Maringan Supplier', 'Jl.Merdeka', 'Sumatera Utara', '09876655'),
('Budi Jaya Supplier', 'Jl. Pahlawan', 'Jawa Barat', '087765443'),
('Kurnia Jaya Supplier', 'Jl. Asem Jajar', 'Jawa Tengah', '089876543'),
('Bintang Supplier', 'Jl. Gajah Mada', 'DKI Jakarta', '085678912'),
('Mitra Abadi Supplier', 'Jl. Veteran', 'Sumatera Selatan', '081234567'),
('Hadi Jaya Supplier', 'Jl. Jendral Sudirman', 'Sumatera Barat', '089876543'),
('Sinar Baru Supplier', 'Jl. Diponegoro', 'Jawa Timur', '087654321'),
('Abadi Bersama Supplier', 'Jl. Ahmad Yani', 'Banten', '089876543'),
('Agung Makmur Supplier', 'Jl. Gajah Mada', 'Jawa Barat', '085678912');


INSERT INTO barang(NamaBarang, Keterangan, Satuan, IdPengguna)
VALUES ('sapu', 'untuk menyapu', 'biji', 1),
       ('sepatu', 'sepatu lokal', 'pasang', 2),
       ('buku', 'buku lokal', 'lusin', 3),
       ('kaos', 'kaos lokal', 'biji', 4),
       ('jaket', 'jaket lokal', 'biji', 5),
       ('kemeja', 'kemeja lokal', 'biji', 5),
       ('tupperware', 'tupperware lokal', 'biji', 4),
       ('tv', 'tv lokal', 'biji', 3),
       ('batu bata', 'batu bata 40 kg lokal', 'biji', 2),
       ('semen', 'semen holkim', 'sak', 1);


INSERT INTO Pembelian(TanggalPembelian, JumlahPembelian, HargaBeli, IdPengguna, IdBarang, IdSupplier)
VALUES 
('2023-04-04', 7, 11000, 1, 5, 1),
('2023-04-05', 5, 9000, 2, 6, 2),
('2023-04-07', 3, 8000, 3, 13, 3),
('2023-04-10', 10, 7500, 4, 14, 4),
('2023-04-15', 8, 6000, 5, 15, 5),
('2023-04-20', 15, 12000, 1, 16, 6),
('2023-04-22', 12, 10000, 2, 17, 7),
('2023-04-25', 6, 8000, 3, 19, 8),
('2023-04-30', 4, 9500, 4, 18, 9);


INSERT INTO Penjualan(TanggalPenjualan, JumlahPenjualan, HargaJual, IdPengguna, IdBarang, IdPelanggan)
VALUES 
('2023-04-04', 7, 11000, 1, 5, 1),
('2023-04-05', 5, 9000, 2, 6, 2),
('2023-04-07', 3, 8000, 3, 6, 3),
('2023-04-10', 10, 7500, 4, 5, 4),
('2023-04-15', 8, 6000, 5, 16, 5),
('2023-04-20', 15, 12000, 1, 16, 5),
('2023-04-22', 12, 10000, 2, 17, 4),
('2023-04-25', 6, 8000, 3, 18, 3),
('2023-04-30', 4, 9500, 4, 18, 2),
('2023-04-04', 7, 11000, 1, 5, 1),
('2023-04-05', 5, 9000, 2, 6, 2),
('2023-04-07', 3, 8000, 3, 6, 3),
('2023-04-10', 10, 7500, 4, 5, 4),
('2023-04-15', 8, 6000, 5, 16, 5),
('2023-04-20', 15, 12000, 1, 16, 5),
('2023-04-22', 12, 10000, 2, 17, 4),
('2023-04-25', 6, 8000, 3, 18, 3),
('2023-04-30', 4, 9500, 4, 18, 2),
('2023-05-01', 9, 11000, 5, 20, 1),
('2023-05-03', 2, 12000, 4, 21, 2),
('2023-05-04', 5, 9000, 3, 22, 3),
('2023-05-06', 7, 8000, 2, 23, 4),
('2023-05-08', 1, 6000, 1, 24, 5),
('2023-05-11', 3, 5000, 5, 25, 1),
('2023-05-13', 11, 7500, 4, 26, 2),
('2023-05-16', 8, 6000, 3, 27, 3),
('2023-05-20', 12, 9000, 2, 27, 4),
('2023-05-22', 5, 12000, 1, 6, 5);
