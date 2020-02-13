<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "site";
$route['404_override'] = 'error';
$route['admin'] = "login";

/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['admin/logout'] = 'admin/users/logout';
$route['userListing'] = 'user/userListing';
$route['users/(:num)'] = "user/";

$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['admin/order/new'] = "admin/orders/create_new_order";
$route['admin/order/insert'] = "admin/orders/add_new_order";
$route['admin/order/delete/:num'] = "admin/orders/delete_p_order";
$route['admin/order/delete-complete/:num'] = "admin/orders/delete_c_order";

$route['admin/order/edit/:num'] = "admin/orders/edit_order";
$route['admin/order/update/:num'] = "admin/orders/update_new_order";
$route['admin/complete-orders'] = "admin/orders/complete_orders";
$route['admin/orders/:any'] = "admin/orders/index";


// Users Section

$route['admin/users/new-user'] = "admin/users/";
$route['admin/user/new-user'] = "admin/users/add";
$route['admin/user/insert'] = "admin/users/create_new_user";
$route['admin/user/username-validate'] = "admin/users/ajax_username_validate";
$route['admin/user/email-validate'] = "admin/users/ajax_email_validate";
$route['admin/user/edit/:num'] = "admin/users/edit";
$route['admin/user/update/:num'] = "admin/users/update";
$route['admin/user/delete/:num'] = "admin/users/delete_user";

//LISTING

$route['admin/listing/add-new-listing'] = "admin/listing/add_new_listing";
$route['admin/listing/insert'] = "admin/listing/insert_listing";
$route['admin/listing/show-listing'] = "admin/listing/show_listing"; 
$route['admin/listing/edit/:num'] = "admin/listing/edit_listing";
$route['admin/listing/update/:num'] = "admin/listing/update_listing";
$route['admin/listing/approve-listing/:any'] = "admin/listing/approve_listing";
$route['admin/listing/disapprove-listing/:any'] = "admin/listing/disapprove_listing";
$route['admin/listing/show-disapprove-listing'] = "admin/listing/show_disapprove_listing";
$route['admin/listing/show-approve-listing'] = "admin/listing/show_approve_listing"; 
$route['admin/listing/delete-listing/:num'] = "admin/listing/delete_listing";



// $route['admin/listing/deleted/:num'] = "admin/listing/deleted_listing";
// $route['admin/listing/show-deleted-listing'] = "admin/listing/show_deleted_listing";
// $route['admin/listing/delete-listing/:num'] = "admin/listing/delete_listing";
// $route['admin/listing/active-listing/:num'] = "admin/listing/active_listing";
// $route['admin/listing/disapproved-listing/:num'] = "admin/listing/disapproved_listing";

//CATEGORY

$route['admin/category/add-new'] = "admin/category/add_new_category";
$route['admin/category/insert'] = "admin/category/insert_category";
$route['admin/category/show-category'] = "admin/category/show_category";
$route['admin/category/edit/:num'] = "admin/category/edit_category";
$route['admin/category/update/:num'] = "admin/category/update_category";
$route['admin/category/deleted/:num'] = "admin/category/deleted_category";
$route['admin/category/show-deleted-category'] = "admin/category/show_deleted_category";
$route['admin/category/delete-category/:num'] = "admin/category/delete_category";
$route['admin/category/sort-category'] = "admin/category/sort_category";
$route['admin/category/active-category/:num'] = "admin/category/active_category";

// SUB CATEGORY

