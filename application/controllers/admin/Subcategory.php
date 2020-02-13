<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Subcategory extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');		 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_subcategory()
	{
		$this->global['pageTitle'] = 'Benslist : Add Category'; 

		$result['categories']	= $this->Category_model->show_your_categories();
		
		$this->loadViews('admin/sub-category/add',$this->global,$result,NULL);			
		
	}



	function insert_subcategory()
	{
		



			$result = $this->Subcategory_model->insert_your_subcategory($_POST);

			if($result == ''){
				
				$this->session->set_flashdata('message','Sub Category created successfully!');

				redirect(base_url('admin/sub-category/sub-category-add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
			
	}

	function show_subcategory()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$result['subcategories'] = $this->Subcategory_model->show_your_subcategories();

		$this->loadViews('admin/sub-category/show',$this->global,$result,NULL);		
	}

	function edit_subcategory() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_subcategory'] = $this->Subcategory_model->sub_category_edit($id);
		$result['categories'] = $this->Category_model->show_your_categories();
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/sub-category/edit',$this->global,$result, NULL);			
	}

	function update_subcategory()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');	 	
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
	
		$result = $this->Subcategory_model->sub_category_update($id,$_POST);

		if($result == true)
		{
			$this->session->set_flashdata('message','Sub category updated successfully!');
			redirect(base_url('admin/sub-category/show-sub-category'));
		}else {
				$this->session->set_flashdata('message',$result);
				$this->edit_subcategory();
		}
		
	} 

	function deleted_subcategory()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->Subcategory_model->sub_category_deleted($id);

		redirect(base_url('admin/sub-category/show-sub-category'));

	}

	public function show_deleted_subcategory()
	{
		 $this->global['pageTitle'] = 'Benslist : Deleted Category';

		$result['subcategories'] = $this->Subcategory_model->show_your_subcategories();

		$this->loadViews('admin/sub-category/deleted',$this->global,$result,NULL);		
	}

	function delete_subcategory()
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);

		$result = $this->Subcategory_model->sub_category_delete($id);

		redirect(base_url('admin/sub-category/show-deleted-sub-category'));


	}

	function active_subcategory()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->Subcategory_model->sub_category_active($id);
		redirect(base_url('admin/sub-category/show-deleted-sub-category'));

	}





	function sort_subcategory()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Sort Category';
		
		$this->loadViews('admin/category/sort',$this->global,NULL,NULL);		
	}



//CATEGORY FEATURE	

	function add_new_subcategory_feature()
	{ 	 		
		$this->global['pageTitle'] = 'Benslist: Add Category Feature';
		
		$this->loadViews('admin/category/feature-add',$this->global,NULL,NULL);			
		
	}

	function insert_feature_subcategory()
	{
		
		//$this->form_validation->set_rules('parent_category_id', 'Trade', 'required');	
		$this->form_validation->set_rules('feature_name', 'Feature Name', 'required');	
		// $this->form_validation->set_rules('description', 'Description', 'required');	
		// $this->form_validation->set_rules('image', 'Image', 'required');	
		// $this->form_validation->set_rules('status', 'Status', 'required');	

		if($this->form_validation->run()) {

			$result = $this->Subcategory_model->insert_your_feature_subcategory($_POST);
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

	function show_subcategory_feature()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$result['subcategories'] = $this->Subcategory_model->show_your_subcategories();
		
		$this->loadViews('admin/category/show',$this->global,NULL,NULL);		
	}

 	// public function show_sub_cat_by_cat_id()
 	// {

 	// 	$cat_id = $_POST['cat_id'];

		// $result['cat_subcategories'] = $this->Subcategory_model->show_sub_cat_by_cat_id_model($cat_id);
		

 	// }
	
 }
?>
