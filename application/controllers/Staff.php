<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Staff extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['staffs'] = 'active';
		if ($this->session->userdata()) {
			$data['staffs'] = $this->staff_model->get();
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
		if ($this->session->userdata()) {
			$data['staff'] = $this->staff_model->get_staff($id);
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
		$check = $this->staff_model->add_staff($data);
		redirect('admin/staffs');
	}
}