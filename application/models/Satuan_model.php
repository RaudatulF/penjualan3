<?php
class Satuan_model extends CI_Model
{
    protected $primary = 'id';
    protected $_table = 'satuan';

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $data = array(
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
        );
        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi'), true),
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Satuan Berhasil DiDelete");
        }
    }
}
