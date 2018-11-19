<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Yan Jovita
 * Date: 11/9/2018
 * Time: 11:21 AM
 */

class Desafios extends CI_Controller
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
        $this->load->model('Barema_model','',TRUE);
        $this->load->model('Habilidades_Usuarios_model','',TRUE);
        $this->load->model('Alunos_model','',TRUE);
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
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['tiposDesafios'] = $this->buscarTipoDesafioPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['ehCadastroDesafio'] = true;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('cadastro/cadastrodesafios', $data);
        $this->load->view('footer', $data);
    }

    public function gerenciar($page = 'home')
    {
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['ehCadastroDesafio'] = true;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('buscardesafios', $data);
        $this->load->view('footer', $data);
    }

    public function buscarDesafioGerenciar()
    {
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['tiposDesafios'] = $this->buscarTipoDesafioPorProfessor();

        $idDesafio  = $this->input->post('reg_desafio');

        $data['idDesafio'] = $idDesafio;
        $data['Desafio'] = $this->buscarDesafioParaGerenciar($idDesafio);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('gerenciardesafios', $data);
        $this->load->view('footer', $data);
    }

    public function resolver()
    {
        $idDesafio = $_GET['id'];

        $data['desafiosResolver'] = $this->buscarDesafioPorId($idDesafio);
        $data['idDesafio'] = $idDesafio;
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['componentesBarema'] = $this->Barema_model->selectBaremabyDesafio($idDesafio);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('resolverdesafios', $data);
        $this->load->view('footer', $data);
    }

    public function corrigir($page = 'home')
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
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $data['ehCorrigir'] = true;

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('buscardesafios', $data);
        $this->load->view('footer', $data);
    }

    public function buscarAlunosDesafio()
    {

        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();
        $idDesafio = $this->input->post('reg_desafio');

        $data['idDesafio'] = $idDesafio;
        $data['AlunosDesafios'] = $this->buscarAlunosPorDesafio($idDesafio);

        $this->load->view('header', $data);
        $this->load->view('leftpainel', $data);
        $this->load->view('buscardesafios', $data);
        $this->load->view('footer', $data);
    }

    public function buscarRespostaAlunosDesafio()
    {
        $data['title'] = 'RPGnaSala';
        $data['materias'] = $this->buscarMateriasPorProfessor();
        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();

        $idDesafio = $this->input->post('reg_desafios');
        $idAluno = $this->input->post('reg_aluno');

        $data['idDesafio'] = $idDesafio;
        $data['idAluno'] = $idAluno;
        $data['componentesBarema'] = $this->Barema_model->selectBaremabyDesafio($idDesafio);
        $resposta = $this->Respostas_model->selectRespostaByAlunoDesafio($idAluno, $idDesafio);
        if ($resposta != null)
        {
            $data['resposta'] = $resposta->respostas;
            $this->load->view('header', $data);
            $this->load->view('leftpainel', $data);
            $this->load->view('respostadesafios', $data);
            $this->load->view('baremaDesafio', $data);
            $this->load->view('footer', $data);
        }
    }

    public function corrigirDesafio()
    {
        $idDesafio = $this->input->post('reg_idDesafio');
        $idAluno = $this->input->post('reg_idAluno');
        $componentesBarema = $this->Barema_model->selectBaremabyDesafio($idDesafio);
        $percentual = 0;
        foreach ($this->input->post() as $barema=>$value):
            foreach ($componentesBarema as $componenteBarema):
                if (('reg_check'.$componenteBarema['id'])==$barema)
                {
                    $percentual += $componenteBarema['percentual'];
                }
                endforeach;
        endforeach;

            $desafio = $this->buscarDesafioPorId($idDesafio);
            $experiencia = $desafio[0]['valorExperiencia']*($percentual/100);
            $idHabilidade = $desafio[0]['idHabilidades'];
            $habilidadesAluno = $this->Habilidades_Usuarios_model->selectByidAlunoHabilidade($idAluno,$idHabilidade);

            //nivel 5 conclui habilidade
            //500xp passa de nível
            $habilidadesAluno->experiencia += $experiencia;
            if($habilidadesAluno->experiencia >= 500)
            {
                $habilidadesAluno->nivel += 1;
                $habilidadesAluno->experiencia -= 500;
            }
        $this->Habilidades_Usuarios_model->update($idAluno,$idHabilidade,$habilidadesAluno);
    }

    public function salvar_resolucao()
    {
        $idYoutube = 0;
        $idArq = 0;
        $idTitulo = 0;
        $idTexto = 0;

        $resposta = array();

        foreach ($this->input->post() as $respostas=>$value):
            switch ($respostas)
            {
                case 'Youtube'.$idYoutube:
                    $idYoutube = $idYoutube +1;
                    array_push($resposta,'<div class="row form-group">');
                    array_push($resposta,'<iframe width="560" height="315" src="https://www.youtube.com/embed/');
                    array_push($resposta,$this->formatarLinkYoutube($value));
                    array_push($resposta,'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                    array_push($resposta, '</div><br>');
                    break;
                case 'Titulo'.$idTitulo:
                    $idTitulo = $idTitulo +1;
                    array_push($resposta,'<div class="card-header"><strong>');
                    array_push($resposta, $value);
                    array_push($resposta, '</strong></div><br>');
                    break;
                case 'Texto'.$idTexto:
                    $idTexto = $idTexto +1;
                    $texto = str_replace("\n", '<br />',  $value);
                    array_push($resposta,'<div class="row form-group"><p>');
                    array_push($resposta,$texto);
                    array_push($resposta, '</p></div><br>');
                    break;
            }
            endforeach;
        $codResposta = "";
        foreach($resposta as $dado):
            $codResposta .= $dado;
        endforeach;
        if(!isset($idArquivo))
        {
            $config['allowed_types'] = 'jpg|png|pdf|xlsx|xls';
            $config['upload_path'] = './uploads/';
            $config['encrypt_name'] = true;
            $this->load->library('upload',$config);

            if ($this->upload->do_upload('Arquivo'.$idArq)){
                $data = array('upload_data' => $this->upload->data());
                $arquivo = $data['upload_data'];
                $arquivosAnexo = array(
                    'nomeAntigo'=>$arquivo['orig_name'],
                    'nomeNovo'=>$arquivo['file_name'],
                    'tipo' => $arquivo['file_ext']
                );
                $this->Arquivos_model->insert($arquivosAnexo);
                $id = $this->Arquivos_model->buscarUltimoArquivoCadastrado();
                $idArquivoSalvar = $id->id;
                array_push($resposta,'<br><form method="post" enctype="multipart/form-data" class="form-horizontal">');
                array_push($resposta,'<div class="login-button">');
                array_push($resposta,'<button type="submit" formaction="');
                array_push($resposta,base_url("index.php/Desafios/downloadArquivo"));
                array_push($resposta,'" class="btn btn-primary btn-sm">');
                array_push($resposta,'<i class="fa fa-dot-circle-o"></i> Baixar Arquivo Resposta');
                array_push($resposta,'</button>');
                array_push($resposta,'</div>');
                array_push($resposta,'<input type="hidden" id="reg_idArquivo" name="reg_idArquivo" value="');
                array_push($resposta,$idArquivoSalvar);
                array_push($resposta,'"></form> <br>');
            }
            else{
                $idArquivoSalvar = null;
            }
        }
                        $idDesafio = $this->input->post('reg_id');
                        $idMateria = $this->Alunos_model->Desafios_model->selectMateriaByDesafio($idDesafio);
                        $aluno = $this->Alunos_model->selectAlunoByUsuario($this->session->userdata('user_id'),$idMateria->id);
                        $respostaSalvar= array(
                            'idAluno' => $aluno->id,
                            'idDesafio' => $idDesafio,
                            'respostas' => $codResposta,
                            'idArquivo' => $idArquivoSalvar
                        );

                        $this->Respostas_model->insert($respostaSalvar);

                        $data['resposta'] = $codResposta;
                        $data['title'] = 'RPGnaSala';//ucfirst($page); // Capitalize the first letter
                        $data['materias'] = $this->buscarMateriasPorProfessor();
                        $data['materiasAluno'] = $this->buscarMateriasPorAluno();
                        $data['habilidades'] = $this->buscarHabilidadesPorProfessor();
                        $data['Desafios'] = $this->buscarDesafiosPorProfessor();
                        $data['desafiosAluno'] = $this->buscarDesafiosPorAluno();

                        $this->load->view('header', $data);
                        $this->load->view('leftpainel', $data);
                        $this->load->view('respostadesafios', $data);
                        $this->load->view('footer', $data);
    }

    public function formatarLinkYoutube($linkFormatar)
    {
        $link = substr($linkFormatar,8+strpos($linkFormatar, "watch?v="));
        return $link;
    }

    public function buscarDesafiosPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Desafios_model->selectDesafiosByAluno($idAluno);
    }

    public function cadastro_desafio()
    {

        $config['allowed_types'] = 'jpg|png|pdf|xlsx|xls';
        $config['upload_path'] = './uploads/';
        $config['encrypt_name'] = true;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('file-input')){
            $data = array('upload_data' => $this->upload->data());
            $arquivo = $data['upload_data'];
            $arquivosAnexo = array(
                'nomeAntigo'=>$arquivo['orig_name'],
                'nomeNovo'=>$arquivo['file_name'],
                'tipo' => $arquivo['file_ext']
            );
            $this->Arquivos_model->insert($arquivosAnexo);
            $id = $this->Arquivos_model->buscarUltimoArquivoCadastrado();
            $idArquivo = $id->id;
        }
        else{
            $idArquivo = null;
        }

        $desafio = array(
            'nome'=>$this->input->post('reg_nome'),
            'questao'=>$this->input->post('reg_questao'),
            'dataInicio'=>$this->input->post('reg_dataInicio'),
            'dataFim'=>$this->input->post('reg_dataFim'),
            'idTipo'=>$this->input->post('reg_tipoDesafio'),
            'idHabilidades'=>$this->input->post('reg_habilidades'),
            'idArquivo' => $idArquivo,
        );
        $this->Desafios_model->insert($desafio);
        $this->session->set_flashdata('success_msg', 'Materia registrada com sucesso!');
        redirect('Materias/view', 'refresh');
    }

    public function buscarTipoDesafioPorProfessor()
    {
        $idProfessor = $this->session->userdata('user_id');
        return $this->TiposDesafios_model->selectTipoDesafioByProfessor($idProfessor);
    }

    public function buscarAlunosPorDesafio($idDesafio)
    {
        return $this->Alunos_model->selectAlunosByDesafio($idDesafio);
    }

    public function buscarDesafioPorId($idDesafio)
    {
        return $this->Desafios_model->selectDesafiosByid($idDesafio);
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

    public function downloadArquivo()
    {
        $fileInfo = $this->Arquivos_model->selectById($this->input->post('reg_idArquivo'));
        if($fileInfo != null)
        {
            $file = 'uploads/'.$fileInfo->nomeNovo;
            force_download($file, NULL);
        }
    }

    public function downloadArquivoResposta()
    {

        $fileInfo = $this->Arquivos_model->selectById($this->input->post('reg_idArquivo'));
        print_r($fileInfo);
        $file = 'uploads/'.$fileInfo->nomeNovo;

        force_download($file, NULL);
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

    public function buscarMateriasPorAluno()
    {
        $idAluno = $this->session->userdata('user_id');
        return $this->Materia_model->selectMateriaByAluno($idAluno);
    }
}