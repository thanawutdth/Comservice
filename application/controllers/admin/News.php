<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_news');
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

		$data_foot['table']="yes";
		$data['news_list']=$this->m_news->get_all_news();
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_news_list',$data);
		$this->load->view('admin/v_footer',$data_foot);
	}

	public function news_add(){

		$data_head['user_data']=$this->user_data;
		$data['A']="0";
		if (isset($_POST['title'])) {	
				if($_POST['title']==""){
					$data['err_msg']="กรุณากรอก title";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_news_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$id=$this->m_news->generate_id();
					if (!isset($_POST['is_publish'])) {
						$_POST['is_publish']="n";
					}
					$data= array(
						'id' => $id,
						'title' => $_POST['title'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'is_publish' => $_POST['is_publish'],
						'description' => $_POST['description'],
						);
					if (isset($_POST['file_path'])&&$_POST['file_path']!="") {
						$filename=$_POST['file_path'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/news/'.$new_filename;
					        if (!is_dir('./media/news/')) {
					        	mkdir('./media/news/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data['picture']=$new_filename;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      
					}
					if (isset($_POST['file_path_tmb'])&&$_POST['file_path_tmb']!="") {
						@unlink("./media/news/".$data_view['news']->picture_tmb);
						$filename=$_POST['file_path_tmb'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_tmb".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/news/'.$new_filename;
					        if (!is_dir('./media/news/')) {
					        	mkdir('./media/news/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data['picture_tmb']=$new_filename;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      
					}
					$this->m_news->add_news($data);					
					

					redirect('admin/news');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_news_add',$data);
			$this->load->view('admin/v_footer');
		}
	}
	public function news_edit(){
		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$id=$this->uri->segment(4,'');
		$data_view['news']=$this->m_news->get_news_by_id($id);
		if (isset($_POST['title'])) {	
				if($_POST['title']==""){
					$data_view['err_msg']="กรุณากรอก title";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_news_add',$data_view);
					$this->load->view('admin/v_footer');
				}else{
					if (!isset($_POST['is_publish'])) {
						$_POST['is_publish']="n";
					}
					$data= array(
						'title' => $_POST['title'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'is_publish' => $_POST['is_publish'],
						'description' => $_POST['description'],
						);
					if (isset($_POST['file_path'])&&$_POST['file_path']!="") {
						@unlink("./media/news/".$data_view['news']->picture);
						$filename=$_POST['file_path'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/news/'.$new_filename;
					        if (!is_dir('./media/news/')) {
					        	mkdir('./media/news/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data['picture']=$new_filename;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      
					}
					if (isset($_POST['file_path_tmb'])&&$_POST['file_path_tmb']!="") {
						@unlink("./media/news/".$data_view['news']->picture_tmb);
						$filename=$_POST['file_path_tmb'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_tmb".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/news/'.$new_filename;
					        if (!is_dir('./media/news/')) {
					        	mkdir('./media/news/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data['picture_tmb']=$new_filename;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					      
					}
					$this->m_news->update_news($data,$id);					
					$files_del = glob('./media/temp/*'); // get all file names
                            foreach($files_del as $file){ // iterate files
                              if(is_file($file)){
                                @unlink($file); // delete file
                                }
                            }
                $files_del = glob('./media/temp/thumbnail/*'); // get all file names
                                    foreach($files_del as $file){ // iterate files
                                      if(is_file($file)){
                                        @unlink($file); // delete file
                                        }
                                    }

					redirect('admin/news');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_news_add',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	///////////////////////////////////////////////////////////////////// AJAX region /////////////////////////////////////////////
	
	public function del_tmp_img(){
		unlink("./media/temp/".$_POST['file']);
	}
	public function delete_news(){
		$id=$this->uri->segment(4,'');
		$this->m_news->delete_news($id);
		redirect('admin/news');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */