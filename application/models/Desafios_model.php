<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/9/2018
 * Time: 11:22 AM
 */

class Desafios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('desafios',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('desafios', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('desafios');
    }

    public function selectDesafiosByProfessor($idProfessor)
    {
        $this->db->select('d.nome,d.id');
        $this->db->from('desafios as d');
        $this->db->join('habilidades as h','h.id = d.idHabilidades');
        $this->db->where('h.idProfessor',$idProfessor);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectMateriaByDesafio($idDesafio)
    {
        $this->db->select('m.id');
        $this->db->from('desafios as d');
        $this->db->join('habilidades as h','h.id = d.idHabilidades');
        $this->db->join('materias as m','m.idHabilidades  = h.id');
        $this->db->where('d.id',$idDesafio);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectDesafiosByAluno($idAluno)
    {
        $this->db->select('d.nome,d.id');
        $this->db->from('desafios as d');
        $this->db->join('habilidades as h','h.id = d.idHabilidades');
        $this->db->join('habilidades_usuarios as hu','hu.idHabilidades = h.id');
        $this->db->join('alunos as a','a.id = hu.idAluno');
        $this->db->where('a.idUsuario',$idAluno);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectDesafiosByid($idDesafio)
    {
        $this->db->select('*');
        $this->db->from('desafios as d');
        $this->db->join('tiposDesafios as td','td.id = d.idTipo');
        $this->db->join('tiposDesafiosModelosDesafios as tdmd','tdmd.idTiposDesafios  = td.id');
        $this->db->join('modeloDesafio as m','m.id = tdmd.idModelosDesafios ');
        $this->db->where('d.id',$idDesafio);
        $this->db->order_by('tdmd.id');

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectDesafiosByidParaGerenciar($idDesafio)
    {
        $this->db->select('*');
        $this->db->from('desafios as d');
        $this->db->join('tiposDesafios as td','td.id = d.idTipo');
        $this->db->join('tiposDesafiosModelosDesafios as tdmd','tdmd.idTiposDesafios  = td.id');
        $this->db->where('d.id',$idDesafio);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }
}