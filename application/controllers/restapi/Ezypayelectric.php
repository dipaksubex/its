<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ezypayelectric extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->helper('utility_helper');
       $this->load->helper('ezypayapi_helper');
	  /* $this->load->helper('itcaremoney_helper');*/
	   $this->load->model('Api_model');
        
	}

    

	public function electricitystates()
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

            if(isset($data->operator) && $data->operator!='')
            {
        	$operator=$data->operator;
        	$request=$this->Api_model->getoperatorcity($operator);
                
        	if($request)
        	{
        	$array=array("statuscode"=>200,"message"=>"City & State has been get successfully.","data"=>$request
    			);
        	}else{
        	$array=array("statuscode" => 400,"message" => "Error occured while getting details!!!");
        	}
        		
             }else{
        	$array=array("statuscode" => 400,"message" => "Please send valid parameters!!!");
           }
        }else{
                    $array=array("statuscode" => 400,"message"=>"Please valid api key!!!");
            }

        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function billvalidate()
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
                if(isset($data->product_id) && $data->product_id!='' && isset($data->vald1) && $data->vald1!='' && isset($data->vald2) && $data->vald2!='' && isset($data->vald3) && $data->vald3!='')
                    {

                            $hashed=rand(100000,10000000);
                            $reqid = substr(sha1($hashed),0,12);

                            $agent_id="AG00528663214";
                            $bbps_id='BD01BD38AGT000000002';
                            $cust_name='Itcare';
                            $panno="CWMP263524";
                            $adhar="123547852563";
                            $pincode='713310';
                            $geoloc='23.6762,86.9914';
                            $cust_mob='9867170438';

                            $product_id=$data->product_id;
                            $agent_id=$agent_id;
                            $bbps_id=$bbps_id;
                            $cust_name=$cust_name;
                            $panno=$panno;
                            $adhar=$adhar;
                            $pincode=$pincode;
                            $geoloc=$geoloc;
                            $vald1=$data->vald1;
                            $vald2=$data->vald2;
                            $vald3=$data->vald3;
                            $cust_mob=$cust_mob;

                            $request=billvalidate($reqid,$product_id,$bbps_id,$agent_id,$cust_name,$panno,$adhar,$pincode,$geoloc,$vald1,$vald2,$vald3,$cust_mob);
                            $response=explode("~",$request);
                            if(isset($response[3]))
                            {
                               $resdata=array("messagecode"=>$response[0],"status"=>$response[3],"message"=>$response[4],"bill_no"=>$response[8],"bill_date"=>$response[9],"bill_due_date"=>$response[10],"bill_amt"=>$response[11],"partial_payment"=>$response[12]);

                                    if($response[3]=='Y')
                                    {

                                            $array=array("statuscode" => 200,"data"=>$resdata);
                                    }else{
                                            $array=array("statuscode" => 400,"message"=>"Error occured while getting details!!!","data"=>$resdata);
                                    }
                            }else{
                                    $array=array("statuscode" => 400,"message"=>"Error occured while getting details!!!");
                            }
                    }else{
                            $array=array("statuscode" => 400,"message"=>"Please send valid parameters!!!");
                    }
       
            
        }else{
                $array=array("statuscode" => 500,"message" => "Please send api key & version!!!");
            }
            

            $jsonresult=json_encode($array);

            print_r($jsonresult);
        

	}

        public function electricitybill()
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


                $hashed=rand(100000,10000000);
                $reqid = substr(sha1($hashed),0,12);
                if(isset($data->product_id) && $data->product_id!='' &&
                isset($data->vald1) && $data->vald1!='' &&
                isset($data->vald2) && $data->vald2!='' &&
                isset($data->vald3) && $data->vald3!='' &&
                isset($data->amount) && $data->amount!='' &&
                isset($data->billduedate) && $data->billduedate!=''
                ){
                    $agent_id="AG00528663214";
                    $bbps_id='BD01BD38AGT000000002';
                    $cust_name='test';
                    $panno="CWMP263524";
                    $adhar="123547852563";
                    $pincode='713310';
                    $geoloc='23.6762,86.9914';
                    $cust_mob='9867170438';

                    $oper=$this->Api_model->opertorcityProduct($data->product_id);

                    $save_oper=$oper[0]['opertor_id'];

                    $product_id=$data->product_id;
                    $agent_id=$agent_id;
                    $bbps_id=$bbps_id;
                    $cust_name=$cust_name;
                    $panno=$panno;
                    $adhar=$adhar;
                    $pincode=$pincode;
                    $geoloc=$geoloc;
                    $vald1=$data->vald1;
                    $vald2=$data->vald2;
                    $vald3=$data->vald3;
                    $cust_mob=$cust_mob;
                    $amount=$data->amount;
                    $billduedate=$data->billduedate;


                    $request=electricitybill($reqid,$product_id,$bbps_id,$agent_id,$cust_name,$panno,$adhar,$pincode,$geoloc,$vald1,$vald2,$vald3,$cust_mob,$amount,$billduedate);
                   // $request='B06006~Bestuat27~64~SUCCESS~0~EZY12562528~123457896~BP45215478~AB123456~NA~NA~NA~NA';
                        //print_r($request);
                    $response=explode("~",$request);
                    

                    if(isset($response[3]))
                    {
                       $resdata=array("messagecode"=>$response[0],"request_id"=>$response[1],"status"=>$response[3],"message"=>$response[4],"operator_id"=>$response[5],"trans_id"=>$response[6],"bbps_ref_no"=>$response[7],"bill_amt"=>$response[11],"partial_payment"=>$response[12]);

                            if($response[3]!='Y')
                            {
                                $save_data=$this->Api_model->deductERecharge($api_userid,$amount,$save_oper,$response[7],$response[6]);
                                $array=array("statuscode" => 200,"data"=>$resdata);
                            }else{
                                $array=array("statuscode" => 400,"data"=>"Error occured while getting details!!!","data"=>$resdata);
                            }
                    }else{
                            $array=array("statuscode" => 400,"message"=>"Error occured while getting details!!!");
                    }
                }else{
                    $array=array("statuscode" => 400,"message"=>"Please send valid parameters!!!");
                }
             }else{
                $array=array("statuscode" => 501,"message" => "Version mismatch!!!");
            }
            }else{
                    $array=array("statuscode" => 400,"message"=>"Please send api key!!!");
                }

                $jsonresult=json_encode($array);
                print_r($jsonresult);

        }


}