<?php

class PenjualanModel extends CI_Model
{

    public function get_barang()
    {
        return $this->db->get('data_barang')->result();
    }
    public function get_market()
    {
        return $this->db->get('data_marketplace')->result();
    }
    public function get_harga_beli($nama_barang)
    {
       $this->db->where('nama_barang',$nama_barang);
       $result = $this->db->get('data_barang')->result();
       return $result;
    }
    public function get_fee_market($marketplace)
    {
       $this->db->where('marketplace',$marketplace);
       $result = $this->db->get('data_marketplace')->result();
       return $result;
    }
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
