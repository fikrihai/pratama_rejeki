<?php

class DataAbsensi extends CI_Controller{

    public function index()
    {
        $data['title'] = "Data Absensi"; 
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')){
            $bulan=$_GET['bulan'];
            $tahun=$_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan =  date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $data['absensi'] =$this->db->query("SELECT a.*,b.nama_pegawai,b.jenis_kelamin,b.jabatan FROM data_kehadiran a INNER JOIN data_pegawai b ON a.nik = b.nik INNER JOIN  data_jabatan c ON c.nama_jabatan=b.jabatan WHERE a.bulan='$bulantahun'
        ORDER BY b.nama_pegawai ASC")->result(); 
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

 public function inputAbsensi( )
 {
     if($this->input->post('submit',TRUE)=='submit'){
        $post = $this->input->post();
        foreach($post['bulan'] as $key=>$value){
            if ($post['bulan'][$key]!= '' || $post['nik'][$key]!= '') {
                $simpan[]=array(
                    'bulan' =>$post['bulan'][$key],
                    'nik' =>$post['nik'][$key],
                    'nama_pegawai' =>$post['nama_pegawai'][$key],
                    'jenis_kelamin' =>$post['jenis_kelamin'][$key],
                    'nama_jabatan' =>$post['nama_jabatan'][$key],
                    'hadir' =>$post['hadir'][$key],
                    'sakit' =>$post['sakit'][$key],
                    'alpha' =>$post['alpha'][$key],

                );
            }
        }
        $this->PenggajianModel->insert_batch('data_kehadiran',$simpan);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataAbsensi');
     }
    $data['title'] = "Form Input Data Absensi";
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')){
        $bulan=$_GET['bulan'];
        $tahun=$_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    }else{
        $bulan =  date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
    }
    $data['input_absensi'] = $this->db->query("SELECT a.*,b.nama_jabatan FROM data_pegawai a INNER JOIN data_jabatan b ON a.jabatan = b.nama_jabatan WHERE NOT EXISTS (SELECT * FROM data_kehadiran c WHERE c.bulan='$bulantahun' AND a.nik = c.nik) ORDER BY a.nama_pegawai ASC")->result(); 
    $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataAbsensi', $data);
        $this->load->view('templates_admin/footer');
 }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PenggajianModel->delete_data('data_kehadira', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/DataAbsensi');
    }

}

?>