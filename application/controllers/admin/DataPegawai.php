<?php

class DataPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->PratamaModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->PratamaModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $jabatan = $this->input->post('jabatan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $photo = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                } else {
                    echo "photo gagal di upload!!";
                }
            }
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai, 
                'username' => $username,
                'password' => $password,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'photo' => $photo
            );
            $this->PratamaModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->PratamaModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai= '$id'")->result();
        $data['title'] = "Update Data Pegawai";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData($id);
        } else {
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $jabatan = $this->input->post('jabatan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $photo = $_FILES['photo']['name'];
            if ($photo) {
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo',$photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'username' => $username,
                'password' => $password,
                'jabatan' => $jabatan,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses  
            );

            $where = array(
                'id_pegawai' => $id
            );
            $this->PratamaModel->update_data($data, 'data_pegawai', $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataPegawai');
        }
    }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->PratamaModel->delete_data('data_pegawai', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/DataPegawai');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required'); 
        $this->form_validation->set_rules('username', 'username', 'required'); 
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'required');
    }
}
