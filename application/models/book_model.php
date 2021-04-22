<?php
class book_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('book');
        return $query->result();
    }
	public function update_book($id,$data) {
		$this->db->where('id_book',$id);
		$this->db->update('book',$data);
	}
}