<?php
/**
 * 
 */
class BarangModel extends BaseModel {
    protected $tableName = "Barang";

    public function saveBarangToDb($data, $userId){
        $query = "INSERT INTO barang (NamaBarang, Keterangan, Satuan, IdPengguna) 
                  VALUES(:namaBarang, :keterangan, :satuan, :idPengguna)";
		
        $this->db->query($query);
		$this->db->bind('namaBarang', $data['namaBarang']);
		$this->db->bind('keterangan', $data['keterangan']);
		$this->db->bind('satuan', $data['satuan']);
		$this->db->bind('idPengguna', $userId);
		$this->db->execute();

		return $this->db->rowCount();
    }


    public function getById($key, $id){
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE '. $key.'=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
    }

    public function update($data){
        $query = "UPDATE BARANG SET NamaBarang=:namaBarang, Keterangan=:keterangan, Satuan=:satuan WHERE IdBarang=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdBarang']);
		$this->db->bind('namaBarang', $data['NamaBarang']);
		$this->db->bind('keterangan', $data['Keterangan']);
		$this->db->bind('satuan', $data['Satuan']);
		$this->db->execute();

		return $this->db->rowCount();
    }
}