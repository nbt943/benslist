<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Ajax extends BaseController {
	public function __construct() {
		//ATul CHnage
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation'); 
		$this->load->model('Location_model'); 

        $this->isLoggedIn();   
		if($this->session->userdata('role') != '1') { 
			redirect(base_url('dashboard'));
		}
	}

	//test test 123 
	//cyrax branch

	public function get_states_by_country()
	{
		$country_id = $_POST['country_id'];
		$result['states'] = $this->Location_model->get_your_states_ajax($country_id); ?> 
		<option value="">Select State</option>
		<?php foreach ($result['states']  as $state) { ?>
			<option value="<?php echo $state['ID'] ?>"><?php echo $state['state_name'] ?></option> 
     <?php }  

	}

	public function get_cities_by_state()
	{
		$state_id = $_POST['state_id'];
		$result['cities'] = $this->Location_model->get_your_cities_ajax($state_id); ?>
<option value="">Select City</option>
		<?php foreach ($result['cities']  as $city) { ?>
			<option value="<?php echo $city['ID'] ?>"><?php echo $city['city_name'] ?></option> 
     <?php }  

	}





	
}