<?php 


class Chat_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function show_all_chat_users()
  { 
   $sender_id =$this->session->userdata('userId'); 

   $query = $this->db->query("SELECT DISTINCT(`sender_id`) as user, chat_node,status, `ben_users`.user_nicename,`ben_usermeta`.meta_value as user_profile FROM `ben_chat` INNER JOIN ben_users ON `ben_chat`.sender_id = `ben_users`.id INNER JOIN `ben_usermeta` ON `ben_usermeta`.user_id = `ben_chat`.sender_id WHERE `receiver_id` ='".$sender_id."' and `sender_id`!='".$sender_id."' and `ben_usermeta`.meta_key= 'user_avatar' UNION SELECT DISTINCT(`receiver_id`) as user,chat_node,status, `ben_users`.user_nicename, `ben_usermeta`.meta_value as user_profile FROM `ben_chat` INNER JOIN `ben_users` ON `ben_chat`.receiver_id = `ben_users`.id INNER JOIN `ben_usermeta` ON `ben_usermeta`.user_id = `ben_chat`.receiver_id WHERE `receiver_id` !='".$sender_id."' and `sender_id`='".$sender_id."' and `ben_usermeta`.meta_key= 'user_avatar'");

    if($query->num_rows() > 0 )
    { 
      return $query->result_array();
    }
  }

  function block_chat($chat_id,$reason){


    $this->db->where('chat_node',$chat_id);
    $this->db->set('status',1);
    $this->db->set('reason',$reason);
    $result = $this->db->update('ben_chat');
    if($result){

      return true;
    }else{

      return false;
    }
  }

  function insertMsg($user_id='')
  {
    

    // $receiver_id =$this->session->userdata('receiver_id');
    $receiver_id =$user_id;
    $sender_id =$this->session->userdata('userId');
    $chat_node = 'BEN-CHAT-1'.$receiver_id.'-SAAS-'.$sender_id.'NJDD33';

    $this->db->select('ID');
    $this->db->from('ben_chat');
    $this->db->where('sender_id',$sender_id);
    $this->db->where('receiver_id',$receiver_id);
    $this->db->or_where('sender_id',$receiver_id);
    $this->db->where('receiver_id',$sender_id);
    $sql = $this->db->get();
    if($sql->num_rows() == 0){

      $data = array('sender_id'=>$sender_id,'receiver_id'=>$receiver_id,'chat_node'=>$chat_node);
      $query = $this->db->insert('ben_chat',$data);

      if($query)
      {
        return $chat_node;
      }
    }
  }












    
  // function getMsg($limit = 10)
  // {
  //   $receiver_id = $this->session->userdata('receiver_id');

  //   //print_r($receiver_id); die();
  //   $sender_id = $this->session->userdata('userId');
  // // echo $receiver_id.'-'.$sender_id; die();
  //   $this->db->select('*');
  //   $this->db->from('ben_chat');    
  //   $this->db->where('receiver_id',$receiver_id);
  //   $this->db->where('sender_id',$sender_id); 
  //   $this->db->or_where_in('receiver_id',$sender_id);
  //   $this->db->or_where_in('sender_id',$receiver_id); 
  //   $this->db->order_by('datetime','desc'); 
  //   $this->db->limit(10);     
  //   $query = $this->db->get();
  //   if($query->num_rows() >0 ){

  //     return $query->result_array();


  //   }
  // }
  
  





}