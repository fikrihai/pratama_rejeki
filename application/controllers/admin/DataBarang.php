<?php
class DataBarang extends CI_Controller{

public function index()
{
    $data['title'] = "Data Barang";
        $data['barang'] = $this->PratamaModel->get_data('data_barang')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataBarang', $data);
        $this->load->view('templates_admin/footer');
}
public function tambahData()
    {
        $data['title'] = "Tambah Data Barang"; 
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahDatabarang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nama_barang = $this->input->post('namaBarang');
            $harga_beli = $this->input->post('hargaBeli');
            $harga_jual = $this->input->post('hargaJual');
            $data = array(
                'nama_barang' => $nama_barang,
                'harga_beli' => $harga_beli, 
                'harga_jual' => $harga_jual
            );
            $this->PratamaModel->insert_data($data, 'data_barang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/dataBarang');
        }
    }

    public function updateData($id)
    {
        $where = array('id' => $id); 
        $data['barang'] = $this->db->query("SELECT * FROM data_barang WHERE id= '$id'")->result();
        $data['title'] = "Update Data Barang";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateDataBarang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi($id)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData($id);
        } else {
            $id = $this->input->post('id');
            $nama_barang = $this->input->post('namaBarang');
            $harga_beli = $this->input->post('hargaBeli');
            $harga_jual = $this->input->post('hargaJual');
            $data = array(
                'nama_barang' => $nama_barang,
                'harga_beli' => $harga_beli, 
                'harga_jual' => $harga_jual
            );

            $where = array(
                'id' => $id
            );
            $this->PratamaModel->update_data($data, 'data_barang', $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/dataBarang');
        }
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->PratamaModel->delete_data('data_barang', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/dataBarang');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('namaBarang', 'nama barang', 'required');
        $this->form_validation->set_rules('hargaBeli', 'harga beli', 'required'); 
        $this->form_validation->set_rules('hargaJual', 'harga jual', 'required'); 
    }
}
?>