<?php
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/10/2018
 * Time: 10:02 PM
 */

class TiposDesafios extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Materia_model','',TRUE);
        $this->load->model('Habilidades_model','',TRUE);
        $this->load->model('Desafios_model','',TRUE);
        $this->load->model('TiposDesafios_model','',TRUE);
        $this->load->model('ModeloDesafio_model','',TRUE);
        $this->load->model('TiposDesafiosModelosDesafios_model','',TRUE);
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

        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['ehCadastroDesafio'] = false;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('cadastro/cadastrodesafios', $data);
        $this->load->view('cadastro/cadastrotipodesafios', $data);
        $this->load->view('footer', $data);
    }

    public function modeloResposta($page = 'home')
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

        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['tipoDesafio'] = $this->TiposDesafios_model->selectUltimoTipoDesafio();
        $data['modelosDesafios'] = $this->ModeloDesafio_model->selectModelosDesafios();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['ehCadastroDesafio'] = false;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('cadastro/cadastrodesafios', $data);
        $this->load->view('cadastro/cadastrotipodesafiosmodeloresposta', $data);
        $this->load->view('footer', $data);
    }

    public function cadastro_tipoDesafio()
    {
        $tipoDesafio = array(
            'nome'=>$this->input->post('reg_nome'),
            'idProfessor'=>$this->session->userdata('user_id'),
            'valorExperiencia'=>$this->input->post('reg_valorExperiencia'),
            'sugestaoBibliografica'=>$this->input->post('reg_sugestaoBibliografica'),
            'descricao'=>$this->input->post('reg_questao')
        );

        $this->TiposDesafios_model->insert($tipoDesafio);
        $this->session->set_flashdata('success_msg', 'Tipo desafio registrado com sucesso!');
        redirect('TiposDesafios/modeloResposta', 'refresh');
    }

    public function cadastro_tipoDesafioModeloResposta()
    {
        redirect('Desafios/view', 'refresh');
    }

    public function adicionarAoModelo()
    {
        $idTipoDesafio = $this->input->post('reg_id');
        $tipoDesafioModeloDesafio = array(
            'idModelosDesafios'=>$this->input->post('reg_inserirmodelo'),
            'idTiposDesafios'=>$idTipoDesafio
        );

        $this->TiposDesafiosModelosDesafios_model->insert($tipoDesafioModeloDesafio);

        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['tipoDesafio'] = $this->TiposDesafios_model->selectUltimoTipoDesafio();
        $data['modelosDesafios'] = $this->ModeloDesafio_model->selectModelosDesafios();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['componentesModelo'] = $this->TiposDesafiosModelosDesafios_model->selectModelosDesafiosPorTiposDesafios($idTipoDesafio);
        $data['ehCadastroDesafio'] = false;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('cadastro/cadastrodesafios', $data);
        $this->load->view('cadastro/cadastrotipodesafiosmodeloresposta', $data);
        $this->load->view('footer', $data);
    }

    public function buscarDesafiosPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByAluno($idAluno);
    }

    public function buscarHabilidadesPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Habilidades_model->selectHabilidadeByProfessor($idProfessor);
    }

    public function buscarTipoDesafioPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->TipoDesafios_model->selectTipoDesafioByProfessor($idProfessor);
    }

    public function buscarMateriasPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->Materia_model->selectNomeByProfessor($idProfessor);
    }

    public function buscarMateriasPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Materia_model->selectMateriaByAluno($idAluno);
    }
}