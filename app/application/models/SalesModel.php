<?php
    class SalesModel extends CI_Model {
        function __construct() { 
            parent::__construct();
        }

        public function add_sale($data) {        
            $this->db->trans_start();

            $query = $this->db->query("
                SELECT p.units, COALESCE(SUM(s.units), 0) as total_units_sold 
                FROM products as p 
                LEFT JOIN sales as s ON p.id = s.id_product 
                WHERE p.id = ? 
                GROUP BY p.id 
                FOR UPDATE", [$data['id_product']]);

            $result = $query->row();

            if (($result->total_units_sold + (int) $data['units']) > $result->units) {
                $this->db->trans_complete();
                return false;
            } else {
                $this->db->insert('sales', $data);
                $this->db->trans_complete();
                return true;
            }
        }

        public function count_sales() {
            $query = $this->db->get('sales');
            return $query->num_rows();
        }
        
        public function get_sales($limit, $offset) {
            $this->db->limit($limit, $offset);
            $this->db->select('s.id, s.id_product, p.name, u.user_name, s.units, s.date, p.price, p.date as product_date');
            $this->db->from('sales as s');

            $this->db->join('users as u', 's.id_user = u.id');
            $this->db->join('products as p', 's.id_product = p.id');

            $this->db->order_by("s.id", "desc");

            $query=$this->db->get();

            return $query->result();
        }

        public function count_sales_of($id) {
            $this->db->from('sales as s');
            $this->db->where('s.id_user', $id);

            $query = $this->db->get();
            
            return $query->num_rows();
        }

        public function get_sales_of($limit, $offset, $id) {
            $this->db->limit($limit, $offset);
            $this->db->select('s.id, s.id_product, p.name, u.user_name, s.units, s.date, p.price, p.date as product_date');
            $this->db->from('sales as s');
            $this->db->where('s.id_user', $id);

            $this->db->join('users as u', 's.id_user = u.id');
            $this->db->join('products as p', 's.id_product = p.id');

            $this->db->order_by("s.id", "desc");

            $query=$this->db->get();

            return $query->result();
        }

        public function getTopSellingProducts() {
            $this->db->select('products.*, SUM(sales.units) as units_sold');
            $this->db->from('sales');
            $this->db->join('products', 'sales.id_product = products.id');
            $this->db->group_by('products.id, products.name, products.image, products.date, products.price');
            $this->db->order_by('units_sold', 'DESC');
            $this->db->limit(6);
            $query = $this->db->get();
            return $query->result();
        }
    }
?>