<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['flight/country']='restapi/flights/getallcountry';
$route['flight/city']='restapi/flights/getallcity';
$route['flight/airports']='restapi/flights/getallairports';
$route['flight/airportslistanddetails']='restapi/flights/airportslistanddetails';


///////////////////////  START  GI Technology API ////////////////////


$route['flight/getavailability']=$route['gi/getavailability']='restapi/flightsgi/getavailability';
$route['flight/gettax']=$route['gi/gettax']='restapi/flightsgi/gettax';
$route['flight/getbookingrequest']=$route['gi/getbookingrequest']='restapi/flightsgi/getbookingrequest';
$route['flight/gettransactionstatus']=$route['gi/gettransactionstatus']='restapi/flightsgi/gettransactionstatus';
$route['flight/getreprintrequest']=$route['gi/getreprintrequest']='restapi/flightsgi/getreprintrequest';
$route['flight/getfarerule']=$route['gi/getfarerule']='restapi/flightsgi/getfarerule';
$route['flight/cancellationrequest']=$route['gi/cancellationrequest']='restapi/flightsgi/cancellationrequest';
$route['flight/getpartialcancellation']=$route['gi/getpartialcancellation']='restapi/flightsgi/getpartialcancellation';
$route['flight/getbalance']=$route['gi/getbalance']='restapi/flightsgi/getbalance';
$route['flight/getssrbeforebooking']=$route['gi/getssrbeforebooking']='restapi/flightsgi/getssrbeforebooking';


///////////////////////  END  GI Technology API ////////////////////


///////////////////////  START  OYO API ////////////////////

$route['hotel/gethotellist']=$route['oyo/gethotellist']='restapi/hoteloyo/gethotellist';
$route['hotel/getavailability']=$route['oyo/getavailability']='restapi/hoteloyo/getavailability';
$route['hotel/booking']=$route['oyo/booking']='restapi/hoteloyo/bookings';
$route['hotel/provisional_booking']=$route['oyo/provisional_booking']='restapi/hoteloyo/provisional_booking';
$route['hotel/booking_detail']=$route['oyo/booking_detail']='restapi/hoteloyo/booking_detail';
$route['hotel/cancellation_charge']=$route['oyo/cancellation_charge']='restapi/hoteloyo/cancellation_charge';
$route['hotel/cancel_booking']=$route['oyo/cancel_booking']='restapi/hoteloyo/cancel_booking';

///////////////////////  END  OYO API ////////////////////

$route['recharge/getallprepaidprovider']='restapi/ezypayrecharge/getallprepaidprovider';
$route['recharge/prepaidrecharge']='restapi/ezypayrecharge/prepaidrecharge';
$route['recharge/postpaidrecharge']='restapi/ezypayrecharge/postpaidrecharge';
$route['recharge/dthrecharge']='restapi/ezypayrecharge/dthrecharge';
$route['recharge/landlinerecharge']='restapi/ezypayrecharge/landlinerecharge';


$route['electric/getalloperatorcity']='restapi/ezypayelectric/electricitystates';
$route['electric/billvalidate']='restapi/ezypayelectric/billvalidate';
$route['electric/electricitybill']='restapi/ezypayelectric/electricitybill';


$route['moneytransfer/newsender']=$route['ezypaymoney/newsender']='restapi/ezypaymoney/newsender';
$route['moneytransfer/otpverification']=$route['ezypaymoney/otpverification']='restapi/ezypaymoney/otpverification';
$route['moneytransfer/resendotp']=$route['ezypaymoney/resendotp']='restapi/ezypaymoney/resendotp';
$route['moneytransfer/getadminbal']=$route['ezypaymoney/getadminbal']='restapi/ezypaymoney/getadminbal';
$route['moneytransfer/getbeneficiarylist']=$route['ezypaymoney/getbeneficiarylist']='restapi/ezypaymoney/getbeneficiarylist';
$route['moneytransfer/addbeneficiary']=$route['ezypaymoney/addbeneficiary']='restapi/ezypaymoney/addbeneficiary';
$route['moneytransfer/banklist']=$route['ezypaymoney/banklist']='restapi/ezypaymoney/banklist';
$route['moneytransfer/userbalance']=$route['ezypaymoney/userbalance']='restapi/ezypaymoney/userbalance';
$route['moneytransfer/moneytransfer']=$route['ezypaymoney/moneytransfer']='restapi/ezypaymoney/moneytransfer';
$route['moneytransfer/accountvalidation']=$route['ezypaymoney/accountvalidation']='restapi/ezypaymoney/accountvalidation';
$route['moneytransfer/deletebeneficiary']=$route['ezypaymoney/deletebeneficiary']='restapi/ezypaymoney/deletebeneficiary';


