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
		$signin="Select * From user Where gmail_user='$email' And password_user='$password' And deleted='0' And admin_user='1'";
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
		$giaodien['content'] = $this->load->view('admin/pages/books',$data,TRUE);
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
		$giaodien['content'] = $this->load->view('admin/pages/authors',$data,TRUE);
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
		$giaodien['content'] = $this->load->view('admin/pages/artists',$data,TRUE);
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
		$giaodien['content'] = $this->load->view('admin/pages/genres',$data,TRUE);
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
		$giaodien['content'] = $this->load->view('admin/pages/statuses',$data,TRUE);
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
		$giaodien['content'] = $this->load->view('admin/pages/users',$data,TRUE);
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
		//$add="INSERT INTO user (`id_user`, `name_user`, `gmail_user`, `password_user`, `firstname_user`, `middlename_user`, `lastname_user`, `avatar_user`, `admin_user`, `deleted`, `created_datetime`, `updated_datetime`) 
		//VALUES (NULL, '', '1234@gmail.com', '12345', 'Trịnh', 'Quang', 'Trường', 'unknow.png', '0', '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
		$data=array
		(
			'gmail_user'=>$this->input->post('gmail'),
			'password_user'=>$this->input->post('password'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('user',$data);
		//var_dump($data);
		redirect('admin/users');
	}
	public function book_add()
	{
		$data=array
		(
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('user',$data);
		//var_dump($data);
		redirect('admin/users');
	}
	public function genre_add()
	{
		$data=array
		(
			'name_genre'=>$this->input->post('genre'),
			'description_genre'=>$this->input->post('description'),
			'description_genre'=>$this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('genre',$data);
		//var_dump($data);
		redirect('admin/genres');
	}
	public function authors_add()
	{
		$data=array
		(
			'name_genre'=>$this->input->post('genre'),
			'description_genre'=>$this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('author',$data);
		//var_dump($data);
		redirect('admin/authors');
	}
	public function artist_add()
	{
		$data=array
		(
			'name_artist'=>$this->input->post('genre'),
			'description_genre'=>$this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('artist',$data);
		//var_dump($data);
		redirect('admin/artists');
	}
	public function status_add()
	{
		$data=array
		(
			'name_status'=>$this->input->post('status'),
			'description_status'=>$this->input->post('description'),
			//'deleted'=>$this->input->post('deleted'),
			//'created_datetime'=>$this->input->post('created_datetime'),
			//'updated_datetime'=>$this->input->post('updated_datetime'),
		);
		$this->truyentranh_model->insert('status',$data);
		//var_dump($data);
		redirect('admin/statuses');
	}
}
