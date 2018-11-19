<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Usuarios_model');
        $this->load->library('session');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[8]');
    }

	public function index()
	{
        $this->load->view("login.php");
	}

    public function register_user()
    {
        $options = array("cost"=>4);
        $user = array(
            'nome'=>$this->input->post('reg_nome'),
            'email'=>$this->input->post('reg_email'),
            'senha'=>password_hash($this->input->post('reg_senha'),PASSWORD_BCRYPT,$options),
            'instituicao'=>$this->input->post('reg_instituicao'),
            'whatsapp'=>$this->input->post('reg_whatsapp')
        );

        if(filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
            $this->Usuarios_model->insert($user);
            $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            redirect('Usuario/login_view');
        }
        else{
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
    }

    public function login_view()
    {
        $this->load->view("login.php");
    }

    public function register_view()
    {
        $this->load->view("register.php");
    }

    public function forgotpassword_view()
    {
        $this->load->view("forgotpassword.php");
    }

	public function actlogin()
    {
        $user_login = array(
            'email'=>$this->input->post('email'),
            'senha'=>$this->input->post('senha')
        );

        $data = $this->Usuarios_model->login_user($user_login['email'],$user_login['senha']);

        if($data)
        {
            $this->session->set_userdata('user_id',$data[0]['id']);
            $this->session->set_userdata('user_email',$data[0]['email']);
            $this->session->set_userdata('user_name',$data[0]['nome']);
            $this->session->set_userdata('user_instituicao',$data[0]['instituicao']);

            redirect('Materias/view');
            //$this->load->view('painel');
        }
        else{
            $this->session->set_flashdata('msg-error', 'Error occured,Try again.');
            $this->load->view("login.php");
        }
    }

    public function user_logout(){

        $this->session->sess_destroy();
        redirect('user/login_view', 'refresh');
    }
}
