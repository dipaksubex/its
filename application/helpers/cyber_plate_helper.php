<?php 

	function cert()
	{
		return '6BD227699C901BCF6F288833A2383B4E7AD6E74E';
	}

	function password()
	{
		return 'Itcare@987##';
	}

	function sd()
	{
		return '104586';
	}
	function ap()
	{
		return '347740';
	}
	function op()
	{
		return '347741';
	}

	function api_files()
	{
		return base_url().'includes/';
	}
	function seckey()
	{
		return file_get_contents(api_files()."private.key");
	}
	function mycert()
	{
		return file_get_contents(api_files()."mycert.pem");
	}
	function giftcardurl()
	{
		$check_url = "https://in.cyberplat.com/cgi-bin/qc/qc_pay_check.cgi";
		$pay_url = "https://in.cyberplat.com/cgi-bin/qc/qc_pay.cgi";
		$verify_url = "https://in.cyberplat.com/cgi-bin/qc/qc_pay_status.cgi";
		$urls=array("check_url"=>$check_url,"pay_url"=>$pay_url,"verify_url"=>$verify_url);		

		return $urls;
	}

	function moneytransferurl()
	{
		$check_url = "https://in.cyberplat.com/cgi-bin/yb/yb_pay_check.cgi";
		$pay_url = "https://in.cyberplat.com/cgi-bin/yb/yb_pay.cgi";
		$verify_url = "https://in.cyberplat.com/cgi-bin/yb/yb_pay_status.cgi";
		$urls=array("check_url"=>$check_url,"pay_url"=>$pay_url,"verify_url"=>$verify_url);		

		return $urls;
	}

	function balancechkurl()
	{
		$check_url = "";
		$pay_url = "https://in.cyberplat.com/cgi-bin/mts_espp/mtspay_rest.cgi";
		$verify_url = "";
		$urls=array("check_url"=>$check_url,"pay_url"=>$pay_url,"verify_url"=>$verify_url);		

		return $urls;
	}

	function themeparkurl()
	{
		$check_url = "https://in.cyberplat.com/cgi-bin/tpxo/tpxo_pay_check.cgi/441";
		$pay_url = "https://in.cyberplat.com/cgi-bin/tpxo/tpxo_pay.cgi/441";
		$verify_url = "https://in.cyberplat.com/cgi-bin/tpxo/tpxo_pay_status.cgi";
		$urls=array("check_url"=>$check_url,"pay_url"=>$pay_url,"verify_url"=>$verify_url);		

		return $urls;
	}

	function ppiurl()
	{
		$check_url = "https://in.cyberplat.com/cgi-bin/instp/instp_pay_check.cgi";
		$pay_url = "https://in.cyberplat.com/cgi-bin/instp/instp_pay.cgi";
		$verify_url = "https://in.cyberplat.com/cgi-bin/instp/instp_pay_status.cgi";
		$urls=array("check_url"=>$check_url,"pay_url"=>$pay_url,"verify_url"=>$verify_url);		

		return $urls;
	}

?>