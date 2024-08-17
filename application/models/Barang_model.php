<?php
class Barang_model extends CI_Model
{
    protected $primary = 'id';
    protected $_table = 'barang';

    public function getAll()
    {
        $sql = "SELECT a.id, a.barcode,a.nama,b.nama AS kategori,c.nama AS satuan,a.harga_beli,a.harga_jual,a.stok FROM ((barang a LEFT JOIN kategori b ON a.kategori_id = b.id) LEFT JOIN satuan c ON a.satuan_id = c.id);";
        return $this->db->query($sql)->result();
    }

    public function save()
    {
        $data = array(
            'barcode' => htmlspecialchars($this->input->post('barcode'), true),
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'harga_jual' => htmlspecialchars($this->input->post('harga_jual'), true),
            'harga_beli' => htmlspecialchars($this->input->post('harga_beli'), true),
            'stok' => htmlspecialchars($this->input->post('stok'), true),
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
            'barcode' => htmlspecialchars($this->input->post('barcode'), true),
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'harga_jual' => htmlspecialchars($this->input->post('harga_jual'), true),
            'harga_beli' => htmlspecialchars($this->input->post('harga_beli'), true),
            'stok' => htmlspecialchars($this->input->post('stok'), true),
        );
        return $this->db->set($data)->where($this->primary, $id)->update($this->_table);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data Barang Berhasil DiDelete");
        }
    }
}

