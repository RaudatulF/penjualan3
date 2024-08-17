<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
        $this->load->library('Pdf');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data User',
            'user' => $this->User_model->getAll(),
            'content' => 'user/index'
        );
        $this->load->view('template/menu',$data);
    }
    public function add()
    {
        $data = array(
            'title' => 'Tambah Data User',
            'content' => 'user/add_form'
        );
        $this->load->view('template/menu',$data);
    }

    public function save()
    {
        $this->User_model->Save();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data User Berhasil DiSimpan");
        }
        redirect('user');
    }

    public function getedit($id)
    {
        $data = array(
            'title' => 'Update Data User',
            'user' => $this->User_model->getById($id),
            'content' => 'user/edit_form'
        );
        $this->load->view('template/menu', $data);
    }

    public function edit()
    {
        $this->User_model->editData();
        if($this->db->affected_rows()>0){
            $this->session->set_flashdata("success","Data User Berhasil DiUpdate");
        }
        redirect('user');
    }

    public function delete($id)
    {
        $this->User_model->delete($id);
        redirect('user');
    }

    public function userlap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA USER', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(8, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAMA', 1, 0, 'C');
        $pdf->Cell(60, 6, 'EMAIL', 1, 0, 'C');
        $pdf->Cell(40, 6, 'TELP', 1, 0, 'C');
        $pdf->Cell(43, 6, 'ROLE', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('user')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(8, 6, $i++, 1, 0, 'C');
            $pdf->Cell(37, 6, $d['username'], 1, 0);
            $pdf->Cell(60, 6, $d['email'], 1, 0);
            $pdf->Cell(40, 6, $d['phone'], 1, 0);
            $pdf->Cell(43, 6, $d['role'], 1, 1); 
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_user.pdf', 'I');
    }
}
