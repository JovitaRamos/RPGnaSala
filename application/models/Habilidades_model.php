<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/4/2018
 * Time: 4:27 PM
 */

class Habilidades_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('habilidades',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('habilidades', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('habilidades');
    }

    public function selectHabilidadeByProfessor($idProfessor)
    {
        $this->db->select('habilidades.nome,habilidades.id');
        $this->db->from('habilidades');
        $this->db->join('materias','habilidades.id = materias.idHabilidades');
        $this->db->where('materias.idProfessor',$idProfessor);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectHabilidadeByUsuario($idUsuario)
    {
        $this->db->select('h.nome,h.id');
        $this->db->from('habilidades as h');
        $this->db->join('habilidades_usuarios as hu','hu.idHabilidades = h.id');
        $this->db->join('alunos as a','a.id = hu.idAluno');
        $this->db->join('usuario as u','u.id = a.idUsuario');
        $this->db->where('u.id',$idUsuario);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function buscarUltimaHabilidadeCadastrada()
    {
        $this->db->select('id');
        $this->db->from('habilidades');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }
}