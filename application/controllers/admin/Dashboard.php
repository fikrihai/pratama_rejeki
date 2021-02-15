<?php

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('hak_akses') != '1'){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Harap Login terlebih dahulu !!</strong> 
              </div>');
              redirect('welcome');
        }
    }  
    public function index(){
        $data['title'] ="Dashboard";
        $pegawai = $this->db->query("SELECT * FROM data_pegawai") ;
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan='Admin'") ;  
        $data['tokped'] = $this->db->query("SELECT sum(saldo) as total FROM `data_saldo` where marketplace='tokopedia'")->result(); 
        $data['shopee'] = $this->db->query("SELECT sum(saldo) as total FROM `data_saldo` where marketplace='shopee'")->result(); 
        $data['bukalapak'] = $this->db->query("SELECT sum(saldo) as total FROM `data_saldo` where marketplace='bukalapak'")->result(); 
        $data['pegawai'] =$pegawai->num_rows();
        $data['admin'] =$admin->num_rows();   
        
       $this->load->view('templates_admin/header',$data); 
       $this->load->view('templates_admin/sidebar'); 
       $this->load->view('admin/dashboard',$data); 
       $this->load->view('templates_admin/footer'); 
    }
}

?>