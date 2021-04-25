<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['users'] = 'active';
		if ($this->session->userdata()) {
			$data['users'] = $this->user_model->get();
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['conwtent'] = $this->load->view('admin/pages/users', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function user($id) {
		$data['users'] = 'active';
		if ($this->session->userdata()) {
			$data['user'] = $this->user_model->get_user($id);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/user_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_user() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_user' => $this->input->post('user'),
				'description_user' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$check = $this->truyentranh_model->update_user($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật user Không thành Công');</script>";
				echo "<script> window.location.href='../admin/user/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật user Thành Công');</script>";
				echo "<script> window.location.href='../admin/user/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_user' => $this->input->post('user'),
					'description_user' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$check = $this->truyentranh_model->update_user($id, $data);
				if ($check) {
					echo "<script>alert('Xóa user Không thành Công');</script>";
					echo "<script> window.location.href='../admin/user/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa user Thành Công');</script>";
					echo "<script> window.location.href='../admin/user';</script>";
				}
			}
		}
	}
	public function user_add() {
		$data = array(
			'gmail_user'	=> $this->input->post('gmail'),
			'password_user' => md5($this->input->post('password')),
		);
		$check = $this->user_model->add_user($data);
		redirect('admin/users');
	}
}