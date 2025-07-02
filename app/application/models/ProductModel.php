<?php
    class ProductModel extends CI_Model {
        function __construct() { 
            parent::__construct();
        }

        public function add_product($data) {        
            $consulta = $this->db->insert('products', $data);
        }
        
        public function get_products() {
            $this->db->select('p.*, coalesce(sum(s.units), 0) as units_sold');
            $this->db->from('products as p');

            $this->db->join('sales as s', 'p.id = s.id_product', 'left');

            $this->db->group_by('p.id');
            $this->db->order_by("p.id", "desc");

            $query=$this->db->get();

            return $query->result();
        }

        public function count_products() {
            $query = $this->db->get('products');
            return $query->num_rows();
        }

        public function get_more_products($limit, $offset) {
            $this->db->limit($limit, $offset);
            $this->db->select('p.*, coalesce(sum(s.units), 0) as units_sold');
            $this->db->from('products as p');

            $this->db->join('sales as s', 'p.id = s.id_product', 'left');

            $this->db->group_by('p.id');
            $this->db->order_by("p.id", "desc");

            $query=$this->db->get();

            $products = $query->result();

            foreach ($products as $product) {
                $date = new DateTimeImmutable($product->date);
                $product->formatted_date = $date->format("j/m H:i A");
                $product->page_url = base_url() . "espectaculo/" . $product->id;
                $product->image_url = base_url() . "uploads/products/" . $product->image;
            }

            return $products;
        }

        public function get_last_five_products() {
            $this->db->select('p.*, coalesce(sum(s.units), 0) as units_sold');
            $this->db->from('products as p');

            $this->db->join('sales as s', 'p.id = s.id_product', 'left');

            $this->db->group_by('p.id');
            $this->db->order_by("p.id", "desc");
            $this->db->limit('5');

            $query=$this->db->get();

            return $query->result();
        }

        public function get_product($id) {
            $this->db->select('p.*, coalesce(sum(s.units), 0) as units_sold');
            $this->db->from('products as p');
            $this->db->where('p.id', $id);

            $this->db->join('sales as s', 'p.id = s.id_product', 'left');

            $this->db->group_by('p.id');

            $query=$this->db->get();

            return $query->row();
        }

        function update_product($data, $id) {
            $this->db->where('id', $id);
            $this->db->update('products', $data);
            if ($this->db->affected_rows() >= 0) {
                return true; 
            } else {
                return false; 
            }
        }

        function delete_product($id) {
            $this->db->where('id',$id);
            $this->db->delete('products');
            if ($this->db->affected_rows() >= 0) {
                return true; 
            } else {
                return false; 
            }
        }
    }
?>













 
