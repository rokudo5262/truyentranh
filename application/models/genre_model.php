<?php
class genre_model extends MY_Model {
	public function __construct() {
		parent::__construct();	
	}
	function get() {
        $query = $this->db->get('genre');
        return $query->result();
    }
	public function update_genre($id,$data) {
		$this->db->where('id_genre',$id);
		$this->db->update('genre',$data);
	}
}