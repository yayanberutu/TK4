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

    public function savePenjualanToDb($data, $userId){
        $query = "INSERT INTO Penjualan (TanggalPenjualan, JumlahPenjualan, HargaJual, IdBarang, IdPelanggan, IdPengguna) 
                  VALUES(:tanggalPenjualan, :jumlahPenjualan, :hargaJual, :idBarang, :idPelanggan, :idPengguna)";
		
        $this->db->query($query);
		$this->db->bind('tanggalPenjualan', $data['tanggalPenjualan']);
        $this->db->bind('jumlahPenjualan', $data['jumlahPenjualan']);
        $this->db->bind('hargaJual', $data['hargaJual']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idPelanggan', $data['idPelanggan']);
        $this->db->bind('idPengguna', $userId);
		$this->db->execute();

		return $this->db->rowCount();
    }

    public function update($data){
        $query = "UPDATE Penjualan SET TanggalPenjualan=:tanggalPenjualan, JumlahPenjualan=:jumlahPenjualan,
                    HargaJual=:hargaJual, IdBarang=:idBarang, IdPelanggan=:idPelanggan
                 WHERE IdPenjualan=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdPenjualan']);
		$this->db->bind('tanggalPenjualan', $data['TanggalPenjualan']);
        $this->db->bind('jumlahPenjualan', $data['JumlahPenjualan']);
        $this->db->bind('hargaJual', $data['HargaJual']);
        $this->db->bind('idBarang', $data['IdBarang']);
        $this->db->bind('idPelanggan', $data['IdPelanggan']);
		$this->db->execute();

		return $this->db->rowCount();
    }
}