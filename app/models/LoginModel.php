<?php

class LoginModel extends BaseModel {

    /**
     * This method is to check credential user by username and password given
     */
    public function checkCredentialUser($data){
        $query = "SELECT p.IdPengguna, p.NamaPengguna as Username, p.Password, 
                    p.NamaDepan, p.NamaBelakang, p.IdAkses, h.NamaAkses as Role 
                    FROM Pengguna p 
                    JOIN HakAkses h 
                    ON p.IdAkses = h.IdAkses
                    WHERE namapengguna = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', hash('sha256', $data['password']));
        
        $data =  $this->db->single();
        return $data;
    }
}