<?php
class Faq_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_faq($data='')
	{ 
		$this->db->insert('ben_faqs',$data);		 
	}

	public function show_your_faq()
	{
		$this->db->select('*');
		$this->db->from('ben_faqs'); 

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
	 
	function faq_edit($id)
	{   
	    $this->db->select('*');
	    $this->db->from('ben_faqs');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
	  }

	 public function faq_update($data='')
 	{	  
 		$this->db->where('ID',$data['id']);
 		$row = $this->db->update('ben_faqs',$data);	

 		if($row)
 		{
 			return true;
 		}
 		else
 		{
 			return false;
 		}
 	}



	public function faq_deleted($id='')
	{ 
		$this->db->set('status','0');
		$this->db->where('ID',$id);
		$row = $this->db->update('ben_faqs');

		 if($row)
		{
		  return true;
		}
		else
		{
		  return false;
		}
	}

	function faq_delete($id)
 	{
	    $this->db->where('ID',$id);
	    $query = $this->db->delete('ben_faqs');

	    if($query)
	    {
	      return true;
	    }
	    else
	    {
	      return false;
	    }
  	}

  	public function faq_active($id='')
  { 
    $this->db->set('status','1');
    $this->db->where('ID',$id);
    $row = $this->db->update('ben_faqs');

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