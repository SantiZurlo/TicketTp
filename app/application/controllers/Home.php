<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
        
        public function index() {
            $this->load->model('ProductModel');
            $data['products']= $this->ProductModel->get_last_five_products();

            $this->load->model('SalesModel');
            $data['top_products'] = $this->SalesModel->getTopSellingProducts();

            $this->load->view('home/index', $data);
        }
        
    }
?>