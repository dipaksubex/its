<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ezypayrecharge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('ezypayapi_helper');
		$this->load->model('Api_model');
        
	}

	public function getallprepaidprovider()
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
        	        	
	        if(isset($data->type_id) && $data->type_id!='')
	        {

				$request=$this->Api_model->getallproviders($data->type_id);


				if($request)
				{
					$array=array('statuscode'=>200, "message" => "Prepaid providers get successfully.","data"=>$request);
				}else{
					$array=array('statuscode'=>400, "message" => "Error occured while getting prepaid providers!!!");
				}
	        }else{
					$array=array('statuscode'=>400, "message" => "Please send valid paramenter!!!");
				}
		}else{
                    $array=array("statuscode" => 400,"message"=>"Please valid api key!!!");
            }

		$jsonresult=json_encode($array);

        print_r($jsonresult);
	}

	public function prepaidrecharge()
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


	        if(isset($data->operator) && $data->operator!='' && isset($data->phone) && $data->phone!='' && isset($data->amount) && $data->amount!='')
	        {
	        	$balance=apibalance($header['api_key']);
	        	if($balance!='empty')
	        	{
	        		$parent_id=$balance['parent_id'];
	        		if($parent_id!=1)
			    	{
			    		$user=ckbalance($api_key,$amount);
			    		$a = count($user);
			    	}else{
			    		$a = 1;
			    	}

		        	if(intval($balance)>0 && $data->amount<intval($balance) && $a==1)
		        	{
		        		$adminbal=Adminbalance();
			        	$response=explode("~",$adminbal);
			        	//$response[0]='50000';
			        	if($response[0]>$data->amount)
			        	{
					        $ezy_operator=json_decode($this->getallprepaidopertaor($data->operator));

					        $operator=$ezy_operator->oper_id;
					        $phone=$data->phone;
					        $amount=$data->amount;

					        $apiurl=ezypay_url();
					        $authkey=ezy_apikey();

					        $hashed=rand(100000,10000000);
							$reqid = substr(sha1($hashed),0,12);
							$save_oper=$data->operator;
							$url=$apiurl."PushRequest.aspx?AuthorisationCode=".$authkey."&product=".$operator."&MobileNumber=".$phone."&Amount=".$amount."&RequestId=".$reqid."&StoreID=NA";
							//die;
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							$server_output = curl_exec ($ch);
							curl_close ($ch);
			//$server_output='12345~RE10111~9999999999~ 1~ Transaction Successful~100~500.25~12/02/2013 10:20:23~111111111';
							$responseapi=explode("~", $server_output);
							
							$data=array(
								'txnid'=>$responseapi[0],
								'request_id'=>$responseapi[1],
								'oper_id'=>$responseapi[8]
							);
							if($responseapi[3]=='100' || $responseapi[3]=='1')
							{
								$save_data=$this->Api_model->deductRecharge($api_userid,$amount,$phone,$save_oper);
								$array=array('statuscode'=>200, "message" =>$responseapi[4], "data"=>$data);
							
							}else{
								$array=array('statuscode'=>400, "message" =>$responseapi[4], "data"=>$data);
							}
						}else{
							$array=array('statuscode'=>400, "message" =>"Server is currently undergoing maintenance. Please try again later!!!");
						}
					}else{
						$array=array('statuscode'=>400, "message" =>"Server is currently undergoing maintenance. Please try again later!!!");
					}
				}else{
			        		$array=array("statuscode" => 400,"message" => "Please enter valid key!!!");
			        	}
				
			}else{
					$array=array('statuscode'=>400, "message" => "Please send valid paramenter!!!");
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

	public function postpaidrecharge()
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

        	$api_key=$header['api_key'];
	    	$balancedata=apibalancedetail($header['api_key']);
	    	if(count($balancedata)>0)
	    	{
	    		$balance=$balancedata['balance'];
	    		$parent_id=$balancedata['parent_id'];

	        if(isset($data->operator) && $data->operator!='' && isset($data->phone) && $data->phone!='' && isset($data->amount) && $data->amount!='')
	        {
	        	$amount=$data->amount;
        	if($parent_id!=1)
		    	{
		    		$user=ckbalance($api_key,$amount);
		    		$a = count($user);
		    	}else{
		    		$a = 1;
		    	}
		    	
		    	if(intval($balance)>0 && intval($amount)<intval($balance) && $a==1)
	            {
		        	$adminbal=Adminbalance();
		        	$response=explode("~",$adminbal);
		        	if($response[0]>$data->amount)
		        	{

				        $ezy_operator=json_decode($this->getallpostpaidoperator($data->operator));

				        $operator=$ezy_operator->oper_id;
				        $phone=$data->phone;
				        $amount=$data->amount;

				        $save_oper=$data->operator;
				        $apiurl=ezypay_url();
				        $authkey=ezy_apikey();

				        $hashed=rand(100000,10000000);
						$reqid = substr(sha1($hashed),0,12);

						$url=$apiurl."PushRequest.aspx?AuthorisationCode=".$authkey."&product=".$operator."&MobileNumber=".$phone."&Amount=".$amount."&RequestId=".$reqid."&StoreID=NA";
						//die;
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$server_output = curl_exec ($ch);
						curl_close ($ch);
						$responseapi=explode("~", $server_output);
						$data=array(
							'txnid'=>$responseapi[0],
							'request_id'=>$responseapi[1],
							'oper_id'=>$responseapi[8]
						);
						if($responseapi[3]=='100' || $responseapi[3]=='1')
						{
							$save_data=$this->Api_model->deductPRecharge($api_userid,$amount,$phone,$save_oper);
							$array=array('statuscode'=>200, "message" =>$responseapi[4], "data"=>$data);
						
						}else{
							$array=array('statuscode'=>400, "message" =>$responseapi[4], "data"=>$data);
						}
					}else{
							$array=array('statuscode'=>400, "message" =>"Server is currently undergoing maintenance. Please try again later!!!");
						}
			
        	 }else{
			    	$array=array("statuscode" => 500,"message" => "There is some technical error, please try after sometime!!!");
			    }
			
			    }else{
                    $array=array("statuscode" => 400,"message"=>"Please send valid parameter!!!");
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

	public function dthrecharge()
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

	        if(isset($data->operator) && $data->operator!='' && isset($data->phone) && $data->phone!='' && isset($data->amount) && $data->amount!='')
	        {

	        	$api_key=$header['api_key'];
	    	$balancedata=apibalancedetail($header['api_key']);
	    	if(count($balancedata)>0)
	    	{
	    		$balance=$balancedata['balance'];
	    		$parent_id=$balancedata['parent_id'];
	    		$amount=$data->amount;
        	if($parent_id!=1)
		    	{
		    		$user=ckbalance($api_key,$amount);
		    		$a = count($user);
		    	}else{
		    		$a = 1;
		    	}
		    	
		    	if(intval($balance)>0 && intval($amount)<intval($balance) && $a==1)
	            {


	        	$adminbal=Adminbalance();
	        	$response=explode("~",$adminbal);
	        	if($response[0]>$data->amount)
	        	{
			        $ezy_operator=json_decode($this->getalldthoperator($data->operator));

			        $operator=$ezy_operator->oper_id;
			        $phone=$data->phone;
			        $amount=$data->amount;
			        $save_oper=$data->operator;

			        $apiurl=ezypay_url();
			        $authkey=ezy_apikey();

			        $hashed=rand(100000,10000000);
					$reqid = substr(sha1($hashed),0,12);

					$url=$apiurl."PushRequest.aspx?AuthorisationCode=".$authkey."&product=".$operator."&MobileNumber=".$phone."&Amount=".$amount."&RequestId=".$reqid."&StoreID=NA";

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					$responseapi=explode("~", $server_output);
					$data=array(
						'txnid'=>$responseapi[0],
						'request_id'=>$responseapi[1],
						'oper_id'=>$responseapi[8]
					);
					if($responseapi[3]=='100' || $responseapi[3]=='1')
					{
						$save_data=$this->Api_model->deductDRecharge($api_userid,$amount,$phone,$save_oper);
						$array=array('statuscode'=>200, "message" =>$responseapi[4], "data"=>$data);
					
					}else{
						$array=array('statuscode'=>400, "message" =>$responseapi[4], "data"=>$data);
					}
				}else{
						$array=array('statuscode'=>400, "message" =>"Server is currently undergoing maintenance. Please try again later!!!");
					}

				 }else{
		    	$array=array("statuscode" => 500,"message" => "There is some technical error, please try after sometime!!!");
		    	}
		     }else{
			    	$array=array("statuscode" => 500,"message" => "Please send valid api key!!!");
			    }
			}else{
                    $array=array("statuscode" => 400,"message"=>"Please send valid parameter!!!");
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
	

	public function landlinerecharge()
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

	        if(isset($data->operator) && $data->operator!='' && isset($data->account) && $data->account!='' && isset($data->amount) && $data->amount!='' && isset($data->landline_no) && $data->landline_no!='' && isset($data->std_code) && $data->std_code!='')
	        {

	        	$api_key=$header['api_key'];
		    	$balancedata=apibalancedetail($header['api_key']);
		    	if(count($balancedata)>0)
		    	{
		    		$balance=$balancedata['balance'];
		    		$amount=$data->amount;
		    		$parent_id=$balancedata['parent_id'];
	        	if($parent_id!=1)
			    	{
			    		$user=ckbalance($api_key,$amount);
			    		$a = count($user);
			    	}else{
			    		$a = 1;
			    	}
			    	
			    	if(intval($balance)>0 && intval($amount)<intval($balance) && $a==1)
		            {

	        	$adminbal=Adminbalance();
	        	$response=explode("~",$adminbal);
	        	if($response[0]>$data->amount)
	        	{
			        $ezy_operator=json_decode($this->getalllandlineoperator($data->operator));

			        $operator=$ezy_operator->oper_id;
			        $phone=$data->landline_no;
			        $amount=$data->amount;
			        $account=$data->account;
			        $std_code=$data->std_code;
			        $save_oper=$data->operator;

			        $apiurl=ezypay_url();
			        $authkey=ezy_apikey();

			        $hashed=rand(100000,10000000);
					$reqid = substr(sha1($hashed),0,12);
					//$reqid = rand(1000, 9999);

					$url=$apiurl."postpaidpush.aspx?AuthorisationCode=".$authkey."&product=".$operator."&MobileNumber=".$phone."&Amount=".$amount."&RequestId=".$reqid."&Circle=NA&AcountNo=".$account."&StdCode=".$std_code;

					//print_r($url);die;
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$server_output = curl_exec ($ch);
					curl_close ($ch);
					$responseapi=explode("~", $server_output);
					//print_r($responseapi);die;
					$data=array(
						'txnid'=>$responseapi[0],
						'request_id'=>$responseapi[1],
						'oper_id'=>$responseapi[8]
					);
					if($responseapi[3]=='100' || $responseapi[3]=='1')
					{
						$save_data=$this->Api_model->deductLRecharge($api_userid,$amount,$phone,$save_oper);
						$array=array('statuscode'=>200, "message" =>$responseapi[4], "data"=>$data);
					
					}else{
						$array=array('statuscode'=>400, "message" =>$responseapi[4], "data"=>$data);
					}
				}else{
						$array=array('statuscode'=>400, "message" =>"Server is currently undergoing maintenance. Please try again later!!!");
					}
				 }else{
		    	$array=array("statuscode" => 500,"message" => "There is some technical error, please try after sometime!!!");
		    	}
		     }else{
			    	$array=array("statuscode" => 500,"message" => "Please send valid api key!!!");
			    }
			}else{
                    $array=array("statuscode" => 400,"message"=>"Please send valid parameter!!!");
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

	public function getallpostpaidoperator($operator)
	{
		switch ($operator) {

			case 1:
			        $oper=35;
			        $oper_name='Vodafone';
			        break;
			case 3:
			        $oper=32;
			        $oper_name='Airtel';
			        break;
			case 6:
			         $oper=54;   
			         $oper_name='AIRCEL';
			        break;
			case 11:
			         $oper=31;   
			         $oper_name='BSNL Postpaid';
			        break;
			case 10:
			         $oper=52;   
			         $oper_name='TATA DOCOMO';
			        break;
			case 2:
			        $oper=33;   
			        $oper_name='IDEA';
			        break;
			case 18:
			         $oper=81;  
			         $oper_name='Jio';
			        break;
			case 8:
			         $oper=57;  
			         $oper_name='MTS';
			        break;
		    case 9:
		         $oper=59;  
		         $oper_name='RELIANCE GSM';
		        break;
		    case 12:
		         $oper=47;  
		         $oper_name='RELIANCE CDMA';
		        break;
			   
			}
		$arr=array('oper_id'=>$oper,"oper_name"=>$oper_name);
		return json_encode($arr);
	}




	public function getallprepaidopertaor($operator)
	{
		switch ($operator) {
			    case 3:
			        $oper=1;
			        $oper_name='Airtel';
			        break;
			    case 1:
			        $oper=12;
			        $oper_name='vodafone';
			        break;
			    case 2:
			         $oper=34;   
			         $oper_name='IDEA';
			        break;
			    case 4:
			         $oper=17;   
			         $oper_name='TATA INDICOM';
			        break;
			    case 10:
			         $oper=15;   
			         $oper_name='TATA DOCOMO';
			        break;
			    case 5:
			         $oper=6;   
			         $oper_name='TELENOR';
			        break;
			    case 23:
			         $oper=45;   
			         $oper_name='MTNL DEL';
			        break;
			    case 11:
			         $oper=4;   
			         $oper_name='BSNL';
			        break;
			    case 6:
			         $oper=2;   
			         $oper_name='AIRCEL';
			        break;
			    case 7:
			         $oper=21;  
			         $oper_name='VIDEOCON';
			        break;
			    case 8:
			         $oper=14;  
			         $oper_name='MTS';
			        break;
			    case 9:
			         $oper=18;  
			         $oper_name='RELIANCE GSM';
			        break;
			    case 12:
			         $oper=19;  
			         $oper_name='RELIANCE CDMA';
			        break;
			    case 13:
			         $oper=3;  
			         $oper_name='BSNL STV';
			        break;
			    case 14:
			         $oper=16;  
			         $oper_name='TATA DOCOMO STV';
			        break;
			    case 15:
			         $oper=5;  
			         $oper_name='TELENOR STV';
			        break;
			    case 16:
			         $oper=22;  
			         $oper_name='VIDEOCON STV';
			        break;
			    case 17:
			         $oper=40;  
			         $oper_name='MTNL DEL STV';
			        break;
			    case 18:
			         $oper=79;  
			         $oper_name='Jio';
			        break;
			    case 19:
			         $oper=42;  
			         $oper_name='T24';
			        break;
			    case 20:
			         $oper=43;  
			         $oper_name='T24 STV';
			        break;
			    case 21:
			         $oper=11;  
			         $oper_name='MTNL MUM';
			        break;
			    case 22:
			         $oper=44;  
			         $oper_name='MTNL STV MUM';
			        break;
			   
			}
		$arr=array('oper_id'=>$oper,"oper_name"=>$oper_name);
		return json_encode($arr);
	}

	public function getalldthoperator($operator)
	{
		switch ($operator) {
			    case 24:
			        $oper=7;
			        $oper_name='Dish tv';
			        break;
			    case 25:
			        $oper=9;
			        $oper_name='Tata Sky';
			        break;
			    case 26:
			         $oper=8;   
			         $oper_name='Sun tv';
			        break;
			    case 27:
			         $oper=13;   
			         $oper_name='Videocon';
			        break;
			    case 28:
			         $oper=20;   
			         $oper_name='Reliance';
			        break;
			    case 29:
			         $oper=10;   
			         $oper_name='Airtel';
			        break;
			   
			}
		$arr=array('oper_id'=>$oper,"oper_name"=>$oper_name);
		return json_encode($arr);
	}

	public function getalllandlineoperator($operator)
	{
		switch ($operator) {
			    case 3:
			        $oper=48;
			        $oper_name='Airtel';
			        break;
			    case 12:
			        $oper=49;
			        $oper_name='Reliance';
			        break;
			    case 23:
			         $oper=51;   
			         $oper_name='MTNL';
			        break;
			    case 4:
			         $oper=53;   
			         $oper_name='Tata Indicom';
			        break;
			    case 11:
			         $oper=56;   
			         $oper_name='BSNL';
			        break;
			   
			}
		$arr=array('oper_id'=>$oper,"oper_name"=>$oper_name);
		return json_encode($arr);
	}
}