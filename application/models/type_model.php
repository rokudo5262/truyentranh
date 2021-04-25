<?php
class type_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function get() {
		$this->db->where('deleted',0);
        return $this->db->get('type')->result_array();
    }
	public function get_type($id) {
		$this->db->where('id_type',$id);
		$this->db->where('deleted',0);
        return $this->db->get('type')->result_array();
    }
	public function add_type($data) {
		$this->db->insert('type',$data);
	}
    public function update_type($id,$data) {
		$this->db->where('id_type',$id);
		$this->db->update('type',$data);
	}
}