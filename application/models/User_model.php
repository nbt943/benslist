<?php
class User_model extends CI_Model
{

 public function __construct()
 {
  parent::__construct();
	$this->load->database();
 }



 function get_sellers () {
	 
    $query = $this->db->query('SELECT
    id,display_name FROM ben_users where user_status="3"');
		 		 
    return $query->result();
	 	 
 }

 function get_users ($user_id="") {
	   

 
 if($user_id != ""){ 
   $sql ='SELECT
    u1.id,
    u1.user_login,
    u1.user_email,
    m1.meta_value AS firstname,
    m2.meta_value AS lastname,
    m3.meta_value AS role,
    m4.meta_value AS phone,
    m5.meta_value AS avatar
  FROM ben_users u1
  JOIN ben_usermeta m1 ON (m1.user_id = u1.id AND m1.meta_key = "first_name")
  JOIN ben_usermeta m2 ON (m2.user_id = u1.id AND m2.meta_key = "last_name")
  JOIN ben_usermeta m3 ON (m3.user_id = u1.id AND m3.meta_key = "user_role")
  JOIN ben_usermeta m4 ON (m4.user_id = u1.id AND m4.meta_key = "user_phone")
  JOIN ben_usermeta m5 ON (m5.user_id = u1.id AND m5.meta_key = "user_avatar") WHERE u1.id="'.$user_id.'"';
  }else{

   $sql ='SELECT
    u1.id,
    u1.user_login,
    u1.user_email,
    m1.meta_value AS firstname,
    m2.meta_value AS lastname,
    m3.meta_value AS role,
    m4.meta_value AS phone,
    m5.meta_value AS avatar
  FROM ben_users u1
  JOIN ben_usermeta m1 ON (m1.user_id = u1.id AND m1.meta_key = "first_name")
  JOIN ben_usermeta m2 ON (m2.user_id = u1.id AND m2.meta_key = "last_name")
  JOIN ben_usermeta m3 ON (m3.user_id = u1.id AND m3.meta_key = "user_role")
  JOIN ben_usermeta m4 ON (m4.user_id = u1.id AND m4.meta_key = "user_phone")
  JOIN ben_usermeta m5 ON (m5.user_id = u1.id AND m5.meta_key = "user_avatar")';

  }		 		 

    $query = $this->db->query($sql);

  //  print_r($query->result()); 
    return $query->result();
	 	 
 }
 
 function insert_user($user_login,$user_email,$user_pass,$user_role,$first_name,$last_name,$user_phone)
 {

	$user_pass = getHashedPassword($user_pass);
	
	//print_r($user_pass); die;

    $data = array(
        'user_login'=>$user_login,
        'user_email'=>$user_email,
		'user_pass'=>$user_pass,
		'user_nicename'=>$user_login,
		'display_name'=>$user_login,
		'user_status'=>$user_role,
		'user_registered'=> date('Y-m-d H:i:s')
    );
    $this->db->insert('ben_users',$data);	
    $inserted_user_id = $this->db->insert_id();
	
  	if($inserted_user_id) {
  		
  		$meta_data = array(
  		
  			array('user_id'=>$inserted_user_id, 'meta_key'=>'first_name','meta_value'=>$first_name),
  			array('user_id'=>$inserted_user_id, 'meta_key'=>'last_name','meta_value'=>$last_name),
  			array('user_id'=>$inserted_user_id, 'meta_key'=>'user_phone','meta_value'=>$user_phone),
  			array('user_id'=>$inserted_user_id, 'meta_key'=>'user_role','meta_value'=>$user_role),

  		);
  		foreach($meta_data as $meta) {
  			
  		$this->db->insert('ben_usermeta',$meta);		
  		
  		}
  		
  		
  	}
 }
 
 function user_edit($id) {
	 
	$query = $this->db->query('SELECT
    u1.id,
	u1.user_login,
    u1.user_email,
	u1.user_pass,
    m1.meta_value AS firstname,
    m2.meta_value AS lastname,
    m3.meta_value AS role,
    m4.meta_value AS phone
	FROM ben_users u1
	JOIN ben_usermeta m1 ON (m1.user_id = u1.id AND m1.meta_key = "first_name")
	JOIN ben_usermeta m2 ON (m2.user_id = u1.id AND m2.meta_key = "last_name")
	JOIN ben_usermeta m3 ON (m3.user_id = u1.id AND m3.meta_key = "user_role")
	JOIN ben_usermeta m4 ON (m4.user_id = u1.id AND m4.meta_key = "user_phone") WHERE u1.id = "'.$id.'" ');
		 		 
    return $query->result(); 
 }
 
 
 function update_user($id,$user_pass,$user_role,$first_name,$last_name,$user_phone) {
	 
	$user_pass = getHashedPassword($user_pass);
	//echo 'UPDATE ben_users SET user_pass = "'.$user_pass.'", user_status= "'.$user_role.'" WHERE ID = "'.$id.'"'; die;
	$user_upadte = $this->db->query('UPDATE ben_users SET user_pass = "'.$user_pass.'", user_status= "'.$user_role.'" WHERE ID = "'.$id.'"');
	$update_meta_data = $this->db->query('UPDATE ben_usermeta SET meta_value = "'.$first_name.'"  WHERE  meta_key ="first_name" AND user_id = "'.$id.'"');
	$update_meta_data = $this->db->query('UPDATE ben_usermeta SET meta_value = "'.$last_name.'"  WHERE  meta_key ="last_name" AND user_id = "'.$id.'"');
	$update_meta_data = $this->db->query('UPDATE ben_usermeta SET meta_value = "'.$user_phone.'"  WHERE  meta_key ="user_phone" AND user_id = "'.$id.'"');
	$update_meta_data = $this->db->query('UPDATE ben_usermeta SET meta_value = "'.$user_role.'"  WHERE  meta_key ="user_role" AND user_id = "'.$id.'"');	
	 
 }
 
 function user_delete($id){
	
  $this-> db->where('user_id', $id);
  $delete_meta  = $this-> db-> delete('ben_usermeta');
  if($delete_meta) {
  $this-> db->where('ID', $id);
  $delete_data = $this-> db-> delete('ben_users');
	
	return $delete_data;
  }
  
 }	 
 function validate_username($user_login) {
	 
	$this->db->where('user_login', $user_login);
	$query = $this->db->get('ben_users');
	if($query->num_rows() > 0) {
	 
	 return "error";
	 
	 
	 
	}
 }
 
 function validate_email($user_email) {
	 
	$this->db->where('user_email', $user_email);
	$query = $this->db->get('ben_users');
	if($query->num_rows() > 0) {
	 
	 return "error";
	 
	 
	 
	}
 }	
 
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('ID, password');
        $this->db->where('ID', $userId);        
        $query = $this->db->get('ben_users');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function new_user_signup($user_email,$user_password,$user_nicename)
    {    
    	$user_pass = getHashedPassword($user_password);
     
    $data = array( 
      'user_email'=>$user_email,
      'user_login'=>$user_email,
      'user_pass'=>$user_pass,
      'user_nicename'=> $user_nicename, 
      'user_status'=>'3',
      'user_registered'=> date('Y-m-d H:i:s')
      ); 

      $this->db->insert('ben_users',$data);
      $insert_id = $this->db->insert_id();

      if($insert_id)
      {        
        $meta_data = array(        
          array('user_id'=>$insert_id, 'meta_key'=>'first_name','meta_value'=>''),
          array('user_id'=>$insert_id, 'meta_key'=>'last_name','meta_value'=>''),
          array('user_id'=>$insert_id, 'meta_key'=>'user_phone','meta_value'=>''), 
          array('user_id'=>$insert_id, 'meta_key'=>'user_role','meta_value'=>''), 
          array('user_id'=>$insert_id, 'meta_key'=>'user_avatar','meta_value'=>''), 
        );

        foreach($meta_data as $meta)
        {        
           $this->db->insert('ben_usermeta',$meta); 
        } 
        
      }

      
      $sessionArray = array('userId'=>$insert_id,                    
                            'role'=>'3',
                            'user_email'=>$user_email,
                            'isLoggedIn' => TRUE
                          );
      return $sessionArray;

    }

    public function check_user_login($email, $password)
    { //  print_r(getHashedPassword($password));die;
      $this->db->select('ID,user_email,user_activation_key,user_pass,user_status');
        $this->db->from('ben_users');
        $this->db->where('user_email', $email);
        $query = $this->db->get();
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($password, $user[0]->user_pass)){       
                return $user;
             } else {
                return array();
             }
        }
    }



