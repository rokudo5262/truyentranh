<?php
class truyentranh_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function query($query) {
		$result=$this->db->query($query);
		return $result->result_array();
	}
	public function insert($table,$data) {
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	public function check($gmail) {
	    $this->db->select('*'); 
	    $this->db->from('user');
	    $this->db->where('gmail_user', $gmail);
	    $query = $this->db->get();
	    return $query->result_array();
	}
	public function limit($select,$table,$where,$order,$limit) {
		$result = $this->db->select($select)->from($table)->where($where)->order_by($order,'desc')->limit($limit)->get();
		return $result->result_array();
	}
}