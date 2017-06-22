<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_time');
		$this->load->model('m_news');
		$this->load->model('m_about');
		$this->load->model('m_contact');
		$this->load->model('m_news');
		$this->load->model("m_stringlib");
		$this->load->model('m_gallery');
		$this->load->model('m_feedback');
		$this->load->model('m_etc');
		$this->user_data=null;
		$this->idiom = $this->session->userdata('language');
		$this->lang->load('content', $this->idiom);
	}
	public function set_lang()
	{
		$lang=$this->uri->segment(3,'english');
		$this->session->set_userdata('language', $lang);
		$this->idiom = $this->session->userdata('language');
		$this->lang->load('content', $this->idiom);
		redirect('');
	}
	public function index()
	{
		$data_head['user_data']=$this->user_data;
		$data_head['page']="home";		
		$data_view['etc']=$this->m_etc->get_etc();
		$data_view['news_list']=$this->m_news->get_all_news("all","y",0,4);
		$data_view['gallery']=$this->m_gallery->get_all_album(0,7);
		$data_view['feedback']=$this->m_feedback->get_feedback();
		$this->load->view('v_meta',$data_head);
		$this->load->view('v_header',$data_head);
		$this->load->view('v_index',$data_view);
	}
	// ajax region
	public function save_contact(){
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
		$data= array(
						'prefix' => $_POST['prefix'],
						'name' => $_POST['name'],
						'date' => time(),
						'topic' => $_POST['topic'],
						'Email' => $_POST['Email'],
						'Phone' => $_POST['Phone'],
						'des' => $_POST['des'],
						);
					$this->m_contact->add_contact($data);
		echo json_encode($json);					
	}
	
	
}
