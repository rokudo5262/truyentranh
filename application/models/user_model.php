<?php
class user_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('user')->result_array();
    }
	public function get_user($id) {
		$this->db->where('id_user',$id);
		$this->db->where('deleted',0);
        return $this->db->get('user')->result_array();
    }
	public function add_user($data) {
		$this->db->insert('user',$data);
	}
	public function update_user($id,$data) {
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
	}
}