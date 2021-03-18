<?php
class home extends CI_Controller{

    public function index()
    {
        $data['title'] = "Data Tokopedia";  
        $data['penjualan'] = $this->db->query("SELECT a.* FROM data_penjualan a   
        ORDER BY a.tgl_penjualan ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('marketplace/tokped/home', $data);
        $this->load->view('templates_admin/footer');
    }
}
?>