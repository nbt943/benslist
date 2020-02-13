<?php
class Giveaway_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function giveaway_post_insert($data='')
	{ 
		$this->db->insert('ben_giveaway_listings',$data);	

		$insert_id = $this->db->insert_id(); 

		$result = $this->giveaway_post_show_by_id($insert_id); 

		return $result;
	}

	public function giveaway_post_show_by_id($giveaway_listing_id='')
	{	
		$this->db->select('ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_users.user_nicename,ben_giveaway_listings.*');
		$this->db->from('ben_giveaway_listings');
		$this->db->join('ben_users','ben_users.ID = ben_giveaway_listings.user_id');
		$this->db->join('ben_countries','ben_countries.ID = ben_giveaway_listings.country_id');
		$this->db->join('ben_states','ben_states.ID = ben_giveaway_listings.state_id');
		$this->db->join('ben_cities','ben_cities.ID = ben_giveaway_listings.city_id');
		$this->db->where('ben_giveaway_listings.ID',$giveaway_listing_id);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$rows = $query->result_array();

			foreach ($rows as $key => $row) {
				return $row;
			} 
		}
		else
		{
			return array();
		}
	}

	public function increase_view_giveaway_listings_by_id($giveaway_listing_id='')
  	{
	    $this->db->select('total_views');
	    $this->db->from('ben_giveaway_listings');
	    $this->db->where('ID',$giveaway_listing_id);
	    $query = $this->db->get();
	        
	    if ( $query->num_rows() > 0 )
	    {       
			$row = $query->result_array();
			$total_views= (int)$row[0]['total_views'];
			$this->db->set('total_views',$total_views+1);      
			$this->db->where('ID',$giveaway_listing_id);       
			$this->db->update('ben_giveaway_listings');
		}
	}

	public function get_giveaway_site_listings_by_cat_id($giveaway_cate='',$giveaway_listing_id='')
  	{
	    $this->db->select('ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_giveaway_listings.*');
	    $this->db->from('ben_giveaway_listings');
	    $this->db->join('ben_countries', 'ben_giveaway_listings.country_id = ben_countries.id');
	    $this->db->join('ben_states', 'ben_giveaway_listings.state_id = ben_states.id');
	    $this->db->join('ben_cities', 'ben_giveaway_listings.city_id = ben_cities.id');    
	    $this->db->where('ben_giveaway_listings.giveaway_cate',$giveaway_cate);    
	    $this->db->where('ben_giveaway_listings.ID !='.$giveaway_listing_id);        
	    $query = $this->db->get(); 

	    if ( $query->num_rows() > 0 )
	    {       
	       $row = $query->result_array(); 
	       return $row;
	    }

  	}

	public function show_your_giveaway_site_listings($user_id='')
	{
		$this->db->select('ben_users.user_nicename,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_giveaway_listings.*');
	    $this->db->from('ben_giveaway_listings'); 
	    $this->db->join('ben_users','ben_users.ID = ben_giveaway_listings.user_id');
	    $this->db->join('ben_countries', 'ben_giveaway_listings.country_id = ben_countries.id');
	    $this->db->join('ben_states', 'ben_giveaway_listings.state_id = ben_states.id');
	    $this->db->join('ben_cities', 'ben_giveaway_listings.city_id = ben_cities.id');  

	    if ($user_id != '')
	    {
			$this->db->where('ben_giveaway_listings.user_id',$user_id);	    	
	    }

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

  	public function insert_giveaway_requests($seller_id='',$buyer_id='',$giveaway_item_id='')
  	{  		
  		$this->db->select('*');
  		$this->db->from('ben_giveaway_listings');
  		$this->db->where('ID',$giveaway_item_id);

  		$query = $this->db->get();

  		$result = $query->result_array();

  		if($result)
  		{
  			$data = array('seller_id' => $seller_id,'buyer_id'=> $buyer_id, 'giveaway_item_id'=> $giveaway_item_id,'status'=>'R');
  			$this->db->insert('ben_giveaway_requests',$data);
  			return true;
  		}
  		else{
            return false;
  	    }
  	}

  	public function user_giveaway_site_listing_delete($giveaway_listing_id='')
  	{
  		$this->db->where('ID',$giveaway_listing_id);
  		$query = $this->db->delete('ben_giveaway_listings');

  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function giveaway_post_edit($giveaway_listing_id='',$data='')
  	{
  		$this->db->where('ID',$giveaway_listing_id);
     	$row = $this->db->update('ben_giveaway_listings',$data);
  		 
	    if ($row)
	    {  
	        return true;
	    }
	    else
	    {
	    	return false;
	    }
  	}

  	public function show_giveaway_requests_buyer($user_id='')
  	{  		
  		$this->db->select('ben_users.user_nicename as buyer,ben_users.ID as buyer_id,ben_giveaway_listings.*,ben_giveaway_requests.*');

  		$this->db->from('ben_giveaway_requests');

  		$this->db->join('ben_users','ben_users.ID = ben_giveaway_requests.buyer_id');
  		$this->db->join('ben_giveaway_listings','ben_giveaway_listings.ID = ben_giveaway_requests.giveaway_item_id');
  		$this->db->where('ben_giveaway_requests.seller_id',$user_id); 

  		$query = $this->db->get();

  		if($query)
  		{ 
  			$row = $query->result_array(); 
  			return $row;
  		}
  		else{
            return array();
  	    }
  	}

  	public function show_giveaway_requests_seller($user_id='')
  	{  		
  		$this->db->select('ben_users.user_nicename as seller,ben_users.ID as buyer_id,ben_giveaway_listings.*,ben_giveaway_requests.*');
  		$this->db->from('ben_giveaway_requests');
  		$this->db->join('ben_users','ben_users.ID = ben_giveaway_requests.seller_id');
  		$this->db->join('ben_giveaway_listings','ben_giveaway_listings.ID = ben_giveaway_requests.giveaway_item_id');
  		$this->db->or_where('ben_giveaway_requests.buyer_id',$user_id);

  		$query = $this->db->get();

  		if($query)
  		{ 
  			$row = $query->result_array(); 
  			return $row;
  		}
  		else{
            return array();
  	    }
  	}

  	public function status_giveaway_requests($buyer_id='',$requests_status='')
  	{  
  		$this->db->set('status',$requests_status);      
		$this->db->where('buyer_id',$buyer_id);       
		$row = $this->db->update('ben_giveaway_requests');
		if($row)
		{
			return true;
		}
		else
		{
			return false;
		}
  	}














  	// ADMIN

  public function giveaway_listing_approve($id='')
  { 
    $this->db->set('status','1');
    $this->db->where('ID',$id);
    $row = $this->db->update('ben_giveaway_listings');

     if($row)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function giveaway_listing_disapprove($id='')
  { 
    $this->db->set('status','2');
    $this->db->where('ID',$id);
    $row = $this->db->update('ben_giveaway_listings');

     if($row)
    {
      return true;
    }
    else
    {
      return false;
    }
  }	

  public function giveaway_disapprove_listing_show()
	{
		$this->db->select('ben_users.user_nicename,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_giveaway_listings.*');
		$this->db->where('ben_giveaway_listings.status = 2');
	    $this->db->from('ben_giveaway_listings'); 
	    $this->db->join('ben_users','ben_users.ID = ben_giveaway_listings.user_id');
	    $this->db->join('ben_countries', 'ben_giveaway_listings.country_id = ben_countries.id');
	    $this->db->join('ben_states', 'ben_giveaway_listings.state_id = ben_states.id');
	    $this->db->join('ben_cities', 'ben_giveaway_listings.city_id = ben_cities.id');  
 

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

	public function giveaway_approve_listing_show()
	{
		$this->db->select('ben_users.user_nicename,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_giveaway_listings.*');
		$this->db->where('ben_giveaway_listings.status = 1');
	    $this->db->from('ben_giveaway_listings'); 
	    $this->db->join('ben_users','ben_users.ID = ben_giveaway_listings.user_id');
	    $this->db->join('ben_countries', 'ben_giveaway_listings.country_id = ben_countries.id');
	    $this->db->join('ben_states', 'ben_giveaway_listings.state_id = ben_states.id');
	    $this->db->join('ben_cities', 'ben_giveaway_listings.city_id = ben_cities.id');  
 

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

	public function giveaway_search_filter($data='')
	{
		$filter_array = array_filter($data);
		$key_array = array_keys($filter_array);
// print_r($key_array);die;
		$this->db->select('ben_users.user_nicename,ben_countries.country_name,ben_giveaway_listings.*');
	    $this->db->from('ben_giveaway_listings'); 
	    $this->db->join('ben_users','ben_users.ID = ben_giveaway_listings.user_id');
	    $this->db->join('ben_countries', 'ben_giveaway_listings.country_id = ben_countries.id'); 

		 for ($i=0; $i < count($filter_array); $i++) 
		 { 
		 	$this->db->like($key_array[$i],$filter_array[$key_array[$i]]);
		 }

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




















}

?>