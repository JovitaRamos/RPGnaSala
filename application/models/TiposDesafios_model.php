<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/10/2018
 * Time: 9:59 PM
 */

class TiposDesafios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('tiposDesafios',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('tiposDesafios', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tiposDesafios');
    }

    public function selectUltimoTipoDesafio()
    {
        $this->db->select('id, nome, descricao, valorExperiencia, sugestaoBibliografica');
        $this->db->from('tiposDesafios');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectTipoDesafioByProfessor($idProfessor)
    {
        $this->db->select('nome,id');
        $this->db->from('tiposDesafios');
        $this->db->where('idProfessor',$idProfessor);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

}