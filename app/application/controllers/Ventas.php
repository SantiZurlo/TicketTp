<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ventas extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            // Cargamos el modelo de ventas
            $this->load->model('SalesModel');
        }
        
        public function index($offset=0) {
            if ($this->session->userdata('LoginSession')) {
                if ($this->session->userdata('LoginSession')['type'] == "employee") {
                    $this->_employee($offset);
                } else {
                    $this->_client($offset);
                }
            } else {
                redirect(base_url(''));
            }
        }

        public function _employee($offset) {
            $this->load->library('pagination');
			
			$this->load->model('SalesModel');
			$config['base_url'] = base_url('ventas/index/');
			$config['total_rows'] = $this->SalesModel->count_sales();
			$config['per_page'] = 10;

			$this->pagination->initialize($config);

            $data['sales'] = $this->SalesModel->get_sales($config['per_page'], $offset);
            $this->load->view('sales/index', $data);
        }

        public function _client($offset) {
            $id = $this->session->userdata('LoginSession')['id'];

            $this->load->library('pagination');
			
			$this->load->model('SalesModel');
			$config['base_url'] = base_url('ventas/index/');
			$config['total_rows'] = $this->SalesModel->count_sales_of($id);
			$config['per_page'] = 10;

			$this->pagination->initialize($config);

            $data['sales'] = $this->SalesModel->get_sales_of($config['per_page'], $offset, $id);
            $this->load->view('sales/index', $data);
        }
    }

?>