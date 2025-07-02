<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ingresar extends CI_Controller {
        
        public function index() {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("email",'Email','required');
                $this->form_validation->set_rules("password",'Password','required');

                if($this->form_validation->run() == TRUE) {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $encrypPassword = sha1($password);
                    $this->load->model('UserModel');
                    $status = $this->UserModel->checkUser($email,$encrypPassword);
                    if($status!=false) {
                        $data = array(
                            'username'=>$status->user_name,
                            'email'=>$status->email,
                            'id'=>$status->id,
                            'type'=>$status->type,
                        );
                        $this->session->set_userdata('LoginSession',$data);
                        redirect(base_url(''));

                    } else {
                        $this->session->set_flashdata('notification', [
                            'title' => 'Error al Iniciar Sesión',
                            'message' => 'El Correo o la Contraseña es incorrecto',
                            'type' => 'error'
                        ]);
                        redirect(base_url('ingresar'));
                    }
                } else {
                    $this->session->set_flashdata('notification', [
                        'title' => 'Error al Iniciar Sesión',
                        'message' => 'Debe llenar todos los campos del formulario',
                        'type' => 'error'
                    ]);
                    redirect(base_url('ingresar'));
                }
            } else {
                $this->load->view('login/login');
            }
        }

        public function logout() {
            session_unset();
            session_destroy();
            redirect(base_url(''));
        }
    }
?>