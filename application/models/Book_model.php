<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();  
    }
    public function get_books() {
        $query = $this->db->get('books');
        return $query->result_array(); 
    }
    public function get_book($id) {
        $query = $this->db->get_where('books', array('id' => $id));
        return $query->row_array();  
    }
    public function create_book($data) {
        return $this->db->insert('books', $data);  
    }

    public function update_book($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('books', $data);  
    }
    public function delete_book($id) {
        return $this->db->delete('books', array('id' => $id)); 
    }
}
