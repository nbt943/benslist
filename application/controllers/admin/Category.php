<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Category extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Category_model'); 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}

		if($this->session->userdata('role') == '3') { 
			redirect(base_url('login'));
		}
	}

	function add_new_category()
	{
		$this->global['pageTitle'] = 'Benslist : Add Category'; 

		$result['categories']	= $this->Category_model->show_your_categories();
		
		$this->loadViews('admin/category/add',$this->global,$result,NULL);			
		
	}

// Add Sub Category



	function insert_category()
	{
		
		$this->form_validation->set_rules('name', 'Name', 'required');	
	 	$new_name = preg_replace('/\s+/', '', time().'-'.$_FILES["image"]['name']);
	    $config['upload_path']          = './assets/images/category';
	    $config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name'] = $new_name;   
	    $this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
			$error = array('error' => $this->upload->display_errors());
			$image = '';
		}
		else
		{

			$data = array('upload_data' => $this->upload->data());
			$image = $new_name;
		}
        
        $cate_data = array(
        	'name'=>$_POST['name'],
        	'description'=>$_POST['description'],
        	'image'=>$new_name);

			$result = $this->Category_model->insert_your_category($cate_data);

			if($result == ''){
				
				$this->session->set_flashdata('message','Category created successfully!');

				redirect(base_url('admin/category/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
			
	}

	function show_category()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$categories = $this->Category_model->show_your_categories();

		if ($categories == '')
		{			
			$result['categories'] = array();			

		}
		else
		{
			$result['categories'] = $categories;			
		}

		$this->loadViews('admin/category/show',$this->global,$result,NULL);		
	}

	function edit_category() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_category'] = $this->Category_model->category_edit($id);
		$result['categories'] = $this->Category_model->show_your_categories();
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/category/edit',$this->global,$result, NULL);			
	}

	function update_category()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');	 	
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		if(!empty($_FILES["image"])) {
		    $config['upload_path']          = './assets/images/category';
		    $config['allowed_types']        = 'gif|jpg|png';
		    if($_POST['image_new_name'] ==''){
				$new_name = time().'-'.$_FILES["image"]['name'];
		    }else {

				$new_name = $_POST['image_new_name'];	    	
		    }


		    // echo $new_name; die();
			$config['file_name'] = $new_name; ;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('image'))
	        {


                $error = array('error' => $this->upload->display_errors());

//                print_r($error); die();
                $_POST['image'] = '';
	        }
	        else
	        {

	            $data = array('upload_data' => $this->upload->data());
	            $_POST['image'] = $new_name;
	        }

	    }else {

                $_POST['image'] = $new_name;


	    }

		if($this->form_validation->run())
		{
		$result = $this->Category_model->category_update($id,$_POST);

		if($result == true)
		{
			$this->session->set_flashdata('message','Category updated successhully!');
			redirect(base_url('admin/category/show-category'));
		}else {
				$this->session->set_flashdata('message',$result);
				$this->update_listing();
		}
		}else
		{
			$this->edit_category();
		}
	} 

	function deleted_category()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->Category_model->category_deleted($id);

		$this->show_category();
	}

	public function show_deleted_category()
	{
		 $this->global['pageTitle'] = 'Benslist : Deleted Category';

		$result['categories'] = $this->Category_model->show_your_categories();

		$this->loadViews('admin/category/deleted',$this->global,$result,NULL);		
	}

	function delete_category()
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);

		$result = $this->Category_model->category_delete($id);

		$this->show_deleted_category();
	}

	function active_category()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->Category_model->category_active($id);

		$this->show_deleted_category();
	}





	function sort_category()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Sort Category';
		
		$this->loadViews('admin/category/sort',$this->global,NULL,NULL);		
	}



//CATEGORY FEATURE	

	function add_new_category_feature()
	{ 	 		
		$this->global['pageTitle'] = 'Benslist: Add Category Feature';
		
		$this->loadViews('admin/category/feature-add',$this->global,NULL,NULL);			
		
	}

	function insert_feature_category()
	{
		
		//$this->form_validation->set_rules('parent_category_id', 'Trade', 'required');	
		$this->form_validation->set_rules('feature_name', 'Feature Name', 'required');	
		// $this->form_validation->set_rules('description', 'Description', 'required');	
		// $this->form_validation->set_rules('image', 'Image', 'required');	
		// $this->form_validation->set_rules('status', 'Status', 'required');	

		if($this->form_validation->run()) {

			$result = $this->Category_model->insert_your_feature_category($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Feature category created successfully!');

				redirect(base_url('admin/category-feature/add-new'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
		}else {
			
			$this->add_new_category_feature();
		}		
		
	}

	function show_category_feature()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$result['categories'] = $this->Category_model->show_your_categories();
		
		$this->loadViews('admin/category/show',$this->global,NULL,NULL);		
	}

 
	
 }
?>
