<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Satuan_model");
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Satuan',
            'satuan' => $this->Satuan_model->getAll(),
            'content' => 'satuan/index'
        );
        $this->load->view('template/menu', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Satuan',
            'content' => 'satuan/add_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function save()
    {
        $this->Satuan_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Satuan Berhasil DiSimpan");
        }
        redirect('satuan');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Satuan',
            'satuan' => $this->Satuan_model->getById($id),
            'content' => 'satuan/edit_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function edit()
    {
        $this->Satuan_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Satuan Berhasil DiUpdate");
        }
        redirect('satuan');
    }

    public function delete($id)
    {
        $this->Satuan_model->delete($id);
        redirect('satuan');
    }

    public function satuanlap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA SATUAN', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(8, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(50, 6, 'NAMA', 1, 0, 'C'); 
        $pdf->Cell(100, 6, 'DESKRIPSI', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('satuan')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(8, 6, $i++, 1, 0, 'C');
            $pdf->Cell(50, 6, $d['nama'], 1, 0, 'C'); 
            $pdf->Cell(100, 6, $d['deskripsi'], 1, 1, 'C');
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_satuan.pdf', 'I');
    }
}
