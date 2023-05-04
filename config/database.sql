CREATE DATABASE IF NOT EXISTS db_inventaris;
USE db_inventaris;

CREATE TABLE IF NOT EXISTS HakAkses (
    IdAkses INT PRIMARY KEY,
    NamaAkses VARCHAR(50) NOT NULL,
    Keterangan VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Pengguna (
    IdPengguna INT PRIMARY KEY,
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
    IdBarang INT PRIMARY KEY,
    NamaBarang VARCHAR(50) NOT NULL,
    Keterangan VARCHAR(100) NOT NULL,
    Satuan VARCHAR(10) NOT NULL,
    IdPengguna INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna)
);

CREATE TABLE IF NOT EXISTS Pembelian (
    IdPembelian INT PRIMARY KEY,
    TanggalPembelian DATE NOT NULL,
    JumlahPembelian INT NOT NULL,
    HargaBeli DECIMAL(10,2) NOT NULL,
    IdPengguna INT NOT NULL,
    IdBarang INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),
    FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)
);

CREATE TABLE IF NOT EXISTS Penjualan (
    IdPenjualan INT PRIMARY KEY,
    TanggalPenjualan DATE NOT NULL,
    JumlahPenjualan INT NOT NULL,
    HargaJual DECIMAL(10,2) NOT NULL,
    IdPengguna INT NOT NULL,
    IdBarang INT NOT NULL,
    FOREIGN KEY (IdPengguna) REFERENCES Pengguna(IdPengguna),
    FOREIGN KEY (IdBarang) REFERENCES Barang(IdBarang)
);

CREATE TABLE IF NOT EXISTS Supplier (
	IdSupplier INT PRIMARY KEY, 
    NamaSupplier VARCHAR(30), 
    Alamat TEXT, Kota VARCHAR(30), 
    Provinsi VARCHAR(30), 
    NoHp VARCHAR(18)
);	

CREATE TABLE IF NOT EXISTS Pelanggan (
	IdPelanggan INT PRIMARY KEY, 
    NamaPelanggan VARCHAR(50), 
    Alamat TEXT, 
    NoHP VARCHAR(18)
);

ALTER TABLE Pembelian ADD COLUMN IdSupplier INT, ADD FOREIGN KEY(IdSupplier) REFERENCES Supplier(IdSupplier);
ALTER TABLE Penjualan ADD COLUMN IdPelanggan INT, ADD FOREIGN KEY(IdPelanggan) REFERENCES Pelanggan(IdPelanggan);
