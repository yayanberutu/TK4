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

    /**
     * Keuntungan tiap barang = Total Harga Barang yang terjual - (banyak barang terjual * harga beli)
     * Pada method ini, harga beli dihitung menggunakan metode rata-rata/average.
     *  Misalnya barang A, pada pembelian pertama dibeli sebanyak 10 barang dengan harga beli Rp 10.000, 
     *  dan pada pembelian kedua dibeli sebanyak 6 barang dengan harga Rp 12.000, maka harga belinya adalah:
     *  (10 * Rp 10.000) + (6 * Rp 12.000) / (10+6) = 10.750
     */
    public function getAllDataKeuntunganEachBarangView(){
        $query = "SELECT brg.IdBarang, brg.NamaBarang, 
                    COALESCE((SELECT SUM(Jual.HargaJual * Jual.JumlahPenjualan) FROM PENJUALAN Jual WHERE Jual.IdBarang = brg.IdBarang), 0) as TotalHargaJual,
                    COALESCE((SELECT SUM(Jual2.JumlahPenjualan) FROM Penjualan Jual2 WHERE Jual2.IdBarang = brg.IdBarang), 0) as TotalBarangTerjual,
                    COALESCE((SELECT SUM(Beli.HargaBeli * Beli.JumlahPembelian) FROM Pembelian Beli WHERE Beli.IdBarang = brg.IdBarang), 0) as TotalHargaBeli,
                    COALESCE((SELECT SUM(Beli2.JumlahPembelian) FROM Pembelian Beli2 WHERE Beli2.IdBarang = brg.IdBarang), 0) as TotalBarangTerbeli,
                    COALESCE((SELECT SUM(Beli.HargaBeli * Beli.JumlahPembelian) FROM Pembelian Beli WHERE Beli.IdBarang = brg.IdBarang), 0)/COALESCE((SELECT SUM(Beli2.JumlahPembelian) FROM Pembelian Beli2 WHERE Beli2.IdBarang = brg.IdBarang), 0) as AvgHargaBeli,
                    COALESCE((SELECT SUM(Jual.HargaJual * Jual.JumlahPenjualan) FROM PENJUALAN Jual WHERE Jual.IdBarang = brg.IdBarang), 0) 
                         - 
                            ((COALESCE((SELECT SUM(Beli.HargaBeli * Beli.JumlahPembelian) FROM Pembelian Beli WHERE Beli.IdBarang = brg.IdBarang), 0)
                                /COALESCE((SELECT SUM(Beli2.JumlahPembelian) FROM Pembelian Beli2 WHERE Beli2.IdBarang = brg.IdBarang), 0)
                                * COALESCE((SELECT SUM(Jual2.JumlahPenjualan) FROM Penjualan Jual2 WHERE Jual2.IdBarang = brg.IdBarang), 0)
                            ) 
                    ) as Keuntungan
                    FROM BARANG brg
                    ORDER BY brg.IdBarang";
        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }

    public function getStockEachBarangView(){
        $query = "SELECT brg.IdBarang, brg.NamaBarang,
                    (COALESCE((SELECT SUM(beli.JumlahPembelian) FROM Pembelian beli WHERE beli.IdBarang = brg.IdBarang), 0) 
                        - COALESCE((SELECT SUM(jual.JumlahPenjualan) FROM Penjualan jual WHERE jual.IdBarang = brg.IdBarang), 0)) 
                        as Stock
                    FROM Barang brg
                    ORDER BY brg.IdBarang
                 ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }

    public function getTotalBarangTerjual(){
        $query = "SELECT brg.IdBarang, brg.NamaBarang,
                    COALESCE((SELECT SUM(jual.JumlahPenjualan) FROM Penjualan jual WHERE jual.IdBarang = brg.IdBarang), 0) as JumlahTerjual
                    FROM Barang brg
                    ORDER BY brg.IdBarang
                 ";
        $this->db->query($query);
        $result = $this->db->resultSet();

        return $result;
    }
}