<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Author extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['authors'] = 'active';
		if ($this->session->userdata()) {
			$data['authors'] = $this->author_model->get();
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/authors', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function author($id) {
		$data['authors'] = 'active';
		if ($this->session->userdata()) {
			$data['author'] = $this->author_model->get_author($id);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/author_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function author_add() {
		$data = array(
			'name_author' => $this->input->post('author'),
			'description_author' => $this->input->post('description'),
		);
		$check = $this->author_model->add_author($data);
		redirect('admin/authors');
	}
	public function handle_author() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_author' => $this->input->post('author'),
				'description_author' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_artist($id, $data);
			if ($this->truyentranh_model->update_artist($id, $data)) {
				echo "<script>alert('Cập Nhật Artist Không thành Công');</script>";
				echo "<script> window.location.href='../admin/artist/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật Artist Thành Công');</script>";
				echo "<script> window.location.href='../admin/artist/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_artist' => $this->input->post('artist'),
					'description_artist' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_artist($id, $data);
				if ($this->truyentranh_model->update_artist($id, $data)) {
					echo "<script>alert('Xóa Artist Không thành Công');</script>";
					echo "<script> window.location.href='../admin/artist/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa Artist Thành Công');</script>";
					echo "<script> window.location.href='../admin/artists';</script>";
				}
			}
		}
	}
}