<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function signin() {
		$gmail = $this->input->post('gmail');
		$password = md5($this->input->post('password'));
		$query = $this->admin_model->user_signin($gmail,$password);
		if ($query) {
			foreach ($query as $row) {
				$newdata = array(
					'id_user'		=> $row['id_user'],
					'name_user'		=> $row['name_user'],
					'gmail_user'	=> $row['gmail_user'],
					'password_user' => $row['password_user'],
					'summary_user'	=> $row['summary_user']
				);
				$this->session->set_userdata($newdata);
			}
			redirect('main/index');
		} else {
			echo "<script> alert('Đăng nhập không thành công');</script>";
			echo "<script> window.location.href='../main/index';</script>";
		}
	}
	public function signout() {
		$check = $this->session->sess_destroy();
		redirect('main/index');
	}
	public function signup() {
		$gmail = $this->input->post('gmail');
		$count = count($this->truyentranh_model->check($gmail));
		if (empty($count)) {
			$data = array(
				'gmail_user' => $this->input->post('gmail'),
				'name_user' => $this->input->post('gmail'),
				'password_user' => md5($this->input->post('password'))
			);
			$this->truyentranh_model->insert('user', $data);
			echo "<script> alert('Đăng ký thành công');</script>";
			echo "<script> window.location.href='../main/index';</script>";
		} else {
			echo "<script> alert('Đăng ký không thành công gmail đã tồn tại');</script>";
			echo "<script> window.location.href='../main/index';</script>";
		}
	}
	public function index() {
		$data['book']	= $this->book_model->get();
		$data['random'] 		= $this->truyentranh_model->random();
		$data['type'] 			= $this->type_model->get();
		$data['status'] 		= $this->status_model->get();
		$data['genre'] 			= $this->genre_model->get();
		$data['user']  			= $this->user_model->get();
		$giaodien['header'] 	= $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] 	= $this->load->view('home/includes/footer', $data, TRUE);
		$giaodien['body'] 		= $this->load->view('home/pages/trangchu', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function canhan() {
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] = $this->load->view('home/pages/trangchu', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function timkiemnangcao() {
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] = $this->load->view('home/pages/trangchu', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function genre($id = '') {
		$genre_book = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_genre = $id";
		$data['genre_book'] = $this->truyentranh_model->query($genre_book);
		$book_genre = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_book = $id";
		$data['book_genre'] = $this->truyentranh_model->query($book_genre);
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$data['id_genre'] 	= $this->genre_model->get_genre($id);
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] 	= $this->load->view('home/pages/genre', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function status($id = '') {
		$genre_book = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_genre = $id";
		$data['genre_book'] = $this->truyentranh_model->query($genre_book);
		$book_genre = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_book = $id";
		$data['book_genre'] = $this->truyentranh_model->query($book_genre);
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$data['id_status'] 	= $this->status_model-->get_status($id);
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] 	= $this->load->view('home/pages/status', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function detail($id = '') {
		$data['book'] = $this->book_model->get_book($id);
		//
		$author = "SELECT * FROM ( ( role INNER JOIN author ON author.id_author = role.id_author ) INNER JOIN book ON book.id_book = role.id_book ) where role.id_book=$id and role.role='0'";
		$data['book_author'] = $this->truyentranh_model->query($author);
		//
		$artist = "SELECT * FROM ( ( role INNER JOIN author ON author.id_author = role.id_author ) INNER JOIN book ON book.id_book = role.id_book ) where role.id_book=$id and role.role='1'";
		$data['book_artist'] = $this->truyentranh_model->query($artist);
		//
		$genre = "SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON book.id_book = genre_book.id_book ) where genre_book.id_book=$id";
		$data['book_genre'] = $this->truyentranh_model->query($genre);
		//
		$alternative = "SELECT * FROM ( alternative INNER JOIN book ON alternative.id_book = book.id_book ) where alternative.id_book=$id";
		$data['alternative'] = $this->truyentranh_model->query($alternative);
		//
		$chapter = "SELECT * FROM ( chapter INNER JOIN book ON chapter.id_book = book.id_book ) where chapter.id_book=$id";
		$data['chapter'] = $this->truyentranh_model->query($chapter);
		//
		$type = "SELECT * FROM ( book INNER JOIN type ON book.id_type = type.id_type ) where book.id_book=$id";
		$data['book_type'] = $this->truyentranh_model->query($type);
		//
		$status = "SELECT * FROM ( book INNER JOIN status ON book.id_status = status.id_status ) where book.id_book=$id";
		$data['book_status'] = $this->truyentranh_model->query($status);
		//
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] = $this->load->view('home/pages/detail', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
	public function doctruyen($id = '') {
		$page = "Select * from page where id_chapter=$id";
		$data['page'] = $this->truyentranh_model->query($page);
		$chapter_page = "SELECT * FROM chapter INNER JOIN page ON chapter.id_chapter = page.id_chapter WHERE chapter.id_chapter=$id";
		$data['chapter_page'] = $this->truyentranh_model->query($chapter_page);
		$chapter_book = "SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book where id_chapter=$id";
		$data['chapter_book'] = $this->truyentranh_model->query($chapter_book);
		foreach ($data['chapter_book'] as $row) {
			$newdata = $row['id_book'];
		}
		$chapter_book = "SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book where chapter.id_book=$newdata order by created_datetime desc";
		$data['chapter_book'] = $this->truyentranh_model->query($chapter_book);
		$data['random'] 	= $this->truyentranh_model->random();
		$data['type'] 		= $this->type_model->get();
		$data['status'] 	= $this->status_model->get();
		$data['genre'] 		= $this->genre_model->get();
		$data['user']  		= $this->user_model->get();
		$giaodien['header'] = $this->load->view('home/includes/header', $data, TRUE);
		$giaodien['footer'] = $this->load->view('home/includes/footer', NULL, TRUE);
		$giaodien['body'] = $this->load->view('home/pages/trangchu', $data, TRUE);
		$this->load->view('home/includes/master', $giaodien);
	}
}
