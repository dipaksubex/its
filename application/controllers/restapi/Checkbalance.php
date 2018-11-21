<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkbalance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('Api_model');
        
	}

	public function validateurl()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);

        $header=apache_request_headers();

        if(isset($header['api_key']) && $header['api_key']!='' && isset($data['userid']) && $data['userid']!='' && isset($data['amount']) && $data['amount']!='')
	    {
	    	$balancedata=apibalancedetail($header['api_key']);
	    	if(count($balancedata)>0)
	    	{
	    		$api_key=$header['api_key'];
	    		$key_balance=$balancedata['balance'];
	    		$key_userid=$balancedata['userid'];
	    		$key_username=$balancedata['name'];
	    		$pay_amount=$data['amount'];
	    		$pay_userid=$data['userid'];
	    		$pay_for=$data['type'];

	    		if($key_balance>=$pay_amount)
	    		{
	    			$paydata=$this->Api_model->getuserdetailById($pay_userid);
	    			if(count($paydata)>0)
	    			{
	    				$payusr_bal=$paydata[0]['balance'];
	    				$payusr_par_id=$paydata[0]['parent_id'];
	    				if($payusr_bal>=$pay_amount)
	    				{
	    					if($payusr_par_id!=1)
					    	{
					    		$user=ckbalance($api_key,$pay_amount);
					    		$a = count($user);
					    	}else{
					    		$a = 1;
					    	}

					    	if($a==1)
					    	{
					    		$responsecode=rand('11111','9999999');

					    		//$api_priority=$this->getapibypriority($pay_for);

					    		$array=array("statuscode" => 200,"response_code" =>$responsecode);
					    	}else{
					    		$array=array("statuscode" => 400,"message" => "Server is currently undergoing maintenance. Please try again later!!!");
					    	}
	    				}else{
	    					$array=array("statuscode" => 400,"message" => "You have insufficient fund. Please contact your merchant!!!");
	    				}
	    				
	    			}else{
	    				$array=array("statuscode" => 400,"message" => "Please valid user detail!!!");
	    			}
	    		}else{
	    			$array=array("statuscode" => 400,"message" => "Insufficient fund. Please contact your merchant!!!");
	    		}
	    		
	    	}else{
	    		$array=array("statuscode" => 500,"message" => "Please valid api key!!!");
	    	}
	    }else{
	    	$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	    }

	    $jsonresult=json_encode($array);
		print_r($jsonresult);
	}


	function getapibypriority($type)
	{
		$dta=$this->Api_model->apipriority($type);
		$limit=0;

		foreach ($dta as $pridata) {
			$fun_apiname=$pridata['api_name'].'_balance';

			echo $this->$fun_apiname();
			die;			
		}


	}

	function ezy_pay_balance()
	{
		$url=ezypay_url().'GetBalance.aspx?AuthorisationCode='.ezy_apikey();

    	$response=$this->curl_function($url,'');

    	$res=explode("~",$response);

	    return $res[0];
	}

	function cyber_plate_balance()
	{
		$url=base_url().'giftcard/adminbalanceapi';

		$response=$this->curl_function($url,'');
		$res=json_decode($response,true);

		return $res['Balance'];
	}

	function gi_balance()
	{

	}

	function phone_pay()
	{

	}

	function reseller_club_balance()
	{

	}

	function oyo_balance()
	{
		
	}

	function tbo_balance()
	{
		
	}

	function eko_money_balance()
	{

	}



	function curl_function($url,$postfields)
    {
    	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		return $server_output;
    }
}