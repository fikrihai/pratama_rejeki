<?php
class DataSaldo extends CI_Controller{
    public function index()
    {
        $data['title'] = "Data Saldo Market Place";
        $data['saldo'] = $this->SaldoModel->get_data('data_saldo');
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataSaldo', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah transaksi saldo"; 
        $data['market'] = $this->SaldoModel->get_data('data_marketplace');
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahTransaksiSaldo', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $marketplace = $this->input->post('marketplace'); 
            $saldo = $this->input->post('saldo');
            $keterangan = $this->input->post('keterangan');
            $tanggal = $this->input->post('tanggal'); 
            $data = array(
                'marketplace' =>$marketplace, 
                'saldo' => $saldo,
                'keterangan' => $keterangan,
                'tanggal' => $tanggal
            );
            $this->SaldoModel->insert_data($data, 'data_saldo');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataSaldo');
        }
    }
    public function updateData($id)
    {
        $where = array('id' => $id); 
        $data['saldo'] = $this->db->query("SELECT * FROM data_saldo WHERE id= '$id'")->result();
        $data['market'] = $this->SaldoModel->get_data('data_marketplace');
        $data['title'] = "Update Data Barang";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateTransaksiSaldo', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData($id);
        } else {
            $id = $this->input->post('id');
            $marketplace = $this->input->post('marketplace'); 
            $saldo = $this->input->post('saldo');
            $keterangan = $this->input->post('keterangan');
            $tanggal = $this->input->post('tanggal'); 
            $data = array(
                'marketplace' =>$marketplace, 
                'saldo' => $saldo,
                'keterangan' => $keterangan,
                'tanggal' => $tanggal
            );

            $where = array(
                'id' => $id
            );
            $this->SaldoModel->update_data($data, 'data_saldo', $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataSaldo');
        }
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->SaldoModel->delete_data('data_saldo', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/DataSaldo');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('marketplace', 'marketplace', 'required');
        $this->form_validation->set_rules('saldo', 'saldo', 'required'); 
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required'); 
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required'); 
    }
}
?>