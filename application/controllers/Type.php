<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Type extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		$data['types'] = 'active';
		if ($this->session->userdata()) {
			$data['types'] =  $this->type_model->get();
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
		if ($this->session->userdata()) {
			$data['type'] =  $this->type_model->get_type($id);
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
		$check = $this->type_model->add_type($data);
		redirect('admin/types');
	}
}