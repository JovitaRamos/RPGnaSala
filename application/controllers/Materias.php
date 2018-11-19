<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Materia_model','',TRUE);
        $this->load->model('Alunos_model','',TRUE);
        $this->load->model('Habilidades_model','',TRUE);
        $this->load->model('Desafios_model','',TRUE);
        $this->load->model('Habilidades_Usuarios_model','',TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('javascript');
        //$this->load->library('jquery');
    }

    public function view($page = 'home')
    {
        if(!$this->session->userdata('user_id'))
        {
            redirect('Usuario/login_view', 'refresh');
        }
        $idUsuario = $this->session->userdata('user_id');
        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();

        //$habilidadesUsuario = $this->Habilidades_Usuarios_model->selectByidUsuario($idUsuario);
        $data['dadosAluno'] = $this->Materia_model->selectMateriaByUsuario($idUsuario);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('home', $data);
        $this->load->view('footer', $data);
    }

    public function cadastro_materia()
    {
        $materia = array(
            'nome'=>$this->input->post('reg_nome'),
            'codMateria'=>$this->input->post('reg_codMateria'),
            'quantidadeAlunos'=>$this->input->post('reg_quantidadeAlunos'),
            'idProfessor'=>$this->session->userdata('user_id'),
            'objetivo'=>$this->input->post('reg_objetivo')
            //,'instituicao'=>$this->input->post('reg_instituicao')
        );
        $this->Materia_model->insert($materia);
        $this->session->set_flashdata('success_msg', 'Materia registrada com sucesso!');
        redirect('Materias/view', 'refresh');
    }

    public function atualizar_materia()
    {
        $materia = array(
            'nome'=>$this->input->post('reg_nome'),
            'codMateria'=>$this->input->post('reg_codMateria'),
            'quantidadeAlunos'=>$this->input->post('reg_quantidadeAlunos'),
            'objetivo'=>$this->input->post('reg_objetivo')
        );
        $this->Materia_model->update($this->input->post('reg_id'),$materia);
        $this->session->set_flashdata('success_msg', 'Materia registrada com sucesso!');
        redirect('Materias/view', 'refresh');
    }

    public function gerenciar()
    {
        if(!$this->session->userdata('user_id'))
        {
            redirect('Usuario/login_view', 'refresh');
        }

        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['Materia'] = $this->buscarMateriasPorId();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('gerenciarmateria', $data);
        $this->load->view('footer', $data);
    }

    public function buscarMateriasPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Materia_model->selectNomeByProfessor($idProfessor);
    }

    public function buscarMateriasPorId()
    {
        return $this->Materia_model->selectByidMateria($_GET['id']);
    }

    public function buscarMateriasPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Materia_model->selectMateriaByAluno($idAluno);
    }

    public function buscarDesafiosPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByAluno($idAluno);
    }

    public function inscreverAlunoMateria()
    {
        $idUsuario = $this->session->userdata('user_id');
        $idMaterias = $this->input->post('reg_idMateria');

        $aluno = array(
            'idMaterias'=>$idMaterias,
            'idUsuario'=>$idUsuario
        );
        $this->Alunos_model->insert($aluno);

        $idAluno = $this->Alunos_model->selectAlunoByUsuario($idUsuario,$idMaterias);

        $habilidadeAluno = array(
            'idHabilidades'=>$this->input->post('reg_idHabilidades'),
            'idAluno'=>$idAluno->id
        );
        $this->Habilidades_Usuarios_model->insert($habilidadeAluno);
        $this->session->set_flashdata('success_msg', 'Materia registrada com sucesso!');
        redirect('Materias/view', 'refresh');
    }

    public function buscarMateriasPorCodigo()
    {
        $codMateria = $this->input->post('reg_codMateria');

        $materia = $this->Materia_model->selectBycodMateria($codMateria);
        $data['nomemateria'] = $materia->nome;
        $data['objetivomateria'] = $materia->objetivo;
        $data['idmateria'] = $materia->id;
        $data['idHabilidades'] = $materia->idHabilidades;
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['user_name'] = $this->session->userdata('user_name');


        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view("inscricaomateria.php", $data);
        $this->load->view('footer', $data);
    }

    public function cadastroMateria_view()
    {
        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['user_name'] = $this->session->userdata('user_name');
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        //$data['Materia'] = $this->buscarMateriasPorId();

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view("cadastro/cadastromateria.php", $data);
        $this->load->view('footer', $data);
    }

    public function inscricaoMateria_view()
    {
        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['user_name'] = $this->session->userdata('user_name');
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view("inscricaomateria.php", $data);
        $this->load->view('footer', $data);
    }

}