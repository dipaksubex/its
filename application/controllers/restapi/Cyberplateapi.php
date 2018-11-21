<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*include APPPATH.'/helpers/cyber_plate_helper.php';

use cyberplate;*/

class Cyberplateapi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('cyber_plate_helper');
		$this->load->model('Api_model');
	}

	//  <! ======== Start Gift Card =============--->  

	function giftcardcategory()
	{
		/*$phNbr='8750123425';
		$sess=$this->session($phNbr);*/
		/*$SD=sd();
		$AP=ap();
		$OP=op();*/

		$secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=1;


		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			$adinfo=explode("\n",urldecode($response['ADDINFO']));
			$i=1;
			foreach ($adinfo as $value) {
				if(str_replace($i.";","",$value)!='')
				{
					$dat_res[$i]=str_replace($i.";","",$value);
				}
			$i++;}

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>$dat_res);
			}else{
				$array=array("statuscode"=>400,"data"=>$dat_res,"message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}

		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function giftcardsdetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();


		$secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=2;
		$Category_id=$data->category_id;


		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];
		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nCategory_id=$Category_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);

	}

	function branddetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=3;
		$Product_id=$data->product_id;

		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nProduct_id=$Product_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function spendapi()
	{

		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$type=5;

		$fName=$data->fname;
		$lName=$data->lname;
		$NUMBER=$data->mobile;
		$billing_email=$data->billing_email;
		$benfName=$data->benfname;
		$benlName=$data->benlname;
		$Email=$data->email;
		$benMobile=$data->mobile;
		$Product_id=$data->product_id;
		$price=$data->price;
		$qty=$data->qty;
		$giftmessage=$data->giftmessage;
		$theme=$data->theme;
		$Producttype=$data->producttype;


		$amount=$data->price;

		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Producttype=$Producttype\r\ntheme=$theme\r\ngiftmessage=$giftmessage\r\nqty=$qty\r\nprice=$price\r\nbenMobile=$benMobile\r\nEmail=$Email\r\nbenlName=$benlName\r\nbenfName=$benfName\r\nbilling_email=$billing_email\r\nNUMBER=$NUMBER\r\nlName=$lName\r\nfName=$fName\r\nType=$type\r\nProduct_id=$Product_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$check_response = $this->get_query_result($signInMsg, $check_url);
		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		/*echo 'BEGIN
				CERT=EF494107467CDC28D5CD3EEBC0F154BC63C3CD4A
				DATE=19.09.2018 17:38:55
				SESSION=87501234251537358933
				ERROR=7
				RESULT=1
				TRANSID=1001572762858
				AUTHCODE=NA
				ERRMSG=Requested Price is lower than available price.
				END
				BEGIN SIGNATURE
				E6zoIrBrRovLW/VMVvwU+bWvOxJ2+RLZskal34+tRxNWQutjvEOidarY95T0/4TT
				SG4vEAA1gkLo6MhsFMJuYZXVPoJe92gpSQ/Sg53NACJVu77MFE1PdHL5sL3sY4Zj
				tb7WqDOBBwefy3GX9jsdGatgAakT/uqVkjoKfvCfwfE=
				END SIGNATURE';*/


		print_r($recharge_response);

	} 

	function statusapi()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();
        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='100';
		$type=6;
		$AgentTransId=$data->trans_id;

		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nAgentTransId=$AgentTransId\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function resendapi()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();
        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='100';
		$type=6;
		$AgentTransId=$data->trans_id;

		$urls=giftcardurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];
		
		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nAgentTransId=$AgentTransId\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	//  <! ================= End Gift Card =============---> 


	//  <! ================= Admin Balance API =============--->  

	function adminbalanceapi()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();
        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='100';
		$type=6;

		$urls=balancechkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();


		$querString=trim($startquery);

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		//print_r($recharge_response);die;

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	
			//print_r($response);die;
			if($response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","Balance"=>json_decode(urldecode($response['REST'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	//  <! ================= End Admin Balance API =============--->  


	//  <! ================= Start Theme Park API =============--->  


	function themeparkcategory()
	{
		$secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		$type=1;


		$urls=themeparkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);
		
		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			$cat_respon_meg=explode(";",urldecode($response['ADDINFO']));
			
				foreach ($cat_respon_meg as $value_cat_merge) 
				{
					$exp=explode(",",$value_cat_merge);
					foreach ($exp as $value) {
						
							$dat=explode("=",$value);
							if(@$dat[1]!=''){
								$arrres[trim($dat[0])]=trim($dat[1]);
							}
							
						}
					$result[]=$arrres;
			
				}

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>$result);
			}else{
				$array=array("statuscode"=>400,"data"=>$dat_res,"message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}

		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function themeparkcatgorydetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();


		$secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$limit=2;
		//$offset=50;
		//$cert=cert();
		$type=2;
		$Category_id=$data->category_id;


		$urls=themeparkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];
		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nCategoryId=$Category_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	
			//print_r(urldecode($response['ADDINFO']));die;
			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$exp=explode(",",urldecode($response['ADDINFO']));
					foreach ($exp as $value) {
						
							$dat=explode("=",$value);
							if(@$dat[1]!=''){
								$arrres[trim($dat[0])]=str_replace(";","",$dat[1]);
							}
							
						}
					$result[]=$arrres;
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>$result);
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);

	}

	function themeparkproductdetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=3;
		$Product_id=$data->product_id;

		$urls=themeparkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nProductId=$Product_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);
		//print_r($recharge_response);die;
		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	

			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$exp=explode(",",urldecode($response['ADDINFO']));
					foreach ($exp as $value) {
						
							$dat=explode("=",$value);
							if(@$dat[1]!=''){
								$arrres[trim($dat[0])]=str_replace(";","",$dat[1]);
							}
							
						}
					$result[]=$arrres;
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>$result);
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function themeparkAvailability()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=4;
		$Product_id=$data->product_id;
		$DateOfTour=$data->DateOfTour;

		$urls=themeparkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nDateOfTour=$DateOfTour\r\nProductId=$Product_id\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);
		
		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	
			
			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function themeparkBooking()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=5;
		$Product_id=$data->product_id;
		$DateOfTour=$data->DateOfTour;

		$NUMBER=$data->mobile;
		$time=$data->time;
		$Email=$data->email;
		$benfName=$data->fname;
		$benlName=$data->lname;
		$benMobile=$data->mobile;
		$benAddressline1=$data->address1;
		$benAddressline2=$data->address2;
		$benCity=$data->city;
		$State=$data->state;
		$benCountryid=$data->country;
		$benPostcode=$data->postcode;
		$tour_options_Id=$data->tour_options_id;
		$tour_options_title=$data->tour_options_title;
		$pricing_name=$data->pricing_name;
		$pricing_qty=$data->pricing_qty;
		$pricing_id=$data->pricing_id;



		$urls=themeparkurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();



		$querString=$startquery."
		Type=$type\r\n
		NUMBER=$NUMBER\r\n
		time=$time\r\n
		Email=$Email\r\n
		benfName=$benfName\r\n
		benlName=$benlName\r\n
		benAddressline1=$benAddressline1\r\n
		benAddressline2=$benAddressline2\r\n
		benMobile=$benMobile\r\n
		benCity=$benCity\r\n
		State=$State\r\n
		benCountryid=$benCountryid\r\n
		benPostcode=$benPostcode\r\n
		tour_options_Id=$tour_options_Id\r\n
		tour_options_title=$tour_options_title\r\n
		pricing_name=$pricing_name\r\n
		pricing_qty=$pricing_qty\r\n
		pricing_id=$pricing_id\r\n
		DateOfTour=$DateOfTour\r\n
		ProductId=$Product_id\r\n
		AMOUNT=$amount\r\n
		AMOUNT_ALL=$amount
		";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$check_response = $this->get_query_result($signInMsg, $check_url);
		$recharge_response = $this->get_query_result($signInMsg, $pay_url);
		
		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	
			
			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>json_decode(urldecode($response['ADDINFO'])));
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	//  <! ================= End Theme Park API =============--->


	function newsender()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');

        $data=json_decode($json);  
        $header=apache_request_headers();


        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		$type=5;

		$urls=moneytransferurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nAgentTransId=$AgentTransId\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);
	}

	//  <! ================= Start PPI Money Transfer API =============--->

	function ppi_getbankdetail()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=15;
		$benAccount='';

		$urls=ppiurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nbenAccount=$benAccount\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		if ($recharge_response) {
			$response=$this->responsearray($recharge_response);	
			print_r(urldecode($response['ADDINFO']));die;
			if($response['RESULT']==0 && $response['ERROR']==0)
			{
				$exp=explode(",",urldecode($response['ADDINFO']));
					foreach ($exp as $value) {
						
							$dat=explode("=",$value);
							if(@$dat[1]!=''){
								$arrres[trim($dat[0])]=str_replace(";","",$dat[1]);
							}
							
						}
					$result[]=$arrres;
				$array=array("statuscode"=>200,"message"=>"Details has been getting successfully.","data"=>$result);
			}else{
				$array=array("statuscode"=>400,"data"=>"","message"=>"Error occured while getting details!!!");
			}		
		   
		} else {
		    $array=array("statuscode"=>400,"message"=>"BAD Response!!!");
		}


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function ppi_customervalidation()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        $secKey = seckey();
		$passwd = password();
		$serverCert = mycert();
		$amount='1.00';
		//$cert=cert();
		$type=5;
		$NUMBER=$data->mobile;

		$urls=ppiurl();
		$check_url=$urls['check_url'];
		$pay_url=$urls['pay_url'];
		$verify_url=$urls['verify_url'];

		$startquery= $this->startquery();

		$querString=$startquery."Type=$type\r\nNUMBER=$NUMBER\r\nAMOUNT=$amount\r\nAMOUNT_ALL=$amount";

		$encoded= $this->SHARSA_sign($querString,$secKey, $passwd);

		$signInMsg = "BEGIN\r\n" . $querString . "\r\nEND\r\nBEGIN SIGNATURE\r\n" . $encoded . "END SIGNATURE\r\n";

		$recharge_response = $this->get_query_result($signInMsg, $pay_url);

		print_r($recharge_response);


	}

	function ppi_customerregistration()
	{
		
	}




	//  <! ================= End PPI Money Transfer API =============--->



	//  <! ================= Start API Related Useful Funtion =============--->



	function responsearray($response)
	{
		$fields = preg_split("/\r\n|END\r\n|BEGIN SIGNATURE\r\n|END SIGNATURE\r\n|BEGIN\r\n/", $response, NULL, PREG_SPLIT_NO_EMPTY);
		foreach ($fields as $value) {
			$dat=explode("=",$value);
			$arrres[$dat[0]]=$dat[1];
		}

		return $arrres;
	}


	function startquery()
	{
		$phNbr='8750123425';
		$sess=$this->session($phNbr);
		$SD=sd();
		$AP=ap();
		$OP=op();
		$cert=cert();

		return $data="CERT=$cert\r\nSD=$SD\r\nAP=$AP\r\nOP=$OP\r\nSESSION=$sess\r\n";
	}

	function get_query_result($qs, $url)
	{
	    $opts = array( 
	        'http'=>array(
	            'method'=>"POST",
	            'header'=>array("Content-type: application/x-www-form-urlencoded\r\n".
	                            "X-CyberPlat-Proto: SHA1RSA\r\n"),
	            'content' => "inputmessage=".urlencode($qs)
	        )
	    ); 
	    $context = stream_context_create($opts);    
	    return @file_get_contents($url, false, $context);
	}

	function check_signature($response, $serverCert)
	{
	    $fields = preg_split("/END\r\nBEGIN SIGNATURE\r\n|END SIGNATURE\r\n|BEGIN\r\n/", $response, NULL, PREG_SPLIT_NO_EMPTY);
	    if (count($fields) != 2) {
	        print "Bad response\n";
			return;
	    }

	    $pubkeyid = openssl_pkey_get_public($serverCert);
	    $ok = openssl_verify(trim($fields[0]), base64_decode($fields[1]), $pubkeyid);
	    print "Signature is ";
	    if ($ok==1) {
	            print "good";
	    } elseif ($ok==0) {
	            print "bad";
	    } else {
	            print "ugly, error checking signature";
	    }
	    print "\n";
	    openssl_free_key($pubkeyid);
	}

	function session($phNbr)
	{
		$sessPrefix = rand(100, 300);
		$sess = $sessPrefix.$phNbr.time();
		return $sess = substr($sess,-20);
	}

	function SHARSA_sign($querString,$secKey, $passwd)
	{
		$pkeyid = openssl_pkey_get_private($secKey, $passwd);
		openssl_sign($querString, $signature, $pkeyid, OPENSSL_ALGO_SHA1);
		openssl_free_key($pkeyid);

		$encoded = base64_encode($signature);
		return $encoded = chunk_split($encoded, 76, "\r\n");

	}

	//  <! ================= End API Related Useful Funtion =============--->
}