$route['admin/sub-category/sub-category-add-new'] = "admin/subcategory/add_new_subcategory";
$route['admin/sub-category/insert'] = "admin/subcategory/insert_subcategory";
$route['admin/sub-category/show-sub-category'] = "admin/subcategory/show_subcategory";
$route['admin/sub-category/edit/:num'] = "admin/subcategory/edit_subcategory";
$route['admin/sub-category/update/:num'] = "admin/subcategory/update_subcategory";
$route['admin/sub-category/deleted/:num'] = "admin/subcategory/deleted_subcategory";
$route['admin/sub-category/show-deleted-sub-category'] = "admin/subcategory/show_deleted_subcategory";
$route['admin/sub-category/delete-sub-category/:num'] = "admin/subcategory/delete_subcategory";
$route['admin/sub-category/sort-sub-category'] = "admin/subcategory/sort_subcategory";
$route['admin/sub-category/active-sub-category/:num'] = "admin/subcategory/active_subcategory";

// BRANDS 
 
$route['admin/brand/brand-add-new'] = "admin/brand/add_new_brand";
$route['admin/brand/insert'] = "admin/brand/insert_brand";
$route['admin/brand/show-brand'] = "admin/brand/show_brand";
$route['admin/brand/edit/:num'] = "admin/brand/edit_brand";
$route['admin/brand/update/:num'] = "admin/brand/update_brand";
$route['admin/brand/deleted/:num'] = "admin/brand/deleted_brand";
$route['admin/brand/show-deleted-brand'] = "admin/brand/show_deleted_brand";
$route['admin/brand/delete-brand/:num'] = "admin/brand/delete_brand";
$route['admin/brand/sort-brand'] = "admin/brand/sort_brand";
$route['admin/brand/active-brand/:num'] = "admin/brand/active_brand";

//CATEGORY FEATURE

$route['admin/category-feature/add-new'] = "admin/category/add_new_category_feature";
$route['admin/category/feature-insert'] = "admin/category/insert_feature_category";
$route['admin/category-feature/show-category-feature'] = "admin/category/show_category_feature";

// COUNTRY

$route['admin/country/add-new-country'] = "admin/location/add_new_country";
$route['admin/country/insert-state'] = "admin/location/insert_country";
$route['admin/country/show-country'] = "admin/location/show_country";
$route['admin/country/edit-country/:num'] = "admin/location/edit_country";
$route['admin/country/update-country'] = "admin/location/update_country";
$route['admin/ajax/states-country'] = "admin/ajax/get_states_by_country";

//STATE

$route['admin/state/add-new-state'] = "admin/location/add_new_state";
$route['admin/country/insert-state'] = "admin/location/insert_state";
$route['admin/state/show-state'] = "admin/location/show_state";
$route['admin/state/edit-state/:num'] = "admin/location/edit_state";
$route['admin/state/update-state/:num'] = "admin/location/update_state";

$route['admin/ajax/cities-state'] = "admin/ajax/get_cities_by_state";

//CITY

$route['admin/city/add-new-city'] = "admin/location/add_new_city";
$route['admin/city/show-city'] = "admin/location/show_city";
$route['admin/city/edit-city/:num'] = "admin/location/edit_city";
$route['admin/city/insert'] = "admin/location/insert_city";
$route['admin/city/update-city/:num'] = "admin/location/update_city";

//FAQ

$route['admin/faq/add-new-faq'] = "admin/faq/add_new_faq";
$route['admin/faq/insert'] = "admin/faq/insert_faq";
$route['admin/faq/show-faq'] = "admin/faq/show_faq";
$route['admin/faq/edit-faq/:num'] = "admin/faq/edit_faq";
$route['admin/faq/update-faq/:num'] = "admin/faq/update_faq";
$route['admin/faq/deleted/:num'] = "admin/faq/deleted_faq";
$route['admin/faq/show-deleted-faq'] = "admin/faq/show_deleted_faq";
$route['admin/faq/delete-faq/:num'] = "admin/faq/delete_faq";
$route['admin/faq/active-faq/:num'] = "admin/faq/active_faq";
$route['admin/faq/sort-faq'] = "admin/faq/sort_faq";

//PAGES
 
$route['admin/page/contact'] = "admin/pages/contacts";


//CMS

