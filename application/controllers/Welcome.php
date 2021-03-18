<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('form_login');
		} else {
			//$username = $this->input->post('username');
			//$password = $this->input->post('password'); 
			$username = 'fikri';
			$password = 'admin'; 
			$cek = $this->PratamaModel->cek_login($username, $password); 
			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username Atau Password Salah !!</strong> 
		  	</div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama_pegawai',$cek->nama_pegawai);
				$this->session->set_userdata('photo',$cek->photo);
				$this->session->set_userdata('id_pegawai',$cek->id_pegawai);
				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/Dashboard');
						break;
					case 2:
						redirect('pegawai/Dashboard');
						break;
					default: break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}
}
