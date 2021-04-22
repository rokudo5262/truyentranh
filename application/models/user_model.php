<?php
class user_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	function get() {
        $query = $this->db->get('user');
        return $query->result();
	}
	public function update_user($id,$data) {
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
	}
}