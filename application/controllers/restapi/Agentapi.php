<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agentapi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->model('Api_model');
        
	}

	public function agentlogin()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();
        if(isset($header['api_key']) && $header['api_key']!='')
	    {
		   if(isset($data->email) && $data->email!='' && isset($data->password) && $data->password!='' && isset($data->ip) && $data->ip!='')
		        {
		        	$email=$data->email;
		        	$password=md5($data->password);
		        	$ip=$data->ip;
		        	$api_key=$header['api_key'];
		        	$request=$this->Api_model->agentlogin($email,$password,$api_key);
		        	if(count($request)>0)
		        	{
		        		$id= $request[0]->id;
		        		$name=$request[0]->name;
		        		$email=$request[0]->email;
		        		$mobile=$request[0]->mobile;
		        		$address1=$request[0]->address1;
		        		$address2=$request[0]->address2;
		        		$city=$request[0]->city;
		        		$state=$request[0]->state;
		        		$country=$request[0]->country;
		        		$pincode=$request[0]->pincode;
		        		$api_key=$request[0]->api_key;
		        		$kyc_status=$request[0]->kyc_status;
		        		$balance=$request[0]->virtual_balance;
		        		$last_login_date=$request[0]->last_login_date;
		        		$last_login_ip=$request[0]->last_login_ip;
		        		$profile_pic=$request[0]->profile_pic;


		        		$response=array(
		        				"id"=>$id,
				        		"name"=>$name,
				        		"email"=>$email,
				        		"mobile"=>$mobile,
				        		"address1"=>$address1,
				        		"address2"=>$address2,
				        		"city"=>$city,
				        		"state"=>$state,
				        		"country"=>$country,
				        		"pincode"=>$pincode,
				        		"api_key"=>$api_key,
				        		"kyc_status"=>$kyc_status,
				        		"balance"=>$balance,
				        		"last_login_date"=>$last_login_date,
				        		"last_login_ip"=>$last_login_ip,
				        		"profile_pic"=>$profile_pic
		        				);


		        		$ser['last_login_ip'] = $ip;
	                    $ser['last_login_date'] = date('Y-m-d H:i:s');
	                    $this->Api_model->agentupdateStatus($ser, $id);

		        		$array=array("statuscode" => 200,"message" => "User has been login successfully.","data"=>$response);
		        	}else{
		        		$array=array("statuscode" => 500,"message" => "Please enter correct email and password!!!");
		        	}
		        	
		        }else{
		        	$array=array("statuscode" => 500,"message" => "Please send valid details!!!");
		        }
		    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
	        
	 

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function transactionlist()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();
	    
	    if(isset($header['api_key']) && $header['api_key']!='')
	    {

	        if(isset($data->user_id) && $data->user_id!='')
	        {
	        	$user_id=$data->user_id;
	        	$datareq=$this->Api_model->gettransactionlist($user_id);
	        	$array=array("statuscode" => 200,"message" => "Transaction list has been getting successfully.","data"=>$datareq);
	        
	        }else{
	        	$array=array("statuscode" => 500,"message" => "Please send valid parameters!!!");
	        }

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	
	}

	public function wallettowallettransfer()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

        if(isset($header['api_key']) && $header['api_key']!='')
	    {
	    	$from_userid=$data->from_userid;
	    	$to_userid=$data->to_userid;
	    	$to_userid= preg_replace("/[^0-9,.]/", "", $to_userid);
	    	$amount=$data->amount;

	    	$chkuser=$this->Api_model->getuserdetailById($from_userid);
	    	if(count($chkuser)>0)
	    	{
	    		if($amount<=$chkuser[0]['balance'])
	    		{
	    			$chkuser_to=$this->Api_model->getuserdetailById($to_userid);
	    			if(count($chkuser_to)>0 && $chkuser_to[0]['user_type']==7)
	    			{
	    				$balance_deductWT=$this->Api_model->savetransaction($from_userid,$to_userid,$amount);
	    				

	    				if($balance_deductWT)
	    				{
	    					$array=array("statuscode"=>200,"message"=>"Amount has been transfered successfully.");
	    				}else{
	    					$array=array("statuscode"=>400,"message"=>"Error occured while transfering amount!!!");
	    				}
	    				
	    				
	    			}else{
	    				$array=array("statuscode"=>400,"message"=>"Please enter valid Agent id !!!");
	    			}
	    		}else{
	    			$array=array("statuscode"=>400,"message"=>"Please enter valid amount!!!");
	    		}
	    	}else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter correct userid");
	    	}
	    	
	    }else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter valid api key!!!");
	    	}

	    $jsonresult=json_encode($array);
	    print_r($jsonresult);
	}

	function getBalance()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  
        $header=apache_request_headers();

         if(isset($header['api_key']) && $header['api_key']!='')
	    {
	    	$userid=$data->user_id;
	    	$chkuser=$this->Api_model->getuserdetailById($userid);
	    	if(count($chkuser)>0)
	    	{

	    		$array=array("statuscode"=>200,"balance"=>$chkuser[0]['balance']);
	    	}else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter correct userid");
	    	}
        }else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter valid api key!!!");
	    	}

	    $jsonresult=json_encode($array);
	    print_r($jsonresult);

	}

	function updatetransaction()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);  
        $header=apache_request_headers();

        if(
        	isset($data['user_id']) && $data['user_id']!='' &&
        	isset($data['trans_id']) && $data['trans_id']!='' &&
        	isset($data['amount']) && $data['amount']!='' &&
        	isset($data['pay_type']) && $data['pay_type']!='' &&
        	isset($data['narration']) && $data['narration']!='' &&
        	isset($data['trans_type']) && $data['trans_type']!='' &&
        	isset($data['status']) && $data['status']!='' &&
        	isset($data['mobile']) && $data['mobile']!='' &&
        	isset($data['operator_id']) && $data['operator_id']!=''
        )
        {
        	$user_id=$data['user_id'];


			$chkuser=$this->Api_model->getuserdetailById($user_id);
	    	if(count($chkuser)>0)
	    	{
				$trans_id=$data['trans_id'];
				$mobile=$data['mobile'];
				$amount=$data['amount'];
				$pay_type=$data['pay_type'];
				$narration=$data['narration'];
				$created_date=date('Y-m-d h:i:s');
				$trans_type=$data['trans_type'];
				$operator_id=$data['operator_id'];
				$status=$data['status'];

				/*if($status==0)
				{*/
					$cur_balance=$chkuser[0]['balance'];
				/*}*/
				/*else{
					$cur_balance=$chkuser[0]['balance']-$amount;
				}*/

	    		
	    		$wl_id=$chkuser[0]['wl_id'];
	    		//$mobile=$chkuser[0]['mobile'];

	    		$dataarr=array(
	    					"user_id"=>$user_id,
							"trans_id"=>$trans_id,
							"amount"=>$amount,
							"pay_type"=>$pay_type,
							"narration"=>$narration,
							"created_date"=>$created_date,
							"trans_type"=>$trans_type,
							"cur_balance"=>$cur_balance,
							"operator_id"=>$operator_id,
							"wl_id"=>$wl_id,
							"mobile"=>$mobile,
							"status"=>$status
	    			);
	    		$savedata=$this->Api_model->updatetransaction($user_id, $cur_balance, $dataarr,$status);
	    		if($savedata)
	    		{
	    			$array=array("statuscode"=>200,"message"=>"Transaction saved successfully.","tx_id"=>$savedata);
	    		}else{
	    			$array=array("statuscode"=>500,"message"=>"Error occured while saving transaction!!!");
	    		}

	    	}else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter correct userid!!!");
	    	}
        }else{
        	$array=array("statuscode"=>400,"message"=>"Please enter valid Parameter!!!");
        }

        $jsonresult=json_encode($array);
	    print_r($jsonresult);

        
	}

	function updateaftertransaction()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);  
        $header=apache_request_headers();

        if(
        	isset($data['tx_id']) && $data['tx_id']!='' &&
        	isset($data['trans_id']) && $data['trans_id']!='' &&
        	isset($data['narration']) && $data['narration']!='' &&
        	isset($data['request_id']) && $data['request_id']!='' &&
        	isset($data['status']) && $data['status']!=''
        )
        {
        	$tx_id=$data['tx_id'];
        	$trans_id=$data['trans_id'];
			$narration=$data['narration'];
			$created_date=date('Y-m-d h:i:s');
			$status=$data['status'];
			$order_id=$data['request_id'];


			$chkuser=$this->Api_model->getTxdetailById($tx_id);
	    	if(count($chkuser)>0)
	    	{
				//print_r($chkuser);die;
				$amount=$chkuser[0]['amount'];
				$userid=$chkuser[0]['user_id'];

				

				if($status==0)
				{
					$cur_balance=$chkuser[0]['cur_balance'];
				}else{
					$cur_balance=$chkuser[0]['cur_balance']-$amount;
				}


	    		$dataarr=array(
							"trans_id"=>$trans_id,
							"created_date"=>$created_date,
							"cur_balance"=>$cur_balance,
							"narration"=>$narration,
							"order_id"=>$order_id,
							"status"=>$status
	    			);
	    		$savedata=$this->Api_model->updateaftertransaction($tx_id, $cur_balance, $dataarr,$status,$userid);
	    		if($savedata)
	    		{
	    			$array=array("statuscode"=>200,"message"=>"Transaction update successfully.");
	    		}else{
	    			$array=array("statuscode"=>500,"message"=>"Error occured while saving transaction!!!");
	    		}

	    	}else{
	    		$array=array("statuscode"=>400,"message"=>"Please enter correct transaction id!!!");
	    	}
        }else{
        	$array=array("statuscode"=>400,"message"=>"Please enter valid Parameter!!!");
        }

        $jsonresult=json_encode($array);
	    print_r($jsonresult);

        
	}
}