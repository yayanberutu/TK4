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


    public function getById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
    }
}