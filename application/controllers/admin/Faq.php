<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Faq extends BaseController {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->library('encrypt');
		$this->load->model('Faq_model'); 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	function add_new_faq()
	{
		//$result['users'] = $this->Listing_model->get_users();		
		 		
		$this->global['pageTitle'] = 'Benslist : Add Faq';
		
		$this->loadViews('admin/faq/add',$this->global,NULL,NULL);			
		
	}

	public function insert_faq()  
	{		
		$this->form_validation->set_rules('question', 'Question', 'required');	
		$this->form_validation->set_rules('answer', 'Answer', 'required'); 	 

		if($this->form_validation->run()) {

			$result = $this->Faq_model->insert_your_faq($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','FAQ added successfully!');

				redirect(base_url('admin/faq/add-new/'));

			}else {
				$this->session->set_flashdata('message',$result);
				$this->add_new_country();
			}
		}else {
			
			$this->add_new_country();
		}		
		
	}

	function show_faq()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Show Faq';

		$result['faqs'] = $this->Faq_model->show_your_faq();
		
		$this->loadViews('admin/faq/show',$this->global,$result,NULL);		
	}

	function edit_faq() 
	{
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);
		$result['single_faq'] = $this->Faq_model->faq_edit($id);
		$this->global['pageTitle'] = 'Benslist  : Edit';
		$this->loadViews('admin/faq/edit',$this->global,$result, NULL);			
	}

	public function update_faq()
	{
		$this->form_validation->set_rules('question', 'Question', 'required');	
		$this->form_validation->set_rules('answer', 'Answer', 'required');  

		if($this->form_validation->run()) {

			$result = $this->Faq_model->faq_update($_POST);
			if($result == ''){
				
				$this->session->set_flashdata('message','Faq Not Update successfully!');

				redirect(base_url('admin/faq/show'));

			}else {
				$this->session->set_flashdata('message','Faq Update successfully!');
				$this->show_faq();
			}
		}else {
			
			$this->show_faq();
		}	


	}

	function deleted_faq()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);  

		$result = $this->Faq_model->faq_deleted($id);
		
		$this->show_faq();
	}

	function show_deleted_faq()
	{ 
		$this->global['pageTitle'] = 'Benslist : Deleted Listing';

		$result['faqs'] = $this->Faq_model->show_your_faq(); 

		$this->loadViews('admin/faq/deleted',$this->global,$result,NULL);	 
	}

	function delete_faq()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last);

		$this->global['pageTitle'] = 'Benslist : Deleted Faq';

		$result = $this->Faq_model->faq_delete($id);

		$this->show_deleted_faq(); 
	}
 
	function active_faq()
	{ 		 		
		$last = $this->uri->total_segments();
		$id = $this->uri->segment($last); 

		$result = $this->Faq_model->faq_active($id);

		$this->show_deleted_faq(); 
	}

	function sort_faq()
	{ 		 		
		$this->global['pageTitle'] = 'Benslist : Sort Faq';
		
		$this->loadViews('admin/faq/sort',$this->global,NULL,NULL);		
	}

 
	
 }
?>
