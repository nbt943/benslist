<?php
class Cms_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_cms($data='')
	{ 
		$this->db->insert('ben_cms',$data);		 
	}

	public function show_your_cms($data='')
	{
		$this->db->select('*');
		$this->db->from('ben_cms'); 

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

	function cms_edit($id)
	{   
	    $this->db->select('*');
	    $this->db->from('ben_cms');
	    $this->db->where('id',$id);
	    $query = $this->db->get();
	    if ( $query->num_rows() > 0 )
	    {
	        $row = $query->result_array();
	        return $row[0];
	    }
	  }

	function update_your_cms($data='')
  	{
	    $this->db->where('ID',$data['id']);
	    $row = $this->db->update('ben_cms',$data);

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