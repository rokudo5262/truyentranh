<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller
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
		$gmail = $this->input->post('gmail');
       	$password = md5($this->input->post('password'));
       	$signin="Select * from user where gmail_user='$gmail' And password_user='$password'";
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
                	'summary_user'=> $row['summary_user']
                );
                $this->session->set_userdata($newdata); 
            }                
            redirect('main/trangchu');
        }
        else
	    {
	        echo "<script> alert('Đăng nhập không thành công');</script>";
	        echo "<script> window.location.href='../main/trangchu';</script>";
	    } 
	}
/********************************************************************************************************************************************************************************************************************************************************************/
	public function signout()
	{
		$this->session->sess_destroy();
    	redirect('main/trangchu');
	}
/********************************************************************************************************************************************************************************************************************************************************************/
	public function signup()
	{
		$gmail = $this->input->post('gmail');
	    $exists = $this->truyentranh_model->check($gmail);
	    $count = count($exists);
	    if (empty($count)) 
	    {
		    	$data=array
			(
				'gmail_user'=>$this->input->post('gmail'),
				'name_user'=>$this->input->post('gmail'),
				'password_user'=>md5($this->input->post('password'))
			);
			$this->truyentranh_model->insert('user',$data);
			echo "<script> alert('Đăng ký thành công');</script>";
			echo "<script> window.location.href='../main/trangchu';</script>";
	    } 
	    else 
	    {
	    	echo "<script> alert('Đăng ký không thành công gmail đã tồn tại');</script>";
	    	echo "<script> window.location.href='../main/trangchu';</script>";
	    }
	}		
/********************************************************************************************************************************************************************************************************************************************************************/
	public function trangchu()
	{
		$chapter_book="SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book order by date_chapter desc";
		$data['chapter_book']=$this->truyentranh_model->query($chapter_book);
		/*****/
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre order by name_genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book";
		$data['book']=$this->truyentranh_model->query($book);
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/trangchu',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/trangchu',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}

	}
	public function canhan()
	{	
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book";
		$data['book']=$this->truyentranh_model->query($book);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/canhan',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/canhan',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
	public function timkiemnangcao()
	{
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book";
		$data['book']=$this->truyentranh_model->query($book);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/timkiemnangcao',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/timkiemnangcao',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
	public function moinhat()
	{
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book";
		$data['book']=$this->truyentranh_model->query($book);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/moinhat',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/moinhat',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
	public function genre($id='')
	{
		$genre_book="SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_genre = $id";
		$data['genre_book']=$this->truyentranh_model->query($genre_book);
		/*****/
		$book_genre="SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_book = $id";
		$data['book_genre']=$this->truyentranh_model->query($book_genre);
		/*****/
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book";
		$data['book']=$this->truyentranh_model->query($book);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);
		$id_genre="Select * from genre where id_genre=$id";
		$data['id_genre']=$this->truyentranh_model->query($id_genre);
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/genre',$data,TRUE);
			$this->load->view('home/Master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/genre',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
	public function chitiet($id='')
	{
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		/*****/
		$author_book="SELECT * FROM ( ( author_book INNER JOIN author ON author.id_author = author_book.id_author ) INNER JOIN book ON author_book.id_book = book.id_book ) WHERE author_book.id_book = $id";
		$data['author_book']=$this->truyentranh_model->query($author_book);
		/*****/
		$genre_book="SELECT * FROM ( ( genre_book INNER JOIN genre ON genre.id_genre = genre_book.id_genre ) INNER JOIN book ON genre_book.id_book = book.id_book ) WHERE genre_book.id_book = $id";
		$data['genre_book']=$this->truyentranh_model->query($genre_book);
		/*****/
		$artist_book="SELECT * FROM ( ( artist_book INNER JOIN artist ON artist.id_artist = artist_book.id_artist ) INNER JOIN book ON artist_book.id_book = book.id_book ) WHERE artist_book.id_book = $id";
		$data['artist_book']=$this->truyentranh_model->query($artist_book);
		/*****/
		$chapter_book="SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book WHERE book.id_book=$id order by date_chapter desc";
		$data['chapter_book']=$this->truyentranh_model->query($chapter_book);
		/*****/
		$type_book="SELECT * FROM book INNER JOIN type ON type.id_type = book.id_type WHERE book.id_book=$id";
		$data['type_book']=$this->truyentranh_model->query($type_book);
		/*****/
		$status_book="SELECT * FROM book INNER JOIN status ON status.id_status = book.id_status WHERE book.id_book=$id";
		$data['status_book']=$this->truyentranh_model->query($status_book);
		/*****/
		$chapter_page="SELECT * FROM chapter INNER JOIN page ON chapter.id_chapter = page.id_chapter WHERE chapter.id_chapter=$id";
		$data['chapter_page']=$this->truyentranh_model->query($chapter_page);
		/*****/
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from book where id_book=$id";
		$data['book']=$this->truyentranh_model->query($book);
		$alternative="select * from alternative where id_book=$id";
		$data['alternative']=$this->truyentranh_model->query($alternative);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);

		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/chitiet',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/chitiet',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
	public function doctruyen($id='')
	{
		$page="Select * from page where id_chapter=$id";
		$data['page']=$this->truyentranh_model->query($page);
		/*****/
		$chapter_page="SELECT * FROM chapter INNER JOIN page ON chapter.id_chapter = page.id_chapter WHERE chapter.id_chapter=$id";
		$data['chapter_page']=$this->truyentranh_model->query($chapter_page);
		/*****/
		$chapter_book="SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book where id_chapter=$id";
		$data['chapter_book']=$this->truyentranh_model->query($chapter_book);
		/*****/
		foreach($data['chapter_book'] as $row)
        {
            $newdata=$row['id_book'];
        }      
		/*****/
		$chapter_book="SELECT * FROM book INNER JOIN chapter ON chapter.id_book = book.id_book where chapter.id_book=$newdata order by date_chapter desc";
		$data['chapter_book']=$this->truyentranh_model->query($chapter_book);
		/*****/
		$random="SELECT * FROM book ORDER BY RAND() LIMIT 1";
		$data['random']=$this->truyentranh_model->query($random);
		$type="select * from type";
		$data['type']=$this->truyentranh_model->query($type);
		$status="Select * from status";
		$data['status']=$this->truyentranh_model->query($status);
		$genre="Select * from genre";
		$data['genre']=$this->truyentranh_model->query($genre);
		$book="select * from user";
		$data['user']=$this->truyentranh_model->query($book);  
		/*****/
		if ($this->session->userdata('id_user')!='')
		{
			$giaodien['header'] = $this->load->view('home/header_signin',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/doctruyen',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
		else
		{
			$giaodien['header'] = $this->load->view('home/header_signout',$data,TRUE);
			$giaodien['footer'] = $this->load->view('home/footer',NULL,TRUE);
			$giaodien['body'] = $this->load->view('page/doctruyen',$data,TRUE);
			$this->load->view('home/master',$giaodien);
		}
	}
}