<?php

function gibusurl()
{
	//return gi_url().'hermesBusV1/Bus.svc/JSONService/';
	return gi_url().'BUS_V1/Bus.svc/JSONService/';
}

function getbook($postData)
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
	$response=file_get_contents(gibusurl().'GetBook',false,$context);
	return $response;
}

function getorigin($postData)
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
	$response=file_get_contents(gibusurl().'GetOrigin',false,$context);
	return $response;
}

function getdestination($postData)
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
	$response=file_get_contents(gibusurl().'GetDestination',false,$context);
	return $response;
}

function getsearch($postData)
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
	$response=file_get_contents(gibusurl().'GetSearch',false,$context);
	return $response;
}

function getseatmap($postData)
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
	$response=file_get_contents(gibusurl().'GetSeatMap',false,$context);
	return $response;
}

function getseatblock($postData)
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
	$response=file_get_contents(gibusurl().'GetSeatBlock',false,$context);
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
	$response=file_get_contents(gibusurl().'GetTransactionStatus',false,$context);
	return $response;
}

function getreprint($postData)
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
	$response=file_get_contents(gibusurl().'GetReprint',false,$context);
	return $response;
}

function getcancellationpolicy($postData)
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
	$response=file_get_contents(gibusurl().'GetCancellationPolicy',false,$context);
	return $response;
}

function getcancellationpenalty($postData)
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
	$response=file_get_contents(gibusurl().'GetCancellationPenalty',false,$context);
	return $response;
}

function getcancellation($postData)
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
	$response=file_get_contents(gibusurl().'GetCancellation',false,$context);
	return $response;
}

function getbookedhistory($postData)
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
	$response=file_get_contents(gibusurl().'GetBookedHistory',false,$context);
	return $response;
}

function getaccountstatement($postData)
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
	$response=file_get_contents(gibusurl().'GetAccountStatement',false,$context);
	return $response;
}

function getagentcreditbalance($postData)
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
	$response=file_get_contents(gibusurl().'GetAgentCreditBalance',false,$context);
	return $response;
}



function curl_function($url,$postfields)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = curl_exec ($ch);
	curl_close ($ch);
	return $server_output;
}

?>