<?php
/**
 * 
 */
class PenjualanModel extends BaseModel {
    protected $tableName = "Penjualan";

    public function getAllDataForMainView(){
        $query = "SELECT PENJUALAN.IdPenjualan, PENJUALAN.TanggalPenjualan, PENJUALAN.JumlahPenjualan, PENJUALAN.HargaJual,
                    PENJUALAN.IdBarang, Barang.NamaBarang, Barang.Satuan, Barang.Keterangan, 
                    PENJUALAN.IdPelanggan, PELANGGAN.NamaPelanggan, PELANGGAN.Alamat as AlamatPelanggan,
                    PELANGGAN.NoHp as NoHpPelanggan
                    FROM PENJUALAN
                    LEFT JOIN PELANGGAN
                    ON PENJUALAN.IdPelanggan = PELANGGAN.IdPelanggan
                    LEFT JOIN BARANG
                    ON PENJUALAN.IdBarang = BARANG.IdBarang
                    LEFT JOIN PENGGUNA
                    ON PENJUALAN.IdPengguna = PENGGUNA.IdPengguna";
        
        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }
}