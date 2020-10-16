<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
		$this->load->library(array('session'));
		$this->load->library("cart");
		$this->load->library("pagination");
		$this->load->library('image_lib');
		$this->load->database();
	}
	public function signin()
	{
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$signin="Select * From admin Where gmail_admin='$email' And password_admin='$password'";
		//var_dump($signin);
		$query = $this->truyentranh_model->query($signin);
		if($query)
		{
			foreach($query as $row)
			{
				$newdata = array
				(
					'id_admin'=>$row['id_admin'],
					'name_admin'=>$row['name_admin'],
					'gmail_admin' =>$row['gmail_admin'],
					'password_admin' => $row['password_admin'],
					'gmail_admin' =>$row['gmail_admin'],
					'password_admin' => $row['password_admin'],
				);
				$this->session->set_userdata($newdata); 
			}
			echo "<script> alert('Đăng Nhập Thành Công');</script>";     
			redirect('admin/dashboard');
		}
		else
		{
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
        redirect("login");  

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
		if ($this->session->userdata('id_admin')!='')
		{
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
			$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
			$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			redirect('login');
		}
	}
	public function index()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function charts()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/charts',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function tables()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/tables',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function cards()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/cards',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function buttons()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/buttons',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function animation()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-animation',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function border()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-border',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function color()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-color',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function books()
	{
		$books="select * from book";
		$data['books']=$this->truyentranh_model->query($books);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/books',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function authors()
	{
		$authors="select * from author";
		$data['authors']=$this->truyentranh_model->query($authors);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/authors',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function artists()
	{
		$artists="select * from artist";
		$data['artists']=$this->truyentranh_model->query($artists);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/artists',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function genres()
	{
		$genres="select * from genre";
		$data['genres']=$this->truyentranh_model->query($genres);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/genres',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function status()
	{
		$statuses="select * from status";
		$data['statuses']=$this->truyentranh_model->query($statuses);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/statuses',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function users()
	{
		$users="select * from user";
		$data['users']=$this->truyentranh_model->query($users);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/users',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
}
