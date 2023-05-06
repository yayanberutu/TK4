<?php
/**
 * 
 */
class AdminModel extends BaseModel {
    protected $tableName = "Penjualan";

    public function getAllDataKeuntunganPenjualanView(){

        $this->db->query("SELECT TanggalPenjualan, SUM(JumlahPenjualan * HargaJual) AS Keuntungan
                        FROM Penjualan
                        GROUP BY TanggalPenjualan");
        
        $result = $this->db->resultSet();

        return $result;
    }

}