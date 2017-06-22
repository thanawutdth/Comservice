<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		if ($this->session->userdata('username')) {
			$user_data=$this->m_user->get_user_by_login_name($this->session->userdata('username'));
			if (isset($user_data->username)) {
				$this->user_data=$user_data;
			}else{
				redirect('admin/login');
			}
		}else{
			redirect('admin/login');
		}
	}

	public function index()
	{
		$this->load->view('admin/v_admin_login');
	}

	
	public function logout()
	{		
		$this->session->set_userdata('username', '');
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */