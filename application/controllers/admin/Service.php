<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_service');
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

	public function country(){

		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$data_view['country']=$this->m_service->get_country();
		if (isset($_POST['file_path'])) {	
			$sort_order=1;
				foreach ($_POST['file_path'] as $key => $value) {
					if ($value!="__old") {
						echo "in if";
						$filename=$value;
						$id=$this->m_service->generate_id_country();
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/country/'.$new_filename;
					        if (!is_dir('./media/country/')) {
					        	mkdir('./media/country/');
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
								);
					        	$this->m_service->add_country($data_insert);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					            $sort_order+=1;
					        }
					}else{
						echo "in else";
						$data_insert = array(
								'sort_order' => $sort_order,
								'name' => $_POST['name'][$key],
								);
						$this->m_service->update_country($data_insert,$key);
						$sort_order+=1;
					}
					//print_r($_POST['file_path']);
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
						$this->m_service->delete_country($value);
					}
				}
				
				//redirect('admin/service/country');

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_service_country',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	public function country_list(){
		$data_foot['table']="yes";
		$data['country']=$this->m_service->get_country();
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_country_list',$data);
		$this->load->view('admin/v_footer',$data_foot);
	}
	public function sort_country(){
		if (isset($_POST['sort'])) {
			$sort_order=1;
			foreach ($_POST['sort'] as $key => $value) {
				$data_insert=array(
						'sort_order' => $sort_order,
						);
				$this->m_service->update_country($data_insert,$value);
				$sort_order+=1;
			}
		}
	}
	public function country_add(){

		$data_head['user_data']=$this->user_data;
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_country_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$id=$this->m_service->generate_id_country();
					if (isset($_POST['file_path_main'])&&$_POST['file_path_main']!="") {
						$filename=$_POST['file_path_main'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/country/'.$new_filename;
					        if (!is_dir('./media/country/')) {
					        	mkdir('./media/country/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'id' => $id,
								'picture' => $new_filename,
								'name' => $_POST['name'],
								);
					        	$this->m_service->add_country($data_insert);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}else{
						$data_insert=array(
								'id' => $id,
								'name' => $_POST['name'],
								'des' => $_POST['des'],
								);
					        	$this->m_service->add_country($data_insert);
					}
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_country_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/country/'.$new_filename;
							        if (!is_dir('./media/country/')) {
							        	mkdir('./media/country/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'country_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_country_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_country_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}			
					redirect('admin/service/country_list');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_country_add');
			$this->load->view('admin/v_footer');
		}
	}
	public function country_edit(){
		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$id=$this->uri->segment(4,'');
		$data_view['country']=$this->m_service->get_country_by_id($id);
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data_view['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_country_add',$data_view);
					$this->load->view('admin/v_footer');
				}else{
					if (isset($_POST['file_path_main'])&&$_POST['file_path_main']!="") {
						$filename=$_POST['file_path_main'];
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/country/'.$new_filename;
					        if (!is_dir('./media/country/')) {
					        	mkdir('./media/country/');
					        }
					        if (!copy($file, $newfile)) {
					            echo "failed to copy $file...\n".$file." to ".$newfile;
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }else{
					        	$data_insert=array(
								'picture' => $new_filename,
								'name' => $_POST['name'],
								);
					        	$this->m_service->update_country($data_insert,$id);
					            @unlink("./media/temp/".$filename);
					            @unlink("./media/temp/thumbnail/".$filename);
					        }
					}else{
						$data_insert=array(
								'name' => $_POST['name'],
								'des' => $_POST['des'],
								);
					        	$this->m_service->update_country($data_insert,$id);
					}
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_country_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/country/'.$new_filename;
							        if (!is_dir('./media/country/')) {
							        	mkdir('./media/country/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'country_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_country_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_country_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['del_list'])) {
						foreach ($_POST['del_list'] as $key => $value) {
							$this->m_service->delete_country_img($value);
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
			
					redirect('admin/service/country_list');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_country_add',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	public function study_abroad(){

		$data_foot['table']="yes";
		$data['study_abroad_list']=$this->m_service->get_all_study_abroad();
		$data['country']=$this->m_service->get_country();
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_study_abroad_list',$data);
		$this->load->view('admin/v_footer',$data_foot);
	}
	public function study_abroad_lang(){

		$data_foot['table']="yes";
		$data['study_abroad_list']=$this->m_service->get_all_study_abroad_lang();
		$data['country']=$this->m_service->get_country();
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_study_abroad_lang_list',$data);
		$this->load->view('admin/v_footer',$data_foot);
	}


	public function study_abroad_add(){

		$data_head['user_data']=$this->user_data;
		$data['country']=$this->m_service->get_country();
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_study_abroad_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$id=$this->m_service->generate_id_study_abroad();
					$data= array(
						'id' => $id,
						'name' => $_POST['name'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'country_id' => $_POST['country_id'],
						'why' => $_POST['why'],
						'location' => $_POST['location'],
						'rank' => $_POST['rank'],
						'subject' => $_POST['subject'],
						);
					$this->m_service->add_study_abroad($data);
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_study_abroad_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/study_abroad/'.$new_filename;
							        if (!is_dir('./media/study_abroad/')) {
							        	mkdir('./media/study_abroad/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'school_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_study_abroad_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_study_abroad_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['des'])) { 
						$sort_order=1;
						$this->m_service->delete_all_req_by_school_id($id);
						foreach ($_POST['des'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'school_id' => $id,
									);
						        	$this->m_service->add_study_abroad_req($data_insert);
						        	$sort_order+=1;
						}

					}
										
					

					redirect('admin/service/study_abroad');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_study_abroad_add',$data);
			$this->load->view('admin/v_footer');
		}
	}
	public function study_abroad_edit(){
		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$id=$this->uri->segment(4,'');
		$data_view['study_abroad']=$this->m_service->get_study_abroad_by_id($id);
		$data_view['country']=$this->m_service->get_country();
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_study_abroad_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'country_id' => $_POST['country_id'],
						'why' => $_POST['why'],
						'location' => $_POST['location'],
						'rank' => $_POST['rank'],
						'subject' => $_POST['subject'],
						);
					$this->m_service->update_study_abroad($data,$id);	
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_study_abroad_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/study_abroad/'.$new_filename;
							        if (!is_dir('./media/study_abroad/')) {
							        	mkdir('./media/study_abroad/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'school_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_study_abroad_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_study_abroad_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['del_list'])) {
						foreach ($_POST['del_list'] as $key => $value) {
							$this->m_service->delete_study_abroad_img($value);
						}
					}
					if (isset($_POST['des'])) { 
						$sort_order=1;
						$this->m_service->delete_all_req_by_school_id($id);
						foreach ($_POST['des'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'school_id' => $id,
									);
						        	$this->m_service->add_study_abroad_req($data_insert);
						        	$sort_order+=1;
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

					redirect('admin/service/study_abroad');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_study_abroad_add',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
















//////////////////////////// lang section //////////////////////////////////////////

	public function study_abroad_lang_add(){

		$data_head['user_data']=$this->user_data;
		$data['country']=$this->m_service->get_country();
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_study_abroad_lang_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$id=$this->m_service->generate_id_study_abroad_lang();
					$data= array(
						'id' => $id,
						'name' => $_POST['name'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'country_id' => $_POST['country_id'],
						'why' => $_POST['why'],
						'location' => $_POST['location'],
						'rank' => $_POST['rank'],
						'subject' => $_POST['subject'],
						);
					$this->m_service->add_study_abroad_lang($data);
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_study_abroad_lang_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/study_abroad_lang/'.$new_filename;
							        if (!is_dir('./media/study_abroad_lang/')) {
							        	mkdir('./media/study_abroad_lang/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'school_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_study_abroad_lang_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_study_abroad_lang_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['des'])) { 
						$sort_order=1;
						$this->m_service->delete_all_lang_req_by_school_id($id);
						foreach ($_POST['des'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'school_id' => $id,
									);
						        	$this->m_service->add_study_abroad_lang_req($data_insert);
						        	$sort_order+=1;
						}

					}
										
					

					redirect('admin/service/study_abroad_lang');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_study_abroad_lang_add',$data);
			$this->load->view('admin/v_footer');
		}
	}
	public function study_abroad_lang_edit(){
		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$id=$this->uri->segment(4,'');
		$data_view['study_abroad_lang']=$this->m_service->get_study_abroad_lang_by_id($id);
		$data_view['country']=$this->m_service->get_country();
		if (isset($_POST['name'])) {	
				if($_POST['name']==""){
					$data['err_msg']="กรุณากรอก ชื่อ";
					$data_head['head_name']="Admin Panel";
					$data_head['link_head']=site_url('admin');

					$this->load->view('v_header_admin',$data_head);
					$this->load->view('admin/v_study_abroad_lang_add',$data);
					$this->load->view('admin/v_footer');
				}else{
					$data= array(
						'name' => $_POST['name'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
						'country_id' => $_POST['country_id'],
						'why' => $_POST['why'],
						'location' => $_POST['location'],
						'rank' => $_POST['rank'],
						'subject' => $_POST['subject'],
						);
					$this->m_service->update_study_abroad_lang($data,$id);	
					if (isset($_POST['file_path'])) {
						$sort_order=1;
						foreach ($_POST['file_path'] as $key => $value) {
							if ($value!="__old") {
								echo "in if";
								$filename=$value;
								$id_img=$this->m_service->generate_id_study_abroad_lang_img();
							        $ext=explode(".", $filename);
							        $new_ext=$ext[count($ext)-1];
							        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
							        $file = './media/temp/'.$filename;
							        $newfile = './media/study_abroad_lang/'.$new_filename;
							        if (!is_dir('./media/study_abroad_lang/')) {
							        	mkdir('./media/study_abroad_lang/');
							        }
							        if (!copy($file, $newfile)) {
							            echo "failed to copy $file...\n".$file." to ".$newfile;
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							        }else{
							        	$data_insert=array(
										'id' => $id_img,
										'school_id' => $id,
										'picture' => $new_filename,
										'sort_order' => $sort_order,
										);
							        	$this->m_service->add_study_abroad_lang_img($data_insert);
							            @unlink("./media/temp/".$filename);
							            @unlink("./media/temp/thumbnail/".$filename);
							            $sort_order+=1;
							        }
							}else{
								echo "in else";
								$data_insert=array(
										'sort_order' => $sort_order,
										);
								$this->m_service->update_study_abroad_lang_img($data_insert,$key);
								$sort_order+=1;
							}
						}
					      
					}
					if (isset($_POST['del_list'])) {
						foreach ($_POST['del_list'] as $key => $value) {
							$this->m_service->delete_study_abroad_lang_img($value);
						}
					}
					if (isset($_POST['des'])) { 
						$sort_order=1;
						$this->m_service->delete_all_lang_req_by_school_id($id);
						foreach ($_POST['des'] as $key => $value) {
							$data_insert=array(
									'des' => $value,
									'sort_order' => $sort_order,
									'school_id' => $id,
									);
						        	$this->m_service->add_study_abroad_lang_req($data_insert);
						        	$sort_order+=1;
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

					redirect('admin/service/study_abroad_lang');
				}
		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_study_abroad_lang_add',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	public function delete_study_abroad(){
		$id=$this->uri->segment(4,'');
		$this->m_service->delete_study_abroad($id);
		redirect('admin/service/study_abroad');
	}
	public function delete_study_abroad_lang(){
		$id=$this->uri->segment(4,'');
		$this->m_service->delete_study_abroad_lang($id);
		redirect('admin/service/study_abroad_lang');
	}
	public function delete_country(){
		$id=$this->uri->segment(4,'');
		$this->m_service->delete_country($id);
		redirect('admin/service/country_list');
	}
	// Ajax 
	public function ajax_add_country(){
		$id=$this->m_service->generate_id_country();

		?>
		<div class="img_hold">
			<button dat-id="none" type="button" class="btn btn-danger del_con">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path[<?=$id?>]" value="<?=$_POST['img_tmp']?>">
            <label  for="focusedInput">Name</label>
            <input class="focused" id="" type="text" name="name[<?=$id?>]" value="">                     
        </div>
		<?
	}
	public function ajax_add_abroad_img(){
		$id=$this->m_service->generate_id_study_abroad_img();
		?>
		<div class="img_hold">
            <button dat-id="none" type="button" class="btn btn-danger del_con">Delete</button>
            <img src="<?=site_url('media/temp/'.$_POST['img_tmp'])?>" class="span12 file_tmp" >
            <input type="hidden" class="file_path" name="file_path[<?=$id?>]" value="<?=$_POST['img_tmp']?>">                       
        </div>
		<?
	}
	public function ajax_add_req(){
		?>
		<div class="req_p ">
            <button type="button" class="btn btn-danger del_req">X</button>
            <input class="focused" id="" type="text" name="des[]" value="">
        </div>
		<?
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */