<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busgi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('bus_gi_helper');
        
	}

	public function getorigin()
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

	        $postData=array("Authentication"=>bus_gi_apikey());


	        $request=getorigin($postData);


	        $response=json_decode($request,true);

	        if($response['ResponseStatus']==1)
	        {
	        	//print_r($response);die;
	        	$array=array("statuscode" => 200,"message" => "Origin Detail.","data"=>$response['OriginOutput']);
	        }else{
	        	//print_r("test");die;
	        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
	        }

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getdestination()
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
	    	if(isset($data->origin_id) && $data->origin_id!='')
	    	{

	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"DestinationInput"=>array("OriginId"=>$data->origin_id)
	    			);


		        $request=getdestination($postData);
		        $response=json_decode($request,true);

		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Destination Detail.","data"=>$response['DestinationOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}

	        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getsearch()
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
	    	if(isset($data->OriginId) && $data->OriginId!='' && isset($data->DestinationId) && $data->DestinationId!='' && isset($data->TravelDate) && $data->TravelDate!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"SearchInput"=>array(
	    				"OriginId"=>$data->OriginId,
	    				"DestinationId"=>$data->DestinationId,
	    				"TravelDate"=>$data->TravelDate
	    				)
	    			);


		        $request=getsearch($postData);
		        $response=json_decode($request,true);
		       
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Search Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['SearchOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getseatmap()
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
	    	if(isset($data->ScheduleId) && $data->ScheduleId!='' && isset($data->StationId) && $data->StationId!='' && isset($data->TravelDate) && $data->TravelDate!='' && isset($data->UserTrackId) && $data->UserTrackId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"UserTrackId"=> $data->UserTrackId,
	    			"SeatMapInput"=>array(
	    				"ScheduleId"=>$data->ScheduleId,
	    				"StationId"=>$data->StationId,
	    				"TravelDate"=>$data->TravelDate,
	    				"TransportId"=>$data->TransportId
	    				)
	    			);


		        $request=getseatmap($postData);
		        $response=json_decode($request,true);
		        //print_r($response);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Seat map Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['SeatMapOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	public function getseatblock()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);  
        $header=apache_request_headers();
	    
	    if(isset($header['api_key']) && $header['api_key']!='')
	    {
	    	/*if(isset($data->ScheduleId) && $data->ScheduleId!='' && isset($data->StationId) && $data->StationId!='' && isset($data->TravelDate) && $data->TravelDate!='' && isset($data->UserTrackId) && $data->UserTrackId!='')
	    	{*/
	    		//print_r($data);die;
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"UserTrackId"=> $data['UserTrackId'],
	    			"BlockingInput"=>array(
	    				"BookingCustomerDetails"=>array(
						    				"Title"=> $data['BlockingInput']['BookingCustomerDetails']['Title'],
											"Name"=> $data['BlockingInput']['BookingCustomerDetails']['Name'],
											"Address"=> $data['BlockingInput']['BookingCustomerDetails']['Address'],
											"ContactNumber"=> $data['BlockingInput']['BookingCustomerDetails']['ContactNumber'],
											"City"=> $data['BlockingInput']['BookingCustomerDetails']['City'],
											"CountryId"=> "91",
											"EmailId"=> $data['BlockingInput']['BookingCustomerDetails']['EmailId'],
											"IdProofId"=> $data['BlockingInput']['BookingCustomerDetails']['IdProofId'],
											"IdProofNumber"=> $data['BlockingInput']['BookingCustomerDetails']['IdProofNumber']
						    				),
		    			"BookingDetails"=>array(
		    				"TotalTickets"=> $data['BlockingInput']['BookingDetails']['TotalTickets'],
							"TotalAmount"=> $data['BlockingInput']['BookingDetails']['TotalAmount'],
							"TransportId"=> $data['BlockingInput']['BookingDetails']['TransportId'],
							"ScheduleId"=> $data['BlockingInput']['BookingDetails']['ScheduleId'],
							"StationId"=> $data['BlockingInput']['BookingDetails']['StationId'],
							"TravelDate"=> $data['BlockingInput']['BookingDetails']['TravelDate'],
							"PassengerList"=> $data['BlockingInput']['BookingDetails']['PassengerList']
									
		    				)
		    			)
	    			);
	    		

		        $request=getseatblock($postData);
		        $response=json_decode($request,true);
		       
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Seat map Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['BlockingOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	/*}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}*/        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}



	public function getbook()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json,true);  
        $header=apache_request_headers();
	    
	    if(isset($header['api_key']) && $header['api_key']!='')
	    {
	    	$balance=apibalance($header['api_key']);

            if(intval($balance)>0 && $data['BookingInput']['BookingDetails']['TotalAmount']<intval($balance))
            {
	    	/*if(isset($data->ScheduleId) && $data->ScheduleId!='' && isset($data->StationId) && $data->StationId!='' && isset($data->TravelDate) && $data->TravelDate!='' && isset($data->UserTrackId) && $data->UserTrackId!='')
	    	{*/
	    		//print_r($data);die;
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"UserTrackId"=> $data['UserTrackId'],
	    			"BookingInput"=>array(
	    				"BookingCustomerDetails"=>array(
						    				"Title"=> $data['BookingInput']['BookingCustomerDetails']['Title'],
											"Name"=> $data['BookingInput']['BookingCustomerDetails']['Name'],
											"Address"=> $data['BookingInput']['BookingCustomerDetails']['Address'],
											"ContactNumber"=> $data['BookingInput']['BookingCustomerDetails']['ContactNumber'],
											"City"=> $data['BookingInput']['BookingCustomerDetails']['City'],
											"CountryId"=> "91",
											"EmailId"=> $data['BookingInput']['BookingCustomerDetails']['EmailId'],
											"IdProofId"=> $data['BookingInput']['BookingCustomerDetails']['IdProofId'],
											"IdProofNumber"=> $data['BookingInput']['BookingCustomerDetails']['IdProofNumber']
						    				),
		    			"BookingDetails"=>array(
		    				"TotalTickets"=> $data['BookingInput']['BookingDetails']['TotalTickets'],
							"TotalAmount"=> $data['BookingInput']['BookingDetails']['TotalAmount'],
							"TransportId"=> $data['BookingInput']['BookingDetails']['TransportId'],
							"ScheduleId"=> $data['BookingInput']['BookingDetails']['ScheduleId'],
							"StationId"=> $data['BookingInput']['BookingDetails']['StationId'],
							"TravelDate"=> $data['BookingInput']['BookingDetails']['TravelDate'],
							"PassengerList"=> $data['BookingInput']['BookingDetails']['PassengerList']
									
		    				)
		    			)
	    			);
	    		

		        $request=getbook($postData);
		        $response=json_decode($request,true);
		       
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Booking Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['BookingOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	/*}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}*/        

	       }else{
	        		$array=array("statuscode" => 500,"message" => "Server is currently undergoing maintenance. Please try again later!!!");
	        	}  
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function gettransactionstatus()
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
	    	if(isset($data->UserTrackId) && $data->UserTrackId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"UserTrackId"=> $data->UserTrackId
	    			
	    			);


		        $request=gettransactionstatus($postData);
		        $response=json_decode($request,true);
		        //print_r($response);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Transaction Status Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['TransactionStatusOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getreprint()
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
	    	if(isset($data->TransactionId) && $data->TransactionId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"ReprintInput"=> array("TransactionId"=>$data->TransactionId)
	    			
	    			);


		        $request=getreprint($postData);
		        $response=json_decode($request,true);
		        //print_r($response);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Transaction Status Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['ReprintOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getcancellationpolicy()
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
	    	if(isset($data->TransactionId) && $data->TransactionId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"CancellationPolicyInput"=> array("TransportId"=>$data->TransactionId)
	    			
	    			);


		        $request=getcancellationpolicy($postData);
		        $response=json_decode($request,true);
		        //print_r($response);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Cancellation Policy Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['CancellationPolicyOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getcancellationpenalty()
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
	    	if(isset($data->TransactionId) && $data->TransactionId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"CancellationPenaltyInput"=> array("TransactionId"=>$data->TransactionId)
	    			
	    			);


		        $request=getcancellationpenalty($postData);
		        $response=json_decode($request,true);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Cancellation Penalty Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['CancellationPenaltyOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getcancellation()
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
	    	if(isset($data->TransactionId) && $data->TransactionId!='' && isset($data->TotalTicketsToCancel) && $data->TotalTicketsToCancel!='' && isset($data->PenaltyAmount) && $data->PenaltyAmount!='' && isset($data->TicketNumbers) && $data->TicketNumbers!='' && isset($data->TransportId) && $data->TransportId!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"CancellationInput"=> array(
	    				"TransactionId"=>$data->TransactionId,
	    				"TotalTicketsToCancel"=>$data->TotalTicketsToCancel,
				        "PenaltyAmount" =>$data->PenaltyAmount,
				        "TicketNumbers" =>$data->TicketNumbers,
				        "TransportId" =>$data->TransportId
	    			)

	    			
	    			);


		        $request=getcancellation($postData);
		        $response=json_decode($request,true);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Cancellation Detail.","UserTrackId"=>$response['UserTrackId'],"data"=>$response['CancellationOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getbookedhistory()
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
	    	if(isset($data->FromDate) && $data->FromDate!='' && isset($data->ToDate) && $data->ToDate!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"BookedHistoryInput"=> array(
	    				"FromDate"=> $data->FromDate,
				        "ToDate"=> $data->ToDate,
				        "RecordsBy"=> "B"
	    			)

	    			
	    			);


		        $request=getbookedhistory($postData);
		        $response=json_decode($request,true);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Bus Booking History Detail.","data"=>$response['BookedHistoryOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getaccountstatement()
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
	    	if(isset($data->FromDate) && $data->FromDate!='' && isset($data->ToDate) && $data->ToDate!='')
	    	{
	    		$postData=array(
	    			"Authentication"=>bus_gi_apikey(),
	    			"AccountStatementInput"=> array(
	    				"FromDate"=> $data->FromDate,
				        "ToDate"=> $data->ToDate
	    			)

	    			
	    			);


		        $request=getaccountstatement($postData);
		        $response=json_decode($request,true);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Account Statement Detail.","data"=>$response['AccountStatementOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	}else{
	        		$array=array("statuscode" => 500,"message" => "Please send valid parameter!!!");
	        	}        

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}

	function getagentcreditbalance()
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
	    	
	    		$postData=array("Authentication"=>bus_gi_apikey());


		        $request=getagentcreditbalance($postData);
		        $response=json_decode($request,true);
		       if($response['ResponseStatus']==1)
		        {
		        	$array=array("statuscode" => 200,"message" => "Account Balance.","data"=>$response['AgentCreditBalanceOutput']);
		        }else{
		        	$array=array("statuscode" => 500,"message" => $response['FailureRemarks']);
		        }		        
	    	       

	        
	    }else{
	        		$array=array("statuscode" => 500,"message" => "Please send api key!!!");
	        	}

        
        $jsonresult=json_encode($array);
		print_r($jsonresult);
	}
}

