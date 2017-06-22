<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_admin');
		$this->load->model('m_time');
		$this->load->model('m_gallery');
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

	public function gallery_add(){
		$data_head['user_data']=$this->user_data;
		if (isset($_POST['file_path'])) {	
				$id=$this->m_gallery->generate_id_album();
				$data_insert=array(
						'id' => $id,
						'name' => $_POST['aname'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
					);
				$this->m_gallery->add_album($data_insert);
				$sort_order=1;
				foreach ($_POST['file_path'] as $key => $value) {
					if ($value!="__old") {
						echo "in if";
						$filename=$value;
						$id_img=$this->m_gallery->generate_id();
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/gallery/'.$new_filename;
					        if (!is_dir('./media/gallery/')) {
					        	mkdir('./media/gallery/');
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
								'name' => $_POST['name'][$key],
								'album_id'=> $id,
								);
					        	$this->m_gallery->add_gallery($data_insert);
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
						$this->m_gallery->update_gallery($data_insert,$key);
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
						$this->m_gallery->delete_gallery($value);
					}
				}				
				redirect('admin/gallery');

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_gallery');
			$this->load->view('admin/v_footer');
		}
	}
	public function gallery_edit(){

		$data_head['user_data']=$this->user_data;
		$data_view['edit']="yes";
		$id=$this->uri->segment(4,'');
		$data_view['gallery']=$this->m_gallery->get_album_by_id($id);

		if (isset($_POST['file_path'])) {	
				$data_insert=array(
						'name' => $_POST['aname'],
						'date' => $this->m_time->datetimepicker_to_unix($_POST['date']),
					);
				$this->m_gallery->update_album($data_insert,$id);
				$sort_order=1;
				foreach ($_POST['file_path'] as $key => $value) {
					if ($value!="__old") {
						echo "in if";
						$filename=$value;
						$id_img=$this->m_gallery->generate_id();
					        $ext=explode(".", $filename);
					        $new_ext=$ext[count($ext)-1];
					        $new_filename=$id."_".$id_img."_".time().".".$new_ext;
					        $file = './media/temp/'.$filename;
					        $newfile = './media/gallery/'.$new_filename;
					        if (!is_dir('./media/gallery/')) {
					        	mkdir('./media/gallery/');
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
								'name' => $_POST['name'][$key],
								'album_id'=> $id,
								);
					        	$this->m_gallery->add_gallery($data_insert);
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
						$this->m_gallery->update_gallery($data_insert,$key);
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
						$this->m_gallery->delete_gallery($value);
					}
				}
				redirect('admin/gallery');

		}else{
			$data_head['head_name']="Admin Panel";
			$data_head['link_head']=site_url('admin');
			$this->load->view('v_header_admin',$data_head);
			$this->load->view('admin/v_gallery',$data_view);
			$this->load->view('admin/v_footer');
		}
	}
	public function index(){
		$data_foot['table']="yes";
		$data['album']=$this->m_gallery->get_all_album();
		$data_head['user_data']=$this->user_data;		
		$data_head['head_name']="Admin Panel";
		$data_head['link_head']=site_url('admin');
		$this->load->view('v_header_admin',$data_head);
		$this->load->view('admin/v_gallery_list',$data);
		$this->load->view('admin/v_footer',$data_foot);
	}
	public function delete_album(){
		$id=$this->uri->segment(4,'');
		$this->m_gallery->delete_album($id);
		redirect('admin/gallery');
	}
	// Ajax 
	public function ajax_add_ppl(){
		$id=$this->m_gallery->generate_id();

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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */