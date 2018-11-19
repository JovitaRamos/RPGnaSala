<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/13/2018
 * Time: 9:05 PM
 */

class Habilidades_Usuarios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('habilidades_usuarios',$data);
    }
    public function update($idAluno,$idHabilidade,$data) {
        $this->db->where('idAluno', $idAluno);
        $this->db->where('idHabilidades', $idHabilidade);
        return $this->db->update('habilidades_usuarios', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('habilidades_usuarios');
    }

    public function selectByidAlunoHabilidade($idAluno,$idHabilidade)
    {
        $this->db->select('*');
        $this->db->from('habilidades_usuarios');
        $this->db->where('idAluno',$idAluno);
        $this->db->where('idHabilidades',$idHabilidade);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectByidUsuarioHabilidade($idUsuario,$idHabilidade)
    {
        $this->db->select('*');
        $this->db->from('habilidades_usuarios as hu');
        $this->db->join('alunos as a','a.id = hu.idAluno');
        $this->db->where('a.idUsuario',$idUsuario);
        $this->db->where('hu.idHabilidades',$idHabilidade);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectByidUsuario($idUsuario)
{
    $this->db->select('hu.*,h.nome');
    $this->db->from('habilidades_usuarios as hu');
    $this->db->join('habilidades as h','h.id = hu.idHabilidades');
    $this->db->join('alunos as a','a.id = hu.idAluno');
    $this->db->where('a.idUsuario',$idUsuario);
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->result_array();
        return $row;
    }
}

}