<?php 
function goall_apiurl()
{
	return 'https://goalltrip.biz/mobileapp/Utility/';
}

function goall_apikey()
{
	return '';
}

function iatacodes_apiurl()
{
	return 'https://iatacodes.org/api/v6/';
}

function iata_apikey()
{
	return 'api_key=2f4e0ac5-6ca6-4819-a3ec-9fc9e6952ac0';
}

function gi_url()
{
	return 'http://115.248.39.80/';
	//return 'http://api.hermes-it.in/';
}

function gi_apikey()
{
	/*return $arr=array(
					"LoginId"=> "Switz",
					"Password"=> "Switz123"
				);*/
				return $arr=array(
					"LoginId"=> "hermes",
					"Password"=> "hermes123"
				);
}


function bus_gi_apikey()
{
	/*return $arr=array(
					"LoginId"=> "hermes",
					"Password"=> "hermes123"
				);*/
	return $arr=array(
					"LoginId"=> "switz",
					"Password"=> "apiswitz"
				);
}

function oyo_url()
{
	return 'https://api.oyorooms.com/api/v2/';
	//return 'http://affiliate-staging.ap-southeast-1.elasticbeanstalk.com/api/v2/';
}

function oyo_token()
{
	//Testing Key
	//return "NEFzZm4zWnM5WWVpdHRucmpXdV86Z3RLaFlFVE11ZGN4d3VMeU1kZzg=";
	// Live Key
	return 'd3gxUS1LX21QVC1wZ0pudHpXeXc6WWpTZm00dEJ4c25CTnhyY3RFX3c=';
}

function ezypay_url()
{
	return "https://api.myezypay.in/Ezypaywebservice/";
}

function ezy_apikey()
{
	return $authkey='f6bcd09579c24ea8ad';
}

function ezymoney_url()
{
	return 'https://ezymoney.myezypay.in/RemitMoney/mtransfer';
}

function ezy_panno()
{
	return 'AACCE6454F';
}

function forge_apikey()
{
	return 'rocG4t2DDDchNarJ3MlFPAyC90SGrGQw';
}

function forge_url()
{
	return 'https://forex.1forge.com/1.0.3/quotes';
}

function itcareapi_url()
{
	return 'http://itcareapi.com/liveapi/recharge/';
}

function itcareapi_key()
{
	return '48574341ca37~www.itcarewallet.com~9811506666';
}

function ezyelectric_url()
{
	//return 'http://180.179.20.116:8040/Ebillpay/Paybill';
	return 'https://utility.myezypay.in/Ebillpay/Paybill';
}

function ezyelectric_apikey()
{
	//return 'b8c28093a0924a8291';
	return $authkey='f6bcd09579c24ea8ad';
}

function apibalance($api_key)
{
	$CI = get_instance();
	$CI->db->select('balance');
	$CI->db->from('it_users');
	$CI->db->where('api_key' , $api_key);

	$querya = $CI->db->get();
	$resulta = $querya->row_array(); 
	if(count($resulta)>0)
	{
		return $resulta['balance'];
	}else{
		return $resulta['balance']="empty";
	}
	
}

function apibalancedetail($api_key)
{
	$CI = get_instance();
	$CI->db->select('balance,parent_id,id as userid,name,wl_id');
	$CI->db->from('it_users');
	$CI->db->where('api_key' , $api_key);

	$querya = $CI->db->get();
	$resulta = $querya->row_array(); 

	return $resulta;	
}

function ckbalance($api_key,$amount)
{
	$i=1;
	$arr = array();
	$user_dta=userdatada($api_key);
	$r = userdataid($user_dta['id']);
	if($r['parent_id'] == 1){
		if($r['balance'] >= $amount ){
			$arr[$i]=array("id"=>$r['id']);
			return $arr;
		}else{
			return $arr;
		}
	 

	}else {

		$a = userdataid($r['parent_id']);
		print_r($a);
		if($a['parent_id'] == 1){

			if($a['balance'] >= $amount ){

				$arr[$i]=array("id"=>$r['id']);
				return $arr;
			}else{
				return $arr;
			}


		}else {
			return $arr;		
		}
	}
	$i++;
}

/*function uservalidator($id){
	$user_dta=userdataid($id);
	return $user_dta;		
}*/

function userdataid($id)
{
	$CI = get_instance();
	$CI->db->select('id,balance,parent_id,name,user_type');
	$CI->db->from('it_users');
	$CI->db->where('status','1');
	$CI->db->where('id',$id);
	$query = $CI->db->get(); 
	return $query->row_array();
}

function userdatada($api_key)
{
	$CI = get_instance();
	$CI->db->select('id,balance,parent_id,name,user_type');
	$CI->db->from('it_users');
	$CI->db->where('status','1');
	$CI->db->where('api_key',$api_key);
	$query = $CI->db->get(); 
	return $query->row_array();		 
} 

