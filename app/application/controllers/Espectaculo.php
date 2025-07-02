<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Espectaculo extends CI_Controller {

		public function _remap($method, $params = array())
		{
			if ($method === 'index') {
				redirect(base_url('espectaculos/'));
			}
			elseif ($method === 'agregar') {
				if ($this->session->userdata('LoginSession')) {
					if ($this->session->userdata('LoginSession')['type'] == "employee") {
						$this->_insert();
					} else {
						redirect(base_url(''));
					}
				} else {
					redirect(base_url(''));
				}
			}
			elseif ($method === 'editar') {
				if ($this->session->userdata('LoginSession')) {
					if ($this->session->userdata('LoginSession')['type'] == "employee") {
						$this->_update($params[0]);
					} else {
						redirect(base_url(''));
					}
				} else {
					redirect(base_url(''));
				}
			}
			elseif ($method === 'borrar') {
				if ($this->session->userdata('LoginSession')) {
					if ($this->session->userdata('LoginSession')['type'] == "employee") {
						$this->_delete($params[0]);
					} else {
						redirect(base_url(''));
					}
				} else {
					redirect(base_url(''));
				}
			}
			else {
				$this->_detail($method);
			}
		}

		function _insert() {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("name",'Name','required');
                $this->form_validation->set_rules("date",'Date','required');
				$this->form_validation->set_rules("description",'Description','required');
				$this->form_validation->set_rules("units",'Units','required');
				$this->form_validation->set_rules("price",'Price','required');
				$this->form_validation->set_rules("longitude",'Longitude','required');
				$this->form_validation->set_rules("latitude",'Latitude','required');

                if($this->form_validation->run() == TRUE) {
					
					$data = array(
						'name'=>$this->input->post('name'),
						'date'=>$this->input->post('date'),
						'description'=>$this->input->post('description'),
						'units'=>$this->input->post('units'),
						'price'=>$this->input->post('price'),
						'longitude'=>$this->input->post('longitude'),
						'latitude'=>$this->input->post('latitude'),
					);

					if(!empty($_FILE['imagefile']['name'])) {
						$data["image"] = "no_image.jpg";
					} {
						$config['upload_path'] = './uploads/products/';
						$config['allowed_types'] = 'jpg|png';

						$this->load->library("upload", $config);

						if($this->upload->do_upload("imagefile")) {
							$data["image"] = $this->upload->data("file_name");
						} else {
							$this->upload->display_errors();
							$data["image"] = "no_image.jpg";
						}
					};

					$this->load->model('ProductModel');
					$this->ProductModel->add_product($data);

                    redirect(base_url('espectaculos'));

                } else {
                    $this->load->view('product/insert');
                }
            } else {
                $this->load->view('product/insert');
            }
        }

		function _update($id) {
			$this->load->model('ProductModel');
			$data['product'] = $this->ProductModel->get_product($id);

            if($_SERVER['REQUEST_METHOD']=='POST') {
                $this->form_validation->set_rules("name",'Name','required');
                $this->form_validation->set_rules("date",'Date','required');
				$this->form_validation->set_rules("description",'Description','required');
				$this->form_validation->set_rules("units",'Units','required');
				$this->form_validation->set_rules("price",'Price','required');
				$this->form_validation->set_rules("longitude",'Longitude','required');
				$this->form_validation->set_rules("latitude",'Latitude','required');

                if($this->form_validation->run() == TRUE) {
					
					$new_data = array(
						'name'=>$this->input->post('name'),
						'date'=>$this->input->post('date'),
						'description'=>$this->input->post('description'),
						'units'=>$this->input->post('units'),
						'price'=>$this->input->post('price'),
						'longitude'=>$this->input->post('longitude'),
						'latitude'=>$this->input->post('latitude'),
					);

					if(!empty($_FILE['imagefile']['name'])) {
						$new_data["image"] = $data['product']['image'];
					} {
						$config['upload_path'] = './uploads/products/';
						$config['allowed_types'] = 'jpg|png';

						$this->load->library("upload", $config);

						if($this->upload->do_upload("imagefile")) {
							$new_data["image"] = $this->upload->data("file_name");
						} else {
							$this->upload->display_errors();
							$new_data["image"] = $data['product']->image;
						}
					};

					$status = $this->ProductModel->update_product($new_data, $id);
					if ($status == true) {
						$this->session->set_flashdata('notification', [
							'title' => 'Actualizar Espectáculo',
							'message' => 'Se ha podido actualizar',
							'type' => 'success'
						]);
						redirect(base_url('espectaculo/editar/'.$id));
					} else {
						$this->session->set_flashdata('notification', [
							'title' => 'Error al actualizar el Espectáculo',
							'message' => 'No se ha podido actualizar',
							'type' => 'error'
						]);
						$this->load->view('product/update', $data);
					}

                } else {
                    $this->load->view('product/update', $data);
                }
            } else {
                $this->load->view('product/update', $data);
            }
        }

		function _delete($id) {
			if(is_numeric($id)) {
				$this->load->model('ProductModel');
				$status = $this->ProductModel->delete_product($id);

				if ($status == true) {
					$this->session->set_flashdata('notification', [
						'title' => 'Borrar el Espectáculo',
						'message' => 'Se ha podido borrar',
						'type' => 'success'
					]);
					redirect(base_url('espectaculos/'));
				} else {
					$this->session->set_flashdata('notification', [
						'title' => 'Error al borrar el Espectáculo',
						'message' => 'No se ha podido borrar',
						'type' => 'error'
					]);
					redirect(base_url('espectaculos/'));
				}
			}
		}

		function _detail($id) {
			$this->load->model('ProductModel');
			$data['product'] = $this->ProductModel->get_product($id);

			$this->load->view('product/detail', $data);
		}

	}
?>

