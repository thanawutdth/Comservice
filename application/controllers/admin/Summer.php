<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_summer');
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
		$data_foot['table2']="yes2";
		$data_head['user_data']=$this->user_data;	
		$data_head['table2']="yes2";	
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$data_view['summer_camp']=$this->m_summer->get_all_summer_camp();
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_summer_list',$data_view);
		$this->load->view('admin/v_footer',$data_foot);
	}
	public function summer_add(){

		$data_head['user_data']=$this->user_data;
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_summer_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$id=$this->m_summer->generate_id_summer();
					$data= array(
						'id' => $id,
						'name' => $_POST['name'],
						'interest' => $_POST['interest'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'rest' => $_POST['rest'],
						'school' => $_POST['school'],
						'subject' => $_POST['subject'],
						'leader' => $_POST['leader'],
						'type' => $_POST['type'],
						);
					$this->m_summer->add_summer_camp($data);
					if (isset($_POST['file_path_main'])&&$_POST['file_path_main']!="") {
						$filename=$_POST['file_path_main'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_main_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/summer_camp/'.$new_filename;
					        if (!is_dir('./media/summer_camp/')) {
					        	mkdir('./media/summer_camp/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'main_picture' => $new_filename,
								);
					        	$this->m_summer->update_summer_camp($data_insert,$id);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}
					if (isset($_POST['file_path_file'])&&$_POST['file_path_file']!="") {
						$filename=$_POST['file_path_file'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_file_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/summer_camp_file/'.$new_filename;
					        if (!is_dir('./media/summer_camp_file/')) {
					        	mkdir('./media/summer_camp_file/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'file' => $new_filename,
								);
					        	$this->m_summer->update_summer_camp($data_insert,$id);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}
					if (isset($_POST['hiligh'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_hiligh($id);
						foreach ($_POST['hiligh'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_hiligh($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['in_cost'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_in_cost($id);
						foreach ($_POST['in_cost'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_in_cost($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['out_cost'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_out_cost($id);
						foreach ($_POST['out_cost'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_out_cost($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['file_path_rest'])) {
						$sort_order=1;
						foreach ($_POST['file_path_rest'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_rest();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp/'.$new_filename;
							        if (!is_dir('./media/summer_camp/')) {
							        	mkdir('./media/summer_camp/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_rest_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_summer->update_rest_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					if (isset($_POST['file_path_school'])) {
						$sort_order=1;
						foreach ($_POST['file_path_school'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_school();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp/'.$new_filename;
							        if (!is_dir('./media/summer_camp/')) {
							        	mkdir('./media/summer_camp/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_school_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_summer->update_school_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					if (isset($_POST['file_path_download'])) {
						$sort_order=1;
						foreach ($_POST['file_path_download'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_download();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp_file/'.$new_filename;
							        if (!is_dir('./media/summer_camp_file/')) {
							        	mkdir('./media/summer_camp_file/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'file' => $new_filename,
										'download_name' => $_POST['download_name'][$key],
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_download($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										'download_name' => $_POST['download_name'][$key],
										);
								$this->m_summer->update_download($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					redirect('admin/summer');

				}

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_summer_add');
			$this->load->view('admin/v_footer');
		}
	}


	public function summer_edit(){

		$data_head['user_data']=$this->user_data;
		$id=$this->uri->segment(4,'');
		$data['edit']="yes";
		$data['summer_camp']=$this->m_summer->get_summer_camp_by_id($id);
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_summer_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						'interest' => $_POST['interest'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'rest' => $_POST['rest'],
						'school' => $_POST['school'],
						'subject' => $_POST['subject'],
						'leader' => $_POST['leader'],
						'type' => $_POST['type'],
						);
					$this->m_summer->update_summer_camp($data,$id);
					$summer_camp_tmp=$this->m_summer->get_summer_camp_by_id($id);
					if (isset($_POST['file_path_main'])&&$_POST['file_path_main']!="") {
						unlink("./media/summer_camp/".$summer_camp_tmp->main_picture);
						$filename=$_POST['file_path_main'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_main_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/summer_camp/'.$new_filename;
					        if (!is_dir('./media/summer_camp/')) {
					        	mkdir('./media/summer_camp/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'main_picture' => $new_filename,
								);
					        	$this->m_summer->update_summer_camp($data_insert,$id);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}
					if (isset($_POST['file_path_file'])&&$_POST['file_path_file']!="") {
						unlink("./media/summer_camp/".$summer_camp_tmp->file);
						$filename=$_POST['file_path_file'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_file_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/summer_camp_file/'.$new_filename;
					        if (!is_dir('./media/summer_camp_file/')) {
					        	mkdir('./media/summer_camp_file/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'file' => $new_filename,
								);
					        	$this->m_summer->update_summer_camp($data_insert,$id);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}
					if (isset($_POST['hiligh'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_hiligh($id);
						foreach ($_POST['hiligh'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_hiligh($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['in_cost'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_in_cost($id);
						foreach ($_POST['in_cost'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_in_cost($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['out_cost'])) { 
						$sort_order=1;
						$this->m_summer->delete_all_out_cost($id);
						foreach ($_POST['out_cost'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'summer_id' => $id,
									);
						        	$this->m_summer->add_out_cost($data_insert);
						        	$sort_order+=1;
						}

					}
					if (isset($_POST['file_path_rest'])) {
						$sort_order=1;
						foreach ($_POST['file_path_rest'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_rest();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp/'.$new_filename;
							        if (!is_dir('./media/summer_camp/')) {
							        	mkdir('./media/summer_camp/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_rest_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_summer->update_rest_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					if (isset($_POST['file_path_school'])) {
						$sort_order=1;
						foreach ($_POST['file_path_school'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_school();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp/'.$new_filename;
							        if (!is_dir('./media/summer_camp/')) {
							        	mkdir('./media/summer_camp/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_school_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_summer->update_school_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					if (isset($_POST['file_path_download'])) {
						$sort_order=1;
						foreach ($_POST['file_path_download'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_summer->generate_id_download();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/summer_camp_file/'.$new_filename;
							        if (!is_dir('./media/summer_camp_file/')) {
							        	mkdir('./media/summer_camp_file/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'summer_id' => $id,
										'file' => $new_filename,
										'download_name' => $_POST['download_name'][$key],
										'sort_order' => $sort_order,
										);
							        	$this->m_summer->add_download($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										'download_name' => $_POST['download_name'][$key],
										);
								$this->m_summer->update_download($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}// end file path
					if (isset($_POST['del_list_file'])) {
						foreach ($_POST['del_list_file'] as $key => $value) {
							$this->m_summer->delete_download($value);
						}
					}
					if (isset($_POST['del_list_rest'])) {
						foreach ($_POST['del_list_rest'] as $key => $value) {
							$this->m_summer->delete_rest_img($value);
						}
					}
					if (isset($_POST['del_list_school'])) {
						foreach ($_POST['del_list_school'] as $key => $value) {
							$this->m_summer->delete_school_img($value);
						}
					}
					redirect('admin/summer');

				}

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_summer_add',$data);
			$this->load->view('admin/v_footer');
		}
	}
	public function delete_summer_camp(){
		$id=$this->uri->segment(4,'');
		$this->m_summer->delete_summer_camp($id);
		redirect('admin/summer');
	}
	public function ajax_add_hiligh(){
		?>
		<div class="req_p ">
            <button type="button" class="btn btn-danger del_hiligh">X</button>
            <input class="focused" id="" type="text" name="hiligh[]" value="">
        </div>
		<?
	}
	public function ajax_in_cost(){
		?>
		<div class="req_p ">
            <button type="button" class="btn btn-danger del_in_cost">X</button>
            <input class="focused" id="" type="text" name="in_cost[]" value="">
        </div>
		<?
	}
	public function ajax_out_cost(){
		?>
		<div class="req_p ">
            <button type="button" class="btn btn-danger del_out_cost">X</button>
            <input class="focused" id="" type="text" name="out_cost[]" value="">
        </div>
		<?
	}

	public function ajax_add_rest(){
		$id=$this->m_summer->generate_id_rest();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_rest">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path_rest[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                       
        </div>
		<?
	}
	public function ajax_add_school(){
		$id=$this->m_summer->generate_id_school();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_school">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path_school[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                       
        </div>
		<?
	}
	public function ajax_add_file(){
		$id=$this->m_summer->generate_id_download();
		?>
		<div class="img_hold">
            <button dat-id="<?=$id?>" type="button" class="btn btn-danger del_file">Delete</button>
            <a href="<?=site_url('media/temp/'.$_POST['img_tmp'])?>">Download</a>
            <input type="hidden" class="file_path" name="file_path_download[<?=$id?>]" value="<?=$_POST['img_tmp']?>"> 
            <label  for="focusedInput">Name</label>
            <input class="focused" id="" type="text" name="download_name[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                      
        </div>
		<?
	}

}