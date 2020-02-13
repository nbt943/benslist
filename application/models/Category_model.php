<?php
class Category_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_category($data='')
	{ 
		$this->db->insert('ben_categories',$data);		 
	}

  function show_your_categories() 
  {	 

		// $this->db->select('p.name parent, c.*');
	 //    $this->db->from('ben_categories c');
	 //    $this->db->join('ben_categories p', 'p.id = c.parent_category_id');
	 //    $this->db->where('ben_categories p', 'p.id = c.parent_category_id');

		$this->db->select('ben_categories.name,ben_categories.*');
	    $this->db->from('ben_categories');

	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

 	function show_your_subcategory()
 	{
 		$this->db->select('*');
 		$this->db->from('ben_subcategories');

 		$query = $this->db->get();

 		if( $query->num_rows() > 0)
 		{
 			$row = $query->result_array();
 			return $row;

 		}
 	}

 	function show_limit_categories() 
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
	    else
	    {
	    	$row = "";
	    }
 	}

 	function category_edit($id)
 	{   
	    $this->db->select('*');
	    $this->db->from('ben_categories');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
  	}

  	function category_update($id,$data='')
  	{
  		unset($data['image_new_name']); 
  		$this->db->where('ID',$id);
  		$query = $this->db->update('ben_categories',$data);

  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function category_deleted($id='')
 	{ 
	    $this->db->set('status','0');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_categories');

	     if($row)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
	}

  	function category_delete($id)
  	{
  		$this->db->where('ID',$id);
  		$query = $this->db->delete('ben_categories');
  		if($query)
  		{
  			return true;
  		}
  		else
  		{
  			return false;
  		}
  	}

  	public function category_active($id='')
 	{ 
	    $this->db->set('status','1');
	    $this->db->where('ID',$id);
	    $row = $this->db->update('ben_categories');

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
		$this->db->insert('ben_category_features',$data);		 
	}

 	public function show_your_categories_feature($data='')
 	{
	 	$this->db->select('*');
	    $this->db->from('ben_category_features');

	    $query = $this->db->get();

	    if ( $query->num_rows() > 0 )
	    {
	       $row = $query->result_array(); 
	       return $row;
	    }
 	}

		 
}