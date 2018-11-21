<?php 

function getavailability($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetAvailability',false,$context);
	return $response;
}


function gettax($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetTax',false,$context);
	return $response;
}


function getbookingrequest($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetBook',false,$context);
	return $response;
}


function gettransactionstatus($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetTransactionStatus',false,$context);
	return $response;
}


function getreprintrequest($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetReprint',false,$context);
	return $response;
}


function getfarerule($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetFareRule',false,$context);
	return $response;
}


function cancellationrequest($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetCancellation',false,$context);
	return $response;
}


function getpartialcancellation($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetPartialCancellation',false,$context);
	return $response;
}


function getbalance($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetAgentCreditBalance',false,$context);
	return $response;
}


function getssrbeforebooking($postData)
{
	

	 $context = stream_context_create(array(
          	/*"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),*/
	    'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )
				));
	$response=file_get_contents(gi_url().'HermesDomAir/DomesticAir.svc/JSONService/GetSSRBeforeBooking',false,$context);
	return $response;
}