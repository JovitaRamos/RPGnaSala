<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/15/2018
 * Time: 9:35 PM
 */

class Respostas_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('respostas',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('respostas', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('respostas');
    }

    public function selectRespostaByAlunoDesafio($idAluno,$idDesafio)
    {
        $this->db->select('r.*');
        $this->db->from('respostas as r');
        $this->db->where('r.idDesafio',$idDesafio);
        $this->db->where('r.idAluno',$idAluno);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

}