$route['admin/cms/add-new-cms'] = "admin/cms/add_new_cms";
$route['admin/cms/insert'] = "admin/cms/insert_cms";
$route['admin/cms/show-cms'] = "admin/cms/show_cms";
$route['admin/cms/edit-cms/:num'] = "admin/cms/edit_cms";
$route['admin/cms/update-cms/:num'] = "admin/cms/update_cms";
$route['admin/cms/deleted-cms'] = "admin/cms/deleted_cms";

// PAYMENT GATEWAY	

$route['admin/payment/add-payment'] = "admin/payment/add_payment"; 
$route['admin/payment/insert-payment'] = "admin/payment/payment_insert";  
$route['admin/payment/delete-payment/:num'] = "admin/payment/payment_delete"; 
$route['admin/payment/show-paypal-payment'] = "admin/payment/paypal_payment_show"; 
$route['admin/payment/show-stripe-payment'] = "admin/payment/stripe_payment_show"; 

//PAYMENT SETTINGS

$route['admin/payment/payment-settings'] = "admin/payment/payment_settings"; 
$route['admin/payment/insert-payment-status'] = "admin/payment/insert_payment_status";
$route['admin/payment/insert-paypal-key'] = "admin/payment/insert_paypal_key";
$route['admin/payment/insert-stripe-key'] = "admin/payment/insert_stripe_key"; 

// ADMIN GIVE AWAY LISTING

$route['admin/giveaway/show-giveaway-listing'] = "admin/giveaway/giveaway_listing_show";
$route['admin/giveaway/approve-giveaway-listing/:any'] = "admin/giveaway/approve_giveaway_listing";
$route['admin/giveaway/disapprove-giveaway-listing/:any'] = "admin/giveaway/disapprove_giveaway_listing";
$route['admin/giveaway/show-giveaway-disapprove-listing'] = "admin/giveaway/show_giveaway_disapprove_listing";
$route['admin/giveaway/show-giveaway-approve-listing'] = "admin/giveaway/show_giveaway_approve_listing"; 




// FRONT END

// $route['home'] = "home/index";
// $route['item'] = "home/item_show";
// $route['post-an-ad/:any'] = "home/ad_an_post";
// $route['insert-site-listing'] = "home/insert_site_listing";
// $route['post-ad'] = "home/ad_post";
// $route['listing-categories/:any'] = "home/listing_categories";
// $route['post-submit'] = "home/submit_post";
// $route['feature-ad-option'] = "home/feature_ad_option";
















// FRONT PAGES


$route['plans'] = "front/products/";
$route['partner-regis'] = "front/partner_regis/";
$route['add-partner'] = "front/add_partner/";
$route['payment/pay-response'] = "payment/PaytmResponse/";

/* End of file routes.php */
/* Location: ./application/config/routes.php */



// SITE PAGES


$route['contact'] = "site/contact";
$route['login'] = "site/login";
$route['signup'] = "site/signup";
$route['faq'] = "site/faq";
$route['favourite'] = "site/favourite";
// $route['single'] = "site/single";
$route['create-post'] = "site/create_post";
$route['post-update/:any'] = "site/update_post";
$route['edit-post/:any'] = "site/edit_your_post";
$route['ajax/load-more-listings'] = "ajax/load_more_listings";
$route['ajax/cate-load-more-listings'] = "ajax/cate_load_more_listings";
$route['search-filter'] = "Site/search_filter"; 






$route['ajax-ci/unfav']= "ajax/un_fav";
$route['ajax-ci/fav']= "ajax/fav";
$route['ajax-ci/get-sub-cat']= "ajax/show_sub_cat_by_cat_id";
$route['ajax-ci/get-brand-sub-cat']= "ajax/show_brand_by_sub_cat_id";
$route['ajax-ci/get-state']= "ajax/show_state_by_country";
$route['ajax-ci/get-cities']= "ajax/show_city_by_state";

