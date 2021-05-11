<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Comic extends MY_Controller {
	function __construct() {
		parent::__construct();
	}
    public function index() {
		$data['books'] = 'active';
		if ($this->session->userdata()) {
			$data['books'] =  $this->book_model->get();
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/books', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function comic($id) {
		$data['books'] = 'active';
		if ($this->session->userdata()) {
			$data['book'] = $this->book_model->get_book($id);
			$author = "SELECT * FROM ( ( role INNER JOIN author ON author.id_author = role.id_author ) INNER JOIN book ON book.id_book = role.id_book ) where role.id_book=$id and role.role='0'";
			$data['author'] = $this->truyentranh_model->query($author);
			$artist = "SELECT * FROM ( ( role INNER JOIN author ON author.id_author = role.id_author ) INNER JOIN book ON book.id_book = role.id_book ) where role.id_book=$id and role.role='1'";
			$data['artist'] = $this->truyentranh_model->query($artist);
			$genre = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON book.id_book = genre_book.id_book ) where genre_book.id_book=$id";
			$data['genre'] = $this->truyentranh_model->query($genre);
			$alternative = "SELECT * FROM ( alternative INNER JOIN book ON alternative.id_book = book.id_book ) where alternative.id_book=$id";
			$data['alternative'] = $this->truyentranh_model->query($alternative);
			$chapter = "SELECT * FROM ( chapter INNER JOIN book ON chapter.id_book = book.id_book ) where chapter.id_book=$id";
			$data['chapter'] = $this->truyentranh_model->query($chapter);
			$type = "SELECT * FROM ( book INNER JOIN type ON book.id_type = type.id_type ) where book.id_book=$id";
			$data['type'] = $this->truyentranh_model->query($type);
			$status = "SELECT * FROM ( book INNER JOIN status ON book.id_status = status.id_status ) where book.id_book=$id";
			$data['status'] = $this->truyentranh_model->query($status);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/book_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
		}
	}
	public function handle_book() {
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				'name_book' => $this->input->post('book'),
				'description_book' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$check = $this->book_model->update_book($id, $data);
			if ($check) {
				echo "<script>alert('Cập Nhật book Không thành Công');</script>";
				echo "<script> window.location.href='../admin/book/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật book Thành Công');</script>";
				echo "<script> window.location.href='../admin/book/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_book' => $this->input->post('book'),
					'description_book' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$check = $this->book_model->update_genre($id, $data);
				if ($check) {
					echo "<script>alert('Xóa book Không thành Công');</script>";
					echo "<script> window.location.href='../admin/book/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa book Thành Công');</script>";
					echo "<script> window.location.href='../admin/books';</script>";
				}
			}
		}
	}
}