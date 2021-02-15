<?php
class DataMarket extends CI_Controller{

    public function index()
    {
        $data['title'] = "Data Marketplace";
        $data['market'] = $this->PratamaModel->get_data('data_marketplace')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataMarket', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Marketplace"; 
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahDataMarket', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $marketplace = $this->input->post('marketplace');
            $fee = $this->input->post('fee');
            $statusToko = $this->input->post('statusToko'); 
            $data = array(
                'marketplace' => $marketplace,
                'fee' => $fee,
                'aktiv' => $statusToko
            );
            $this->PratamaModel->insert_data($data, 'data_marketplace');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataMarket');
        }
    }

    public function updateData($id)
    {
        $where = array('id' => $id); 
        $data['market'] = $this->db->query("SELECT * FROM data_marketplace WHERE id= '$id'")->result();
        $data['title'] = "Update Data Marketplace";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateDataMarket', $data);
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
            $fee = $this->input->post('fee');
            $statusToko = $this->input->post('statusToko'); 
            $data = array(
                'marketplace' => $marketplace,
                'fee' => $fee,
                'aktiv' => $statusToko
            );

            $where = array(
                'id' => $id
            );
            $this->PratamaModel->update_data($data, 'data_marketplace', $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/DataMarket');
        }
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->PratamaModel->delete_data('data_marketplace', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/DataMarket');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('marketplace', 'Marketplace', 'required');
        $this->form_validation->set_rules('statusToko', 'Status Toko', 'required');  
        $this->form_validation->set_rules('fee', 'Fee', 'required');  
    }
}
?>