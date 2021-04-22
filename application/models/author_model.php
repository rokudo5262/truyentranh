<?php
class author_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('author');
        return $query->result();
    }
	public function update_author($id,$data) {
		$this->db->where('id_author',$id);
		$this->db->update('author',$data);
	}
}