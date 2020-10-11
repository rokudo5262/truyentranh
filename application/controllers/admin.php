<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->helper(array('url'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->library("cart");
		$this->load->library("pagination");
		$this->load->library('image_lib');
		$this->load->database();
	}
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
	public function login()
	{
		$this->load->view('admin/login');
	}
	public function charts()
	{
		$this->load->view('admin/charts');
	}
	public function tables()
	{
		$this->load->view('admin/tables');
	}
	public function cards()
	{
		$this->load->view('admin/cards');
	}public function buttons()
	{
		$this->load->view('admin/buttons');
	}
}
