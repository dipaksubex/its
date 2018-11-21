<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Itcare Api</title>

	
</head>
<body>

<div id="container">
	<h1>Welcome to Itcare API !</h1>

	<div id="body">
		<h1>Cyber Plate Theme Park Apis</h1>
		<button class="accordion"><b>Theme Park Category : </b>http://itcare.net/themepark/themeparkcategory</button>
		<div></div>


		<button class="accordion"><b>Product Detail : </b>http://itcare.net/themepark/themeparkcatgorydetail</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"category_id":"2"
}
			</pre>
		</div>

		<button class="accordion"><b>Product Detail By Id : </b>http://itcare.net/themepark/themeparkproductdetail</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"product_id":"39690"
}
			</pre>
		</div>

		<button class="accordion"><b>Park Availability : </b>http://itcare.net/themepark/themeparkAvailability</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"product_id":"39690",
	"DateOfTour":"2018-12-10"
}
			</pre>
		</div>

		<button class="accordion"><b>Park Booking : </b>http://itcare.net/themepark/themeparkBooking</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"product_id":"39690",
	"DateOfTour":"2018-12-10"
}
			</pre>
		</div>
		<h1>Cyber Plate Gift Card Apis</h1>
		<button class="accordion"><b>Gift Card Category : </b>http://itcare.net/giftcard/giftcardcategory</button>
		<div></div>


		<button class="accordion"><b>Gift Card Detail : </b>http://itcare.net/giftcard/giftcardsdetail</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"category_id":"2"
}
			</pre>
		</div>
		<button class="accordion"><b>Brand Detail : </b>http://itcare.net/giftcard/branddetail</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"product_id":"130"
}
			</pre>
		</div>
		<button class="accordion"><b>Spend Gift Card : </b>http://itcare.net/giftcard/spendapi</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"fname":"Prateek",
	"lname":"Verma",
	"mobile":"8750123425",
	"billing_email":"development@itcarewallet.com",
	"benfname":"Prateek",
	"benlname":"Verma",
	"email":"development@itcarewallet.com",
	"product_id":"341",
	"price":"100",
	"qty":"2",
	"giftmessage":"test message",
	"theme":"woohoo Best Wishes Design{Best Wishes}",
	"producttype":"Digital"
}
			</pre>
		</div>
		<button class="accordion"><b>Status Detail : </b>http://itcare.net/giftcard/statusapi</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"trans_id":"4420000709"
}
			</pre>
		</div>
		<button class="accordion"><b>Resend Status : </b>http://itcare.net/giftcard/resendapi</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"trans_id":"4420000709"
}
			</pre>
		</div>



		<h1>Agent Apis</h1>
		<button class="accordion"><b>Agent Login : </b>http://itcare.net/agent/login</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"email":"development@gmail.com",
	"password":"12345",
	"ip":"103.201.141.181"
}

			</pre>
		</div>
		<button class="accordion"><b>Agent Transaction list : </b>http://itcare.net/agent/transactionlist</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"user_id":"83"
}

			</pre>
		</div>
		<button class="accordion"><b>Agent Wallet to wallet : </b>http://itcare.net/agent/wallettowallettransfer</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"from_userid":"1",
	"to_userid":"2",
	"amount":"10"
}
			</pre>
		</div>
		<button class="accordion"><b>Agent Balance : </b>http://itcare.net/agent/getBalance</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"user_id":"89"
}
			</pre>
		</div>
		<button class="accordion"><b>Agent Transaction : </b>http://itcare.net/agent/updatetransaction</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"user_id":"89",
	"trans_id":"12345678",
	"amount":"123",
	"pay_type":"Credit",   //  Credit,Debit
	"narration":"hello world",
	"trans_type":"Recharge",   // 'Recharge','Bill Payment','Money Transfer','Commission','Surcharge','Travel','Fund Transfer','Admin Fund','SMS'
	"operator_id":"123",
	"status":"1"  /// 0=>failed, 1=>Success, 2=>Pending
}
			</pre>
		</div>
		<button class="accordion"><b>Agent After Transaction : </b>http://itcare.net/agent/updateaftertransaction</button>
		<div class="panel">
			<h2>Request:</h2>
			<pre>{
	"tx_id":"89",
	"trans_id":"12345678",
	"narration":"hello world",
	"status":"1"  /// 0=>failed, 1=>Success, 2=>Pending
}
			</pre>
		</div>


		<h1>Iata Apis</h1>
		<button class="accordion"><b>Get all City : </b>http://itcare.net/flight/city</button>
		<div></div>

		<button class="accordion"><b>Get all country : </b>http://itcare.net/flight/country</button>
		<div></div>

		<button class="accordion"><b>Get all Airport : </b>http://itcare.net/flight/airports</button>
		<div></div>

		<button class="accordion"><b>Airports List with Country Name : </b>http://itcare.net/flight/airportslistanddetails</button>
		<div></div>

		

		<h1>GI Apis</h1>

		<button class="accordion"><b>Get Availability : </b>http://itcare.net/gi/getavailability</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"origin":"DEL",<br>
				"booking_type":"O",  // O==> one way, R==> Round Trip<br>
				"destination":"BLR",<br>
				"travel_date":"12/26/2018",<br>
				"travel_return_date":"12/26/2018",  //  optional if type == R<br>
				"class_type":"ECONOMY",<br>
				"adult_count":"1",<br>
				"childcount":"0",<br>
				"infantcount":"0",<br>
				"residentofindia":"1",<br>
				"airlinecode":""<br>
			}

			</p>
		</div>
		<button class="accordion"><b>Get Tax : </b>http://itcare.net/gi/gettax</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
			"usertrackid":"RMWVO97099459983927981886465651796040165",<br>
			"flightid":"12",<br>
			"classcode":"AASAVERSS",<br>
			"airlinecode":"SG",<br>
			"eticketflag":"1",<br>
			"basicamount":"2800",<br>
			"gstnumber":"22AAAAA0000A1Z5",<br>
			"companyname":"Hermes",<br>
			"contactnumber":"1234567890",<br>
			"address":"Guindy",<br>
			"firstname":"Vel",<br>
			"lastname":"Murugan",<br>
			"emailid":"test@gmail.xom"<br>	
				}<br>

			</p>
		</div>
		<button class="accordion"><b>Get Booking Request : </b>http://itcare.net/gi/getbookingrequest</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"usertrackid":"RMWVO97099459983927981886465651796040165",<br>
				"title":"",<br>
				"name":"Test",<br>
				"address":"Guindy",<br>
				"city":"Chennai",<br>
				"countryid":"91",<br>
				"contactnumber":"9999999999",<br>
				"emailid":"velmurugan@hermes-it.in",<br>
				"pincode":"600032",<br>
				"specialremarks":"",<br>
				"notifybymail":"0",  //  0==> No Need to Notify, 1==>  Notify<br>
				"notifybysms":"0",  //  0==> No Need to Notify, 1==>  Notify<br>
				"adultcount":"1",<br>
				"childcount":"0",<br>
				"infantcount":"0",<br>
				"bookingtype":"O",  ///  O==> One Way, R==> Round Way <br>
				"totalamount":"3254",<br>
				"airlinecode":"SG",<br>
				"currencycode":"INR",<br>
				"amount":"3254",<br>
				"tourcode":"",<br>
				"passengertype":"ADULT",   //  ADULT, INFANT, CHILD<br>
				"cus_title":"Mr", // Mr, MRS<br>
				"firstname":"TEST",<br>
				"lastname":"TEST",<br>
				"gender":"M",  //    M==> MALE, F==> FEMALE<br>
				"age":"18",<br>
				"dateofbirth":"12/12/2018",  // Date formate MM/DD/YYYY<br>
				"identityproofid":"",<br>
				"identityproofnumber":"",<br>
				"flightid":"11",<br>
				"classcode":"CCSAVER",<br>
				"specialservicecode":"",<br>
				"frequentflyerid":"",<br>
				"frequentflyernumber":"",<br>
				"mealcode":"",<br>
				"seatpreferid":"",<br>
				"lccbaggagerequest":null,<br>
				"lccmealsrequest":null,<br>
				"otherssrrequest":null,<br>
				"seatrequest":null<br>
				
			}<br>

			</p>
		</div>

		<button class="accordion"><b>Get Transaction Status : </b>http://itcare.net/gi/gettransactionstatus</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"usertrackid":"RMWVO97099459983927981886465651796040165",<br>
				}<br>

			</p>
		</div>

		<button class="accordion"><b>Get Reprint Request : </b>http://itcare.net/gi/getreprintrequest</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"pnr_number":"B6W7BY",<br>
				}<br>

			</p>
		</div>

		<button class="accordion"><b>Get Fare Rule Request : </b>http://itcare.net/gi/getfarerule</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"usertrackid":"RMYOI97999869989897984975053644895233236",<br>
				"airlinecode":"SG",<br>
				"flightid":"11",<br>
				"classcode":"CCFLEX",<br>
				"supplierid":"0"<br>
				}<br>

			</p>
		</div>

		<button class="accordion"><b>Cancellation Request : </b>http://itcare.net/gi/cancellationrequest</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"pnr_number":"B6W7B2",<br>
				"airline_pnr":"DD5INE",<br>
				"cancel_type":"PARTIAL"  // PARTIAL==> for Partial Cancellation, FULL==> for Full Cancellation<br>
				}<br>

			</p>
		</div>

		<button class="accordion"><b>Partial Cancellation Request : </b>http://itcare.net/gi/getpartialcancellation</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"pnr_number":"B6W7B2",<br>
				"airline_pnr":"DD5INE",<br>
				"pax_no":"12",<br>
				"ticket_no":"B6W7B21",<br>
				"segmentid":"1",<br>
				"flight_no":"160",<br>
				"origin":"BOM",<br>
				"destination":"DEL"<br>
				}<br>

			</p>
		</div>

		<button class="accordion"><b>SSR Before Booking : </b>http://itcare.net/gi/getssrbeforebooking</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"usertrackid":"RMYOI97999869976927983968443517725242058",<br>
				"flightid":"11",<br>
				"airlinecode":"SG",<br>
				"classcode":"LLHBOHO",<br>
				"basicamount":"4449",<br>
				"adultcount":"1",<br>
				"childcount":"0",<br>
				"infantcount":"0",<br>
				"supplierid":"0"<br>
			}<br>

			</p>
		</div>

		<button class="accordion"><b>Get Balance : </b>http://itcare.net/gi/getbalance</button>
		<div></div>

		<h1>OYO Apis</h1>

		<button class="accordion"><b>Get Hotel List : </b>http://itcare.net/oyo/gethotellist</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"no_of_entry":"10",<br>
				"page":"3"<br>
			   }
			</p>
		</div>

		<button class="accordion"><b>Get Availability List : </b>http://itcare.net/oyo/getavailability</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
					"checkindate":"19/11/2018",<br>
					"checkoutdate":"20/11/2018",<br>
					"adults":2,<br>
					"rooms":2,<br>
					"city":"Gurgaon",<br>
					"hotel_id":"GRG045",<br>
					"children":2,<br>
					"child_1_age":6,<br>
					"child_2_age":6<br>
				}<br>
			</p>
		</div>

		<button class="accordion"><b>Hotel Booking : </b>http://itcare.net/oyo/booking</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"first_name":"Abc",<br>
				"last_name":"Def",<br>
				"email":"abc@def.com",<br>
				"country_code":"+91",<br>
				"phone":"1234567890",<br>
				"single":"0",<br>
				"double":"1",<br>
				"extra":"0",<br>
				"checkin":"06/12/2018",<br>
				"checkout":"07/12/2018",<br>
				"hotel_id":"GRG045",<br>
				"is_provisional":"true",<br>
				"external_reference_id":"VGHVEHWV"<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Hotel Provisional Booking : </b>http://itcare.net/oyo/provisional_booking</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"external_reference_id":"VGHVEHWV",<br>
				"booking_id":"24542178"<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Hotel Booking Detail : </b>http://itcare.net/oyo/booking_detail</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"id":"24542178"  //  Booking id, Reference id, Invoice id<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Hotel Cancellation Charge : </b>http://itcare.net/oyo/cancellation_charge</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"booking_id":"24542172"<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Hotel Booking Cancel : </b>http://itcare.net/oyo/cancel_booking</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"booking_id":"24542172"<br>
			}
			</p>
		</div>

		<h1>Recharge Ezy Apis</h1>

		<button class="accordion"><b>Get Prepaid Provider : </b>http://itcare.net/recharge/getallprepaidprovider</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"type_id":"1"<br>
				
				}
			</p>
		</div>

		<button class="accordion"><b>Prepaid Recharge : </b>http://itcare.net/recharge/prepaidrecharge</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"operator":"1",<br>
				"amount":"10",<br>
				"phone":"9999999999"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Postpaid Recharge : </b>http://itcare.net/recharge/postpaidrecharge</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"operator":"1",<br>
				"amount":"10",<br>
				"phone":"9999999999"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Dth Recharge : </b>http://itcare.net/recharge/dthrecharge</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"operator":"1",<br>
				"amount":"10",<br>
				"phone":"01523890573"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Landline Recharge : </b>http://itcare.net/recharge/landlinerecharge</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"operator":"3",<br>
				"account":"7037376403",<br>
				"landline_no":"4037350",<br>
				"amount":"11",<br>
				"std_code":"0124"<br>
			}
			</p>
		</div>

		<h1>Electricity Ezy Apis</h1>

		<button class="accordion"><b>Get City & State : </b>http://itcare.net/electric/getalloperatorcity</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"operator":"30"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Get Bill amount : </b>http://itcare.net/electric/billvalidate</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"product_id":"69",<br>
				"vald1":"1003904489",<br>
				"vald2":"NA",<br>
				"vald3":"NA",<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Bill Payment : </b>http://itcare.net/electric/electricitybill</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>
			{<br>
				"product_id":"61",<br>
				"vald1":"150833402",<br>
				"vald2":"NA",<br>
				"vald3":"NA",<br>
				"amount":"1500",<br>
				"billduedate":"20180825"<br>
			}
			</p>
		</div>

		<h1>EzyMoney Apis</h1>



		<button class="accordion"><b>Callback Status : </b>http://itcare.net/callbackstatus</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"client_req":"f36ae4361660"    ///  Client Req Id<br>
				}
			</p>
		</div>
		<button class="accordion"><b>Add new sender : </b>http://itcare.net/moneytransfer/newsender</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"mobile":"9457120207"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Resend Otp : </b>http://itcare.net/moneytransfer/resendotp</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"ref_no":"10661312",<br>
				"mobile":"9457120207"<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Verify Otp : </b>http://itcare.net/moneytransfer/otpverification</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"ref_no":"10661312",<br>
				"otp":"728948",<br>
				"mobile":"9457120207"<br>
			}
			</p>
		</div>

		<button class="accordion"><b>Get Beneficiary Detail : </b>http://itcare.net/moneytransfer/getbeneficiarylist</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"mobile":"9999040313"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Add Beneficiary : </b>http://itcare.net/moneytransfer/addbeneficiary</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				{
				"mobile":"9999040313",<br>
				"benename":"Prateek Verma",<br>
				"account_no":"33093018685",<br>
				"ifsc":"SBIN"<br>

				}
			</p>
		</div>

		<button class="accordion"><b>Delete Beneficiary : </b>http://itcare.net/moneytransfer/deletebeneficiary</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				
				"mobile":"9999040313",<br>
				"benecode":"1846372"<br>

				}
			</p>
		</div>

		<button class="accordion"><b>Bank list : </b>http://itcare.net/moneytransfer/banklist</button>
		<div></div>

		<button class="accordion"><b>User Balance : </b>http://itcare.net/moneytransfer/userbalance</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				
				"mobile":"9999040313"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Account Validate : </b>http://itcare.net/moneytransfer/accountvalidation</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				
				"mobile":"9999040313",<br>
				"account_no":"33093018685",<br>
				"bankcode":"SBIN"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Money Transfer : </b>http://itcare.net/moneytransfer/moneytransfer</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				
				"mobile":"9999040313",<br>
				"benecode":"1371208",<br>
				"transtype":"imps",  // imps==> for imps, neft==> for neft<br>
				"amount":"1"<br>
				}
			</p>
		</div>

		<h1>Bus Gi Apis</h1>

		<button class="accordion"><b>Get Origin : </b>http://itcare.net/gibus/getorigin</button>
		<div></div>

		<button class="accordion"><b>Get Destination : </b>http://itcare.net/gibus/getdestination</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>				
				"origin_id":"170"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Search Buses : </b>http://itcare.net/gibus/getsearch</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>				
				"OriginId": 170,<br>
				"DestinationId": 71,<br>
				"TravelDate": "08/19/2018"<br>
				}
			</p>
		</div>

		<button class="accordion"><b>Seat map Buses : </b>http://itcare.net/gibus/getseatmap</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
				"UserTrackId": "RMNZZ9779999998991798196827935086654824",<br>
				"ScheduleId": "356357",<br>
				"StationId": "2254",<br>
				"TransportId": 24,<br>
				"TravelDate": "08/19/2018"<br>
				}


			</p>
		</div>

		<button class="accordion"><b>Block seat Buses : </b>http://itcare.net/gibus/getseatblock</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"UserTrackId": "RMNZZ9779999998991798196827935086654824",<br>
				    "BlockingInput": {<br>
				        "BookingCustomerDetails": {<br>
				            "Title": "Mr.",<br>
				            "Name": "Prateek",<br>
				            "Address": "Gurugram",<br>
				            "ContactNumber": "9999040313",<br>
				            "City": "Gurugram",<br>
				            "EmailId": "development@bgc.ooo",<br>
				            "IdProofId": "",<br>
				            "IdProofNumber": ""<br>
				        },<br>
				        "BookingDetails": {<br>
				            "TotalTickets": 2,<br>
				            "TotalAmount": 380,<br>
				            "TransportId": 24,<br>
				            "ScheduleId": "356357",<br>
				            "StationId": "2254 ",<br>
				            "TravelDate": "08/19/2018",<br>
				            "PassengerList": [<br>
				                	{<br>
				                        "PassengerName": "Anshuman",<br>
				                        "Gender": "M",<br>
				                        "Age": 24,<br>
				                        "SeatNo": "2",<br>
				                        "SeatTypeId": 22,<br>
				                        "Fare": 190,<br>
				                        "BoardingId": "5057",<br>
				                        "DroppingId": "5059"<br>
				                    },{<br>
				                        "PassengerName": "Anshuman",<br>
				                        "Gender": "M",<br>
				                        "Age": 24,<br>
				                        "SeatNo": "2",<br>
				                        "SeatTypeId": 22,<br>
				                        "Fare": 190,<br>
				                        "BoardingId": "5057",<br>
				                        "DroppingId": "5059"<br>
				                    }<br>
				            ]<br>
				        }<br>
				    }<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Bus : </b>http://itcare.net/gibus/getseatbook</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"UserTrackId": "RMNZZ9779999998991798196827935086654824",<br>
				    "BookingInput": {<br>
				        "BookingCustomerDetails": {<br>
				            "Title": "Mr.",<br>
				            "Name": "Prateek",<br>
				            "Address": "Gurugram",<br>
				            "ContactNumber": "9999040313",<br>
				            "City": "Gurugram",<br>
				            "EmailId": "development@bgc.ooo",<br>
				            "IdProofId": "",<br>
				            "IdProofNumber": ""<br>
				        },<br>
				        "BookingDetails": {<br>
				            "TotalTickets": 2,<br>
				            "TotalAmount": 380,<br>
				            "TransportId": 24,<br>
				            "ScheduleId": "356357",<br>
				            "StationId": "2254 ",<br>
				            "TravelDate": "08/19/2018",<br>
				            "PassengerList": [<br>
				                	{<br>
				                        "PassengerName": "Anshuman",<br>
				                        "Gender": "M",<br>
				                        "Age": 24,<br>
				                        "SeatNo": "2",<br>
				                        "SeatTypeId": 22,<br>
				                        "Fare": 190,<br>
				                        "BoardingId": "5057",<br>
				                        "DroppingId": "5059"<br>
				                    },{<br>
				                        "PassengerName": "Anshuman",<br>
				                        "Gender": "M",<br>
				                        "Age": 24,<br>
				                        "SeatNo": "2",<br>
				                        "SeatTypeId": 22,<br>
				                        "Fare": 190,<br>
				                        "BoardingId": "5057",<br>
				                        "DroppingId": "5059"<br>
				                    }<br>
				            ]<br>
				        }<br>
				    }<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Transaction Status : </b>http://itcare.net/gibus/gettransactionstatus</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"UserTrackId": "RMNZZ9779999998991798196827935086654824"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Reprint : </b>http://itcare.net/gibus/getreprint</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"TransactionId": "EB7TC9S"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Cancellation Policy : </b>http://itcare.net/gibus/getcancellationpolicy</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"TransactionId": "EB7TC9S"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Cancellation Penalty : </b>http://itcare.net/gibus/getcancellationpenalty</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"TransactionId": "EB7TC9S"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking Cancellation : </b>http://itcare.net/gibus/getcancellation</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"TransactionId": "EB7TC9S",<br>
				    "TotalTicketsToCancel": 1,<br>
				    "PenaltyAmount": "19.00",    //////Penalty amount* No of cancel Ticket<br>
				    "TicketNumbers": "EB7TC9S0", //////Ticket No. Comma saperated in string<br>
				    "TransportId": 24<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Booking History : </b>http://itcare.net/gibus/getbookedhistory</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"FromDate": "07/10/2018",<br>
    				"ToDate": "08/12/2018"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Account Statement Detail : </b>http://itcare.net/gibus/getaccountstatement</button>
		<div class="panel">
			<h2>Request:</h2>
			<p>{<br>
    				"FromDate": "07/10/2018",<br>
    				"ToDate": "08/12/2018"<br>
				}<br>


			</p>
		</div>

		<button class="accordion"><b>Account Balance : </b>http://itcare.net/gibus/getagentcreditbalance</button>
		<div></div>

	</div>

	<p class="footer">Itcare Api Version <strong>1.0</strong></p>
</div>



</body>
</html>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>

	<style>
.accordion {
    background-color: #36da5c;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .accordion:hover {
    background-color: #137129;
    color: #fff;
}

.panel {
    padding: 0 18px;
    display: none;
    background-color: white;
    overflow: hidden;
}
</style>