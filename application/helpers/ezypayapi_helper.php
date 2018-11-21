<?php 
function billvalidate($reqid,$product_id,$bbps_id,$agent_id,$cust_name,$panno,$adhar,$pincode,$geoloc,$vald1,$vald2,$vald3,$cust_mob)
{
	$url=ezyelectric_url();


	$postfields="msg=B06003~".ezyelectric_apikey()."~".$reqid."~".$product_id."~".$bbps_id."~".$agent_id."~".$cust_name."~".$panno."~".$adhar."~".$pincode."~".$geoloc."~".$vald1."~".$vald2."~".$vald3."~".$cust_mob."~NA~NA~NA~NA";

	//"msg=B06003~b8c28093a0924a8291~q2wer212443512~69~BD01BD02INB000000001~AG00528663214~Salman Ahmad~CWMP263524~123547852563~122003~9.5436,78.5923~1003904489~NA~NA~9999040313~NA~NA~NA~NA";

    $response=curl_function($url,$postfields);

    return $response;
}


function electricitybill($reqid,$product_id,$bbps_id,$agent_id,$cust_name,$panno,$adhar,$pincode,$geoloc,$vald1,$vald2,$vald3,$cust_mob,$amount,$billduedate)
{
	$url=ezyelectric_url();

	$postfields="msg=B06005~".ezyelectric_apikey()."~".$reqid."~".$product_id."~".$bbps_id."~".$agent_id."~".$cust_name."~".$panno."~".$adhar."~".$pincode."~".$geoloc."~".$vald1."~".$vald2."~".$vald3."~".$cust_mob."~".$amount."~".$billduedate."~NA~NA~NA~NA";

	//$postfields="msg=B06005~b8c28093a0924a8291~".$reqid."~61~BD01BD02INB000000001~AG00528663214~Sandy~CWMPS57245~123458967548~743129~22.5726,88.3639~150833402~NA~NA~9874346376~1500.00~20180825~NA~NA~NA~NA";

	$response=curl_function($url,$postfields);

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

    function Adminbalance()
    {
    	$url=ezypay_url().'GetBalance.aspx?AuthorisationCode='.ezy_apikey();

    	$response=curl_function($url,'');

	    return $response;


    }
?>