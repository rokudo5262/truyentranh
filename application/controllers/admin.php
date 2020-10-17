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
		$signin="Select * From user Where gmail_user='$email' And password_user='$password'";
		//var_dump($signin);
		//var_dump($password);
		$query = $this->truyentranh_model->query($signin);
		if($query)
		{
			foreach($query as $row)
			{
				$newdata = array
				(
					'id_user'=>$row['id_user'],
					'name_user'=>$row['name_user'],
					'gmail_user' =>$row['gmail_user'],
					'password_user' => $row['password_user'],
					'firstname_user'=>$row['firstname_user'],
					'middlename_user'=>$row['middlename_user'],
					'lastname_user'=>$row['lastname_user'],
					'avatar_user' =>$row['avatar_user'],
					'deleted' => $row['deleted'],
					'created_datetime' =>$row['created_datetime'],
					'updated_datetime' => $row['updated_datetime'],
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
		$data['dashboard']='active';
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
			$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
			$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			redirect('admin/login');
		}
	}
	public function index()
	{
		$data['index']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/dashboard',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function charts()
	{
		$data['charts']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/charts',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function tables()
	{
		$data['tables']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/tables',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function cards()
	{
		$data['cards']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/cards',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function buttons()
	{
		$data['buttons']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/buttons',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function animations()
	{
		$data['animations']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-animation',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function borders()
	{
		$data['borders']='active';
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
			$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
			$giaodien['content'] = $this->load->view('admin/utilities-border',NULL,TRUE);
			$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
			$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function colors()
	{
		$data['colors']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-color',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function other()
	{
		$data['other']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/utilities-other',NULL,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function books()
	{
		$data['books']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$books="select * from book Where deleted='0'";
		$data['books']=$this->truyentranh_model->query($books);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/books',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function authors()
	{
		$data['authors']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$authors="select * from author Where deleted='0'";
		$data['authors']=$this->truyentranh_model->query($authors);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/authors',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function artists()
	{
		$data['artists']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$artists="select * from artist Where deleted='0'";
		$data['artists']=$this->truyentranh_model->query($artists);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/artists',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function genres()
	{
		$data['genres']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$genres="select * from genre Where deleted='0'";
		$data['genres']=$this->truyentranh_model->query($genres);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/genres',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function status()
	{
		$data['status']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$statuses="select * from status Where deleted='0'";
		$data['statuses']=$this->truyentranh_model->query($statuses);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/statuses',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function users()
	{
		$data['users']='active';
		if ($this->session->userdata('id_user')!='')
		{
		$users="select * from user Where deleted='0'";
		$data['users']=$this->truyentranh_model->query($users);
		$giaodien['sidebar'] = $this->load->view('admin/includes/sidebar',$data,TRUE);
		$giaodien['topbar'] = $this->load->view('admin/includes/topbar','',TRUE);
		$giaodien['content'] = $this->load->view('admin/users',$data,TRUE);
		$giaodien['footer'] = $this->load->view('admin/includes/footer',NULL,TRUE);
		$this->load->view('admin/includes/index',$giaodien);
		}
		else
		{
			echo "<script> alert('Phiên đã hết hạn vui lòng đăng nhập lại.');</script>";
			echo "<script> window.location.href='../admin/login';</script>";
			//redirect('admin/login');
		}
	}
	public function user_add()
	{
		//$add="INSERT INTO user (`id_user`, `name_user`, `gmail_user`, `password_user`, `firstname_user`, `middlename_user`, `lastname_user`, `avatar_user`, `admin_user`, `deleted`, `created_datetime`, `updated_datetime`) VALUES (NULL, '', '1234@gmail.com', '12345', 'Trịnh', 'Quang', 'Trường', 'unknow.png', '0', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		$data=array
		(
			'gmail_user'=>$this->input->post('gmail'),
			'password_user'=>$this->input->post('password'),

		);
		$this->truyentranh_model->insert('user',$data);
		var_dump($data);
	}
	public function user_update()
	{
		
	}
}
