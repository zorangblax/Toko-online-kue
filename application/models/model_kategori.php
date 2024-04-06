<?php
class model_kategori extends CI_Model
{
    public function data_elektronik()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'elektronik'));
    }

    public function data_pakaian_pria()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'pakaian pria'));
    }
}
