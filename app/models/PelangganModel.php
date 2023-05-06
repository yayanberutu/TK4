<?php

class PelangganModel extends BaseModel {
    protected $tableName = "Pelanggan";

    public function savePelangganToDb($data, $userId){
        $query = "INSERT INTO Pelanggan (NamaPelanggan, NoHp, Alamat) 
                  VALUES(:namaPelanggan, :noHp, :alamat)";
		
        $this->db->query($query);
		$this->db->bind('namaPelanggan', $data['namaPelanggan']);
        $this->db->bind('noHp', $data['noHp']);
        $this->db->bind('alamat', $data['alamat']);
		$this->db->execute();

		return $this->db->rowCount();
    }

    public function update($data){
        $query = "UPDATE Pelanggan SET NamaPelanggan=:namaPelanggan,
                    NoHp=:noHp, Alamat=:alamat
                 WHERE IdPelanggan=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdPelanggan']);
		$this->db->bind('namaPelanggan', $data['NamaPelanggan']);
        $this->db->bind('noHp', $data['NoHp']);
        $this->db->bind('alamat', $data['Alamat']);
		$this->db->execute();

		return $this->db->rowCount();
    }
}