  public function get_setting_profile($id)
    { 
      $this->db->select('*');
      $this->db->where('ID', $id);        
      $this->db->from('ben_users');

      $query = $this->db->get();
      if($query->num_rows() > 0 )
      {
          $row = $query->result_array();
          return $row[0];
      } 
    }

    public function update_profile_setting($user_info='')
    { 
      $this->db->select('user_pass');
      $this->db->where('ID', $user_info['id']);        
      $this->db->from('ben_users');

      $query = $this->db->get();
      if($query->num_rows() > 0 )
      {
          $row = $query->result_array(); 
      } 

      if($user_info['info']['user_pass'] == '')
      {
        $user_pass = $row[0]['user_pass']; 
      }
      else
      {
        $user_pass = getHashedPassword($user_info['info']['user_pass']);
      }

      if($user_info['id'])
      {        
        $meta_data = array(        
          array('meta_key'=>'first_name','meta_value'=>$user_info['info']['first_name']),
          array('meta_key'=>'last_name','meta_value'=>$user_info['info']['last_name']),
          array('meta_key'=>'user_phone','meta_value'=>$user_info['info']['phone']), 
          array('meta_key'=>'user_role','meta_value'=>'3'), 
          // array('meta_key'=>'user_avatar','meta_value'=>$user_info['image_name']), 
        );

        if($user_info['image_name'] != '')
        {
          array_push($meta_data,array('meta_key'=>'user_avatar','meta_value'=>$user_info['image_name']));
        }

        foreach($meta_data as $meta)
        {       
          $this->db->set('meta_value',$meta['meta_value']);          
          $this->db->where('user_id',$user_info['id']);
          $this->db->where('meta_key',$meta['meta_key']);
          $res = $this->db->update('ben_usermeta'); 
        } 
        
      }

       $data = array( 
        'user_login'=>$user_info['info']['user_login'], 
        'user_pass'=>$user_pass
        );  

        $this->db->where('ID',$user_info['id']);
        $row = $this->db->update('ben_users',$data);  

      if($row)
      {
        return true;
      }
      else
      {
        return false;
      }
 
    }

