<?php
class Location_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//COUNTRY

	public function insert_your_country($data='')
	{ 
		$this->db->insert('ben_countries',$data);		 
	}

	public function show_your_countries($data='')
	{
		$this->db->select('*');
		$this->db->from('ben_countries'); 

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}

	}

	public function country_edit($id='')
	{
		$this->db->select('*');
	    $this->db->from('ben_countries');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
 	} 

 	public function country_update($data='')
 	{	 
 		$this->db->where('ID',$data['id']);
 		$row = $this->db->update('ben_countries',$data);	

 		if($row)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}

	





//STATE

	public function insert_your_state($data='')
	{  
		$this->db->insert('ben_states',$data);		 
	}

	public function show_your_states($data='')
	{	  
		$this->db->select('ben_countries.country_name,ben_states.*');
		$this->db->from('ben_states'); 
		$this->db->join('ben_countries','ben_states.country_id=ben_countries.ID');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}

	}

	 

	public function get_your_states_ajax($id)
	{
		$this->db->where('country_id',$id);
		$this->db->select('*');
		$this->db->from('ben_states');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}

	}

	public function state_edit($id='')
	{
		$this->db->select('*');
	    $this->db->from('ben_states');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
 	} 

 	function update_your_state($data='')
	 {
	   $this->db->where('ID',$data['id']);
	    $row = $this->db->update('ben_states',$data);

	    if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	 }

//CITY

	public function insert_your_city($data='')
	{ 
		$this->db->insert('ben_cities',$data);
	}

	public function show_your_cities($data='')
	{
		$this->db->select('ben_states.state_name,ben_cities.*');
		$this->db->from('ben_cities'); 
		$this->db->join('ben_states','ben_states.id = ben_cities.state_id');

		
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}
	}

	public function get_your_cities_ajax($id)
	{
		$this->db->where('state_id',$id);
		$this->db->select('*');
		$this->db->from('ben_cities');

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else
		{
			return false;
		}

	}

	public function city_edit($id='')
	{
		$this->db->select('*');
	    $this->db->from('ben_cities');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
 	} 

 	function update_your_city($data='')
	 {
	   $this->db->where('ID',$data['id']);
	    $row = $this->db->update('ben_cities',$data);

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