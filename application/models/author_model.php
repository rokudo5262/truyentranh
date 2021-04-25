<?php
class author_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('author')->result_array();
    }
	public function get_author($id) {
		$this->db->where('id_author',$id);
		$this->db->where('deleted',0);
        return $this->db->get('author')->result_array();
    }
	public function add_author($data) {
		$this->db->insert('author',$data);
	}
	public function update_author($id,$data) {
		$this->db->where('id_author',$id);
		$this->db->update('author',$data);
	}
}