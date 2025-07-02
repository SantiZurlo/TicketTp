<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Espectaculos extends CI_Controller {
		
		public function index($offset=0) {
			if ($this->session->userdata('LoginSession')) {
				if ($this->session->userdata('LoginSession')['type'] == "employee") {
					$this->_employee($offset);
				} else {
					$this->_client();
				}
			} else {
				$this->_client();
			}
		}

		public function _client() {
			$limit = 9;
			$offset = 0;

			$this->load->model('ProductModel');
			$data['products'] = $this->ProductModel->get_more_products($limit, $offset);
			$this->load->view('product/all', $data);
		}

		public function _employee($offset) {
			$this->load->library('pagination');

			$this->load->model('ProductModel');
			$config['base_url'] = base_url('espectaculos/index/');
			$config['total_rows'] = $this->ProductModel->count_products();
			$config['per_page'] = 10;

			$this->pagination->initialize($config);

			$data['products'] = $this->ProductModel->get_more_products($config['per_page'], $offset);
			$this->load->view('product/all-admin', $data);
		}

		public function cargar_mas() {
			$offset = $this->input->post('offset');
			$limit = 9;
	
			$this->load->model('ProductModel');
			$data = $this->ProductModel->get_more_products($limit, $offset);
	
			echo json_encode($data);
		}

	}
?>

