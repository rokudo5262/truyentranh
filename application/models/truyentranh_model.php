<?php
class truyentranh_model extends MY_Model {
	public function __construct() {
		parent::__construct();
	}
	public function query($query) {
		$result=$this->db->query($query);
		return $result->result_array();
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
	public function random() {
		$this->db->where('deleted', 0);
		$this->db->order_by('rand()');
		$this->db->limit(1);
		return $this->db->get('book')->result_array();
	}
	public function get_book_type() {
		$this->db->select('*');    
		$this->db->from('table1');
		$this->db->join('table2', 'table1.id = table2.id');
		$this->db->join('table3', 'table1.id = table3.id');
		return $this->db->get()->result_array();
	}
	public function get_book_genre() {
		$this->db->select('*');    
		$this->db->from('table1');
		$this->db->join('table2', 'table1.id = table2.id');
		$this->db->join('table3', 'table1.id = table3.id');
		return $this->db->get()->result_array();
	}
	public function get_book_book() {
		$this->db->select('*');    
		$this->db->from('table1');
		$this->db->join('table2', 'table1.id = table2.id');
		$this->db->join('table3', 'table1.id = table3.id');
		return $this->db->get()->result_array();
	}
	public function get_chapter_book() {
		$this->db->select('*');    
		$this->db->join('chapter', 'chapter.id_book = book.id_book');
		return $this->db->get('book')->result_array();
	}
}