<?php
	class UserModel extends CI_Model {
		function checkUser($email,$password) {
			$query = $this->db->query("SELECT * from users where email='$email' AND password='$password'");
			if($query->num_rows() == 1) {
				return $query->row();
			}
			else {
				return false;
			}
		}

        public function count_clients() {
            $query = $this->db->get('users');
            return $query->num_rows();
        }
		
		function get_clients($limit, $offset) {
            $this->db->limit($limit, $offset);
			$query = $this->db->get('users');
			return $query->result();
		}
		
		function checkCurrentPassword($currentPassword) {
			$userid = $this->session->userdata('LoginSession')['id'];
			$query = $this->db->query("SELECT * from users WHERE id='$userid' AND password='$currentPassword' ");
			if($query->num_rows() == 1) {
				return true;
			}
			else {
				return false;
			}
		}

		function updatePassword($password) {
			$userid = $this->session->userdata('LoginSession')['id'];
			$query = $this->db->query("update  users set password='$password' WHERE id='$userid' ");
			
		}
	
		/*public function add_client($data) {        
            $consulta = $this->db->insert('users', $data);
        }*/

		public function add_client($data) { 
			$this->db->trans_start();

            $email_exists = $this->db->where('email', $data['email'])->count_all_results('users') > 0;
            $username_exists = $this->db->where('user_name', $data['user_name'])->count_all_results('users') > 0;

            if ($email_exists && $username_exists) {
                $this->db->trans_complete();
                return [
                    'title' => 'Error al Registrar Usuario',
                    'message' => 'El correo y el nombre de usuario ya existen',
                    'type' => 'error'
                ];
            } elseif ($email_exists) {
                $this->db->trans_complete();
                return [
                    'title' => 'Error al Registrar Usuario',
                    'message' => 'El correo ya existe',
                    'type' => 'error'
                ];
            } elseif ($username_exists) {
                $this->db->trans_complete();
                return [
                    'title' => 'Error al Registrar Usuario',
                    'message' => 'El nombre de usuario ya existe',
                    'type' => 'error'
                ];
            } else {
                $this->db->insert('users', $data);
                $this->db->trans_complete();
                return [
                    'title' => 'Exito al Registrar Usuario',
                    'message' => 'Su usuario fue registrado con exito',
                    'type' => 'success'
                ];
            }
        }
	
		function delete_client($id) {
            $this->db->where('id',$id);
            $this->db->delete('users');
            if ($this->db->affected_rows() >= 0) {
                return true; 
            } else {
                return false; 
            }
        }

	}
?>