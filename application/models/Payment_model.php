<?php
class Payment_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_payment_plans($data='')
	{  
		$this->db->insert('ben_payment_plan',$data);		 
	} 


  	public function show_your_payment_plans($plan_id= '')
	{  
		$this->db->select('*');	
		$this->db->from('ben_payment_plan');	
		if($plan_id !=''){

		$this->db->where('id',$plan_id);
			
		}


		$query = $this->db->get();


		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return array();
		} 
	}

	
	function delete_payment($id='')
 	{
	    $this->db->where('ID',$id);
	    $query = $this->db->delete('ben_payment_plan');

	    if($query)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
  	}

  	public function payment_plan_user($user_id,$data='')
	{ 
		// echo '<pre>'; print_r($data);die;

		$data = array( 
			'payment_Id'=>$data->id,
			'user_id'=>$user_id,
			'payer_id'=>$data->payer->payer_info->payer_id,
			'package'=>$data->transactions[0]->item_list->items[0]->name,
			'currency_code'=>$data->transactions[0]->amount->currency,
			'payment_email'=>$data->payer->payer_info->email,
			// 'token'=>$data['token'],
			'amount'=>$data->transactions[0]->amount->total,
			'product_id'=>$data->transactions[0]->item_list->items[0]->description,
			'payment_date'=> date('Y-m-d H:i:s')
			); 

		$this->db->insert('ben_paypal_payments',$data);		 
	} 

		public function stripe_plan_user($user_id,$data='')
	{ 
		// echo '<pre>'; print_r($data);
		$amount = $data->amount/100;
		$data = array( 
			'payment_Id'=>$data->id,
			'user_id'=>$user_id,  
			'currency_code'=>$data->currency,  
			'amount'=>$amount, 
			'payment_date'=> date('Y-m-d H:i:s')
			); 

		$this->db->insert('ben_stripe_payments',$data);		 
	} 

	public function show_paypal_payment()
	{ 
		$this->db->select('ben_users.user_nicename,ben_paypal_payments.*');
		$this->db->from('ben_paypal_payments');
    	$this->db->join('ben_users', 'ben_paypal_payments.user_id = ben_users.ID'); 

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array(); 
			return $row;
		}
		else
		{
			return array();
		}
	}

	public function show_stripe_payment()
	{
		$this->db->select('ben_users.user_nicename,ben_stripe_payments.*');
		$this->db->from('ben_stripe_payments');
		$this->db->join('ben_users','ben_stripe_payments.user_id=ben_users.ID');
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array(); 
			return $row;
		}
		else
		{
			return array();
		}
	}



// PAYMENT SETTINGS

	public function show_admin_payment_details()
	{
    
	    $this->db->select('*');
	    $this->db->from('ben_payment_setting'); 
	    $query = $this->db->get();
	        
	    if ( $query->num_rows() > 0 )
	    {       
	       $row = $query->result_array();
	       return $row;
	    }
	    else
	    {
	    	return array();
	    }
	}

	public function payment_status_insert($status='')
	{ 	 
		$this->db->set('status',$status['status']);
	    $this->db->where('ID',$status['id']);
	    $row = $this->db->update('ben_payment_setting');

	     if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

	public function paypal_key_insert($id='',$data='')
	{ 
		$data = array('payment_keys' => $data); 
	
	    $this->db->where('ID',$id);
		$row = $this->db->update('ben_payment_setting',$data); 
		
 		if($row)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
	}







	 
	 
}

?>