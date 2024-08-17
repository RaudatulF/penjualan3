<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Supplier',
            'supplier' => $this->Supplier_model->getAll(),
            'content' => 'supplier/index'
        );
        $this->load->view('template/menu', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Supplier',
            'content' => 'supplier/add_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function save()
    {
        $this->Supplier_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Supplier Berhasil DiSimpan");
        }
        redirect('supplier');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Supplier',
            'supplier' => $this->Supplier_model->getById($id),
            'content' => 'supplier/edit_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function edit()
    {
        $this->Supplier_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Supplier Berhasil DiUpdate");
        }
        redirect('supplier');
    }

    public function delete($id)
    {
        $this->Supplier_model->delete($id);
        redirect('supplier');
    }

    public function supplierlap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA SUPPLIER', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(6, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(14, 6, 'NAMA', 1, 0, 'C');
        $pdf->Cell(22, 6, 'TELEPHONE', 1, 0, 'C');
        $pdf->Cell(27, 6, 'EMAIL', 1, 0, 'C');
        $pdf->Cell(20, 6, 'ALAMAT', 1, 0, 'C');
        $pdf->Cell(25, 6, 'PERUSAHAAN', 1, 0, 'C');
        $pdf->Cell(23, 6, 'NAMA BANK', 1, 0, 'C');
        $pdf->Cell(31, 6, 'NAMA AKUN BANK', 1, 0, 'C');
        $pdf->Cell(28, 6, 'NO AKUN BANK', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('supplier')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(6, 6, $i++, 1, 0, 'C');
            $pdf->Cell(14, 6, $d['nama'], 1, 0);
            $pdf->Cell(22, 6, $d['telp'], 1, 0);
            $pdf->Cell(27, 6, $d['email'], 1, 0);
            $pdf->Cell(20, 6, $d['alamat'], 1, 0);
            $pdf->Cell(25, 6, $d['perusahaan'], 1, 0);
            $pdf->Cell(23, 6, $d['nama_bank'], 1, 0);
            $pdf->Cell(31, 6, $d['nama_akun_bank'], 1, 0);
            $pdf->Cell(28, 6, $d['no_akun_bank'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_supplier.pdf', 'I');
    }
}
