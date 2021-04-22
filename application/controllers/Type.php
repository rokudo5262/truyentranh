<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('type_model');
	}
	public function index() {
		$data['types'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$types = "select * from type Where deleted='0'";
			$data['types'] = $this->truyentranh_model->query($types);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/types', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function type($id) {
		$data['types'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$type = "select * from type Where id_type=$id and deleted='0' LIMIT 1";
			$data['type'] = $this->truyentranh_model->query($type);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/type_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_type() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_type' 		=> $this->input->post('type'),
				'image_type' 		=> $this->input->post('image'),
				'description_type' 	=> $this->input->post('description'),
				'deleted' 			=> $this->input->post('deleted'),
				'created_datetime' 	=> $this->input->post('created_datetime'),
				'updated_datetime' 	=> $datetime,
			);
			$check = $this->type_model->update_type($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật type Không thành Công');</script>";
				echo "<script> window.location.href='../admin/type/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật type Thành Công');</script>";
				echo "<script> window.location.href='../admin/type/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_type'			=> $this->input->post('type'),
					'image_type' 		=> $this->input->post('image'),
					'description_type'	=> $this->input->post('description'),
					'deleted'			=> '1',
					'created_datetime'	=> $this->input->post('created_datetime'),
					'updated_datetime'	=> $datetime,
				);
				$check = $this->type_model->update_type($id, $data);
				if ($check) {
					echo "<script>alert('Xóa type Không thành Công');</script>";
					echo "<script> window.location.href='../admin/type/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa type Thành Công');</script>";
					echo "<script> window.location.href='../admin/types';</script>";
				}
			}
		}
	}
	public function type_add() {
		$data = array(
			'name_type' => $this->input->post('type'),
			'description_type' => $this->input->post('description'),
		);
		$this->truyentranh_model->insert('type', $data);
		redirect('admin/types');
	}
}