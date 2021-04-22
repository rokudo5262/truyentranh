<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genre extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('genre_model');
	}
    public function index() {
		$data['genres'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$genres = "select * from genre Where deleted='0'";
			$data['genres'] = $this->truyentranh_model->query($genres);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/genres', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function genre($id) {
		$data['genres'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$genre = "select * from genre Where id_genre=$id and deleted='0' LIMIT 1";
			$data['genre'] = $this->truyentranh_model->query($genre);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/genre_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_genre() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_genre' => $this->input->post('genre'),
				'description_genre' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$check = $this->genre_model->update_genre($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật genre Không thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật genre Thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_genre' 		=> $this->input->post('genre'),
					'description_genre' => $this->input->post('description'),
					'deleted'			=> '1',
					'created_datetime'	=> $this->input->post('created_datetime'),
					'updated_datetime'	=> $datetime,
				);
				$check = $this->genre_model->update_genre($id, $data);
				if ($check) {
					echo "<script>alert('Xóa genre Không thành Công');</script>";
					echo "<script> window.location.href='../admin/genre/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa genre Thành Công');</script>";
					echo "<script> window.location.href='../admin/genres';</script>";
				}
			}
		}
	}
	public function genre_add() {
		$data = array(
			'name_genre' 		=> $this->input->post('genre'),
			'description_genre' => $this->input->post('description'),
		);
		$this->truyentranh_model->insert('genre', $data);
		redirect('admin/genres');
	}
}