<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_about');
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
		$data_view['our_team']=$this->m_about->get_our_team();
		$data_view['faq']=$this->m_about->get_all_faq();
		if (isset($_POST['file_path'])||isset($_POST['question'])) {	
			$sort_order=1;
			if (isset($_POST['file_path'])) {
				foreach ($_POST['file_path'] as $key => $value) {
					if ($value!="__old") {
						echo "in if";
						$filename=$value;
						$id=$this->m_about->generate_id_team();
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/our_team/'.$new_filename;
					        if (!is_dir('./media/our_team/')) {
					        	mkdir('./media/our_team/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'id' => $id,
								'picture' => $new_filename,
								'sort_order' => $sort_order,
								'name' => $_POST['name'][$key],
								'position' => $_POST['position'][$key],
								);
					        	$this->m_about->add_our_team($data_insert);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					            $sort_order+=1;
					        }
					}else{
						echo "in else";
						$data_insert = array(
								'sort_order' => $sort_order,
								'name' => $_POST['name'][$key],
								'position' => $_POST['position'][$key],
								);
						$this->m_about->update_our_team($data_insert,$key);
						$sort_order+=1;
					}
					//print_r($_POST['file_path']);
				}
			}
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
				if (isset($_POST['del_list'])) {
					foreach ($_POST['del_list'] as $key => $value) {
						$this->m_about->delete_our_team($value);
					}
				}
				if (isset($_POST['question'])) { 
					$sort_order=1;
					$this->m_about->delete_all_faq();
					foreach ($_POST['question'] as $key => $value) {
						$data_insert=array(
								'question' => $value,
								'sort_order' => $sort_order,
								'answer' => $_POST['answer'][$key],
								);
					        	$this->m_about->add_faq($data_insert);
					        	$sort_order+=1;
					}

				}
				redirect('admin/about');

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/about_edit',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	// Ajax 
	public function ajax_add_ppl(){
		$id=$this->m_about->generate_id_team();

		?>
		<div class="img_hold">
			<button dat-id="none" type="button" class="btn btn-danger del_con">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path[<?=$id?>]" value="<?=$_POST['img_tmp']?>">
            <label  for="focusedInput">Name</label>
            <input class="focused" id="" type="text" name="name[<?=$id?>]" value="">
            <label for="focusedInput">Position</label>
            <input class="focused" id="" type="text" name="position[<?=$id?>]" value="">                       
        </div>
		<?
	}
	public function ajax_add_faq(){
		?>
		<div class="faq_hold no-margin-left">
            <button type="button" class="btn btn-danger del_quest">Delete</button>
            <div class="control-group">
              
              <label class="control-label" for="focusedInput">Question</label>
              <div class="controls">
                  <input class="focused" id="" type="text" name="question[]" value="">
              </div>
            </div>
            <label class="control-label" for="focusedInput">Answer</label>&nbsp;&nbsp;
            <textarea class="focused" name="answer[]" style="width: 60%;height: 200px;"></textarea>
        </div>
		<?
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */