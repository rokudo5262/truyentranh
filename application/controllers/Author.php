<?php

class Author extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('author_model');
	}
	public function index() {
		$data['authors'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$authors = "select * from author Where deleted='0'";
			$data['authors'] = $this->truyentranh_model->query($authors);
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
		if ($this->session->userdata('id_user') != '') {
			$author = "select * from author Where id_author=$id and deleted='0' LIMIT 1";
			$data['author'] = $this->truyentranh_model->query($author);
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
		$this->truyentranh_model->insert('author', $data);
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