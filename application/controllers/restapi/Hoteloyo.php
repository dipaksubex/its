<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hoteloyo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('oyo_helper');
        
	}

	public function gethotellist()
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
            if(isset($data->no_of_entry) && isset($data->page))
            {

                $request=gethotellist($data->no_of_entry,$data->page);

                $response=json_decode($request,true);



                if($response)
                {
                  $array=array('statuscode'=>200, "message" => "Details has been get successfully.","data"=>$response);
                }else{
                  $array=array('statuscode'=>400, "message" => $response);
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
                
            }
        }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }

        $jsonresult=json_encode($array);

        print_r($jsonresult);

       
	}


	public function getavailability()
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

            if(isset($data->checkindate) && $data->checkindate!='' &&
             isset($data->checkoutdate) && $data->checkoutdate!='' &&
             isset($data->adults) && $data->adults!='' &&
             isset($data->rooms) && $data->rooms!='' &&
             isset($data->city) && 
             isset($data->hotel_id) && 
             isset($data->children) && 
             isset($data->child_1_age) && 
             isset($data->child_2_age) 
             
         	)
            {
            	$postfields=array(
            			"HotelAvailability"=>array(
            				    "HotelID"=>$data->hotel_id,
    					        "City"=>$data->city,
    					        "checkInDate"=>$data->checkindate,
    					        "checkOutDate"=>$data->checkoutdate,
    					        "adults"=> $data->adults,
    					        "children"=>$data->children,
    					        "child_1_age"=> $data->child_1_age,
    					        "child_2_age"=> $data->child_2_age,
    					        "rooms"=> $data->rooms
            			)
            	);
                

            	$request=getavailability($postfields);
            	print_r($request);
            }
         }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
	}

    public function bookings()
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
            $balance=apibalance($header['api_key']);

            if(intval($balance)>0)
            {
                if(isset($data->first_name) && $data->first_name!='' &&
                    isset($data->last_name) && $data->last_name!='' &&
                    isset($data->email) && $data->email!='' &&
                    isset($data->country_code) && $data->country_code!='' &&
                    isset($data->phone) && $data->phone!='' &&
                    isset($data->single) && $data->single!='' &&
                    isset($data->double) && $data->double!='' &&
                    isset($data->extra) && $data->extra!='' &&
                    isset($data->checkin) && $data->checkin!='' &&
                    isset($data->checkout) && $data->checkout!='' &&
                    isset($data->hotel_id) && $data->hotel_id!='' &&
                    isset($data->is_provisional) &&
                    isset($data->external_reference_id)
                )
                {
                    $postfields=array(
                            "guest"=>array(
                                    "first_name"=>$data->first_name,
                                    "last_name"=>$data->last_name,
                                    "email"=>$data->email,
                                    "country_code"=>$data->country_code,
                                    "phone"=> $data->phone
                                ),
                            "booking"=>array(
                                    "single"=>$data->single,
                                    "double"=>$data->double,
                                    "extra"=>$data->extra,
                                    "checkin"=>$data->checkin,
                                    "checkout"=>$data->checkout,
                                    "hotel_id"=>$data->hotel_id,
                                    "is_provisional"=>$data->is_provisional,
                                    "external_reference_id"=>$data->external_reference_id
                        )
                    );

                    $request=booking($postfields);

                    $response=json_decode($request,true);



                    if($response)
                    {
                      $array=array('statuscode'=>200, "message" => "Details has been get successfully.","data"=>$response);
                    }else{
                      $array=array('statuscode'=>400, "message" => $response);
                    }
                }else{
                    $array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
                    
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Server is currently undergoing maintenance. Please try again later!!!");
                
            }
         }else{
                $array=array('statusCode'=>400, "message" => "Please send valid api key!!!");
                
            }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
    }

    public function provisional_booking()
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

            if(isset($data->external_reference_id) && $data->external_reference_id!='' && isset($data->booking_id) && $data->booking_id!='')
            {
                $postfields=array(
                                    "booking"=>array(
                                            "status"=>"Confirm Booking",
                                            "external_reference_id"=>$data->external_reference_id
                                        ),
                                    "payments"=>array(
                                            "bill_to_affiliate"=>true
                                )
                            );

                $request=provisional_bookings($postfields,$data->booking_id);
                $response=json_decode($request,true);



                if($response)
                {
                  $array=array('statuscode'=>200, "message" => "Details has been get successfully.","data"=>$response);
                }else{
                  $array=array('statuscode'=>400, "message" => $response);
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
                
            }
         }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
    }

    public function booking_detail()
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

            if(isset($data->id) && $data->id!='')
            {
                $request=booking_detail($data->id);
                $response=json_decode($request,true);



                if($response)
                {
                  $array=array('statuscode'=>200, "message" => "Details has been get successfully.","data"=>$response);
                }else{
                  $array=array('statuscode'=>400, "message" => $response);
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
                
            }
        }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
    }

    public function cancellation_charge()
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

            if(isset($data->booking_id) && $data->booking_id!='')
            {
                $request=cancellation_charge($data->booking_id);

                $response=json_decode($request,true);
                //print_r($response['applicable_cancellation_charge']);die;
                if($response)
                {
                    $array=array('statuscode'=>200, "applicable_cancellation_charge"=> $response['applicable_cancellation_charge']);
                }else{
                    $array=array('statuscode'=>400, "message" => "Error occured while getting cancellation charges!!!");
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Please send valid parameters!!!");
                
            }
        }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }
        $jsonresult=json_encode($array);

        print_r($jsonresult);

    }

    public function cancel_booking()
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

            if(isset($data->booking_id) && $data->booking_id!='')
            {
                $postfields=array(
                                    "booking"=>array(
                                            "status"=>"Cancelled Booking"
                                        )
                            );
                $request=cancel_booking($postfields,$data->booking_id);
                $response=json_decode($request,true);
                if($response)
                {
                    $array=array('statuscode'=>200, "message" => "Your booking has been cancel successfully.",$data=> $response);
                }else{
                    $array=array('statuscode'=>400, "message" => "Error occured while cancel booking!!!");
                }
            }else{
                $array=array('statuscode'=>400, "message" => "Please send valid parameters!!!");
                
            }
        }else{
                $array=array('statuscode'=>400, "message" => "Please send valid api key!!!");
                
            }
        $jsonresult=json_encode($array);

        print_r($jsonresult);
    }
}