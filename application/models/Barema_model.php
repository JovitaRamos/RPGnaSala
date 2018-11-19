<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/17/2018
 * Time: 1:07 PM
 */

class Barema_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }
    public function insert($data) {
        return $this->db->insert('barema',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('barema', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('barema');
    }

    public function selectUltimoBaremaInserido() {

        $this->db->select('id,tarefa,percentual');
        $this->db->from('barema');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectBaremabyDesafio($idDesafio)
    {
        $this->db->select('id,tarefa,percentual');
        $this->db->from('barema');
        $this->db->where('idDesafio',$idDesafio);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }
}