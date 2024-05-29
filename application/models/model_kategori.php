<?php
class model_kategori extends CI_Model
{
    public function data_bolu()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Bolu'));
    }

    public function data_donat()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Donat'));
    }
    public function data_cake()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Cake'));
    }
    public function data_idul_fitri()
    {
        return $this->db->get_where('tb_barang', array('kategori' => 'Idul Fitri'));
    }
}
