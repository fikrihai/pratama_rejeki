<?php

class GantiPassword extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('formGantiPassword', $data);
        $this->load->view('templates_admin/footer');
    }
    public function gantiPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
           
        } else {
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $this->session->userdata('id_pegawai')); 
            $this->PratamaModel->update_data($data,'data_pegawai',$id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Berhasil Diupdate !</strong> 
          </div>');
            redirect('welcome');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('passBaru', 'password baru', 'required');
        $this->form_validation->set_rules('ulangPass', 'ulang password', 'required|matches[passBaru]');
    }
}
