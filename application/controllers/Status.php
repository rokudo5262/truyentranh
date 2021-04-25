<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Status extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
    public function index() {
		$data['statuses'] = 'active';
		if ($this->session->userdata()) {
			$data['statuses'] =  $this->status_model->get();
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/statuses', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function status($id) {
		$data['statuses'] = 'active';
		if ($this->session->userdata()) {
			$data['status'] = $this->status_model->get_status($id);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/status_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_status() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_status' => $this->input->post('status'),
				'description_status' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$check = $this->truyentranh_model->update_status($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật status Không thành Công');</script>";
				echo "<script> window.location.href='../admin/status/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật status Thành Công');</script>";
				echo "<script> window.location.href='../admin/status/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_status' => $this->input->post('status'),
					'description_status' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$check = $this->truyentranh_model->update_status($id, $data);
				if ($check) {
					echo "<script>alert('Xóa status Không thành Công');</script>";
					echo "<script> window.location.href='../admin/status/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa status Thành Công');</script>";
					echo "<script> window.location.href='../admin/statuses';</script>";
				}
			}
		}
	}
	public function status_add() {
		$data = array(
			'name_status'			=> $this->input->post('status'),
			'description_status'	=> $this->input->post('description'),
		);
		$check = $this->status_model->add_status($data);
		redirect('admin/statuses');
	}
}