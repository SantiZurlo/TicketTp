<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Cliente extends CI_Controller {
	

		public function _remap($method, $params = array()) {
			if ($method === 'index') {
				redirect(base_url('clientes/'));
			}
			elseif ($method === 'agregar') {
				$this->_insert();
			}
			elseif ($method === 'borrar') {
				$this->_delete($params[0]);
			}
		}


        function _delete($id) {
			if(is_numeric($id)) {
				$this->load->model('UserModel');
				$status = $this->UserModel->delete_client($id);

				if ($status == true) {
					$this->session->set_flashdata('notification', [
						'title' => 'Borrar el Cliente',
						'message' => 'Se ha podido borrar',
						'type' => 'success'
					]);
					redirect(base_url('clientes/'));
				} else {
					$this->session->set_flashdata('notification', [
						'title' => 'Error al borrar el Cliente',
						'message' => 'No se ha podido borrar',
						'type' => 'error'
					]);
					redirect(base_url('clientes/'));
				}
			}
        }

        function _insert() {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("user_name",'User_name','required');
				$this->form_validation->set_rules("email",'Email','required');
				$this->form_validation->set_rules("password",'Password','required');


                if($this->form_validation->run() == TRUE) {
					
					$data = array(
						'user_name'=>$this->input->post('user_name'),
						'email'=>$this->input->post('email'),
						'password'=>$this->input->post('password'),

					);

					$this->load->model('UserModel');
					$this->UserModel->add_client($data);

                    redirect(base_url('clientes'));

                } else {
                    $this->load->view('client/insert');
                }
            } else {
                $this->load->view('client/insert');
            }
        }
    }
?>