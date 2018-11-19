<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/11/2018
 * Time: 5:12 PM
 */

class ModeloDesafio_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('modeloDesafio',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('modeloDesafio', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('modeloDesafio');
    }

    public function selectModelosDesafios()
    {
        $this->db->select('id,nome,componente');
        $this->db->from('modeloDesafio');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }
}