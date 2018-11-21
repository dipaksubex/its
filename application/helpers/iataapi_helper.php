<?php 

function getallcountry()
{
	 $context = stream_context_create(array(
          	"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    )
				));
	$response=file_get_contents(iatacodes_apiurl().'countries?'.iata_apikey(),false,$context);
	return $response;
}

function getallcity()
{
	 $context = stream_context_create(array(
          	"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    )
				));
	$response=file_get_contents(iatacodes_apiurl().'cities?'.iata_apikey(),false,$context);
	return $response;
}

function getallairports()
{
	 $context = stream_context_create(array(
          	"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    )
				));
	$response=file_get_contents(iatacodes_apiurl().'airports?'.iata_apikey(),false,$context);
	return $response;
}



?>