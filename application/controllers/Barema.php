<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/17/2018
 * Time: 1:02 PM
 */

class Barema extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->model('Materia_model','',TRUE);
        $this->load->model('Habilidades_model','',TRUE);
        $this->load->model('Desafios_model','',TRUE);
        $this->load->model('TiposDesafios_model','',TRUE);
        $this->load->model('Arquivos_model','',TRUE);
        $this->load->model('Respostas_model','',TRUE);
        $this->load->model('Alunos_model','',TRUE);
        $this->load->model('Barema_model','',TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('javascript');
    }

    public function cadastro()
    {
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['tiposDesafios'] = $this->buscarTipoDesafioPorProfessor();

        $idDesafio = $_GET['idDesafio'];

        $data['idDesafio'] = $idDesafio;
        $data['Desafio'] = $this->buscarDesafioParaGerenciar($idDesafio);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('gerenciardesafios', $data);
        $this->load->view('cadastro/cadastrobarema', $data);
        $this->load->view('footer', $data);
    }

    public function adicionarAoBarema()
    {
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['tiposDesafios'] = $this->buscarTipoDesafioPorProfessor();

        $idDesafio  = $this->input->post('reg_idDesafio');
        $data['idDesafio'] = $idDesafio;

        $barema = array(
            'tarefa' => $this->input->post('reg_tarefa'),
            'percentual' => $this->input->post('reg_percentual'),
            'idDesafio' => $idDesafio
        );

        $this->Barema_model->insert($barema);

        $data['Desafio'] = $this->buscarDesafioParaGerenciar($idDesafio);

        $data['componentesBarema'] = $this->Barema_model->selectBaremabyDesafio($idDesafio);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('gerenciardesafios', $data);
        $this->load->view('cadastro/cadastrobarema', $data);
        $this->load->view('footer', $data);
    }

    public function buscarDesafiosPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByAluno($idAluno);
    }

    public function buscarTipoDesafioPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->TiposDesafios_model->selectTipoDesafioByProfessor($idProfessor);
    }

    public function buscarHabilidadesPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Habilidades_model->selectHabilidadeByProfessor($idProfessor);
    }

    public function buscarMateriasPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Materia_model->selectNomeByProfessor($idProfessor);
    }

    public function buscarDesafioParaGerenciar($idDesafio)
    {
        return $this->Desafios_model->selectDesafiosByidParaGerenciar($idDesafio);
    }

    public function buscarDesafiosPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByProfessor($idProfessor);
    }

    public function buscarMateriasPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Materia_model->selectMateriaByAluno($idAluno);
    }
}