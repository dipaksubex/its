<?php 


function currencyprice($postData)
{
	
/*https://forex.1forge.com/1.0.3/quotes?pairs=EURUSD,GBPJPY,AUDUSD&api_key=rocG4t2DDDchNarJ3MlFPAyC90SGrGQw*/
	 $context = stream_context_create(array(
          	"ssl"=>array(
		     'verify_peer'=>false,
		     'verify_peer_name'=>false,
		    ),
	    /*'http' => array(
		  'method' => 'POST',
		  'header' => "Content-Type: application/json\r\n",
		  'content' => json_encode($postData)

		      )*/
				));
	 $url=forge_url().'?pairs='.$postData.'&api_key='.forge_apikey();
	$response=file_get_contents($url,false,$context);
	return $response;
}

?>