    public function account_delete($id='')
    {
      $this->db->where('ID',$id); 
      $query = $this->db->delete('ben_users');

      $this->db->where('user_id',$id); 
      $query = $this->db->delete('ben_site_listings');

      if($id)
      {        
        $meta_data = array(        
          array('meta_key'=>'first_name','meta_value'=>$first_name),
          array('meta_key'=>'last_name','meta_value'=>$last_name),
          array('meta_key'=>'user_phone','meta_value'=>$phone), 
          array('meta_key'=>'user_role','meta_value'=>'3'), 
          array('meta_key'=>'user_avatar','meta_value'=>$new_name), 
        );
 

        foreach($meta_data as $meta)
        {  
          $this->db->where('user_id',$id); 
          $this->db->where('meta_key',$meta['meta_key']); 
          $row = $this->db->delete('ben_usermeta'); 
        } 
        
      } 

      if($query)
      {
        return true;
      }
      else
      {
        return false;
      }      
    }

    public function insert_forgot_password($user_email='',$string='')
    { 
      $this->db->select('*');
      $this->db->where('user_email', $user_email);        
      $this->db->from('ben_users');

    $query = $this->db->get();

    if( $query->num_rows() > 0)
    {
      $row = $query->result_array(); 
      
 
      $data = array('user_activation_key' => $string);

      $this->db->where('user_email',$user_email);
      $query = $this->db->update('ben_users',$data);


      return $row;
    }
    else{
      return false;
    }

    }

    public function insert_password_reset($password,$string)
    { 
      $user_pass = getHashedPassword($password);
       
      $this->db->select('*');
      $this->db->where('user_activation_key', $string);        
      $this->db->from('ben_users');

      $query = $this->db->get();
      if( $query->num_rows() > 0)
      {
        // $row = $query->result_array(); 
         
        $data = array('user_pass' => $user_pass,'user_activation_key' => '');
 
        $this->db->where('user_activation_key',$string);
        $res = $this->db->update('ben_users',$data);
 

        return true;
      }
      else{
        return false;
      }
    }



    

   
 
}

?>
