<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class FrontBaseController extends CI_Controller {


    function FrontLoadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL){
	
	
        $this->load->view('site/header', $headerInfo);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('site/footer', $footerInfo);
    }
	

}