<?php
function gethotellist($no_of_entry,$page)
{
	$url=oyo_url().'hotels/listing?no_of_entry='.$no_of_entry.'&page='.$page;
	$postfields='';
	return curl_function($postfields,$url);  
}

function getavailability($postfields)
{
	$postfields=json_encode($postfields);
	$url=oyo_url().'hotels/get_availability?cp=true';

	return curl_function($postfields,$url);  
}

function booking($postfields)
{
	$postfields=json_encode($postfields);
	$url=oyo_url().'vendor/bookings';

	return curl_function($postfields,$url);  
}

function provisional_bookings($postfields,$booking_id)
{
	$postfields=json_encode($postfields);
	$url=oyo_url().'vendor/bookings/'.$booking_id.'/update';

	return curl_function($postfields,$url);  
}

function booking_detail($id)
{
	$postfields='';
	$url=oyo_url().'vendor/bookings/'.$id;

	return curl_function($postfields,$url);  
}

function cancellation_charge($id)
{
	$postfields='';
	$url=oyo_url().'vendor/bookings/'.$id.'/cancellation_charge';

	return curl_function($postfields,$url);  
}

function cancel_booking($postfields,$id)
{
	$postfields=json_encode($postfields);
	$url=oyo_url().'vendor/bookings/'.$id.'/update';

	return curl_function($postfields,$url);  
}

function curl_function($postfields,$url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json','ACCESS-TOKEN:'.oyo_token()));
	if($postfields!='')
	{
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
	}	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$server_output = curl_exec ($ch);
	curl_close ($ch);
	
	return $server_output;
}



?>