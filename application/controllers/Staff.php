<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('truyentranh_model');
		$this->load->model('staff_model');
	}
	public function signin() {
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$signin = $this->admin_model->signin($email,$password);
		if ($signin) {
			foreach ($signin as $row) {
				$newdata = array(
					'id_staff' => $row['id_staff'],
					'name_staff' => $row['name_staff'],
					'gmail_staff' => $row['gmail_staff'],
					'password_staff' => $row['password_staff'],
				);
				$this->session->set_userdata($newdata);
			}
			echo "<script> alert('Đăng Nhập Thành Công');</script>";
			redirect('admin/dashboard');
		} else {
			echo "<script> alert('Đăng Nhập Không Thành Công');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function login() {
		$this->load->view('admin/login');
	}
	public function signout() {
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	public function register() {
		$this->load->view('admin/register');
	}
	public function forgot_password() {
		$this->load->view('admin/forgot-password');
	}
	public function dashboard() {
		$data['dashboard'] = 'active';
		if ($this->session->userdata('id_staff') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/dashboard', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	public function index() {
		$data['staffs'] = 'active';
		if ($this->session->userdata('id_staff') != '') {
			$staffs = "select * from staff Where deleted='0'";
			$data['staffs'] = $this->truyentranh_model->query($staffs);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/staffs', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function staff($id) {
		$data['staffs'] = 'active';
		if ($this->session->userdata('id_staff') != '') {
			$staff = "select * from staff Where id_staff=$id and deleted='0'";
			$data['staff'] = $this->truyentranh_model->query($staff);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/staff_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_staff() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_staff' => $this->input->post('staff'),
				'description_staff' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$check = $this->truyentranh_model->update_staff($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật staff Không thành Công');</script>";
				echo "<script> window.location.href='../admin/staff/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật staff Thành Công');</script>";
				echo "<script> window.location.href='../admin/staff/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_staff' => $this->input->post('staff'),
					'description_staff' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$check = $this->truyentranh_model->update_staff($id, $data);
				if ($check) {
					echo "<script>alert('Xóa staff Không thành Công');</script>";
					echo "<script> window.location.href='../admin/staff/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa staff Thành Công');</script>";
					echo "<script> window.location.href='../admin/staff';</script>";
				}
			}
		}
	}
	public function staff_add() {
		$data = array(
			'gmail_staff'	=> $this->input->post('gmail'),
			'password_staff' => md5($this->input->post('password')),
		);
		$this->truyentranh_model->insert('staff', $data);
		redirect('admin/staffs');
	}
}