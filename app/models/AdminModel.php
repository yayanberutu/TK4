<?php
/**
 * 
 */
class AdminModel extends BaseModel {
    protected $tableName = "Penjualan";

    public function getAllDataKeuntunganPenjualanView(){

        $this->db->query("SELECT TanggalPenjualan, SUM(JumlahPenjualan * HargaJual) AS Keuntungan
                        FROM Penjualan
                        WHERE TanggalPenjualan >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                        GROUP BY TanggalPenjualan
                        ORDER BY TanggalPenjualan
                        ");
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getAllDataKerugianPenjualanView(){

        $this->db->query("SELECT TanggalPembelian, SUM(JumlahPembelian * HargaBeli) AS Kerugian
                        FROM Pembelian 
                        WHERE TanggalPembelian >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
                        GROUP BY TanggalPembelian");
        
        $result = $this->db->resultSet();

        return $result;
    }

}