$route['signup/insert']= "site/signup_new_user";
$route['login/check-user-login']= "site/user_login_check";
$route['logout']= "site/user_logout";
$route['my-ads']= "site/my_ads";
$route['my-ads/:num']= "site/my_ads";
$route['single/:any']= "site/single_page";

$route['category-list/:any']= "site/category_vise";

$route['insert-site-listing'] = "site/insert_site_listing";

$route['settings']= "site/profile_setting";
$route['setting/update']= "site/profile_setting_update";
$route['setting/delete-user']= "site/delete_account";
 


$route['forgot-password']= "Site_pages/forgot_password";
$route['forgot-password/insert']= "Site_pages/forgot_password_insert";
$route['password-reset/:any']= "Site_pages/password_reset";
$route['reset-password/insert/:any']= "Site_pages/password_reset_insert";
$route['enquiry'] = "site/enquiries_save";

$route['favourite/:num'] = "site/favourite"; 

$route['delete-user-site-listing/:num'] = "site/delete_user_site_listing";


// PAYMENT PAGE

$route['payment-package'] = "Site_pages/paypal_payment_package";

// PAYPAL PAYMENT GATEWAY	 

$route['payment-option/:num'] = "Site_pages/payment_option"; 
$route['payment-plan/:num'] = "Site_pages/plan_payment";
$route['execute'] = "Site_pages/execute_paypal_payment";
$route['thank-you'] = "Site_pages/thanks";   

// STRIPE PAYMENT GATEWAY	 
 
$route['stripe-payment/:num'] = "Site_pages/stripe_plan_payment";
$route['create-payment'] = "Site_pages/create";
$route['charge'] = "Site_pages/thank"; 


// Giveaway SYSTEM

$route['giveaway/giveaway-page'] = "Giveaway_system/giveaway_index"; 
$route['giveaway/create-giveaway-listing'] = "Giveaway_system/create_giveaway_listing"; 
$route['giveaway/create-giveaway-listing/insert'] = "Giveaway_system/insert_giveaway_post"; 
$route['giveaway/single/:any'] = "Giveaway_system/single_page_giveaway"; 
$route['giveaway/single/request/insert/:any'] = "Giveaway_system/giveaway_requests_insert";
$route['giveaway/giveaway-ads'] = "Giveaway_system/giveaway_ads"; 
$route['giveaway/delete-user-giveaway-site-listing/:any'] = "Giveaway_system/delete_user_giveaway_site_listing";
$route['giveaway/giveaway-post-update/:any'] = "Giveaway_system/update_giveaway_post";
$route['giveaway/giveaway-post-edit/:any'] = "Giveaway_system/edit_giveaway_post";
$route['giveaway/giveaway-requests'] = "Giveaway_system/giveaway_requests_page"; 
$route['giveaway/giveaway-requests-status/:any'] = "Giveaway_system/giveaway_requests_status"; 
$route['giveaway-search-filter'] = "Giveaway_system/search_filter_giveaway"; 


// RATING AND REVIEWS

$route['reviews/single/insert/:any'] = "Site/reviews_insert";
$route['reviews/giveaway/insert/:any'] = "Site/reviews_insert"; 
// $route['reviews/show'] = "Site_pages/reviews_show"; 


 



// CHAT ROUTES

$route['chat-send'] = "Ajax/insert_chat_message"; 


// APIS ROUTES
$route['api/get-all-listings'] = "api/api/get_all_listing";
$route['api/get-listings-cat-sub-brands'] = "api/api/get_all_cat_sub_brands";
//$route['api/get-listings-subcategories'] = "api/api/get_all_listing_sub_categories";
//$route['api/get-listings-subcategories:num'] = "api/api/get_all_listing_sub_categories";
// $route['api/get-listings-brands'] = "api/api/get_all_listing_brand";
// $route['api/get-all-countries'] = "api/api/get_all_countries";

$route['chat-page'] = "Chats/chat_page"; 
$route['chat-page/:any'] = "Chats/chat_page"; 


