<?php
class SlipGaji extends CI_Controller{
    public function index( )
    {
        $data['title'] = "Cetak Slip Gaji"; 
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formCetakSlipGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji"; 
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun'); 
        $pegawai = $this->input->post('pegawai');
        $bulantahun = $bulan.$tahun;
        $data['slip_gaji'] = $this->db->query("SELECT a.nama_pegawai,a.jabatan,b.gaji_pokok,b.tj_transport,b.uang_makan,c.hadir,c.sakit,c.alpha FROM data_pegawai a INNER JOIN data_jabatan b on a.jabatan=b.nama_jabatan INNER JOIN data_kehadiran c on a.nik = c.nik WHERE a.nama_pegawai = '$pegawai' AND c.bulan='$bulantahun' ORDER BY nama_pegawai ASC")->result();
        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakSlipGaji');
    }

     
}
