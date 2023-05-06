<?php

class SupplierModel extends BaseModel{
    protected $tableName = "Supplier";

    public function saveSupplierToDb($data, $userId){
        $query = "INSERT INTO Supplier (NamaSupplier, NoHp, Alamat, Provinsi) 
                  VALUES(:namaSupplier, :noHp, :alamat, :provinsi)";
		
        $this->db->query($query);
		$this->db->bind('namaSupplier', $data['namaSupplier']);
        $this->db->bind('noHp', $data['noHp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('provinsi', $data['provinsi']);
		$this->db->execute();

		return $this->db->rowCount();
    }

    public function update($data){
        $query = "UPDATE Supplier SET NamaSupplier=:namaSupplier,
                    NoHp=:noHp, Alamat=:alamat, Kota=:kota,Provinsi=:provinsi
                 WHERE IdSupplier=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdSupplier']);
		$this->db->bind('namaSupplier', $data['NamaSupplier']);
        $this->db->bind('noHp', $data['NoHp']);
        $this->db->bind('alamat', $data['Alamat']);
        $this->db->bind('kota', $data['Kota']);
        $this->db->bind('provinsi', $data['Provinsi']);
		$this->db->execute();

		return $this->db->rowCount();
    }

}