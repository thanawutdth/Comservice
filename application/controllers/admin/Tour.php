<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_tour');
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
		$id=$this->uri->segment(4,'');
		$data_view['tour']=$this->m_tour->get_tour();
		if (isset($_POST['description'])) {	
				if($_POST['description']==""){
					$data_view['err_msg']="กรุณากรอก description";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_tour',$data_view);
					$this->load->view('admin/v_footer');
				}else{
					$data_insert=array(
								'description' => $_POST['description'],
								);
					        	$this->m_tour->update_tour($data_insert);
					
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_tour->generate_id_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename="img_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/tour/'.$new_filename;
							        if (!is_dir('./media/tour/')) {
							        	mkdir('./media/tour/');
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
										);
							        	$this->m_tour->add_tour_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_tour->update_tour_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['file_path_part'])) {
						$sort_order=1;
						foreach ($_POST['file_path_part'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_tour->generate_id_part();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename="part_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/tour/'.$new_filename;
							        if (!is_dir('./media/tour/')) {
							        	mkdir('./media/tour/');
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
										);
							        	$this->m_tour->add_tour_part($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_tour->update_tour_part($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['del_list'])) {
						foreach ($_POST['del_list'] as $key => $value) {
							$this->m_tour->delete_tour_img($value);
						}
					}
					if (isset($_POST['del_list_part'])) {
						foreach ($_POST['del_list_part'] as $key => $value) {
							$this->m_tour->delete_tour_part($value);
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
			
					redirect('admin/tour/');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_tour',$data_view);
			$this->load->view('admin/v_footer');
		}
	}

	public function ajax_add_img(){
		$id=$this->m_tour->generate_id_img();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_con">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                       
        </div>
		<?
	}
	public function ajax_add_part(){
		$id=$this->m_tour->generate_id_part();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_con_part">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path_part[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                       
        </div>
		<?
	}

}