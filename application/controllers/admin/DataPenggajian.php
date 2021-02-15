<?php
class DataPenggajian extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Gaji Pegawai";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan =  date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['gaji'] = $this->db->query("SELECT a.nik,a.nama_pegawai,a.jenis_kelamin,b.nama_jabatan,b.tj_transport,b.uang_makan,b.gaji_pokok,c.alpha FROM data_pegawai a INNER JOIN data_jabatan b ON a.jabatan = b.nama_jabatan INNER JOIN data_kehadiran c ON a.nik = c.nik WHERE c.bulan='$bulantahun'
        ORDER BY a.nama_pegawai ASC")->result() ;
         $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakGaji(){
        $data['title'] = "Cetak Data Gaji Pegawai";
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $bulantahun = $bulan.$tahun;
        $data['cetak_gaji'] = $this->db->query("SELECT a.nik,a.nama_pegawai,a.jenis_kelamin,b.nama_jabatan,b.tj_transport,b.uang_makan,b.gaji_pokok,c.alpha FROM data_pegawai a INNER JOIN data_jabatan b ON a.jabatan = b.nama_jabatan INNER JOIN data_kehadiran c ON a.nik = c.nik WHERE c.bulan='$bulantahun'
        ORDER BY a.nama_pegawai ASC")->result() ;
         $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $this->load->view('templates_admin/header', $data); 
        $this->load->view('admin/cetakDataGaji', $data); 
    }
}
