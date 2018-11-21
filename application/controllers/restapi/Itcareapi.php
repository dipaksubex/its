<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itcareapi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('itcareapi_helper');
		$this->load->model('Api_model');
        
	}

	public function getautoprovide()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        if(isset($data->mobile) && $data->mobile!='')
        {
        	$request=json_decode(getautoprovide($data->mobile),true);
        	print_r($request);
        	if($request)
			{
				$plan=array("state_code"=>$request['paid_plans']['state_code'],"state"=>$request['paid_plans']['state']);
				$provider_id=json_decode($this->getactualprovide($request['paid_plans']['provider_id']));

				$array=array('statuscode'=>200, "message" => "Operator detail get successfully.","data"=>$provider_id,"state"=>$plan,"detail"=>$request);
			}else{
				$array=array('statuscode'=>400, "message" => "Error occured while getting operator detail!!!");
			}
        }else{
				$array=array('statuscode'=>400, "message" => "Please send valid paramenter!!!");
			}

		//$jsonresult=json_encode($array);

       // print_r($jsonresult);
	}

	public function getactualprovide($provider_id)
	{
		switch ($provider_id) {
		    case 1:
		        $oper=3;
		        $oper_name='AIRTEL';
		        break;
		    case 2:
		        $oper=1;
		        $oper_name='VODAFONE';
		        break;
		    case 3:
		        $oper=2;
		        $oper_name='IDEA';
		        break;
		    case 4:
		        $oper=4;
		        $oper_name='TATA INDICOM';
		        break;
		    case 5:
		        $oper=10;
		        $oper_name='TATA DOCOMO';
		        break;
		    case 6:
		        $oper=5;
		        $oper_name='TELENOR';
		        break;
		    case 7:
		        $oper=23;
		        $oper_name='MTNL';
		        break;
		    case 8:
		        $oper=11;
		        $oper_name='BSNL';
		        break;
		    case 9:
		        $oper=6;
		        $oper_name='AIRCEL';
		        break;
		    case 10:
		        $oper=7;
		        $oper_name='VIDEOCON';
		        break;
		    case 11:
		        $oper=8;
		        $oper_name='MTS';
		        break;
		    case 112:
		        $oper=18;
		        $oper_name='Jio';
		        break;
		    
		    
		}

		$arr=array('oper_id'=>$oper,"oper_name"=>$oper_name);
		return json_encode($arr);
	}
}