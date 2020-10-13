<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation'));
		$this->load->library(array('session'));
		$this->load->library("cart");
		$this->load->library("pagination");
		$this->load->library('image_lib');
		$this->load->database();
	}
	public function login()
	{
		$this->load->view('admin/login');
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
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function index()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function charts()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/charts',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function tables()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/tables',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function cards()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/cards',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function buttons()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/buttons',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function animation()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-animation',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function border()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-border',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function color()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-color',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function authors()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/authors',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
	public function artists()
	{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',NULL,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar',NULL,TRUE);
		$giaodien['content'] = $this->load->view('admin/artists',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
	}
}
