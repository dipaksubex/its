
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flights extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('iataapi_helper');
        
	}

	public function getallcountry()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

		$request=getallcountry();

		$res=json_decode($request);

		$array=array(
				"statuscode" => 200,
				"message" => "Country list has been get successfully",
				"data" => $res
				);
		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getallcity()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

		$request=getallcity();

		$res=json_decode($request);

		$array=array(
				"statuscode" => 200,
				"message" => "City list has been get successfully",
				"data" => $res
				);
		$jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getallairports()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

		$request=getallairports();

		$res=json_decode($request);

		$array=array(
				"statuscode" => 200,
				"message" => "airport list has been get successfully",
				"data" => $res
				);
		$jsonresult=json_encode($array);
		print_r($jsonresult);

		
	}

	public function airportslistanddetails()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

		$requestcity=getallcity();

		$responsecity=json_decode($requestcity,true);

		$req_country=getallcountry();

		$res_country=json_decode($req_country,true);

		$country_arr=$res_country['response'];

		$client=array(
					"country_code" => $responsecity['request']['client']['country_code'],
				    "country" => $responsecity['request']['client']['country'],
				    "city" => $responsecity['request']['client']['city'],
				    "lat" => $responsecity['request']['client']['lat'],
				    "lng" => $responsecity['request']['client']['lng'],
				    "ip" => $responsecity['request']['client']['ip']
					);
		$i=0;
		foreach ($responsecity['response'] as $value) {

			foreach ($country_arr as $value2) {

				if($value['country_code']==$value2['code'])
				{
					$list[$i]=array(
								"country_code" => $value['country_code'],
							    "country" => $value2['name'],
							    "city" => $value['name'],
							    "air_code" => $value['code']
					);
				}				
			}			
		$i++;}


		$array=array(
				"statuscode" => 200,
				"message" => "airport detail has been get successfully",
				"client" => $client,
				"data" => $list
				);

		


		$jsonresult=json_encode($array);
		print_r($jsonresult);
	
	}

}
