<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flightsgi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility_helper');
		$this->load->helper('gi_helper');
        
	}

	public function getavailability()

               {

				header('Access-Control-Allow-Origin: *');

				header('Access-Control-Allow-Methods: POST,GET,OPTIONS');

				header('Access-Control-Allow-Headers: Origin, X-Requested-With,Content-Type, Accept');

				header("Content-Type:text/html;charset=UTF-8");

				$json = file_get_contents('php://input');

               $data=json_decode($json);

if(isset($data->origin) && isset($data->booking_type) &&
isset($data->destination) && isset($data->travel_date) &&
isset($data->class_type) && isset($data->adult_count) &&
isset($data->childcount) && isset($data->infantcount) &&
isset($data->residentofindia)&& isset($data->airlinecode) &&
$data->origin!='' && $data->booking_type!='' && $data->destination!='' &&
$data->travel_date!='' && $data->class_type!='' && $data->adult_count!='' &&
$data->childcount!='' && $data->infantcount!='' &&
$data->residentofindia!='' )

        {

                              			$origin=$data->origin;

                                      $booking_type=$data->booking_type;

                                      $destination=$data->destination;

                                      $travel_date=$data->travel_date;

										$travel_return_date=$data->travel_return_date;

                                      $class_type=$data->class_type;

                                      $adult_count=$data->adult_count;

                                      $childcount=$data->childcount;

                                      $infantcount=$data->infantcount;

                                      $roi=$data->residentofindia;

                                      $airlinecode=$data->airlinecode;

$auth=gi_apikey();

                                      if($booking_type === 'O' ||
$booking_type === 'o'){

                                      $postData = array(

"Authentication"=>$auth,

                                             "AvailabilityInput"=>array(

"BookingType"=>$booking_type,

"JourneyDetails"=>[array(

"Origin"=>$origin,

"Destination"=>$destination,

"TravelDate"=>date('m/d/Y',strtotime($travel_date)),

)],

"ClassType"=>$class_type,

"AirlineCode"=>$airlinecode,

"AdultCount"=>$adult_count,

"ChildCount"=>$childcount,

"InfantCount"=>$infantcount,

"ResidentofIndia"=>$roi,

"Optional1"=> "0",

"Optional2"=>"0",

"Optional3"=>"0"

)

                                      );

                                  } else {

                                              $postData = array(

"Authentication"=>$auth,

                                             "AvailabilityInput"=>array(

"BookingType"=>$booking_type,

"JourneyDetails"=>[ array(

"Origin"=>$origin,

"Destination"=>$destination,

"TravelDate"=>date('m/d/Y',strtotime($travel_date)),

), array(

"Origin"=>$destination,

"Destination"=>$origin,

"TravelDate"=>date('m/d/Y',strtotime($travel_return_date)),

)],

"ClassType"=>$class_type,

"AirlineCode"=>$airlinecode,

"AdultCount"=>$adult_count,

"ChildCount"=>$childcount,

"InfantCount"=>$infantcount,

"ResidentofIndia"=>$roi,

"Optional1"=> "0",

"Optional2"=>"0",

"Optional3"=>"0"

)

                                      );

                                  }

                              //    print_r($postData);die();

                                      $request=getavailability($postData);

$response=json_decode($request,true);

if($response['ResponseStatus']==1)

                                      {

                                             $array=array('statuscode'=>200,
"message" => "Flights details get successfully.","data"=>$response);

                                      }else{

$array=array('statuscode'=>400,
"message" => $response);

                                      }

}else{

               $array=array('statuscode'=>400, "message" => "Please send
valid parameter!!!");

        }

$jsonresult=json_encode($array);

print_r($jsonresult);

    }

	/*public function getavailability()
    {
        header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
       header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        header("Content-Type: text/html;charset=UTF-8");
       $json = file_get_contents('php://input');
       $data=json_decode($json);

       

       if(isset($data->origin) && isset($data->booking_type) && isset($data->destination) && isset($data->travel_date) && isset($data->class_type) && isset($data->adult_count) && isset($data->childcount) && isset($data->infantcount) && isset($data->residentofindia)&& isset($data->airlinecode) && $data->origin!='' && $data->booking_type!='' && $data->destination!='' && $data->travel_date!='' && $data->class_type!='' && $data->adult_count!='' && $data->childcount!='' && $data->infantcount!='' && $data->residentofindia!='' )
       {
                $origin=$data->origin;
                $booking_type=$data->booking_type;
                $destination=$data->destination;
                $travel_date=$data->travel_date;
                $travelr_date=$data->travel_return_date;
                $class_type=$data->class_type;
                $adult_count=$data->adult_count;
                $childcount=$data->childcount;
                $infantcount=$data->infantcount;
                $roi=$data->residentofindia;
                $airlinecode=$data->airlinecode;

                $auth=gi_apikey();

                $postData = array(
                    "Authentication"=>$auth,
                    "AvailabilityInput"=>array(
                                        "BookingType"=>$booking_type,
                                        if($booking_type =='O'){
                                                "JourneyDetails"=>[array(
                                                    "Origin"=>$origin,
                                                    "Destination"=>$destination,
                                                    "TravelDate"=>date('m/d/Y',strtotime($travel_date)),
                                                )],
                                        }else {
                                                "JourneyDetails"=>[array(
                                                    "Origin"=>$origin,
                                                    "Destination"=>$destination,
                                                    "TravelDate"=>date('m/d/Y',strtotime($travel_date)),
                                                    ),
                                                    (
                                                    "Origin"=>$destination,
                                                    "Destination"=>$origin,
                                                    "TravelDate"=>date('m/d/Y',strtotime($travelr_date)),
                                                )],
                                        }
                                                "ClassType"=>$class_type,
                                                "AirlineCode"=>$airlinecode,
                                                "AdultCount"=>$adult_count,
                                                "ChildCount"=>$childcount,
                                                "InfantCount"=>$infantcount,
                                                "ResidentofIndia"=>$roi,
                                                "Optional1"=> "0",
                                                "Optional2"=>"0",
                                                "Optional3"=>"0"
                                        )
                );

                $request=getavailability($postData);

                $response=json_decode($request,true);                

                if($response['ResponseStatus']==1)
                {
                    $array=array('statuscode'=>200, "message" => "Flights details get successfully.","data"=>$response);
                }else{
                    
                    $array=array('statuscode'=>400, "message" => $response);
                }

                
       }else{
           $array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
       }

       $jsonresult=json_encode($array);

       print_r($jsonresult);
   }*/

	/*public function getavailability()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);

        

        if(isset($data->origin) && isset($data->booking_type) && isset($data->destination) && isset($data->travel_date) && isset($data->class_type) && isset($data->adult_count) && isset($data->childcount) && isset($data->infantcount) && isset($data->residentofindia)&& isset($data->airlinecode) && $data->origin!='' && $data->booking_type!='' && $data->destination!='' && $data->travel_date!='' && $data->class_type!='' && $data->adult_count!='' && $data->childcount!='' && $data->infantcount!='' && $data->residentofindia!='' )
        {
	        	$origin=$data->origin;
		        $booking_type=$data->booking_type;
		        $destination=$data->destination;
		        $travel_date=$data->travel_date;
		        $class_type=$data->class_type;
		        $adult_count=$data->adult_count;
		        $childcount=$data->childcount;
		        $infantcount=$data->infantcount;
		        $roi=$data->residentofindia;
		        $airlinecode=$data->airlinecode;

		        $auth=gi_apikey();

		        $postData = array(
					"Authentication"=>$auth,
		        	"AvailabilityInput"=>array(
		        						"BookingType"=>$booking_type,
		        						"JourneyDetails"=>[array(
		        								"Origin"=>$origin,
		        								"Destination"=>$destination,
		        								"TravelDate"=>date('m/d/Y',strtotime($travel_date)),
		        								)],
		        								"ClassType"=>$class_type,
		        								"AirlineCode"=>$airlinecode,
		        								"AdultCount"=>$adult_count,
		        								"ChildCount"=>$childcount,
		        								"InfantCount"=>$infantcount,
		        								"ResidentofIndia"=>$roi,
		        								"Optional1"=> "0",
												"Optional2"=>"0",
												"Optional3"=>"0"

		        						

		        						)
		        );

		        $request=getavailability($postData);

		        $response=json_decode($request,true);		        

		        if($response['ResponseStatus']==1)
		        {
		        	$array=array('statuscode'=>200, "message" => "Flights details get successfully.","data"=>$response);
		        }else{
		        	
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
    }*/

	public function gettax()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);


			if(isset($data->usertrackid) && $data->usertrackid !='' &&
			isset($data->flightid) && $data->flightid !='' &&
			isset($data->classcode) && $data->classcode !='' &&
			isset($data->airlinecode) && $data->airlinecode !='' &&
			isset($data->eticketflag) && $data->eticketflag !='' &&
			isset($data->basicamount) && $data->basicamount !='' &&
			isset($data->gstnumber) && 
			isset($data->emailid) && $data->emailid !='' &&
			isset($data->companyname) && $data->companyname !='' &&
			isset($data->contactnumber) && $data->contactnumber !='' &&
			isset($data->address) && $data->address !='' &&
			isset($data->firstname) && $data->firstname !='' &&
			isset($data->lastname) && $data->lastname !='')
			{
				$usertrackid=$data->usertrackid;
				$flightid= $data->flightid;
				$classcode= $data->classcode;
				$airlinecode= $data->airlinecode;
				$eticketflag= $data->eticketflag;
				$basicamount= $data->basicamount;
				$gstnumber= $data->gstnumber;
				$emailid= $data->emailid;
				$companyname= $data->companyname;
				$contactnumber= $data->contactnumber;
				$address= $data->address;
				$firstname= $data->firstname;
				$lastname= $data->lastname;

			

		        $auth=gi_apikey();

		        $postData = array(

		        	"Authentication"=>$auth,
		        	"UserTrackId"=>$usertrackid,
		        	"TaxInput"=>array(
    						"TaxReqFlightSegments"=>[array(
    								"FlightId"=>$flightid,
    								"ClassCode"=>$classcode,
    								"AirlineCode"=>$airlinecode,
    								"ETicketFlag"=>$eticketflag,
    								"BasicAmount"=>$basicamount,
    								"SupplierId"=>"0",
    								)],
    						"GSTDetails"=>array(
    							"GSTNumber"=>$gstnumber,
    							"EMailId"=>$emailid,
    							"CompanyName"=>$companyname,
    							"ContactNumber"=>$contactnumber,
    							"Address"=>$address,
    							"FirstName"=>$firstname,
    							"LastName"=>$lastname
    						),
		        			)
		        );
		        //print_r($postData);die;
		        $request=gettax($postData);

		        $response=json_decode($request,true);

		        

		        if($response['ResponseStatus']==1)
		        {
		        	$array=array('statuscode'=>200, "message" => "Tax details get successfully.","data"=>$response);
		        }else{
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

       $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function getbookingrequest()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

       // print_r($json);die;

        if(isset($data->usertrackid) && $data->usertrackid !='' &&
			isset($data->title) &&
			isset($data->name) && $data->name !='' &&
			isset($data->address) && $data->address !='' &&
			isset($data->city) && $data->city !='' &&
			isset($data->countryid) && $data->countryid !='' &&
			isset($data->contactnumber) && $data->contactnumber !='' &&
			isset($data->emailid) && $data->emailid !='' &&
			isset($data->pincode) && $data->pincode !='' &&
			isset($data->specialremarks) && 
			isset($data->notifybymail) && $data->notifybymail !='' &&
			isset($data->notifybysms) && $data->notifybysms !='' &&
			isset($data->adultcount) && $data->adultcount !='' &&
			isset($data->childcount) && $data->childcount !='' &&
			isset($data->infantcount) && $data->infantcount !='' &&
			isset($data->bookingtype) && $data->bookingtype !='' &&
			isset($data->totalamount) && $data->totalamount !='' &&
			isset($data->airlinecode) && $data->airlinecode !='' &&
			isset($data->currencycode) && $data->currencycode !='' &&
			isset($data->amount) && $data->amount !='' &&
			isset($data->tourcode) && 
			isset($data->passengertype) && $data->passengertype !='' &&
			isset($data->cus_title) && $data->cus_title !='' &&
			isset($data->firstname) && $data->firstname !='' &&
			isset($data->lastname) && $data->lastname !='' &&
			isset($data->gender) && $data->gender !='' &&
			isset($data->age) && $data->age !='' &&
			isset($data->dateofbirth) && $data->dateofbirth !='' &&
			isset($data->identityproofid) && 
			isset($data->identityproofnumber) &&
			isset($data->flightid) && $data->flightid !='' &&
			isset($data->classcode) && $data->classcode !='' &&
			isset($data->specialservicecode) &&
			isset($data->frequentflyerid) && 
			isset($data->frequentflyernumber) &&
			isset($data->mealcode) &&
			isset($data->seatpreferid))

			{
				$usertrackid=$data->usertrackid;
				$title=$data->title;
				$name=$data->name;
				$address=$data->address;
				$city=$data->city;
				$countryid=$data->countryid;
				$contactnumber=$data->contactnumber;
				$emailid=$data->emailid;
				$pincode=$data->pincode;
				$specialremarks=$data->specialremarks;
				$notifybymail=$data->notifybymail;
				$notifybysms=$data->notifybysms;
				$adultcount=$data->adultcount;
				$childcount=$data->childcount;
				$infantcount=$data->infantcount;
				$bookingtype=$data->bookingtype;
				$totalamount=$data->totalamount;
				$airlinecode=$data->airlinecode;
				$currencycode=$data->currencycode;
				$amount=$data->amount;
				$tourcode=$data->tourcode;
				$passengertype=$data->passengertype;
				$cus_title=$data->cus_title;
				$firstname=$data->firstname;
				$lastname=$data->lastname;
				$gender=$data->gender;
				$age=$data->age;
				$dateofbirth=$data->dateofbirth;
				$identityproofid=$data->identityproofid;
				$identityproofnumber=$data->identityproofnumber;
				$flightid=$data->flightid;
				$classcode=$data->classcode;
				$specialservicecode=$data->specialservicecode;
				$frequentflyerid=$data->frequentflyerid;
				$frequentflyernumber=$data->frequentflyernumber;
				$mealcode=$data->mealcode;
				$seatpreferid=$data->seatpreferid;			
			   
				
		        $auth=gi_apikey();

		        $postData = array(

		        	"Authentication"=>$auth,
		        	"UserTrackId"=>$usertrackid,
		        	"BookInput"=>array(
		        		"CustomerDetails"=>array(
							 	"Title"=>$title,
							 	"Name"=>$name,
							 	"Address"=> $address,
							 	"City"=> $city,
							 	"CountryId"=> $countryid,
							 	"ContactNumber"=>$contactnumber,
							 	"EmailId"=>$emailid,
							 	"PinCode"=>$pincode
							 ),
					"SpecialRemarks"=>$specialremarks,
					"NotifyByMail"=> $notifybymail,
					"NotifyBySMS"=> $notifybysms,
					"AdultCount"=> $adultcount,
					"ChildCount"=> $childcount,
					"InfantCount"=> $infantcount,
					"BookingType"=> $bookingtype,
					"TotalAmount"=> $totalamount,
					"FrequentFlyerRequest"=> null,
					"SpecialServiceRequest"=> null,
					"FSCMealsRequest"=> null,
								"FlightBookingDetails"=>[array(

									"AirlineCode"=>$airlinecode,
									"PaymentDetails"=>array(
										"CurrencyCode"=>$currencycode,
										"Amount"=>$amount,
									),
									"TourCode"=>$tourcode,
									"PassengerDetails"=>[array(
										"PassengerType"=> $passengertype,
										"Title"=> $cus_title,
										"FirstName"=> $firstname,
										"LastName"=> $lastname,
										"Gender"=> $gender,
										"Age"=> $age,
										"DateofBirth"=> $dateofbirth,
										"IdentityProofId"=> $identityproofid,
										"IdentityProofNumber"=> $identityproofnumber,
										"BookingSegments"=>[array(
											"FlightId"=> $flightid,
											"ClassCode"=> $classcode,
											"SpecialServiceCode"=> $specialservicecode,
											"FrequentFlyerId"=> $frequentflyerid,
											"FrequentFlyerNumber"=> $frequentflyernumber,
											"MealCode"=> $mealcode,
											"SeatPreferId"=> $seatpreferid,
											"SupplierId"=> "0"
										)],
										"LCCBaggageRequest"=>$data->lccbaggagerequest,
										"LCCMealsRequest"=> $data->lccmealsrequest,
										"OtherSSRRequest "=> $data->otherssrrequest,
										"SeatRequest"=> $data->seatrequest

									)]

								)]
		        		)
							
		        );
		        //print_r(array(implode(",", $adultcount)));
		        //print_r(json_encode($postData));die;
		        $request=getbookingrequest($postData);

		        $response=json_decode($request,true);

		        if($response['ResponseStatus']==1)
		        {
		        	$array=array('statuscode'=>200, "message" => "Booking details get successfully.","data"=>$response);
		        }else{
		        	
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Wrong Credencial!!!");
        	
        }

       $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function gettransactionstatus()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->usertrackid) && $data->usertrackid !='')

			{
				$usertrackid=$data->usertrackid;
							

		        $auth=gi_apikey();

		        $postData = array(
		        	"Authentication"=>$auth,
		        	"UserTrackId"=>$usertrackid							
		        );
		        $request=gettransactionstatus($postData);

		        $response=json_decode($request,true);

		        

		        if($response['ResponseStatus']==1)
		        {
		        	$array=array('statuscode'=>200, "message" => "Transaction details get successfully.","data"=>$response);
		        }else{
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

       $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function getreprintrequest()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->pnr_number) && $data->pnr_number !='')

			{
				$pnr_number=$data->pnr_number;
							

		        $auth=gi_apikey();

		        $postData = array(
		        	"Authentication"=>$auth,
		        	"ReprintInput"=>array(
		        		"HermesPNR"=>$pnr_number
		        	)						
		        );

		        $request=getreprintrequest($postData);

		        $response=json_decode($request,true);

		        

		        if($response['ResponseStatus']==1)
		        {
		        	$array=array('statuscode'=>200, "message" => "Reprint details get successfully.","data"=>$response);
		        }else{
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
	}

	public function getfarerule()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->usertrackid) && $data->usertrackid !='' && isset($data->airlinecode) && $data->airlinecode !='' && isset($data->flightid) && $data->flightid !='' && isset($data->classcode) && $data->classcode !='' && isset($data->supplierid) && $data->supplierid !='')

			{
				$usertrackid=$data->usertrackid;						
				$airlinecode=$data->airlinecode;						
				$flightid=$data->flightid;						
				$classcode=$data->classcode;						
				$supplierid=$data->supplierid;						

		        $auth=gi_apikey();

		        $postData = array(
		        	"Authentication"=>$auth,
		        	"UserTrackId"=>$usertrackid,	
		        	"FareRuleInput"=>array(
		        		"AirlineCode"=>$airlinecode,
		        		"FlightId"=>$flightid,
		        		"ClassCode"=>$classcode,
		        		"SupplierId"=>$supplierid
		        	)						
		        );

		        $request=getfarerule($postData);

		        $response=json_decode($request,true);		        

		        if($response['ResponseStatus']==1)
		        {
		        	$dat=$response['FareRuleOutput'];
		        	$array=array('statuscode'=>200, "message" => "Fare details get successfully.","data"=>$response);
		        }else{
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function cancellationrequest()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->pnr_number) && $data->pnr_number !='' && isset($data->airline_pnr) && $data->airline_pnr !='' && isset($data->cancel_type) && $data->cancel_type !='')

			{
				$pnr_number=$data->pnr_number;						
				$airline_pnr=$data->airline_pnr;						
				$cancel_type=$data->cancel_type;

		        $auth=gi_apikey();

		        $postData = array(
		        	"Authentication"=>$auth,	
		        	"CancellationInput"=>array(
		        		"HermesPNR"=>$pnr_number,
		        		"AirlinePNR"=>$airline_pnr,
		        		"CancelType"=>$cancel_type
		        	)						
		        );

		        $request=cancellationrequest($postData);

		        $response=json_decode($request,true);		        

		        if($response['ResponseStatus']==1)
		        {
		        	$dat=$response['CancellationOutput'];
		        	$array=array('statuscode'=>200, "message" => "Cancellation details get successfully.","data"=>$dat);
		        }else{
		        	$array=array('statuscode'=>400, "message" => "Error occured while getting details!!!");
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function getpartialcancellation()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->pnr_number) && $data->pnr_number !='' && isset($data->airline_pnr) && $data->airline_pnr !='' && isset($data->pax_no) && $data->pax_no !='' && isset($data->ticket_no) && $data->ticket_no !='' && isset($data->segmentid) && $data->segmentid !='' && isset($data->flight_no) && $data->flight_no !='' && isset($data->origin) && $data->origin !='' && isset($data->destination) && $data->destination !='')

			{
				$pnr_number=$data->pnr_number;						
				$airline_pnr=$data->airline_pnr;						
				$pax_no=$data->pax_no;
				$ticket_no=$data->ticket_no;
				$segmentid=$data->segmentid;
				$flight_no=$data->flight_no;
				$origin=$data->origin;
				$destination=$data->destination;

		        $auth=gi_apikey();

		        $postData = array(
		        	"Authentication"=>$auth,	
		        	"PartialCancellationInput"=>array(
		        		"HermesPNR"=>$pnr_number,
		        		"AirlinePNR"=>$airline_pnr,
		        		"CRSPNR"=>"",
		        		"PartialCancelPassengerDetails"=>[array(
		        			"PaxNumber"=>$pax_no,
		        			"PartialCancelTicketDetails"=>[array(
		        				"TicketNumber"=>$ticket_no,
			        			"SegmentId"=>$segmentid,
			        			"FlightNumber"=>$flight_no,
			        			"Origin"=>$origin,
			        			"Destination"=>$destination
		        			)]
		        			
		        		)]
		        	)						
		        );

		        $request=getpartialcancellation($postData);

		       	$response=json_decode($request,true);		        

		        if($response['ResponseStatus']==1)
		        {
		        	$dat=$response['PartialCancellationOutput'];
		        	$array=array('statuscode'=>200, "message" => "Partial Cancellation details get successfully.","data"=>$response);
		        }else{
		        	$array=array('statuscode'=>400, "message" => $response);
		        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);


	}

	public function getbalance()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        $auth=gi_apikey();

        $postData = array("Authentication"=>$auth);

	    $request=getbalance($postData);


	    if($response['ResponseStatus']==1)
        {
        	$dat=$response['AgentCreditBalanceOutput'];
        	$array=array('statuscode'=>200, "message" => "Balance detail get successfully.","data"=>$response);
        }else{
        	$array=array('statuscode'=>400, "message" => $response);
        }

		
        


	}

	public function getssrbeforebooking()
	{
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
		header("Content-Type: text/html;charset=UTF-8");
        $json = file_get_contents('php://input');
        $data=json_decode($json);  

        if(isset($data->usertrackid) && $data->usertrackid !='' && isset($data->flightid) && $data->flightid !='' && isset($data->airlinecode) && $data->airlinecode !='' && isset($data->classcode) && $data->classcode !='' && isset($data->basicamount) && $data->basicamount !='' && isset($data->adultcount) && $data->adultcount !='' && isset($data->childcount) && $data->childcount !='' && isset($data->infantcount) && $data->infantcount !='' && isset($data->supplierid) && $data->supplierid !='')

			{

				$usertrackid=$data->usertrackid;
				$flightid=$data->flightid;
				$airlinecode=$data->airlinecode;
				$classcode=$data->classcode;
				$basicamount=$data->basicamount;
				$adultcount=$data->adultcount;
				$childcount=$data->childcount;
				$infantcount=$data->infantcount;
				$supplierid=$data->supplierid;


        $auth=gi_apikey();

        $postData = array(
        	"Authentication"=>$auth,
        	"UserTrackId"=>$usertrackid,
        	"SSRBeforeBookingInput"=>array(
        		"SSRBBReqFlightSegments"=>array(
        			"OngoingSegments"=>[array(
        				"FlightId"=>$flightid,
        				"AirlineCode"=>$airlinecode,
        				"ClassCode"=>$classcode,
        				"BasicAmount"=>$basicamount
        			)],
        			"ReturnSegments"=>null
        		),
        		"AdultCount"=>$adultcount,
        		"ChildCount"=>$childcount,
        		"InfantCount"=>$infantcount,
        		"SupplierId"=>$supplierid
        	)
        	);

	    $request=getssrbeforebooking($postData);

		if($response['ResponseStatus']==1)
        {
        	$dat=$response['PartialCancellationOutput'];
        	$array=array('statuscode'=>200, "message" => "SSR Before booking details get successfully.","data"=>$response);
        }else{
        	$array=array('statuscode'=>400, "message" => $response);
        }

		        
        }else{
        	$array=array('statuscode'=>400, "message" => "Please send valid parameter!!!");
        	
        }

        $jsonresult=json_encode($array);

        print_r($jsonresult);
        


	}



}