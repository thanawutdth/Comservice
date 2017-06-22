<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_contact');
		if ($this->session->userdata('username')) {
			$user_data=$this->m_user->get_user_by_login_name($this->session->userdata('username'));
			if (isset($user_data->username) ) {
				$this->user_data=$user_data;
			}else{
				redirect('admin/login');
			}
		}else{
			redirect('admin/login');
		}
	}

	public function index(){

		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$data_view['contact_list']=$this->m_contact->get_contact();
		
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/contact_list',$data_view);
			$this->load->view('admin/v_footer');
		
	}
	public function delete_contact(){
		$id=$this->uri->segment(4,'');
		$this->m_contact->delete_contact($id);
		redirect('admin/contact');
	}
	// Ajax 
	public function read(){
		$contact=$this->m_contact->get_contact_by_id($_POST['id']);
		echo $contact->des;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */