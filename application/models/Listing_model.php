<?php
class Listing_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_your_listing($data='')
	{
		$this->db->insert('ben_lists',$data);	 
	}


  function show_your_deactivated_listings() {
   
  
   $this->db->select('ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_brands.name as brand_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    
    $this->db->where('ben_lists.status = 2');    

   $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');
    $this->db->join('ben_brands', 'ben_site_listings.brand_id = ben_brands.id');

    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');   

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
       $row = $query->result_array();
      // print_r($row); die();
       return $row;
    }
 }

  public function increase_view_listings_by_id($listing_id='')
  {
    
    $this->db->select('total_views');
    $this->db->from('ben_site_listings');
    $this->db->where('ID',$listing_id);
    $query = $this->db->get();
        
    if ( $query->num_rows() > 0 )
    {       
      $row = $query->result_array();
      $total_views= (int)$row[0]['total_views'];
      $this->db->set('total_views',$total_views+1);      
      $this->db->where('ID',$listing_id);       
      $this->db->update('ben_site_listings');
    }
  }

  function show_your_listings()
  {  
    $this->db->select('ben_users.user_nicename,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id'); 
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');         

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
       $row = $query->result_array();
      // echo '<pre>';print_r($row); die();
       return $row;
    }
 } 

  function show_your_site_listings($user_id='', $offset='',$listing_count='')
  { 
    $this->db->select('ben_categories.name as cat_name,ben_categories.slug as cat_slug,ben_subcategories.name as sub_cat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');
    // $this->db->join('ben_brands', 'ben_site_listings.brand_id = ben_brands.id');

    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');     

    if($listing_count != '')
    { 
      $this->db->limit(8,$listing_count);    
    }
    else
    {
      $this->db->limit(8);
    }

    if($user_id != '')
    { 
      $this->db->where('ben_site_listings.user_id',$user_id);
      $this->db->limit(5,$offset);    
    }


    $query = $this->db->get();

    // echo '<pre>' ;print_r($query);die;

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

  function count_ads_by_user($user_id='')
  {  
     $this->db->select('count(id) as ad_count');
     $this->db->from('ben_site_listings');
     $this->db->where('user_id',$user_id);       
     $query = $this->db->get();
    if ( $query->num_rows() > 0 )
    {
       $row = $query->row();
       return $row;
    }else{

      return array();
    }
  }

  public function get_site_listings_by_cat_id($cat_id='',$listing_id='')
  {

    $this->db->select('ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');    
    $this->db->where('ben_site_listings.cat_id',$cat_id);    
    $this->db->where('ben_site_listings.ID !='.$listing_id);        
    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {       
       $row = $query->result_array(); 
       return $row;
    }

  }


  public function get_category_id_by_slug($cat_slug,$listing_count='')
  { 
    $this->db->select('ID');
    $this->db->from('ben_categories');
    $this->db->where('slug',$cat_slug);  
 
    $query = $this->db->get();
    if ( $query->num_rows() > 0 )
    {       
       $row = $query->result_array();
    }    

    $cat_id = $row[0]['ID'];

    $this->db->select('ben_categories.name as cat_name,ben_categories.slug as cat_slug,ben_subcategories.name as sub_cat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id');
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');    
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');    
    $this->db->where('ben_site_listings.cat_id',$cat_id);   

    if($listing_count != '')
    { 
      $this->db->limit(8,$listing_count);    
    }
    else
    {
      $this->db->limit(8);
    }

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {       
      $row = $query->result_array();
      return $row;
    }

  }

  function show_your_site_listings_by_id($listing_id='')
  {  

    $this->db->select('ben_categories.name as cat_name, ben_subcategories.name as sub_cat_name, ben_users.user_registered as user_registered_date,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');    
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id');
    $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');    
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');    
    $this->db->where('ben_site_listings.ID',$listing_id);    

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
       $lists = $query->result_array();

       foreach ($lists as $key => $list) {

        $brand = $this->get_your_listing_brand_name($list['brand_id']);


        if(isset($brand->name)){

          $list['brand_name'] =$brand->name; 
        }else{

          $list['brand_name'] =''; 

        }


       return $list;           

       }

       
     }
 }


  function get_your_listing_brand_name($brand_id)
  {  

    $this->db->select('ben_brands.name');
    $this->db->from('ben_brands');    
    $this->db->where('ID',$brand_id);    

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
      
        $brand_name = $query->row();

        return $brand_name;

    }
 }




  function show_your_favourites($user_id='',$offset='')
  {  
     $this->db->select('*');
     $this->db->from('ben_favourites');
     $this->db->where('user_id',$user_id);    
     $this->db->limit(5,$offset);
   
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

 function count_favourites_by_user($user_id='')
  {  
     $this->db->select('count(id) as fav_count');
     $this->db->from('ben_favourites');
     $this->db->where('user_id',$user_id);       
     $query = $this->db->get();
    if ( $query->num_rows() > 0 )
    {
       
       $row = $query->row();
       return $row;
    }else{

      return array();
    }
 }


 
  function insert_fav($data)
  {  
    $this->db->insert('ben_favourites',$data);
  }

  function delete_fav($lid='',$user_id='')
  {
     $this->db->where('listing_id',$lid);    
     $this->db->where('user_id',$user_id);      
     $this->db->delete('ben_favourites');
  } 

  // function listing_edit($id)
  // {   
  //   $this->db->select('*');
  //   $this->db->from('ben_lists');
  //   $this->db->where('id',$id);
  //   $query = $this->db->get();
  //   if ( $query->num_rows() > 0 )
  //   {
  //       $row = $query->result_array();
  //       return $row[0];
  //   }
  // }

  // admin

  public function listing_approve($id='')
  { 
    $this->db->set('status','1');
    $this->db->where('ID',$id);
    $row = $this->db->update('ben_site_listings');

     if($row)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  public function listing_disapprove($id='')
  { 
    $this->db->set('status','2');
    $this->db->where('ID',$id);
    $row = $this->db->update('ben_site_listings');

     if($row)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

  function disapprove_listing_show()
  {   
    $this->db->select('ben_users.display_name,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->where('ben_site_listings.status = 2');  
    $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id'); 
    $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');         

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
       $row = $query->result_array();
      // print_r($row); die();
       return $row;
    }
 }

  function approve_listing_show()
  {   
    $this->db->select('ben_users.display_name,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->where('ben_site_listings.status = 1');  
    $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id'); 
    $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');         

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
       
       $row = $query->result_array();
      // print_r($row); die();
       return $row;
    }
 }

  function listing_delete($id)
  {
    $this->db->where('ID',$id);
    $query = $this->db->delete('ben_site_listings');

    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }





 // +++++++++++++++++++++++


 
  
  public function get_your_fav_listings($user_id=''){




    $this->db->select('ben_favourites.listing_id');
    $this->db->from('ben_favourites');
    $this->db->where('user_id',$user_id);

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
      

       $row = $query->result_array();
       foreach ($row as $key => $listing_id) {

        $this->db->select('ben_users.display_name,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_brands.name as brand_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
        $this->db->from('ben_site_listings');
        $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
        $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');
        $this->db->join('ben_brands', 'ben_site_listings.brand_id = ben_brands.id');
        $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');
        $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
        $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
        $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');         
        $this->db->where('ID',$listing_id['listing_id']);         

        $query = $this->db->get();
          if ( $query->num_rows() > 0 )
          {
             
             $data = array('lists'=>$query->result_array());


          }

       }

       // print_r($data); die();

     }
   } 

   public function get_fav_count($listing_id='')
   {
  //  echo $listing_id; die();
    $this->db->select('count(ID) as fav_count');
    $this->db->from('ben_favourites');
    $this->db->where('listing_id',$listing_id);

    $query = $this->db->get();

    if ( $query->num_rows() > 0 )
    {
      

       $row = $query->row();

        return $row;

      }else{

         return '';

      }      
   }

   public function save_your_enquiries($data='')
   { 
      $this->db->insert('ben_enquiries',$data);
   }

   public function your_post_edit($list_id,$data='')
   { 
    $listing_data = array(
      'title' => $data['title'],
      'product_type' => $data['product_type'],
      'price' => $data['price'],
      'year' => $data['year'],
      'description' => $data['description'],
      'name' =>$data['name'],
      'phone_number' => $data['phone_number']
    );

 
     $this->db->where('ID',$list_id);
     $row = $this->db->update('ben_site_listings',$listing_data);

     if($row)
     {
      return true;
     }
     else
     {
      return false;
     }

   }

   function user_site_listing_delete($list_id='')
    {
    $this->db->where('ID',$list_id);
    $query = $this->db->delete('ben_site_listings');

    if($query)
    {
      return true;
    }
    else
    {
      return false;
    }

  }

    


  public function site_listing_insert($data='')
  {
    $data['title'] = ucfirst($data['title']);    

    $this->db->insert('ben_site_listings',$data);    

    $insert_id = $this->db->insert_id();

    $result = $this->show_your_site_listings_by_id($insert_id);

    return $result;

  }


  public function search_filter_model($data='')
  {
    $actual_array = array_filter($data);
    $key_name = array_keys($actual_array);

// $this->db->select('ben_users.display_name,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_brands.name as brand_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');

    $this->db->select('ben_users.display_name,ben_categories.name as cat_name,ben_subcategories.name as subcat_name,ben_countries.country_name,ben_states.state_name,ben_cities.city_name,ben_site_listings.*');
    $this->db->from('ben_site_listings');
    $this->db->join('ben_categories', 'ben_site_listings.cat_id = ben_categories.id'); 
    $this->db->join('ben_subcategories', 'ben_site_listings.sub_cat_id = ben_subcategories.id');
    $this->db->join('ben_users', 'ben_site_listings.user_id = ben_users.ID');
    $this->db->join('ben_countries', 'ben_site_listings.country_id = ben_countries.id');
    $this->db->join('ben_states', 'ben_site_listings.state_id = ben_states.id');
    $this->db->join('ben_cities', 'ben_site_listings.city_id = ben_cities.id');
    // $this->db->join('ben_brands', 'ben_site_listings.brand_id = ben_brands.id');
    for ($i=0; $i <= count($actual_array)-1; $i++)
    {
      $this->db->like('ben_site_listings.'.$key_name[$i],$actual_array[$key_name[$i]]);
    }

     
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
      $row = $query->result_array();
      return $row;
    }
  }

  public function insert_reviews($rater_id='',$listing_id='',$giveaway_listing_id,$data='')
  {
    if($data['rating_img'] == '')
    {
      $data['rating_img'] ='';
    }
  
    if($listing_id != '')
    {
      if($data['star_rates'] >=1 and $data['star_rates'] <= 5)
      {
        $data = array('rater_id'=>$rater_id,
                  'listing_id'=>$listing_id,
                  'rating'=>$data['star_rates'],
                  'comments'=>$data['reviews'],
                  'rating_img'=>$data['rating_img']
                );
   
        $this->db->insert('ben_rating',$data);
        return 'single';
      }
      else
      {
        return 'false_single';
      }
    }

    if($giveaway_listing_id != '')
    {
      if($data['star_rates'] >=1 and $data['star_rates'] <= 5)
      {
        $data = array('rater_id'=>$rater_id,
                  'giveaway_listing_id'=>$giveaway_listing_id,
                  'rating'=>$data['star_rates'],
                  'comments'=>$data['reviews'],
                  'rating_img'=>$data['rating_img']
                );
   
        $this->db->insert('ben_rating',$data);
        return 'giveaway';
      }
      else
      {
        return 'false_giveaway';
      }
    }
 
  }

  public function reviews_check($rater_id='',$listing_id='',$giveaway_listing_id='')
  {

    $this->db->select('*');
    $this->db->from('ben_rating');
    $this->db->where('rater_id',$rater_id);

    if($listing_id != '')
    {
      $this->db->where('listing_id',$listing_id);
    }

    if($giveaway_listing_id != '')
    {
      $this->db->where('giveaway_listing_id',$giveaway_listing_id);
    }

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      $row = $query->result_array();
      // echo '<pre>'; print_r($row);die;
      return true;
    }
    else
    {
      return false;
    }


  }

  public function show_single_reviews($listing_id='')
  {
    $this->db->select('ben_users.user_nicename,ben_rating.*');
    $this->db->from('ben_rating');
    $this->db->where('ben_rating.listing_id',$listing_id);
    $this->db->join('ben_users','ben_users.ID = ben_rating.rater_id');

    // $this->db->select_avg('ben_rating.rating');

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      $row1 = $query->result_array();

      $this->db->select_avg('ben_rating.rating');
      $this->db->from('ben_rating');
      $this->db->where('ben_rating.listing_id',$listing_id);
      $result = $this->db->get(); 

      $row2 = $result->result_array();

      $row = array('user_rating'=>$row1,'avg_rating'=>$row2);
       
      return $row;
    }
    else
    {
      return false;
    }
  }

  public function show_giveaway_reviews($giveaway_listing_id='')
  {
    $this->db->select('ben_users.user_nicename,ben_rating.*');
    $this->db->from('ben_rating');
    $this->db->where('ben_rating.giveaway_listing_id',$giveaway_listing_id);
    $this->db->join('ben_users','ben_users.ID = ben_rating.rater_id');

    // $this->db->select_avg('ben_rating.rating');

    $query = $this->db->get();

    if($query->num_rows() > 0)
    {
      $row1 = $query->result_array();

      $this->db->select_avg('ben_rating.rating');
      $this->db->from('ben_rating');
      $this->db->where('ben_rating.giveaway_listing_id',$giveaway_listing_id);
      $result = $this->db->get(); 

      $row2 = $result->result_array();

      $row = array('user_rating'=>$row1,'avg_rating'=>$row2);
       
      return $row;
    }
    else
    {
      return false;
    }
  }


















}