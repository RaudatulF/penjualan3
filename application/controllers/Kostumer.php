<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kostumer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kostumer_model");
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data Kostumer',
            'user' => $this->Kostumer_model->getAll(),
            'content' => 'kostumer/index'
        );
        $this->load->view('template/menu', $data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data Kostumer',
            'content' => 'kostumer/add_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function save()
    {
        $this->Kostumer_model->Save();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kostumer Berhasil DiSimpan");
        }
        redirect('kostumer');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data Kostumer',
            'user' => $this->Kostumer_model->getById($id),
            'content' => 'kostumer/edit_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function edit()
    {
        $this->Kostumer_model->editData();
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Kostumer Berhasil DiUpdate");
        }
        redirect('kostumer');
    }

    public function delete($id)
    {
        $this->Kostumer_model->delete($id);
        redirect('kostumer');
    }

    public function kostumerlap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->Cell(0, 10, 'LAPORAN DATA KOSTUMER', 0, 1, 'C');
        $pdf->Ln(10);  // Spasi setelah judul

        // Set font untuk header tabel
        $pdf->SetFont('Times', 'B', 9);

        // Lebar kolom
        $widths = [
            7,  // NO
            37, // NIK
            37, // NAMA CUSTOMER
            30, // TELP
            45  // ALAMAT
        ];

        // Hitung lebar total tabel
        $total_width = array_sum($widths);

        // Tentukan margin kiri agar tabel berada di tengah
        $x_offset = ($pdf->GetPageWidth() - $total_width) / 2;
        $pdf->SetX($x_offset);

        // Header Tabel
        $pdf->Cell($widths[0], 6, 'NO', 1, 0, 'C');
        $pdf->Cell($widths[1], 6, 'NIK', 1, 0, 'C');
        $pdf->Cell($widths[2], 6, 'NAMA KOSTUMER', 1, 0, 'C');
        $pdf->Cell($widths[3], 6, 'TELP', 1, 0, 'C');
        $pdf->Cell($widths[4], 6, 'ALAMAT', 1, 1, 'C');

        // Ambil data dari database
        $data = $this->db->get('kostumer')->result_array();
        $pdf->SetFont('Times', '', 9);
        $i = 1;

        foreach ($data as $d) {
            $pdf->SetX($x_offset); // Set posisi X untuk setiap baris agar tetap di tengah
            $pdf->Cell($widths[0], 6, $i++, 1, 0, 'C');
            $pdf->Cell($widths[1], 6, $d['nik'], 1, 0);
            $pdf->Cell($widths[2], 6, $d['nama'], 1, 0);
            $pdf->Cell($widths[3], 6, $d['telp'], 1, 0);
            $pdf->Cell($widths[4], 6, $d['alamat'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_customer.pdf', 'I');
    }
}
