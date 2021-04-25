<?php
class status_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('status')->result_array();
    }
	public function get_status($id) {
		$this->db->where('id_status',$id);
		$this->db->where('deleted',0);
        return $this->db->get('status')->result_array();
    }
	public function add_status($data) {
		$this->db->insert('status',$data);
	}
	public function update_status($id,$data) {
		$this->db->where('id_status',$id);
		$this->db->update('status',$data);
	}
}