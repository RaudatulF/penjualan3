<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kategori_model");
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Kategori',
            'kategorilog' => infoLogin(),
            'kategori' => $this->Kategori_model->getAll(),
            'content' => 'kategori/index'
        );
        $this->load->view('template/menu',$data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Kategori',
            'content' => 'kategori/add_form'
        );
        $this->load->view('template/menu', $data);
    }
    public function save()
    {
        $this->Kategori_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiSimpan");
        }
        redirect('kategori');
    }
    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Kategori',
            'kategori' => $this->Kategori_model->getById($id),
            'content' => 'kategori/edit_form'
        );
        $this->load->view('template/menu', $data);
    }
    public function edit()
    {
        $this->Kategori_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kategori Berhasil DiUpdate");
        }
        redirect('kategori');
    }
    public function delete($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
    public function kategorilap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KATEGORI', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(8, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(100, 6, 'NAMA KATEGORI', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('kategori')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(8, 6, $i++, 1, 0, 'C');
            $pdf->Cell(100, 6, $d['nama'], 1, 1, 'C');
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_kategori.pdf', 'I');
    }
}