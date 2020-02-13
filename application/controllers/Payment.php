<?php 
require_once(APPPATH."libraries/lib/config_paytm.php");
require_once(APPPATH."libraries/lib/encdec_paytm.php");


class Payment extends CI_Controller {
	
	
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('order_model');
        $this->isLoggedIn();   
		
	}
	

    public function PaytmGateway()
    {
        $orderId = 199; /// must be unique
		$cust = "RAM";
		$mobile= "7777777777";
		$email = "abc@gmail.com";
		$amount = 50;
		$callback_url ="http://localhost/ca-software/payment/pay-response";
      $this->StartPayment($orderId,$cust,$mobile,$email,$amount,$callback_url,$checkSum='');
	  
	  
    }

    public function StartPayment($orderId,$cust,$mobile,$email,$amount,$callback_url,$checkSum='')
    {
		
		
 
  $paytmDetails = array(
        "MID" => "lxpSao93789775898546",
        "WEBSITE" => "WEBSTAGING",
        "INDUSTRY_TYPE_ID" => "Retail",
        "CHANNEL_ID" => "WEB",
        "ORDER_ID" => $orderId,
        "CUST_ID" => $cust,
        "MOBILE_NO" => $mobile ,
        "EMAIL" => $email,
        "TXN_AMOUNT" => $amount,
        "CALLBACK_URL" => $callback_url,
    );
	
        $checkSum = getChecksumFromArray($paytmDetails,"@zytx29i6S&Nc55W");
//		print_r($checkSum); die;
		//x$paytmDetails['CHECKSUMHASH'] = $checksum;

        ?>

        <!--submit form to payment gateway OR in api environment you can pass this form data-->
                   <form method="post" id="paytm-form" action="https://securegw-stage.paytm.in/order/process">
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
				   
                  <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                      <?php foreach($paytmDetails as $index=>$values){?>
                             <input class="form-control" type="<?php echo ($index=='MOBILE_NO')?'text':'hidden'?>" name="<?php echo $index?>" readonly  value="<?php echo $values?>">
                      <?php } ?>  
                   </div>
                  <div class="col-sm-4">
                     <input type="submit" class="btn btn-primary" value="Proceed to Paytm">
                  </div>   
                 </div>
                </form>  
				
				
 
<?php
    }

    /////////// response from paytm gateway////////////
    public function pay-response()
    {
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";
        $paramList = $_POST;		
		$order_status = $this->order_model->update_order($paramList,$order_id);
		
        echo "<pre>";
        print_r($paramList);
   
    }
}
?>
