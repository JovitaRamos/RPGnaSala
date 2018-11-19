<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/4/2018
 * Time: 4:27 PM
 */

class Habilidades extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Materia_model','',TRUE);
        $this->load->model('Habilidades_model','',TRUE);
        $this->load->model('Desafios_model','',TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('javascript');
    }

    public function view($page = 'home')
    {
        if(!$this->session->userdata('user_id'))
        {
            redirect('Usuario/login_view', 'refresh');
        }

        if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('cadastro/cadastrohabilidades', $data);
        $this->load->view('footer', $data);
    }

    public function cadastro_habilidade()
    {
        $habilidade = array(
            'nome'=>$this->input->post('reg_nome'),
            'descricao'=>$this->input->post('reg_descricao'),
            'idProfessor'=>$this->session->userdata('user_id')
        );

        $this->Habilidades_model->insert($habilidade);
        $idHabilidade = $this->Habilidades_model->buscarUltimaHabilidadeCadastrada();
        $materia = array(
            'idHabilidades' =>  $idHabilidade->id
        );
        $idMateria = $this->input->post('reg_materia');
        $this->Materia_model->update($idMateria, $materia);

        $this->session->set_flashdata('success_msg', 'Materia registrada com sucesso!');
        redirect('Materias/view', 'refresh');
    }

    public function buscarMateriasPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Materia_model->selectNomeByProfessor($idProfessor);
    }

    public function buscarDesafiosPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByAluno($idAluno);
    }

    public function buscarMateriasPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Materia_model->selectMateriaByAluno($idAluno);
    }
}