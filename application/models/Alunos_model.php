<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/4/2018
 * Time: 12:02 PM
 */

class Alunos_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('alunos',$data);
    }

    public function selectAlunoByUsuario($idUsuario, $idMaterias)
    {
        $this->db->select('id');
        $this->db->from('alunos');
        $this->db->where('idUsuario',$idUsuario);
        $this->db->where('idMaterias',$idMaterias);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectAlunosByDesafio($idDesafio)
    {
        $this->db->select('u.nome,a.id');
        $this->db->from('desafios as d');
        $this->db->join('habilidades as h','h.id = d.idHabilidades');
        $this->db->join('habilidades_usuarios as hu','hu.idHabilidades = h.id');
        $this->db->join('alunos as a','a.id = hu.idAluno');
        $this->db->join('usuario as u','u.id = a.idUsuario');
        $this->db->where('d.id',$idDesafio);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }
}