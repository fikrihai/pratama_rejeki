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
        $user =  $this->session->userdata('nama_pegawai');
        $pegawai = $this->db->query("SELECT * FROM data_pegawai") ;
        $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan='Admin'") ;  
        $data['tokped'] = $this->db->query("select saldo_masuk - saldo_keluar as total from  (select  (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='tokopedia' and keterangan='saldo masuk' and pegawai = '$user') as saldo_masuk,
        (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='tokopedia' and keterangan='saldo keluar' and pegawai = '$user') as saldo_keluar) as a")->result(); 
        $data['shopee'] = $this->db->query("select saldo_masuk - saldo_keluar as total from  (select  (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='shopee' and keterangan='saldo masuk' and pegawai = '$user' ) as saldo_masuk,
        (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='shopee' and keterangan='saldo keluar' and pegawai = '$user' ) as saldo_keluar) as a")->result(); 
        $data['bukalapak'] = $this->db->query("select saldo_masuk - saldo_keluar as total from  (select  (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='bukalapak' and keterangan='saldo masuk' and pegawai = '$user') as saldo_masuk,
        (SELECT COALESCE(sum(saldo),0) as total FROM `data_saldo` where marketplace='bukalapak' and keterangan='saldo keluar' and pegawai = '$user') as saldo_keluar) as a")->result(); 
        $data['pendapatanbersih'] = $this->db->query("SELECT sum(a.`total_pendapatan`) as total FROM `data_penjualan` a")->result();
        $data['pegawai'] =$pegawai->num_rows();
        $data['admin'] =$admin->num_rows();   
        
       $this->load->view('templates_admin/header',$data); 
       $this->load->view('templates_admin/sidebar'); 
       $this->load->view('admin/dashboard',$data); 
       $this->load->view('templates_admin/footer'); 
    }
}

?>