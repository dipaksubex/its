<?php
function getautoprovide($mobile)
{
	 $context = stream_context_create(array(
				          	"ssl"=>array(
						     'verify_peer'=>false,
						     'verify_peer_name'=>false,
						    )
			));
	$url=itcareapi_url().'auto_operator?apikey='.itcareapi_key().'&mobile_number='.$mobile;
	$response=file_get_contents($url,false,$context);
	return $response;
}

?>