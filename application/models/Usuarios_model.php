<?php
/**
 * Created by PhpStorm.
 * User: fgtor
 * Date: 15/08/2018
 * Time: 05:15
 */

class Usuarios_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }
    public function insert($data) {
        return $this->db->insert('usuario',$data);
    }
    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('usuario', $data);
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('usuario');
    }

    public function login_user($email, $senha)
    {
        $sql = "SELECT u.id, u.senha, u.email, u.nome, u.instituicao  FROM usuario as u WHERE u.email LIKE '%" .
            $this->db->escape_like_str($email)."%' ESCAPE '!'";
        $query = $this->db->query($sql);

        $usuario = $query->result_array();

        foreach ($query->result() as $row)
        {
            if(password_verify($senha ,$row->senha))
            {
                return $usuario;
            }
            else{
                return false;
            }
        }
    }

    public function email_check($email)
    {
        $query = $this->selectByEmail($email);

        if($query->result_array()>0){
            return false;
        }else{
            return true;
        }

    }

    public function selectAll()
    {
        $sql = "select * from usuario as u";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByLogin($login)
    {
        $sql = "SELECT * FROM usuario as u WHERE u.login LIKE '%" .
            $this->db->escape_like_str($login)."%' ESCAPE '!'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByEmail($email)
    {
        $sql = "SELECT * FROM usuario as u WHERE u.email LIKE '%" .
            $this->db->escape_like_str($email)."%' ESCAPE '!'";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
}