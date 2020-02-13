<?php
class Brand_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_brand($data='')
	{ 
		$data['slug'] = url_title($data['name'], 'dash', true);
		
		$this->db->insert('ben_brands',$data);		 
	}

  function show_your_brands() 
  {	 

		$this->db->select('ben_brands.*,ben_subcategories.name as sub_cat_name');
	    $this->db->from('ben_brands');
	    $this->db->join('ben_subcategories', 'ben_subcategories.ID = ben_brands.sub_cat_id');
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

  function show_your_brands_by_sub_cat($id) 
  {	 

		$this->db->select('ben_brands.*,ben_subcategories.name as sub_cat_name');
	    $this->db->from('ben_brands');
	    $this->db->join('ben_subcategories', 'ben_subcategories.ID = ben_brands.sub_cat_id');
	    $this->db->where('ben_brands.sub_cat_id',$id);	    
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}


  // function show_your_inactive_brands() 
  // {	 

		// $this->db->select('ben_brands.*,ben_categories.name as cat_name');
	 //    $this->db->from('ben_brands');
	 //    $this->db->join('ben_categories', 'ben_categories.ID = ben_brands.cat_id');
	 //    $this->db->where('ben_brands.status',0);	    
	    
	 //    $query = $this->db->get();

	 //    if ( $query->num_rows() > 0 )
	 //    {
	 //       $row = $query->result_array(); 
	 //       return $row;
	 //    }
 	// }


 	function show_limit_brands() 
  	{	  
		$this->db->select('ben_categories.name,ben_categories.*');
	    $this->db->from('ben_categories');
	    $this->db->limit(8);  
	    $this->db->order_by('rand()');

	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

 	function brand_edit($id)
 	{   
	    $this->db->select('*');
	    $this->db->from('ben_brands');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
  	}

  	function brand_update($id,$data='')
  	{
  		$this->db->where('ID',$id);
  		$query = $this->db->update('ben_brands',$data);

  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function brand_deleted($id='')
 	{ 
	    $this->db->set('status','0');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_brands');

	     if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

  	function delete_brand($id)
  	{
  		$this->db->where('ID',$id);
  		$query = $this->db->delete('ben_brands');
  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function brand_active($id='')
 	{ 
	    $this->db->set('status','1');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_brands');

	     if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}






 //CATEGORY FEATURE

	public function insert_your_feature_category($data='')
	{ 
		$this->db->insert('ben_brand_features',$data);		 
	}

 	public function show_your_categories_feature($data='')
 	{
	 	$this->db->select('*');
	    $this->db->from('ben_brand_features');

	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

 	public function show_sub_cat_by_cat_id_model($cat_id='')
 	{


	 	$this->db->select('*');
	    $this->db->from('ben_brands');
	    $this->db->where('cat_id',$cat_id);
	    
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }

 	}

 	public function show_brand_by_sub_cat_id_model($sub_cat_id='')
 	{


	 	$this->db->select('*');
	    $this->db->from('ben_brands');
	    $this->db->where('sub_cat_id',$sub_cat_id);
	    
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }

 	}

}