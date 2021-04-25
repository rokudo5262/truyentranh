<?php
class genre_model extends MY_Model {
	public function __construct() {
		parent::__construct();	
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('genre')->result_array();
    }
	public function get_genre($id) {
		$this->db->where('id_genre',$id);
		$this->db->where('deleted',0);
        return $this->db->get('genre')->result_array();
    }
	public function add_genre($data) {
		$this->db->insert('genre',$data);
	}
	public function update_genre($id,$data) {
		$this->db->where('id_genre',$id);
		$this->db->update('genre',$data);
	}
}