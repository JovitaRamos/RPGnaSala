<?php
/**
 * Created by PhpStorm.
 * User: fgtor
 * Date: 15/08/2018
 * Time: 05:15
 */

class Materia_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }
    public function insert($data) {
        return $this->db->insert('materias',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('materias', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('materias');
    }

    public function selectAll()
    {
        $sql = "select * from materias as m";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectBycodMateria($codMateria)
    {
        $this->db->select('*');
        $this->db->from('materias');
        $this->db->where('codMateria',$codMateria);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }

    public function selectByidMateria($idMateria)
    {
        $this->db->select('*');
        $this->db->from('materias');
        $this->db->where('id',$idMateria);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }
    
    public function countByIdMateria($idMateria)
    {
        $this->db->from('materias');
        $this->db->join('alunos','alunos.idMaterias = materias.id');
        $this->db->where('materias.id',$idMateria);
        return $this->db->count_all_results();
    }

    public function selectNomeByProfessor($idProfessor)
    {
        $this->db->select('*');
        $this->db->from('materias');
        $this->db->where('idProfessor',$idProfessor);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectMateriaByAluno($idAluno)
    {
        $this->db->select('materias.*');
        $this->db->from('materias');
        $this->db->join('alunos','alunos.idMaterias = materias.id');
        $this->db->where('alunos.idUsuario',$idAluno);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectMateriaByUsuario($idUsuario)
    {
        $this->db->select('m.nome as NomeMateria');
        $this->db->select('m.id as idMateria');
        $this->db->select('m.idHabilidades as idHabilidadesMateria');
        $this->db->select('hu.experiencia as Experiencia');
        $this->db->select('hu.nivel as Nivel');
        $this->db->select('h.nome as NomeHabilidades');
        $this->db->select('h.id as idHabilidades');
        $this->db->select('m.codMateria as codMateria');
        $this->db->from('materias as m');
        $this->db->join('alunos as a','a.idMaterias = m.id');
        $this->db->join('habilidades as h','h.id = m.idHabilidades');
        $this->db->join('habilidades_usuarios as hu','hu.idHabilidades = m.idHabilidades');
        $this->db->where('a.idUsuario',$idUsuario);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }
    }

    public function selectByNome($nome)
    {
        $sql = "SELECT * FROM materias as m WHERE m.nome LIKE '%" .
            $this->db->escape_like_str($nome)."%' ESCAPE '!'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function selectByIdAlunoAndIdMateria($idAluno, $idMateria)
    {
        $this->db->select('materias.*');
        $this->db->from('materias');
        $this->db->join('alunos','alunos.idMaterias = materias.id');
        $this->db->where('alunos.idUsuario',$idAluno);
        $this->db->where('materias.id',$idMateria);

        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }
    }
}