function deductCommission($operator,$userid,$deduction,$rid,$amount) 
	{
		$CI = get_instance();
		//$CI->load->model('user');
		$CI->load->model('Api_model');	
		//---------User info to get slab-----------//
    	$sdata = $CI->Api_model->getRows(array('id'=>$userid));
    	if($sdata['user_type'] == '2' || $sdata['user_type'] == '14')
    	{
    		$slab = $sdata['slab'];	
    		$getAmount = $CI->Api_model->getcommissionAmount($slab , $sdata['parent_id'], $operator);
    		if($getAmount['amt'] != 0){
				$CI->Api_model->commissionSetter($getAmount,$amount,$userid,$deduction,$rid);
			}
    	}elseif($sdata['user_type'] == '3'){
    		$slab = $sdata['slab'];	
    		$getAmount = $CI->Api_model->getcommissionAmount($slab , $sdata['parent_id'], $operator);
    		if($getAmount['amt'] != 0){
				$CI->Api_model->commissionSetter($getAmount,$amount,$userid,$deduction,$rid);
			}
			$adata = $CI->Api_model->getRows(array('id'=>$sdata['parent_id']));
			$slaba = $adata['slab'];	
    		$getAmounta = $CI->Api_model->getcommissionAmount($slaba , $adata['parent_id'], $operator);
    		if($getAmounta['amt'] != 0){
    			$getAmounta['amt'] = $getAmounta['amt'] - $getAmount['amt'];	
				$CI->Api_model->commissionSetter($getAmounta,$amount,$sdata['parent_id'],$deduction,$rid);
			}
    	}elseif($sdata['user_type'] == '6'){
    		$slab = $sdata['slab'];	
    		$getAmount = $CI->Api_model->getcommissionAmount($slab , $sdata['parent_id'], $operator);
    		if($getAmount['amt'] != 0){
				$CI->Api_model->commissionSetter($getAmount,$amount,$userid,$deduction,$rid);
			}
			$adata = $CI->Api_model->getRows(array('id'=>$sdata['parent_id']));
			$slaba = $adata['slab'];	
    		$getAmounta = $CI->Api_model->getcommissionAmount($slaba , $adata['parent_id'], $operator);
    		if($getAmounta['amt'] != 0){
    			$getAmountas['amt'] = $getAmounta['amt'] - $getAmount['amt'];	
    			$getAmountas['type'] = $getAmounta['type'];	
    			$getAmountas['deduction'] = $getAmounta['deduction'];	
				$CI->Api_model->commissionSetter($getAmountas,$amount,$sdata['parent_id'],$deduction,$rid);
			}
			$zdata = $CI->Api_model->getRows(array('id'=>$adata['parent_id']));
			$slabz = $zdata['slab'];	
    		$getAmountz = $CI->Api_model->getcommissionAmount($slabz , $zdata['parent_id'], $operator);
    		if($getAmountz['amt'] != 0){
    			$getAmountz['amt'] = $getAmountz['amt'] - $getAmounta['amt'];	
				$CI->Api_model->commissionSetter($getAmountz,$amount,$adata['parent_id'],$deduction,$rid);
			}
    	}elseif($sdata['user_type'] == '7'){
    		$slab = $sdata['slab'];	
    		$getAmount = $CI->Api_model->getcommissionAmount($slab , $sdata['parent_id'], $operator);

    		if($getAmount['amt'] != 0 ){
				$CI->Api_model->commissionSetter($getAmount,$amount,$userid,$deduction,$rid);
			}

			$adata = $CI->Api_model->getRows(array('id'=>$sdata['parent_id']));
			$slaba = $adata['slab'];	
    		$getAmounta = $CI->Api_model->getcommissionAmount($slaba , $adata['parent_id'], $operator);

    		if($getAmounta['amt'] != 0 && $getAmounta['deduction'] == 'commission'){

    			$getAmountza['amt'] = $getAmounta['amt'] - $getAmount['amt']; 
    			$getAmountza['type'] = $getAmounta['type'] ;
    			$getAmountza['deduction'] = $getAmounta['deduction'] ;

				$CI->Api_model->commissionSetter($getAmountza,$amount,$sdata['parent_id'],$deduction,$rid);

			}else {   				
				$CI->Api_model->commissionSetter($getAmounta,$amount,$sdata['parent_id'],$deduction,$rid);
			}

			$zdata = $CI->Api_model->getRows(array('id'=>$adata['parent_id']));
			$slabz = $zdata['slab'];	
    		$getAmountz = $CI->Api_model->getcommissionAmount($slabz , $zdata['parent_id'], $operator);

    		if($getAmountz['amt'] != 0 && $getAmountz['deduction'] == 'commission'){ 

    			$getAmountzaa['amt'] = $getAmountz['amt'] - $getAmounta['amt']; 
    			$getAmountzaa['type'] = $getAmountz['type'] ;
    			$getAmountzaa['deduction'] = $getAmountz['deduction'] ;

				$CI->Api_model->commissionSetter($getAmountzaa,$amount,$adata['parent_id'],$deduction,$rid);

			}else {  

				$CI->Api_model->commissionSetter($getAmountz,$amount,$adata['parent_id'],$deduction,$rid);
			}

			$qdata = $CI->Api_model->getRows(array('id'=>$zdata['parent_id']));
			$slabq = $qdata['slab'];	
    		$getAmountq = $CI->Api_model->getcommissionAmount($slabq , $qdata['parent_id'], $operator);

    		if($getAmountq['amt'] != 0 && $getAmountz['deduction'] == 'commission'){

    			$getAmountzaaa['amt'] = $getAmountq['amt'] - $getAmountz['amt']; 
    			$getAmountzaaa['type'] = $getAmountq['type'] ;
    			$getAmountzaaa['deduction'] = $getAmountq['deduction'] ;

				$CI->Api_model->commissionSetter($getAmountzaaa,$amount,$zdata['parent_id'],$deduction,$rid);

			}else {    

				$CI->Api_model->commissionSetter($getAmountq,$amount,$zdata['parent_id'],$deduction,$rid);
			}
    	}

    }


    function chkbalancecommon()
    {

    }



?>