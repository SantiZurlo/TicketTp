<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Venta extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            // Cargamos el modelo de ventas
            $this->load->model('SalesModel');
        }
        
        public function index() {
            if ($this->session->userdata('LoginSession')) {
                if ($this->session->userdata('LoginSession')['type'] == "employee") {
                    redirect(base_url('ventas'));
                } else {
                    $this->_reserve();
                }
            } else {
                redirect(base_url(''));
            }
        }

        function _reserve() {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("user_id",'User_id','required');
                $this->form_validation->set_rules("product_id",'Product_id','required');
                $this->form_validation->set_rules("units",'Units','required');

                if($this->form_validation->run() == TRUE) {
                    date_default_timezone_set('America/Argentina/Buenos_Aires');
					
					$data = array(
                        'id_product'=>$this->input->post('product_id'),
						'id_user'=>$this->input->post('user_id'),
                        'units'=>$this->input->post('units'),
						'date'=>date('Y-m-d H:i:s'),
					);

					$status = $this->SalesModel->add_sale($data);

                    if ($status == true) {
                        $this->session->set_flashdata('notification', [
							'title' => 'Reserva de Tickets',
							'message' => 'Se ha realizado la reserva',
							'type' => 'success'
						]);
                        redirect(base_url('ventas'));
                    } else {
                        $this->session->set_flashdata('notification', [
							'title' => 'Error al reservar Tickets',
							'message' => 'Se han agotado los Tickets',
							'type' => 'error'
						]);
                        redirect(base_url('espectaculo/'.$data['id_product']));
                    }

                } else {
                    redirect(base_url('espectaculo/'.$data['product_id']));
                }
            } else {
                redirect(base_url('espectaculo/'.$data['product_id']));
            }
        }
    }

?>