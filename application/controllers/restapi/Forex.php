<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('forex_helper');
		$this->load->model('Api_model');
        
	}

	public function currencyprice()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        $currencypair='EURUSD,GBPJPY,AUDUSD,NZDUSD,SGDUSD,RUBUSD,MXNUSD,CNHUSD,PLNUSD,SGDUSD,RUBUSD';

        $request=json_decode(currencyprice($currencypair));

        if($request)
    	{
    		$array=array(
			"statuscode" => 200,"message" => "Currency price has been get successfully.","data" => $request
			);
    	}else{
    		$array=array(
			"statuscode" => 400,"message" => "Error occured while getting details!!!"
			);
    	}

    	$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

}