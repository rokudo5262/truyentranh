<?php
class staff_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('staff')->result_array();
    }
	public function get_staff($id) {
		$this->db->where('id_staff',$id);
		$this->db->where('deleted',0);
        return $this->db->get('staff')->result_array();
    }
	public function add_staff($data) {
		$this->db->insert('staff',$data);
	}
	public function update_staff($id,$data) {
		$this->db->where('id_staff',$id);
		$this->db->update('staff',$data);
	}
}