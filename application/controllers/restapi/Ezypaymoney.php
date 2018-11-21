<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ezypaymoney extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('itcaremoney_helper');
		$this->load->model('Api_model');
		$this->load->model('user');
        
	}

	public function callbackstatus()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->client_req) && $data->client_req!='')
        {
        	$client_req=$data->client_req;
	        $hashed=rand(100000,10000000);
			$reqid = substr(sha1($hashed),0,12);

	        $api_req=Callbackstatus($reqid,$client_req);

	        $response=explode("~",$api_req);

	        $resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[6],"ref_detail"=>$response[7]);

			if($response[5]=='SUCCESS')
			{
				$array=array("statuscode" => 200,"data"=>$resdata);
			}else{
				$array=array("statuscode" => 400,"data"=>$resdata);
			}
        }else{
        	$array=array("statuscode" => 500,"message"=>"Please send valid parameters!!!");
        }

        

       $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function newsender()
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
	    	if(isset($data->mobile) && $data->mobile!='')
	        {
	        	$mob=$data->mobile;
				$name='Customer';
				$hashed=rand(100000,10000000);
				$reqid = substr(sha1($hashed),0,12);

				$api=RegisterSender($mob,$reqid,$name);

				$response=explode("~",$api);


				$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[6],"ref_no"=>$response[4]);
				if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"data"=>$resdata);
				}else{
					$array=array("statuscode" => 400,"data"=>$resdata);
				}

				
	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
        
	}

	public function otpverification()
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

	        if(isset($data->ref_no) && $data->ref_no!='' && isset($data->mobile) && $data->mobile!='' && isset($data->otp) && $data->otp)
	        {
	        	$mob=$data->mobile;
		        $otp=$data->otp;
		        $ref_no=$data->ref_no;
		        $hashed=rand(100000,10000000);
				$req_id = substr(sha1($hashed),0,12);

				$apidetail=VerifyOtp($req_id,$ref_no,$otp);

		        $response=explode("~",$apidetail);


		        $resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[6]);

				if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"data"=>$resdata);
				}else{
					$array=array("statuscode" => 400,"data"=>$resdata);
				}

	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function resendotp()
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

	        if(isset($data->ref_no) && $data->ref_no!='' && isset($data->mobile) && $data->mobile!='')
	        {
	        	$mob=$data->mobile;
		        $ref_no=$data->ref_no;
		        $hashed=rand(100000,10000000);
				$req_id = substr(sha1($hashed),0,12);

				$apidetail=ResendOtp($req_id,$ref_no);

		        $response=explode("~",$apidetail);
				$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[6],"ref_no"=>$response[3]);

				if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"data"=>$resdata);
				}else{
					$array=array("statuscode" => 400,"data"=>$resdata);
				}


	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);

	
	}

	public function getbeneficiarylist()
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

	        if(isset($data->mobile) && $data->mobile!='')
	        {
	        	$mobile=$data->mobile;

	        	$hashed=rand(100000,10000000);
				$req_id = substr(sha1($hashed),0,12);

	        	$apidetail=GetBeneficiaryDetails($req_id,$mobile);
	        	
		        @$response=explode("~",$apidetail);
		        //print_r($response);
		        if(@$response[5]=='FAILED')
				{
					$array=array("statuscode" => 400,"message"=>$response[6]);
				}else{
					$array=array("statuscode" => 200,"data"=>json_decode($apidetail));
				}

				

	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function addbeneficiary()
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
	    	if(isset($data->mobile) && $data->mobile!='' && isset($data->benename) && $data->benename!='' && isset($data->account_no) && $data->account_no!='' && isset($data->ifsc) && $data->ifsc!='')
	        {
	        	$hashed=rand(100000,10000000);
				$req_id = substr(sha1($hashed),0,12);
				$mobile=$data->mobile;
				$benename=$data->benename;
				$account_no=$data->account_no;
				$ifsc=$data->ifsc;

				$apidetail=AddBeneficiary($req_id,$mobile,$benename,$account_no,$ifsc);

				$response=explode("~",$apidetail);

				$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[6],"beneficiary_id"=>$response[7]);

				if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"data"=>$resdata);
				}else{
					$array=array("statuscode" => 400,"data"=>$resdata,"message"=>$response[6]);
				}



	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);


		
	}

	public function getadminbal()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        $apidetail=Adminbalance();

        print_r($apidetail);
	}

	public function userbalance()
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

	        if(isset($data->mobile) && $data->mobile!='')
	        {
	        	$hashed=rand(100000,10000000);
				$req_id = substr(sha1($hashed),0,12);

				$mobile=$data->mobile;
	        	$apidetail=ChkSenderBal($req_id,$mobile);

	        	$response=explode("~",$apidetail);

	        	$bal=explode(":",$response[6]);

	        	$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"balance"=>trim($bal[1]));

	        	if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"data"=>$resdata);
				}else{
					$array=array("statuscode" => 400,"data"=>$resdata);
				}

	        	

	        }else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function banklist()
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

	        $apidetail=$this->Api_model->banklist();

	        if($apidetail)
			{
				$array=array("statuscode" => 200,"data"=>$apidetail);
			}else{
				$array=array("statuscode" => 400,"message"=>"Error occured while getting detail!!!");
			}
		}else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

		$jsonresult=json_encode($array);
		print_r($jsonresult);

        
	}

	public function accountvalidation()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        $header=apache_request_headers();
	    
	    if(isset($header['api_key']) && $header['api_key']!='' && isset($header['version']) && $header['version']!='')
	    {
	    	$chkversion=$this->Api_model->chkversion($header['version']);
	    	if(count($chkversion)==1)
	    	{


		    	$api_key=$header['api_key'];
		    	$balancedata=apibalancedetail($header['api_key']);
		    	if(count($balancedata)>0)
		    	{
		    		$curr_bal=$balance=$balancedata['balance'];
			    	$parent_id=$balancedata['parent_id'];
			    	$api_userid=$userid=$balancedata['userid'];
			    	$name=$balancedata['name'];
			    	$wl_id=$balancedata['wl_id'];
			    	$amount='3.00';
			    	$operator='119';

			    	if($parent_id!=1)
			    	{
			    		$user=ckbalance($api_key,$amount);
			    		$a = count($user);
			    	}else{
			    		$a = 1;
			    	}
			    	
			    	if(intval($balance)>0 && intval($amount)<intval($balance) && $a==1)
		            {
			    		if(isset($data->mobile) && $data->mobile!='' && isset($data->account_no) && $data->account_no!='' && isset($data->bankcode) && $data->bankcode!='')
				        {
				        	$adminbal=Adminbalance();
				        	$response=explode("~",$adminbal);
				        	//print_r(number_format($response[0],2));die;
				        	if($response[0]>'20.00')
				        	{
				        		$hashed=rand(100000,10000000);
								$req_id = substr(sha1($hashed),0,12);
								$mobile=$data->mobile;
								$account_no=$data->account_no;
								$bankcode=$data->bankcode;



						        $apidetail=AccountValidation($req_id,$mobile,$account_no,$bankcode);
						       //print_r($apidetail);die;
								//$apidetail='E06032~6eda890e2ff1~9999040313~SBIN~33093018685~SUCCESS~825415001217~Transaction Successful~Mr  PRATEEK  VERMA~220730118~State Bank of India~9/11/2018 3:01:39 PM~NA~NA';
						        $response=explode("~",$apidetail);
						        
								$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"message"=>$response[7],"trans_id"=>$response[6],"benename"=>$response[8],"request_id"=>$req_id);

								if($response[5]=='SUCCESS' || $response[5]=='PENDING')
								{
									$deduction=$tx=$response[6];
									$rid=rand(100000,10000000);
									$save_data=$this->Api_model->reduceMTFund($api_userid, $amount, $mobile, $response[6]);
									$deductCommission=deductCommission($operator,$api_userid,$deduction,$rid,$amount); 
									//$saveapi=$this->Api_model->reduceFundAccVali($userid, $amount, $tx);
									//$saveapi=$this->Api_model->reduceFundparentAccVali($parent_id, $amount, $tx,$name);
									$array=array("statuscode" => 200,"data"=>$resdata);
								}else{
									$array=array("statuscode" => 400,"data"=>$resdata);
								}

							}else{
				        		$array=array("statuscode" => 404,"message" => "There is some technical error, please try after sometime!!!");
				        	}
				        }else{
				        	$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
				        }
				    }else{
				    	$array=array("statuscode" => 500,"message" => "There is some technical error, please try after sometime!!!");
				    }
				}else{
				    	$array=array("statuscode" => 500,"message" => "Please send valid api key!!!");
				    }
			}else{
	    		$array=array("statuscode" => 501,"message" => "Version mismatch!!!");
	    	}
	        
		}else{
        		$array=array("statuscode" => 500,"message" => "Please send api key & version!!!");
        	}

		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	

	public function deletebeneficiary()
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
	    	if(isset($data->mobile) && $data->mobile!='' && isset($data->benecode) && $data->benecode!='')
	        {
	        	$hash=rand(10000,9999999);
				$req_id = substr(sha1($hash),0,12);
				$mobile=$data->mobile;
				$benecode=$data->benecode;
	    		$apidetail=DeleteBeneficiary($req_id,$mobile,$benecode);
	    		$response=explode("~",$apidetail);
	    		if($response[5]=='SUCCESS')
				{
					$array=array("statuscode" => 200,"message"=>"Beneficiary has been deleted successfully.");
				}else{
					$array=array("statuscode" => 400,"message"=>"Error occured while deleting beneficiary!!!");
				}

	    	}else{
	        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
	        	}
    	}else{
        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
        	}
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}


	public function moneytransfer()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);
        $header=apache_request_headers();

       if(isset($header['api_key']) && $header['api_key']!='' && isset($header['version']) && $header['version']!='')
	    {
	    	$chkversion=$this->Api_model->chkversion($header['version']);
	    	if(count($chkversion)==1)
	    	{
	    	$apikey_data=apibalancedetail($header['api_key']);
        	$api_userid=$apikey_data['userid'];

	    	$adminbal=Adminbalance();
	    	$adminbal_res=explode("~",$adminbal);


	    	$api_key=$header['api_key'];
	    	$balancedata=apibalancedetail($header['api_key']);

	    	/*$curr_bal=$balance=$balancedata['balance'];
	    	$parent_id=$balancedata['parent_id'];
	    	$userid=$balancedata['userid'];
	    	$name=$balancedata['name'];
	    	$wl_id=$balancedata['wl_id'];
	    	$amount=$data->amount;
	    	$operator='117';
	    	$mobile=$data->mobile;
			$benecode=$data->benecode;
			$amount=$data->amount;
			$transtype=$data->transtype;
			$hash=rand(10000,9999999);
			$req_id = substr(sha1($hash),0,12);	*/

	    	if(count($balancedata)>0)
	    	{
	    		if(isset($data->mobile) && $data->mobile!='' && isset($data->benecode) && $data->benecode!='' && isset($data->transtype) && $data->transtype!='' && isset($data->amount) && $data->amount!='')
				        {
				        	if($data->amount<=$adminbal_res[0])
				        	{

					        	$curr_bal=$balance=$balancedata['balance'];
						    	$parent_id=$balancedata['parent_id'];
						    	$userid=$balancedata['userid'];
						    	$name=$balancedata['name'];
						    	$wl_id=$balancedata['wl_id'];
						    	$amount=$data->amount;
						    	$operator='117';
							    	if($parent_id!=1)
							    	{
							    		$user=ckbalance($api_key,$amount);
							    		$a = count($user);
							    	}else{
							    		$a = 1;
							    	}
							    	if(intval($balance)>0 && intval($amount)<intval($balance) && $a==1)
		            				{
		            					$balance=apibalance($header['api_key']);
							        	if($balance!='empty')
							        	{
							        		if(intval($balance)>0 && $data->amount<intval($balance))
					            			{
					            				$hash=rand(10000,9999999);
												$req_id = substr(sha1($hash),0,12);				

												$mobile=$data->mobile;
												$benecode=$data->benecode;
												$amount=$data->amount;
												$transtype=$data->transtype;

												if(strtolower($transtype)=='neft')
												{
													$apidetail=MoneyTransferNeft($req_id,$mobile,$benecode,$amount);
												}elseif(strtolower($transtype)=='imps')
												{
													$apidetail=MoneyTransferImps($req_id,$mobile,$benecode,$amount);
												}    
												//$apidetail='E06016~f36ae4361660~9999040313~1945163~NA~SUCCESS~825415037192~Transaction Successful~Mr  PRATEEK  VERMA~220733253~State Bank of India~9/11/2018 3:55:15 PM~NA~NA';
												
										        $response=explode("~",$apidetail);
										        $deduction=$req_id; 
												
												$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"ref_no"=>$response[6],"message"=>$response[7],"request_id"=>$req_id);

												if($response[5]=='SUCCESS' || $response[5]=='PENDING')
												{
													$save_data=$this->Api_model->reduceMTFund($api_userid, $amount, $mobile, $response[6]);
													$deductCommission=deductCommission($operator,$api_userid,$response[9],$deduction,$amount); 
													//$apidetail='E06016~f36ae4361660~9999040313~1945163~NA~SUCCESS~825415037192~Transaction Successful~Mr  PRATEEK  VERMA~220733253~State Bank of India~9/11/2018 3:55:15 PM~NA~NA';
													$resdata=array("messagecode"=>$response[0],"status"=>$response[5],"ref_no"=>$response[6],"message"=>$response[7],"bane_code"=>$response[3],"bene_name"=>$response[8],"beneficiary_id"=>$response[9],"req_id"=>$response[1]);
													$tx=$response[6];
													//$saveapi=$this->Api_model->reduceFund($userid, $amount, $tx);
													//$saveapi=$this->Api_model->reduceFundparent($parent_id, $amount, $tx,$name);

													$array=array("statuscode" => 200,"data"=>$resdata);
												}else{
													$array=array("statuscode" => 400,"data"=>$resdata);
												}
					            			}else{
							        		$array=array("statuscode" => 400,"message" => "Server is currently undergoing maintenance. Please try again later!!!");
							        		}
							        	}else{
						        		$array=array("statuscode" => 400,"message" => "Please enter valid key!!!");
						        		}
	            					}else{
					        			$array=array("statuscode" => 400,"message" => "There is some technical error, please try after sometime!!!");
					        		}
					        }else{
					        	/*$dataarr=array("message" => "Server is currently undergoing maintenance. Please try again later!!!");*/
					        		$array=array("statuscode" => 400,"message" => "Server is currently undergoing maintenance. Please try again later!!!");
					        	}
				        }else{
				        		$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
				        	}
	    	}else{
			 	$array=array("statuscode" => 500,"message" => "Please send valid api key!!!");
			 }
	    }else{
	    		$array=array("statuscode" => 501,"message" => "Version mismatch!!!");
	    	}
	        
		}else{
        		$array=array("statuscode" => 500,"message" => "Please send api key & version!!!");
        	}
	     $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	
}