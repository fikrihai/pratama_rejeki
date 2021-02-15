<?php

class SaldoModel extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function update_data($data, $table, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function delete_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    } 
}
