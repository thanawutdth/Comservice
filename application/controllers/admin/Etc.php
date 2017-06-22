<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Etc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_etc');
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
		$data['edit']="yes";
		$data['etc']=$this->m_etc->get_etc();
		if (isset($_POST['what'])) {
					$data= array(
						'what' => $_POST['what'],
						'fb' => $_POST['fb'],
						'tw' => $_POST['tw'],
						'ig' => $_POST['ig'],
						);
					$this->m_etc->update_etc($data);					
					if (isset($_POST['file_path_rest'])) {
						$sort_order=1;
						foreach ($_POST['file_path_rest'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_etc->generate_id_etc_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/etc/'.$new_filename;
							        if (!is_dir('./media/etc/')) {
							        	mkdir('./media/etc/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										'link' => $_POST['link'][$key],
										);
							        	$this->m_etc->add_etc_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										'link' => $_POST['link'][$key],
										);
								$this->m_etc->update_etc_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path					
					if (isset($_POST['del_list_rest'])) {
						foreach ($_POST['del_list_rest'] as $key => $value) {
							$this->m_etc->delete_etc_img($value);
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
					redirect('admin/etc');

				

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_etc',$data);
			$this->load->view('admin/v_footer');
		}
	}
	

	public function ajax_add_rest(){
		$id=$this->m_etc->generate_id_etc_img();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_rest">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path_rest[<?=$id?>]" value="<?=$_POST['img_tmp']?>"> 
            <label  for="focusedInput">Link</label>
            <input class="focused" id="" type="text" name="link[<?=$id?>]" value="">                      
        </div>
		<?
	}
	

}