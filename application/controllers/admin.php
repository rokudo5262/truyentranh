<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		$this->load->helper('string');
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
		$this->load->library(array('session'));
		$this->load->library("cart");
		$this->load->library("pagination");
		$this->load->library('image_lib');
		$this->load->database();
		$this->load->model('truyentranh_model');
		date_default_timezone_set('asia/ho_chi_minh');
	}
	public function signin()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$signin = "Select * From user Where gmail_user='$email' And password_user='$password' And deleted='0' And admin_user='1'";
		//var_dump($signin);
		//var_dump($password);
		$query = $this->truyentranh_model->query($signin);
		if ($query) {
			foreach ($query as $row) {
				$newdata = array(
					'id_user' => $row['id_user'],
					'name_user' => $row['name_user'],
					'gmail_user' => $row['gmail_user'],
					'password_user' => $row['password_user'],
					'firstname_user' => $row['firstname_user'],
					'middlename_user' => $row['middlename_user'],
					'lastname_user' => $row['lastname_user'],
					'avatar_user' => $row['avatar_user'],
					'deleted' => $row['deleted'],
					'created_datetime' => $row['created_datetime'],
					'updated_datetime' => $row['updated_datetime'],
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
	public function login()
	{
		$this->load->view('admin/login');
	}

	public function signout()
	{
		//removing session  
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	public function register()
	{
		$this->load->view('admin/register');
	}
	public function forgot_password()
	{
		$this->load->view('admin/forgot-password');
	}
	public function dashboard()
	{
		$data['dashboard'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/dashboard', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	// public function index()
	// {
	// 	$data['index']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function charts()
	// {
	// 	$data['charts']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/charts',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function tables()
	// {
	// 	$data['tables']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/tables',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function cards()
	// {
	// 	$data['cards']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/cards',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function buttons()
	// {
	// 	$data['buttons']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/buttons',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function animations()
	// {
	// 	$data['animations']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/utilities-animation',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function borders()
	// {
	// 	$data['borders']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 		$giaodien['content'] = $this->load->view('admin/utilities-border',NULL,TRUE);
	// 		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 		$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function colors()
	// {
	// 	$data['colors']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/utilities-color',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// public function other()
	// {
	// 	$data['other']='active';
	// 	if ($this->session->userdata('id_user')!='')
	// 	{
	// 	$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
	// 	$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
	// 	$giaodien['content'] = $this->load->view('admin/utilities-other',NULL,TRUE);
	// 	$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
	// 	$this->load->view('admin/includes/index',$giaodien);
	// 	}
	// 	else
	// 	{
	// 		echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
	// 		echo "<script> window.location.href='../admin/login';</script>";
	// 		//redirect('admin/login');
	// 	}
	// }
	// ===============================================================================================
	public function books()
	{
		$data['books'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$books = "select * from book Where deleted='0'";
			$data['books'] = $this->truyentranh_model->query($books);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/books', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function book($id)
	{
		$data['books'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$books = "select * from book Where id_book=$id and deleted='0' LIMIT 1";
			$data['books'] = $this->truyentranh_model->query($books);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/book_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function chapters()
	{
		$data['chapters'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/chapters', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	public function pages()
	{
		$data['pages'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	public function rating()
	{
		$data['rating'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/rating', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	public function bookmarks()
	{
		$data['bookmarks'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/bookmarks', NULL, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function authors()
	{
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
			//redirect('admin/login');
		}
	}
	public function author($id)
	{
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
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function artists()
	{
		$data['artists'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$artists = "select * from artist Where deleted='0'";
			$data['artists'] = $this->truyentranh_model->query($artists);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/artists', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function artist($id)
	{
		$data['artists'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$artist = "select * from artist Where id_artist=$id and deleted='0' LIMIT 1";
			$data['artist'] = $this->truyentranh_model->query($artist);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/artist_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function genres()
	{
		$data['genres'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$genres = "select * from genre Where deleted='0'";
			$data['genres'] = $this->truyentranh_model->query($genres);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/genres', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function genre($id)
	{
		$data['genres'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$genre = "select * from genre Where id_genre=$id and deleted='0' LIMIT 1";
			$data['genre'] = $this->truyentranh_model->query($genre);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/genre_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function statuses()
	{
		$data['statuses'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$statuses = "select * from status Where deleted='0'";
			$data['statuses'] = $this->truyentranh_model->query($statuses);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/pages/statuses', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function status($id)
	{
		$data['statuses'] = 'active';
		if ($this->session->userdata('id_user') != '') {
			$status = "select * from status Where id_status=$id and deleted='0' LIMIT 1";
			$data['status'] = $this->truyentranh_model->query($status);
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar', $data, TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar', '', TRUE);
			$giaodien['content'] = $this->load->view('admin/details/status_detail', $data, TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer', NULL, TRUE);
			$this->load->view('admin/includes/index', $giaodien);
		} else {
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function types()
	{
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
			//redirect('admin/login');
		}
	}
	public function type($id)
	{
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
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function users()
	{
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
			//redirect('admin/login');
		}
	}
	public function user($id)
	{
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
			//redirect('admin/login');
		}
	}
	// ===============================================================================================
	public function user_add()
	{
		//$add="INSERT INTO user (`id_user`, `name_user`, `gmail_user`, `password_user`, `firstname_user`, `middlename_user`, `lastname_user`, `avatar_user`, `admin_user`, `deleted`, `created_datetime`, `updated_datetime`) 
		//VALUES (NULL, '', '1234@gmail.com', '12345', 'Trịnh', 'Quang', 'Trường', 'unknow.png', '0', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		$data = array(
			'gmail_user' => $this->input->post('gmail'),
			'password_user' => md5($this->input->post('password')),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('user', $data);
		//var_dump($data);
		redirect('admin/users');
	}
	public function book_add()
	{
		$data = array(
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('user', $data);
		//var_dump($data);
		redirect('admin/users');
	}
	public function genre_add()
	{
		$data = array(
			'name_genre' => $this->input->post('genre'),
			'description_genre' => $this->input->post('description'),
			'description_genre' => $this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('genre', $data);
		//var_dump($data);
		redirect('admin/genres');
	}
	public function author_add()
	{
		$data = array(
			'name_author' => $this->input->post('author'),
			'description_author' => $this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('author', $data);
		//var_dump($data);
		redirect('admin/authors');
	}
	public function artist_add()
	{
		$data = array(
			'name_artist' => $this->input->post('artist'),
			'description_artist' => $this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('artist', $data);
		redirect('admin/artists');
	}
	public function type_add()
	{
		$data = array(
			'name_type' => $this->input->post('type'),
			'description_type' => $this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('type', $data);
		//var_dump($data);
		redirect('admin/types');
	}
	public function status_add()
	{
		$data = array(
			'name_status' => $this->input->post('status'),
			'description_status' => $this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('status', $data);
		//var_dump($data);
		redirect('admin/statuses');
		// if($this->truyentranh_model->insert('status',$data)) // call the method from the model
		// {
		// 	echo "<script> alert('Cập Nhật Thành Công');</script>";
		// 	echo "<script> window.location.href='../admin/statuses';</script>";
		// }
		// else
		// {
		// 	echo "<script> alert('Cập Nhật không Thành Công.');</script>";
		// 	echo "<script> window.location.href='../admin/statuses';</script>";
		// }
	}
	// ===============================================================================================
	public function handle_artist()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_artist'=>$this->input->post('id'),
				'name_artist' => $this->input->post('artist'),
				'description_artist' => $this->input->post('description'),
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
	public function handle_genre()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_genre'=>$this->input->post('id'),
				'name_genre' => $this->input->post('genre'),
				'description_genre' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_genre($id, $data);
			if ($this->truyentranh_model->update_genre($id, $data)) {
				echo "<script>alert('Cập Nhật genre Không thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật genre Thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					//'id_genre'=>$this->input->post('id'),
					'name_genre' => $this->input->post('genre'),
					'description_genre' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_genre($id, $data);
				if ($this->truyentranh_model->update_genre($id, $data)) {
					echo "<script>alert('Xóa genre Không thành Công');</script>";
					echo "<script> window.location.href='../admin/genre/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa genre Thành Công');</script>";
					echo "<script> window.location.href='../admin/genres';</script>";
				}
			}
		}
	}
	public function handle_type()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_type'=>$this->input->post('id'),
				'name_type' => $this->input->post('type'),
				'description_type' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_type($id, $data);
			if ($this->truyentranh_model->update_type($id, $data)) {
				echo "<script>alert('Cập Nhật type Không thành Công');</script>";
				echo "<script> window.location.href='../admin/type/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật type Thành Công');</script>";
				echo "<script> window.location.href='../admin/type/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_type' => $this->input->post('type'),
					'description_type' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_type($id, $data);
				if ($this->truyentranh_model->update_type($id, $data)) {
					echo "<script>alert('Xóa type Không thành Công');</script>";
					echo "<script> window.location.href='../admin/type/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa type Thành Công');</script>";
					echo "<script> window.location.href='../admin/types';</script>";
				}
			}
		}
	}
	public function handle_status()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_status'=>$this->input->post('id'),
				'name_status' => $this->input->post('status'),
				'description_status' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_status($id, $data);
			if ($this->truyentranh_model->update_status($id, $data)) {
				echo "<script>alert('Cập Nhật status Không thành Công');</script>";
				echo "<script> window.location.href='../admin/status/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật status Thành Công');</script>";
				echo "<script> window.location.href='../admin/status/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					//'id_status'=>$this->input->post('id'),
					'name_status' => $this->input->post('status'),
					'description_status' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_status($id, $data);
				if ($this->truyentranh_model->update_status($id, $data)) {
					echo "<script>alert('Xóa status Không thành Công');</script>";
					echo "<script> window.location.href='../admin/status/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa status Thành Công');</script>";
					echo "<script> window.location.href='../admin/statuses';</script>";
				}
			}
		}
	}
	public function handle_user()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_genre'=>$this->input->post('id'),
				'name_genre' => $this->input->post('genre'),
				'description_genre' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_genre($id, $data);
			if ($this->truyentranh_model->update_genre($id, $data)) {
				echo "<script>alert('Cập Nhật genre Không thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật genre Thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_genre' => $this->input->post('genre'),
					'description_genre' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_genre($id, $data);
				if ($this->truyentranh_model->update_genre($id, $data)) {
					echo "<script>alert('Xóa genre Không thành Công');</script>";
					echo "<script> window.location.href='../admin/genre/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa genre Thành Công');</script>";
					echo "<script> window.location.href='../admin/genre';</script>";
				}
			}
		}
	}
	public function handle_book()
	{
		$datetime = date('Y-m-d H:i:s');
		$id = $this->input->post('id');
		if ($_POST["action"] == 'update') {
			$data = array(
				//'id_genre'=>$this->input->post('id'),
				'name_genre' => $this->input->post('genre'),
				'description_genre' => $this->input->post('description'),
				'deleted' => $this->input->post('deleted'),
				'created_datetime' => $this->input->post('created_datetime'),
				'updated_datetime' => $datetime,
			);
			$this->truyentranh_model->update_genre($id, $data);
			if ($this->truyentranh_model->update_genre($id, $data)) {
				echo "<script>alert('Cập Nhật genre Không thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/'.$id;</script>";
			} else {
				echo "<script>alert('Cập Nhật genre Thành Công');</script>";
				echo "<script> window.location.href='../admin/genre/$id';</script>";
			}
		} else {
			if ($_POST["action"] == 'delete') {
				$data = array(
					'name_genre' => $this->input->post('genre'),
					'description_genre' => $this->input->post('description'),
					'deleted' => '1',
					'created_datetime' => $this->input->post('created_datetime'),
					'updated_datetime' => $datetime,
				);
				$this->truyentranh_model->update_genre($id, $data);
				if ($this->truyentranh_model->update_genre($id, $data)) {
					echo "<script>alert('Xóa genre Không thành Công');</script>";
					echo "<script> window.location.href='../admin/genre/'.$id;</script>";
				} else {
					echo "<script>alert('Xóa genre Thành Công');</script>";
					echo "<script> window.location.href='../admin/genre';</script>";
				}
			}
		}
	}
}
