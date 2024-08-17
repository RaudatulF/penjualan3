<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
        $this->load->model('Kategori_model');
        $this->load->model('Satuan_model');
        $this->load->model('Supplier_model');
        $this->load->model('User_model');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Barang',
            'barang' => $this->Barang_model->getAll(),
            'content' => 'barang/index'
        );
        $this->load->view('template/menu', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Barang',
            'kategori' => $this->db->get('kategori')->result_array(),
            'satuan' => $this->db->get('satuan')->result_array(),
            'supplier' => $this->db->get('supplier')->result_array(),
            'content' => 'barang/add_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function save()
    {
        $this->Barang_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Barang Berhasil DiSimpan");
        }
        redirect('barang');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Barang',
            'barang' => $this->Barang_model->getById($id),
            'kategori' => $this->Kategori_model->getAll(),
            'satuan' => $this->Satuan_model->getAll(),
            'supplier' => $this->Supplier_model->getAll(),
            'user' => $this->User_model->getAll(),
            'content' => 'barang/edit_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function edit()
    {
        $this->Barang_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Barang Berhasil DiUpdate");
        }
        redirect('barang');
    }

    public function delete($id)
    {
        $this->Barang_model->delete($id);
        redirect('barang');
    }

    public function baranglap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA BARANG', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(8, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(20, 6, 'BARCODE', 1, 0, 'C');
        $pdf->Cell(35, 6, 'NAMA', 1, 0, 'C');
        $pdf->Cell(30, 6, 'KATEGORI', 1, 0, 'C');
        $pdf->Cell(30, 6, 'SATUAN', 1, 0, 'C');
        $pdf->Cell(25, 6, 'HARGA JUAL', 1, 0, 'C');
        $pdf->Cell(25, 6, 'HARGA BELI', 1, 0, 'C');
        $pdf->Cell(15, 6, 'STOK', 1, 1, 'C');
        $i = 1;
        $this->db->select('barang.*, kategori.nama AS kategori, satuan.nama AS satuan, supplier.nama AS supplier');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.kategori_id = kategori.id');
        $this->db->join('satuan', 'barang.satuan_id = satuan.id');
        $this->db->join('supplier', 'barang.supplier_id = supplier.id');
        $data = $this->db->get()->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(8, 6, $i++, 1, 0, 'C');
            $pdf->Cell(20, 6, $d['barcode'], 1, 0);
            $pdf->Cell(35, 6, $d['nama'], 1, 0);
            $pdf->Cell(30, 6, $d['kategori'], 1, 0);
            $pdf->Cell(30, 6, $d['satuan'], 1, 0);
            $pdf->Cell(25, 6, $d['harga_jual'], 1, 0);
            $pdf->Cell(25, 6, $d['harga_beli'], 1, 0);
            $pdf->Cell(15, 6, $d['stok'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_barang.pdf', 'I');
    }
}
