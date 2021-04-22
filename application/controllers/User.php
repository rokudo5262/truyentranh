<?php

class User extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index() {
		$data['users'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$users = "select * from user Where deleted='0'";
			$data['users'] = $this->truyentranh_model->query($users);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/users', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function user($id) {
		$data['users'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$user = "select * from user Where id_user=$id and deleted='0' LIMIT 1";
			$data['user'] = $this->truyentranh_model->query($user);
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
			$this->truyentranh_model->update_user($id, $data);
			if ($this->truyentranh_model->update_user($id, $data)) {
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
				$this->truyentranh_model->update_user($id, $data);
				if ($this->truyentranh_model->update_user($id, $data)) {
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
		$this->truyentranh_model->insert('user', $data);
		redirect('admin/users');
	}
}