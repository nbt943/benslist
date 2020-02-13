<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Brand extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Subcategory_model');
		$this->load->model('brand_model');		 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_brand()
	{
		$this->global['pageTitle'] = 'Benslist : Add Category'; 

		$result['subcategories']	= $this->Subcategory_model->show_your_subcategories();
		
		$this->loadViews('admin/brand/add',$this->global,$result,NULL);			
		
	}



	function insert_brand()
	{
		



			$result = $this->brand_model->insert_your_brand($_POST);

			if($result == ''){
				
				$this->session->set_flashdata('message','Brand created Successfully!');

				redirect(base_url('admin/brand/brand-add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				redirect('admin/user/new-user');
			}
			
	}

	function show_brand()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$result['brands'] = $this->brand_model->show_your_brands();

		$this->loadViews('admin/brand/show',$this->global,$result,NULL);		
	}

	function edit_brand() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);		
		$result['single_brand'] = $this->brand_model->brand_edit($id);
		$result['subcategories'] = $this->Subcategory_model->show_your_subcategories();
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/brand/edit',$this->global,$result, NULL);			
	}

	function update_brand()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');	 	
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
	
		$result = $this->brand_model->brand_update($id,$_POST);

		if($result == true)
		{
			$this->session->set_flashdata('message','Brand Updated Successfully!');
			redirect(base_url('admin/brand/show-brand'));
		}else {
				$this->session->set_flashdata('message',$result);
				$this->edit_brand();
		}
		
	} 

	function deleted_brand()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->brand_model->brand_deleted($id);



			redirect(base_url('admin/brand/show-brand'));


	}

	public function show_deleted_brand()
	{
		 $this->global['pageTitle'] = 'Benslist : Deleted Category';

		$result['brands'] = $this->brand_model->show_your_brands();

		$this->loadViews('admin/brand/deleted',$this->global,$result,NULL);		
	}

	function delete_brand()
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);

		$result = $this->brand_model->delete_brand($id);

		redirect(base_url('admin/brand/show-deleted-brand'));
	}

	function active_brand()
	{ 		 	

		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->brand_model->brand_active($id);

		redirect(base_url('admin/brand/show-deleted-brand'));
	}





	function sort_brand()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Sort Category';
		
		$this->loadViews('admin/category/sort',$this->global,NULL,NULL);		
	}



//CATEGORY FEATURE	

	function add_new_brand_feature()
	{ 	 		
		$this->global['pageTitle'] = 'Benslist: Add Category Feature';
		
		$this->loadViews('admin/category/feature-add',$this->global,NULL,NULL);			
		
	}

	function insert_feature_brand()
	{
		
		//$this->form_validation->set_rules('parent_category_id', 'Trade', 'required');	
		$this->form_validation->set_rules('feature_name', 'Feature Name', 'required');	
		// $this->form_validation->set_rules('description', 'Description', 'required');	
		// $this->form_validation->set_rules('image', 'Image', 'required');	
		// $this->form_validation->set_rules('status', 'Status', 'required');	

		if($this->form_validation->run()) {

			$result = $this->brand_model->insert_your_feature_brand($_POST);
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

	function show_brand_feature()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Category';

		$result['categories'] = $this->brand_model->show_your_subcategories();
		
		$this->loadViews('admin/category/show',$this->global,NULL,NULL);		
	}

 
	
 }
?>
