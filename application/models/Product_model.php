<?php
class Product_model extends CI_Model
{

 public function __construct()
 {
  parent::__construct();
	$this->load->database();
 }

 function add_product ($packageData) {

    $data = array(
        'package_id'=>$packageData['package_id'],
        'package_name'=>$packageData['package_name'],
        'validity'=>$packageData['validity'],
        'price'=>$packageData['price'],        
        'renewal_price'=>$packageData['renewal_price'],
		'datetime'=>date('y-m-d h:i:s'),
		);

			$this->db->insert('ca_packages',$data);
	}
 function get_all_products() {
	 
	$this->db->select('*');
    $this->db->from('ca_packages');
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->result();
		
		//print_r($row); die;
        return $row;
    }
	
 }
	function update_your_product ($packageData,$id) {

		$data = array(
			'package_id'=>$packageData['package_id'],
			'package_name'=>$packageData['package_name'],
			'validity'=>$packageData['validity'],
			'price'=>$packageData['price'],        
			'renewal_price'=>$packageData['renewal_price'],
			'datetime'=>date('y-m-d h:i:s'),
			);


		$this->db->where('ID',$id);
		$this->db->update('ca_packages',$data);		

    }

 

 function delete_your_product($id) {
	 
	     $this->db->where('ID', $id);
	   	$this->db->delete('ca_packages');
 }
 
  function edit_your_product($id) {
	 
	$this->db->select('*');
    $this->db->from('ca_packages');
    $this->db->where('ID',$id);
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
        $row = $query->result_array();		
        return $row[0];
    }
 }
 

 
}

?>
