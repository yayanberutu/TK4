<?php
/**
 * 
 */
class PembelianModel extends BaseModel {
    protected $tableName = "Pembelian";

    public function getAllDataForMainView(){
        $query = "SELECT PEMBELIAN.IdPembelian, PEMBELIAN.TanggalPembelian, PEMBELIAN.JumlahPembelian,
                    PEMBELIAN.HargaBeli, PEMBELIAN.IdBarang, BARANG.NamaBarang, 
                    PEMBELIAN.IdSupplier, SUPPLIER.NamaSupplier,
                    SUPPLIER.Alamat as AlamatSupplier, SUPPLIER.Kota as KotaSupplier, SUPPLIER.PROVINSI as ProvinsiSupplier,
                    SUPPLIER.NOHP as NoHpSupplier,
                    CONCAT(PENGGUNA.NamaDepan, ' ', PENGGUNA.NamaBelakang) as CreatedBy
                    FROM PEMBELIAN
                    LEFT JOIN PENGGUNA 
                    ON PEMBELIAN.IDPENGGUNA=PENGGUNA.IDPENGGUNA
                    LEFT JOIN BARANG
                    ON PEMBELIAN.IDBARANG=BARANG.IDBARANG
                    LEFT JOIN SUPPLIER
                    ON PEMBELIAN.IDSUPPLIER=SUPPLIER.IDSUPPLIER";
        
        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }

    public function savePembelianToDb($data, $userId){
        $query = "INSERT INTO Pembelian (TanggalPembelian, JumlahPembelian, HargaBeli, IdBarang, IdSupplier, IdPengguna) 
                  VALUES(:tanggalPembelian, :jumlahPembelian, :hargaBeli, :idBarang, :idSupplier, :idPengguna)";
		
        $this->db->query($query);
		$this->db->bind('tanggalPembelian', $data['tanggalPembelian']);
        $this->db->bind('jumlahPembelian', $data['jumlahPembelian']);
        $this->db->bind('hargaBeli', $data['hargaBeli']);
        $this->db->bind('idBarang', $data['idBarang']);
        $this->db->bind('idSupplier', $data['idSupplier']);
        $this->db->bind('idPengguna', $userId);
		$this->db->execute();

		return $this->db->rowCount();
    }

    public function update($data){
        $query = "UPDATE Pembelian SET TanggalPembelian=:tanggalPembelian, JumlahPembelian=:jumlahPembelian,
                    HargaBeli=:hargaBeli, IdBarang=:idBarang, IdSupplier=:idSupplier
                 WHERE IdPembelian=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdPembelian']);
		$this->db->bind('tanggalPembelian', $data['TanggalPembelian']);
        $this->db->bind('jumlahPembelian', $data['JumlahPembelian']);
        $this->db->bind('hargaBeli', $data['HargaBeli']);
        $this->db->bind('idBarang', $data['IdBarang']);
        $this->db->bind('idSupplier', $data['IdSupplier']);
		$this->db->execute();

		return $this->db->rowCount();
    }
}