<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Cms extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Cms_model'); 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_cms()
	{
		$this->global['pageTitle'] = 'Benslist : Add CMS';
		
		$this->loadViews('admin/cms/add',$this->global,NULL,NULL);			
		
	}

	public function insert_cms()  
	{		
		$this->form_validation->set_rules('page_title', 'Page Title', 'required');	
		$this->form_validation->set_rules('page_slug', 'Page Slug', 'required');
		$this->form_validation->set_rules('page_url', 'Page URL', 'required');	
		$this->form_validation->set_rules('page_content', 'Page Content', 'required'); 

		if($this->form_validation->run()) {
// print_r($_POST);die;
			$result = $this->Cms_model->insert_your_cms($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','CMS added successfully!');

				redirect(base_url('admin/cms/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				$this->add_new_cms();
			}
		}else {
			
			$this->add_new_cms();
		}	
		
	}

	function show_cms()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show CMS';

		$result['cms_page'] = $this->Cms_model->show_your_cms();
		
		$this->loadViews('admin/cms/show',$this->global,$result,NULL);		
	}

	function edit_cms() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$result['single_cms'] = $this->Cms_model->cms_edit($id);
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/cms/edit',$this->global,$result, NULL);			
	}

	function update_cms()
	 {

	 	$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$_POST['id'] = $id;

	 	$this->form_validation->set_rules('page_title', 'Page Title', 'required');	
		$this->form_validation->set_rules('page_slug', 'Page Slug', 'required');
		$this->form_validation->set_rules('page_url', 'Page URL', 'required');	
		$this->form_validation->set_rules('page_content', 'Page Content', 'required'); 


		if($this->form_validation->run()) {

			//print_r($_POST); die();

			$result = $this->Cms_model->update_your_cms($_POST);

			if($result == true){
				
				$this->session->set_flashdata('message','CMS updated successfully!');

				redirect(base_url('admin/cms/show-cms'));

			}else {
				$this->session->set_flashdata('message','CMS not updated');
				$this->update_cms();
			}
		}else { 
			$this->edit_cms();
		}
	}

	function deleted_cms()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Deleted CMS';
		
		$this->loadViews('admin/cms/deleted',$this->global,NULL,NULL);		
	} 
 
	
 }
?>