$route['callbackstatus']='restapi/ezypaymoney/callbackstatus';


$route['forex/currencyprice']='restapi/forex/currencyprice';

$route['recharge/getautooperator']='restapi/itcareapi/getautoprovide';


$route['bus/getorigin']=$route['gibus/getorigin']='restapi/busgi/getorigin';
$route['bus/getdestination']=$route['gibus/getdestination']='restapi/busgi/getdestination';
$route['bus/getsearch']=$route['gibus/getsearch']='restapi/busgi/getsearch';
$route['bus/getseatmap']=$route['gibus/getseatmap']='restapi/busgi/getseatmap';
$route['bus/getseatblock']=$route['gibus/getseatblock']='restapi/busgi/getseatblock';
$route['bus/getseatbook']=$route['gibus/getseatbook']='restapi/busgi/getbook';
$route['bus/gettransactionstatus']=$route['gibus/gettransactionstatus']='restapi/busgi/gettransactionstatus';
$route['bus/getreprint']=$route['gibus/getreprint']='restapi/busgi/getreprint';
$route['bus/getcancellationpolicy']=$route['gibus/getcancellationpolicy']='restapi/busgi/getcancellationpolicy';
$route['bus/getcancellationpenalty']=$route['gibus/getcancellationpenalty']='restapi/busgi/getcancellationpenalty';
$route['bus/getcancellation']=$route['gibus/getcancellation']='restapi/busgi/getcancellation';
$route['bus/getbookedhistory']=$route['gibus/getbookedhistory']='restapi/busgi/getbookedhistory';
$route['bus/getaccountstatement']=$route['gibus/getaccountstatement']='restapi/busgi/getaccountstatement';
$route['bus/getagentcreditbalance']=$route['gibus/getagentcreditbalance']='restapi/busgi/getagentcreditbalance';






$route['agent/login']='restapi/agentapi/agentlogin';
$route['agent/transactionlist']='restapi/agentapi/transactionlist';
$route['agent/wallettowallettransfer']='restapi/agentapi/wallettowallettransfer';
$route['agent/getBalance']='restapi/agentapi/getBalance';
$route['agent/updatetransaction']='restapi/agentapi/updatetransaction';

$route['agent/updateaftertransaction']='restapi/agentapi/updateaftertransaction';


$route['checkurl']='restapi/checkbalance/validateurl';


$route['giftcard/giftcardcategory']='restapi/cyberplateapi/giftcardcategory';
$route['giftcard/giftcardsdetail']='restapi/cyberplateapi/giftcardsdetail';
$route['giftcard/branddetail']='restapi/cyberplateapi/branddetail';
$route['giftcard/spendapi']='restapi/cyberplateapi/spendapi';
$route['giftcard/statusapi']='restapi/cyberplateapi/statusapi';
$route['giftcard/resendapi']='restapi/cyberplateapi/resendapi';

$route['admin/adminbalanceapi']='restapi/cyberplateapi/adminbalanceapi';

/*$route['cyber/newsender']='restapi/ezypaymoney/newsender';
$route['cyber/otpverification']='restapi/ezypaymoney/otpverification';
$route['cyber/resendotp']='restapi/ezypaymoney/resendotp';
$route['cyber/getadminbal']='restapi/ezypaymoney/getadminbal';
$route['cyber/getbeneficiarylist']='restapi/ezypaymoney/getbeneficiarylist';
$route['cyber/addbeneficiary']='restapi/ezypaymoney/addbeneficiary';
$route['cyber/banklist']='restapi/ezypaymoney/banklist';
$route['cyber/userbalance']='restapi/ezypaymoney/userbalance';
$route['cyber/moneytransfer']='restapi/ezypaymoney/moneytransfer';
$route['cyber/accountvalidation']='restapi/ezypaymoney/accountvalidation';
$route['cyber/deletebeneficiary']='restapi/ezypaymoney/deletebeneficiary';*/



$route['themepark/themeparkcategory']='restapi/cyberplateapi/themeparkcategory';
$route['themepark/themeparkcatgorydetail']='restapi/cyberplateapi/themeparkcatgorydetail';
$route['themepark/themeparkproductdetail']='restapi/cyberplateapi/themeparkproductdetail';
$route['themepark/themeparkAvailability']='restapi/cyberplateapi/themeparkAvailability';
$route['themepark/themeparkBooking']='restapi/cyberplateapi/themeparkBooking';




$route['dmt2/getbankdetail']='restapi/cyberplateapi/ppi_getbankdetail';
$route['dmt2/customervalidation']='restapi/cyberplateapi/ppi_customervalidation';



