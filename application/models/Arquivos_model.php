<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/11/2018
 * Time: 12:10 PM
 */

class Arquivos_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('arquivosAnexo',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('arquivosAnexo', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('arquivosAnexo');
    }

    public function buscarUltimoArquivoCadastrado()
    {
        $this->db->select('id');
        $this->db->from('arquivosAnexo');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectById($id)
    {
        $this->db->select('*');
        $this->db->from('arquivosAnexo');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }
}