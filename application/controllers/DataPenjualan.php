<?php
class DataPenjualan extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Penjualan";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan =  date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $user =  $this->session->userdata('nama_pegawai');
        $data['penjualan'] = $this->db->query("SELECT a.* FROM data_penjualan a  where a.bulantahun='$bulantahun' and a.input_by='$user'
    ORDER BY a.tgl_penjualan ASC")->result();
        $data['total'] = $this->db->query("SELECT sum(a.total_pendapatan) as tb,sum(a.jumlah_harga_jual-fee_marketplace) as tk FROM data_penjualan a  where a.bulantahun='$bulantahun' and a.input_by='$user' ")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('dataPenjualan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data penjualan";
        $data['barang'] = $this->PenjualanModel->get_barang();
        $data['market'] = $this->PenjualanModel->get_market();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('formTambahDatapenjualan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function listHarga()
    {
        $nama_barang = $this->input->post('namaBarang');
        $totalItem = $this->input->post('totalItem');
        $harga_beli =  $this->PenjualanModel->get_harga_beli($nama_barang);
        foreach ($harga_beli as $hb) {
            $hargaBelinotarr = $hb->harga_beli;
            $hargaJualnotarr = $hb->harga_jual;
            $hargaBeli = "$hb->harga_beli";
            $hargaJual = "$hb->harga_jual";
            $jmlHargaBeli = $totalItem * $hargaBelinotarr;
            $jmlHargaJual = $totalItem * $hargaJualnotarr;
        }
        $callback = array('harga_beli' => $hargaBeli, 'harga_jual' => $hargaJual, 'jml_harga_beli' => $jmlHargaBeli, 'jml_harga_jual' => $jmlHargaJual);
        echo json_encode($callback);
    }
    public function feeMarket()
    {
        $marketplace = $this->input->post('marketplace');
        $jmlHargaJual = $this->input->post('jmlHargaJual');
        $jmlHargaBeli = $this->input->post('jmlHargaBeli');
        $bebasongkir = $this->input->post('bebasongkir');
        $fee =  $this->PenjualanModel->get_fee_market($marketplace);
        if ($bebasongkir == "1") {
            foreach ($fee as $f) {
                $feeMarket = $f->fee;
                $feebebasongkir = $f->fee_bebasngkir;
                $potonganFeeBebas = ($jmlHargaJual * $feebebasongkir) / 100;
                $feemarket = ($jmlHargaJual * $feeMarket) / 100;
                if ($potonganFeeBebas >= 10000) {
                    $potonganFee = $feemarket + 10000;
                } else {
                    $potonganFee = $feemarket + $potonganFeeBebas;
                }


                $totalPendapatan = ($jmlHargaJual - $jmlHargaBeli) - $potonganFee;
            }
        } else {
            foreach ($fee as $f) {
                $feeMarket = $f->fee;
                $potonganFee = ($jmlHargaJual * $feeMarket) / 100;
                $totalPendapatan = ($jmlHargaJual - $jmlHargaBeli) - $potonganFee;
            }
        }

        $callback = array('fee' => $potonganFee, 'totalPendapatan' => $totalPendapatan);
        echo json_encode($callback);
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $status = $this->input->post('status');
            $tanggal_dana_masuk = $this->input->post('tglDanaMasuk');
            $invoice = $this->input->post('invoice');
            $nama_barang = $this->input->post('namaBarang');
            $total_item = $this->input->post('totalItem');
            $harga_beli = $this->input->post('hargaBeli');
            $jml_HargaBeli = $this->input->post('jmlHargaBeli');
            $harga_jual = $this->input->post('hargaJual');
            $jml_HargaJual = $this->input->post('jmlHargaJual');
            $marketplace = $this->input->post('marketplace');
            $feeMarket = $this->input->post('feeMarket');
            $total_Pendapatan = $this->input->post('totalPendapatan');
            $tgl_Penjualan = $this->input->post('tglPenjualan');
            $bulan =  date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
            $inputBy = $this->session->userdata('nama_pegawai');
            $data = array(
                'Status' => $status,
                'tanggal_dana_masuk' => $tanggal_dana_masuk,
                'invoice' => $invoice,
                'nama_barang' => $nama_barang,
                'total_item' => $total_item,
                'harga_beli' => $harga_beli,
                'jumlah_harga_beli' => $jml_HargaBeli,
                'harga_jual' => $harga_jual,
                'jumlah_harga_jual' => $jml_HargaJual,
                'marketplace' => $marketplace,
                'fee_marketplace' => $feeMarket,
                'total_pendapatan' => $total_Pendapatan,
                'tgl_Penjualan' => $tgl_Penjualan,
                'bulantahun' => $bulantahun,
                'input_by' => $inputBy
            );
            $saldomarket = $jml_HargaJual - $feeMarket;
            $tanggal = date('Y-m-d');
            $datasaldo = array(
                'marketplace' => $marketplace,
                'saldo' => $saldomarket,
                'keterangan' => "saldo masuk",
                'tanggal' => $tanggal,
                'pegawai' => $inputBy
            );
            $this->PenjualanModel->insert_data($data, 'data_penjualan');
            $this->PenjualanModel->insert_data($datasaldo, 'data_saldo');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('DataPenjualan');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('tglDanaMasuk', 'tanggal dana masuk', 'required');
        $this->form_validation->set_rules('namaBarang', 'nama barang', 'required');
        $this->form_validation->set_rules('totalItem', 'total item', 'required');
        $this->form_validation->set_rules('marketplace', 'marketplace', 'required');
        $this->form_validation->set_rules('tglPenjualan', 'tanggal penjualan', 'required');
        $this->form_validation->set_rules('invoice', 'tanggal penjualan', 'required');
    }
}
