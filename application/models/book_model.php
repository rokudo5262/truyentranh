<?php
class book_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('book')->result_array();
    }
	public function get_book($id) {
		$this->db->where('id_book',$id);
		$this->db->where('deleted',0);
        return $this->db->get('book')->result_array();
    }
	public function add_book($data) {
		$this->db->insert('book',$data);
	}
	public function update_book($id,$data) {
		$this->db->where('id_book',$id);
		$this->db->update('book',$data);
	}
}