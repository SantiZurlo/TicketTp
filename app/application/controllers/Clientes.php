<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Clientes extends CI_Controller {

        public function index($offset=0) {
            if ($this->session->userdata('LoginSession')) {
                if ($this->session->userdata('LoginSession')['type'] == "employee") {
                    $this->_employee($offset);
                } else {
                    redirect(base_url(''));
                }
            } else {
                redirect(base_url(''));
            }
        }

        public function _employee($offset) {
			$this->load->library('pagination');
			
			$this->load->model('UserModel');
			$config['base_url'] = base_url('clientes/index/');
			$config['total_rows'] = $this->UserModel->count_clients();
			$config['per_page'] = 10;

			$this->pagination->initialize($config);

			$data['clients'] = $this->UserModel->get_clients($config['per_page'], $offset);
			$this->load->view('clients/index', $data);
		}
    } 
?>