<?php
/////////////////  UAT Details ///////////
/*define('apiurl','http://180.179.20.116:8030/RemitMoney/mtransfer');
define("authcode","b8c28093a0924a8291");*/
/////////////////  Live Details ///////////
/*define('apiurl','https://ezymoney.myezypay.in/RemitMoney/mtransfer ');
define("authcode","f6bcd09579c24ea8ad");
define('pancard',"AACCE6454F");*/


	
    function RegisterSender($mobileno,$reqid,$name)
    {

    	$url=ezymoney_url();

    	$postfields="Msg=E06003~".ezy_apikey()."~".$reqid."~".$mobileno."~".$name."~NA~NA";

	    $response=curl_function($url,$postfields);

	    return $response;
    	/*$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://180.179.20.116:8030/RemitMoney/mtransfer");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
		            "Msg=E06003~b8c28093a0924a8291~7657568973453456435~9999040313~NA~NA");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		return $server_output = curl_exec ($ch);

		curl_close ($ch);*/


    }

    function VerifyOtp($reqid,$refno,$otp)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06021~".ezy_apikey()."~".$reqid."~".$refno."~".$otp."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
    	
    }

    function Callbackstatus($reqid,$client_req)
    {
        $url=ezymoney_url();

        $postfields="Msg=E06017~".ezy_apikey()."~".$reqid."~".$client_req."~NA~NA";

        $response=curl_function($url,$postfields);

        return $response;
    }

    function ResendOtp($reqid,$refno)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06019~".ezy_apikey()."~".$reqid."~".$refno."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
    	
    }

    function ChkSenderBal($reqid,$mobno)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06005~".ezy_apikey()."~".$reqid."~".$mobno."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
    	
    	
    }

    function SenderExistReq($reqid,$mobno)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06007~".ezy_apikey()."~".$reqid."~".$mobno."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
    	
    	
    }

    function AddBeneficiary($reqid,$mobno,$benename,$accno,$ifsc)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06009~".ezy_apikey()."~".$reqid."~".$mobno."~".$benename."~".$accno."~".$ifsc."~NA~NA";


    	$response=curl_function($url,$postfields);

	    return $response;
    	
    	
    }

    function GetBankDetails($reqid,$bankcode)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06029~".ezy_apikey()."~".$reqid."~".$bankcode."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
 	
    	
    }

    function AccountValidation($reqid,$mobno,$accno,$bankcode)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06031~".ezy_apikey()."~".$reqid."~".$mobno."~".$accno."~".$bankcode."~123456789123~".ezy_panno()."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;

    }

    function GetBeneficiaryDetails($reqid,$mobno)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06011~".ezy_apikey()."~".$reqid."~".$mobno."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;

    }

    function DeleteBeneficiary($reqid,$mobno,$benecode)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06013~".ezy_apikey()."~".$reqid."~".$mobno."~".$benecode."~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;
    }

    function MoneyTransferImps($reqid,$mobno,$benecode,$amount)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06015~".ezy_apikey()."~".$reqid."~".$mobno."~".$benecode."~".$amount."~58~123456789123~".ezy_panno()."~NA~NA~NA";

    	$response=curl_function($url,$postfields);

	    return $response;

    }
    
    function MoneyTransferNeft($reqid,$mobno,$benecode,$amount)
    {
    	$url=ezymoney_url();

    	$postfields="Msg=E06015~".ezy_apikey()."~".$reqid."~".$mobno."~".$benecode."~".$amount."~127~123456789123~".ezy_panno()."~NA~NA~NA";
        
    	$response=curl_function($url,$postfields);

	    return $response;
    }

    function Adminbalance()
    {
    	$url=ezypay_url().'GetBalance.aspx?AuthorisationCode='.ezy_apikey();

    	$response=curl_function($url,'');

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

    function error_msg($msg)
    {
    	switch ($msg) 
    	{
		    case "INV01":
		        echo "Invalid Message!";
		        break;
		    case "INV02":
		        echo "Invalid Authorization!";
		        break;
		    case "INV03":
		        echo "Invalid Mobile No!";
		        break;
		    case "INV04":
		        echo "Duplicate Request Id!";
		        break;
		    case "INV07":
		        echo "Invalid OTP!";
		        break;
		    case "INV08":
		        echo "Invalid Verify Reference No!";
		        break;
		    case "INV09":
		        echo "Repeat Request Try After 1 Minutes!";
		        break;
		    case "INV10":
		        echo "OTP Expired!";
		        break;
		    case "INV11":
		        echo "Sender Already Exists!";
		        break;
		    case "INV12":
		        echo "Invalid IP Address!";
		        break;
		    case "INV13":
		        echo "Invalid Beneficiary Code or Beneficiary Not Exits!";
		        break;
		    case "INV14":
		        echo "Verify Reference no expired!";
		        break;
		    case "INV16":
		        echo "Invalid Amount Format!";
		        break;
		    case "INV18":
		        echo "This is a successful transaction. Please contact support for more details!";
		        break;
		    case "INV21":
		        echo "Invalid Aadhaar card no!";
		        break;
		    case "INV22":
		        echo "Invalid Pan card no!";
		        break;
		    case "INV23":
		        echo "Invalid Product ID!";
		        break;
		    case "INV24":
		        echo "Name field should be less than 30 char!";
		        break;
		    case "INV25":
		        echo "Invalid IFSC Code!";
		        break;
		    case "INV26":
		        echo "Invalid Agent Request ID!";
		        break;
		    case "INV27":
		        echo "Account verification not available for this bank!";
		        break;
		    
		}
    	
		
    }



