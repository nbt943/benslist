<?php
class Subcategory_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_subcategory($data='')
	{ 
		$this->db->insert('ben_subcategories',$data);		 
	}

  function show_your_subcategories() 
  {	 

		$this->db->select('ben_subcategories.*,ben_categories.name as cat_name');
	    $this->db->from('ben_subcategories');
	    $this->db->join('ben_categories', 'ben_categories.ID = ben_subcategories.cat_id');
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

 	function show_limit_subcategories() 
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

 	function sub_category_edit($id)
 	{   
	    $this->db->select('*');
	    $this->db->from('ben_subcategories');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
  	}

  	function sub_category_update($id,$data='')
  	{
  		$this->db->where('ID',$id);
  		$query = $this->db->update('ben_subcategories',$data);

  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function sub_category_deleted($id='')
 	{ 
	    $this->db->set('status','0');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_subcategories');

	     if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

  	function sub_category_delete($id)
  	{
  		$this->db->where('ID',$id);
  		$query = $this->db->delete('ben_subcategories');
  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function sub_category_active($id='')
 	{ 
	    $this->db->set('status','1');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_subcategories');

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
		$this->db->insert('ben_subcategory_features',$data);		 
	}

 	public function show_your_categories_feature($data='')
 	{
	 	$this->db->select('*');
	    $this->db->from('ben_subcategory_features');

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
	    $this->db->from('ben_subcategories');
	    $this->db->where('cat_id',$cat_id);
	    
	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }

 	}

		 
}