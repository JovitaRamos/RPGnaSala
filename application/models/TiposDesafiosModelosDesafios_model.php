<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/11/2018
 * Time: 5:30 PM
 */

class TiposDesafiosModelosDesafios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }
    public function insert($data) {
        return $this->db->insert('tiposDesafiosModelosDesafios',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('tiposDesafiosModelosDesafios', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tiposDesafiosModelosDesafios');
    }

    public function selectModelosDesafiosPorTiposDesafios($idTiposDesafios)
    {
        $this->db->select('TDMD.id');
        $this->db->select('M.componente');
        $this->db->from('tiposDesafiosModelosDesafios as TDMD');
        $this->db->join('modeloDesafio as M','TDMD.idModelosDesafios = M.id');
        $this->db->where('TDMD.idTiposDesafios',$idTiposDesafios);
        $this->db->order_by('TDMD.id');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }
}