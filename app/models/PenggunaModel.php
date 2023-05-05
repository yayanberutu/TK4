<?php
/**
 * 
 */
class PenggunaModel extends BaseModel {
    protected $tableName = "Pengguna";

    public function savePenggunaToDb($data, $userId){
        $query = "INSERT INTO Pengguna (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHp, Alamat, IdAkses) 
                  VALUES(:namaPengguna, :password, :namaDepan, :namaBelakang, :noHp, :alamat, :idAkses)";
		
        $this->db->query($query);
		$this->db->bind('namaPengguna', $data['username']);
		$this->db->bind('password', hash('sha256', $data['password']));
		$this->db->bind('namaDepan', $data['namaDepan']);
		$this->db->bind('namaBelakang', $data['namaBelakang']);
        $this->db->bind('noHp', $data['noHp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('idAkses', $data['idAkses']);
		$this->db->execute();

		return $this->db->rowCount();
    }

    public function update($data){
        $query = "UPDATE Pengguna SET NamaPengguna=:namaPengguna, NamaDepan=:namaDepan, NamaBelakang=:namaBelakang,
                    NoHp=:noHp, Alamat=:alamat
                 WHERE IdPengguna=:id";
		$this->db->query($query);
		$this->db->bind('id',$data['IdPengguna']);
		$this->db->bind('namaPengguna', $data['NamaPengguna']);
		$this->db->bind('namaDepan', $data['NamaDepan']);
		$this->db->bind('namaBelakang', $data['NamaBelakang']);
        $this->db->bind('noHp', $data['NoHp']);
        $this->db->bind('alamat', $data['Alamat']);
		$this->db->execute();

		return $this->db->rowCount();
    }
}