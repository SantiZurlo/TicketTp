<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Registrar extends CI_Controller {
        
        public function index() {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("username",'Username','required');
                $this->form_validation->set_rules("email",'Email','required');
                $this->form_validation->set_rules("password",'Password','required');
                $this->form_validation->set_rules("repassword",'RePassword','required');

                if($this->form_validation->run() == TRUE) {
                    $password = $this->input->post('password');
                    $repassword = $this->input->post('repassword');
                    if(strcmp($password,$repassword) === 0) {
                        $data = array(
                            'user_name'=>$this->input->post('username'),
                            'email'=>$this->input->post('email'),
                            'password'=>sha1($password),
                        );
                        $this->load->model('UserModel');
                        $notification = $this->UserModel->add_client($data);
                        $this->session->set_flashdata('notification', $notification);
                        if(strcmp($notification['type'],'error') === 0) {
                            redirect(base_url('registrar'));
                        } else {
                            redirect(base_url('ingresar'));
                        }
                    } else {
                        $this->session->set_flashdata('notification', [
                            'title' => 'Error al Registrar Usuario',
                            'message' => 'La contraseña y la verificacion de contraseña deben coincidir',
                            'type' => 'error'
                        ]);
                        redirect(base_url('registrar'));
                    }
                } else {
                    $this->session->set_flashdata('notification', [
                        'title' => 'Error al Registrar Usuario',
                        'message' => 'Debe llenar todos los campos del formulario',
                        'type' => 'error'
                    ]);
                    redirect(base_url('registrar'));
                }
            } else {
                $this->load->view('login/register');
            }
        }

    }
?>