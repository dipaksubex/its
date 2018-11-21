<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
 	}

 	public function getallproviders($type_id)
 	{
 		/*$this->db->select('*');
		$this->db->from('it_operator_names');
		$this->db->where('status',1);*/
		$query = $this->db->query("select opern.id,opern.name,concat('http://13.127.79.121/erp/assets/operator/',opern.icon) as icon,opern.status from it_operator oper left join it_operator_names opern on oper.operator_name_id=opern.id where oper.type_id='$type_id' group by oper.operator_name_id");		
		$data=$query->result();

		return $data;
 	}

 	public function getalloperatorcity($type)
 	{
 		$query = $this->db->query("select city.opertor_id,city.city,opername.name from it_operator oper left join it_operator_city city on city.opertor_id=oper.operator_name_id left join it_operator_names opername on opername.id=city.opertor_id where oper.type_id = '$type' and oper.status='1'");		
		$data=$query->result();


		return $data;
 	}

 	public function getoperatorcity($operator)
 	{
 		$this->db->select('*');
		$this->db->from('it_operator_city');
		$this->db->where('opertor_id', $operator);
		$query = $this->db->get(); 
		$data=$query->result();
		return $data;
 	}

 	public function banklist()
 	{
 		$this->db->select('id,bank_name,bank_code,bank_name,imps,neft,is_verify_acc,concat("http://13.127.79.121/erp/assets/operator/",icon) as icon,status');
		$this->db->from('it_bank_list');
		$query = $this->db->get(); 
		$data=$query->result();
		return $data;
 	}

 	public function agentlogin($email,$password,$api_key)
 	{
 		$query = $this->db->query("select * from it_users where email='$email' and password='$password' and status='1' and user_type='7' and wl_id=(select user_id from it_setting where value='$api_key')"); 
		$data=$query->result();
		return $data; 
 	}

 	public function agentupdateStatus($data, $id){       


        if(!empty($data) && !empty($id)){
            $update = $this->db->update('it_users', $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }

    }

    public function getuseridbyapikey($api_key)
    {
    	$this->db->select('id,virtual_balance as v_bal,balance');
		$this->db->from('it_users');
		$this->db->where('api_key',$api_key);
		$this->db->where('status','1');
		$query = $this->db->get(); 
		$data=$query->result_array();
		return $data;
    }

    function reduceFund($userid, $amount, $ref_no){

        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        $bala = $query->result_array();
        $balaw['balance'] = $bala[0]['balance'] - $amount;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        
        $trans['user_id'] = $userid;
        $trans['trans_id'] = 'MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Money Transfer of ₹ '.$amount.' with txn id '.$ref_no;
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Money Transfer';
        $trans['status'] = '1';
        $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }

    function reduceFundparent($userid, $amount, $ref_no,$name){

        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        $bala = $query->result_array();
        $balaw['balance'] = $bala[0]['balance'] - $amount;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        
        $trans['user_id'] = $userid;
        $trans['trans_id'] = 'MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Money Transfer of ₹ '.$amount.' with txn id '.$ref_no.'by '.$name;
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Money Transfer';
        $trans['status'] = '1';
        $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }

    function reduceFundAccVali($userid, $amount, $tx){

        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        $bala = $query->result_array();
        $balaw['balance'] = $bala[0]['balance'] - $amount;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        
        $trans['user_id'] = $userid;
        $trans['trans_id'] = 'MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Money Transfer for account validation of &#8377; '.$amount.' with txn id '.$tx;
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Money Transfer';
        $trans['status'] = '1';
        $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }

    function reduceFundparentAccVali($userid, $amount, $tx,$name){

        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        $bala = $query->result_array();
        $balaw['balance'] = $bala[0]['balance'] - $amount;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        
        $trans['user_id'] = $userid;
        $trans['trans_id'] = 'MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Money Transfer for account validatino of &#8377; '.$amount.' with txn id '.$tx.'by '.$name;
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Money Transfer';
        $trans['status'] = '1';
        $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }

    function gettransactionlist($user_id)
    {
        $this->db->select('trans.*,oper.name as operator_name');
        $this->db->from('it_transaction as trans');
        $this->db->join('it_operator_names as oper','oper.id=trans.operator_id','left');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get(); 
        $data=$query->result_array();
        return $data;
    }

    function getuserdetailById($user_id)
    {
        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id',$user_id);
        $query = $this->db->get(); 
        $data=$query->result_array();
        return $data;
    }

    function getTxdetailById($tx_id)
    {
        $this->db->select('*');
        $this->db->from('it_transaction');
        $this->db->where('id',$tx_id);
        $query = $this->db->get(); 
        $data=$query->result_array();
        return $data;
    }
    function getuserdetailByMobile($mobile)
    {
        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('mobile',$mobile);
        $query = $this->db->get(); 
        $data=$query->result_array();
        return $data;
    }

    function savetransaction($from_userid,$to_userid,$amount)
    {
       
      
      $query = $this->db->query("update it_users set balance=(balance+$amount) where id=$to_userid");    
      $query = $this->db->query("update it_users set balance=(balance-$amount) where id=$from_userid");

      return $query;    
    }

    
    function deductRecharge($userid, $amount, $mobile, $operator){

        $this->db->select('*');
        $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->result_array();
       $balaw['balance'] = $bala[0]['balance'] - $amount;        
       $balaw['modified_date'] = date('Y-m-d H:i:s');            
       $trans['wl_id'] = $bala[0]['wl_id'];
       $trans['operator_id'] = $operator;
       $trans['cur_balance'] = $balaw['balance'];        
       $trans['mobile'] = $mobile;
       $trans['user_id'] = $userid;
        $trans['trans_id'] = 'API-MR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Mobile Recharge of ₹ '.$amount.' to Number '.$mobile.' by '. $bala[0]['name'];
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Recharge';
        $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return $trans['trans_id'];}else{return false;}
    }

    
    function deductPRecharge($userid, $amount, $mobile, $operator){

        $this->db->select('*');
        $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->result_array();
       $balaw['balance'] = $bala[0]['balance'] - $amount;        
       $balaw['modified_date'] = date('Y-m-d H:i:s');            
       $trans['wl_id'] = $bala[0]['wl_id'];
       $trans['operator_id'] = $operator;
       $trans['cur_balance'] = $balaw['balance'];        
       $trans['mobile'] = $mobile;
       $trans['user_id'] = $userid;
        $trans['trans_id'] = 'API-PR-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Mobile Bill Payment of ₹ '.$amount.' to Number '.$mobile.' by '. $bala[0]['name'];
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Bill Payment';
        $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return $trans['trans_id'];}else{return false;}
    }

    
    function deductDRecharge($userid, $amount, $mobile, $operator){

        $this->db->select('*');
        $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->result_array();
       $balaw['balance'] = $bala[0]['balance'] - $amount;        
       $balaw['modified_date'] = date('Y-m-d H:i:s');            
       $trans['wl_id'] = $bala[0]['wl_id'];
       $trans['operator_id'] = $operator;
       $trans['cur_balance'] = $balaw['balance'];        
       $trans['mobile'] = $mobile;
       $trans['user_id'] = $userid;
        $trans['trans_id'] = 'API-DT-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'DTH Recharge of ₹ '.$amount.' to Number '.$mobile.' by '. $bala[0]['name'];
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Recharge';
        $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return $trans['trans_id'];}else{return false;}
    }
    function deductLRecharge($userid, $amount, $mobile, $operator){

        $this->db->select('*');
        $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->result_array();
       $balaw['balance'] = $bala[0]['balance'] - $amount;        
       $balaw['modified_date'] = date('Y-m-d H:i:s');            
       $trans['wl_id'] = $bala[0]['wl_id'];
       $trans['operator_id'] = $operator;
       $trans['cur_balance'] = $balaw['balance'];        
       $trans['mobile'] = $mobile;
       $trans['user_id'] = $userid;
        $trans['trans_id'] = 'API-LL-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Landline Bill Payment of ₹ '.$amount.' to Number '.$mobile.' by '. $bala[0]['name'];
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Bill Payment';
        $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return $trans['trans_id'];}else{return false;}
    }

    function deductERecharge($userid,$amount,$operator,$cid,$tid){

       $this->db->select('*');
        $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->row_array();

       $balaw['balance'] = $bala['balance'] - $amount;        
       $balaw['modified_date'] = date('Y-m-d H:i:s');    
       
       $trans['user_id'] = $userid;
       $trans['wl_id'] = $balaw['balance'];
       $trans['operator_id'] = $operator;
       $trans['cur_balance'] = $balaw['balance'];        
       $trans['mobile'] = $bala['mobile'];
        $trans['trans_id'] = 'EBP-'.rand(10000,99999);
        $trans['amount'] = $amount;
        $trans['pay_type'] = 'Debit';
        $trans['narration'] = 'Bill Payment of Electricity Bill of ₹ '.$amount.' to BBPS Ref. No. '.$cid.' Transaction ID'.$tid.' by '. $bala['name'];
        $trans['created_date'] = date('Y-m-d H:i:s');
        $trans['trans_type'] = 'Bill Payment';
        $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

        $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
        if($updatea == 1){return true;}else{return false;}
    }


    function opertorcityProduct($product_id)
    {
        $this->db->select('opertor_id');
        $this->db->from('it_operator_city');
        $this->db->where('id',$product_id);
        $query = $this->db->get(); 
        $data=$query->result_array();
        return $data;
    }


    function reduceMTFund($userid, $amount, $mobile, $ref_no){

       $this->db->select('*');
       $this->db->from('it_users');
       $this->db->where('id', $userid);
       $query = $this->db->get();
       $bala = $query->result_array();
       $balaw['balance'] = $bala[0]['balance'] - $amount;
       $balaw['modified_date'] = date('Y-m-d H:i:s');

       $trans['wl_id'] = $bala[0]['wl_id'];
       $trans['operator_id'] = '118';
       $trans['cur_balance'] = $balaw['balance'];
       $trans['mobile'] = $mobile;
       $trans['user_id'] = $userid;
       $trans['trans_id'] = 'API-MT-'.rand(10000,99999);
       $trans['amount'] = $amount;
       $trans['pay_type'] = 'Debit';
       $trans['narration'] = 'Money Transfer of ₹ '.$amount.' to Number '.$mobile.' with txn id '.$ref_no;
       $trans['created_date'] = date('Y-m-d H:i:s');
       $trans['trans_type'] = 'Money Transfer';
       $trans['status'] = '1';
       $insert = $this->db->insert('it_transaction', $trans);

       $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
       if($updatea == 1){return true;}else{return false;}
   }


   function getcommissionAmount($slab='', $uid='', $oid=''){

        $this->db->select('*');
        $this->db->from('it_commissions');
        $this->db->where('operator_id', $oid);
        $this->db->where('user_id', $uid);
        $this->db->where('status', "1");
        $query = $this->db->get();
        $count = $query->num_rows();
        $bala = $query->result_array();     
        if($count == 0){
            $dar['amt'] = '0';
            $dar['type'] = '0';
            $dar['deduction'] = '0';
                
        }else{       
            $dar['amt'] = $bala[0][$slab];
            $dar['type'] = $bala[0]['type'];
            $dar['deduction'] = $bala[0]['surcharge'];
            
        } 
        return $dar;    
    }

    function commissionSetter($comm, $amt, $uid, $txnid, $ttd)
    {
        $commission = $comm['deduction'];
        $rate = $comm['amt'];
        $type = $comm['type'];
        $this->db->select('*');
        $this->db->from('it_users');
        $this->db->where('id', $uid);
        $query = $this->db->get();
        $bala = $query->result_array();

        if($commission == 'commission'){
            if($type == 'flat'){
                
                $trans['user_id'] = $uid;
                $trans['mobile'] = $bala[0]['mobile'];
                $trans['wl_id'] = $bala[0]['wl_id'];
                $trans['operator_id'] = '';
                $trans['trans_id'] = 'API-COM-'.rand(10000,99999);
                $trans['amount'] = $rate;
                $trans['created_date'] = date('Y-m-d H:i:s');
                $trans['trans_type'] = 'Commission';
                $trans['status'] = '1';

                if($amt < 0){
                $trans['cur_balance'] = $bala[0]['balance'] - $rate;
                $trans['pay_type'] = 'Debit';
                $trans['narration'] = 'Commisssion of ₹ '.$rate.' With Referance to Transaction ID: '.$txnid.' and TID:'.$ttd;
                }else {
                $trans['cur_balance'] = $bala[0]['balance'] + $rate;
                $trans['pay_type'] = 'Credit';
                $trans['narration'] = 'Commisssion of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                }           
                
                $insert = $this->db->insert('it_transaction', $trans);

                if($insert  && $amt < 0 ){
                    
                    $balaw['balance'] = $bala[0]['balance'] - $rate;        
                    $balaw['modified_date'] = date('Y-m-d H:i:s');  
                    $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                }else{
                    
                    $balaw['balance'] = $bala[0]['balance'] + $rate;        
                    $balaw['modified_date'] = date('Y-m-d H:i:s');  
                    $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                }

                return $updatea;

            }else{

                $income = ($rate / 100) * $amt;
                $trans['user_id'] = $uid;
                $trans['mobile'] = $bala[0]['mobile'];
                $trans['wl_id'] = $bala[0]['wl_id'];
                $trans['operator_id'] = '';
                $trans['trans_id'] = 'API-COM-'.rand(10000,99999);
                $trans['amount'] = $income;
                $trans['created_date'] = date('Y-m-d H:i:s');
                $trans['trans_type'] = 'Commission';
                $trans['status'] = '1';

                if($amt < 0){
                $trans['pay_type'] = 'Debit';
                $trans['cur_balance'] = $bala[0]['balance'] - $income;
                $trans['narration'] = 'Commisssion of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                }else {
                $trans['pay_type'] = 'Credit';
                $trans['cur_balance'] = $bala[0]['balance'] + $income;
                $trans['narration'] = 'Commisssion of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                }           
                
                $insert = $this->db->insert('it_transaction', $trans);

                if($insert  && $amt < 0 ){
                    
                    $balaw['balance'] = $bala[0]['balance'] - $income;      
                    $balaw['modified_date'] = date('Y-m-d H:i:s');  
                    $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                }else{
                    
                    $balaw['balance'] = $bala[0]['balance'] + $income;      
                    $balaw['modified_date'] = date('Y-m-d H:i:s');  
                    $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                }
                return $updatea;

            }
        }else{

            if($type == 'flat'){
                $trans['user_id'] = $uid;
                $trans['mobile'] = $bala[0]['mobile'];
                $trans['wl_id'] = $bala[0]['wl_id'];
                $trans['operator_id'] = '';
                $trans['trans_id'] = 'API-SUR-'.rand(10000,99999);
                $trans['amount'] = $rate;
                $trans['created_date'] = date('Y-m-d H:i:s');
                $trans['trans_type'] = 'Surcharge';
                $trans['status'] = '1';
                $trans['pay_type'] = 'Debit';
                $trans['cur_balance'] = $bala[0]['balance'] - $rate;
                $trans['narration'] = 'Surcharge of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                $insert = $this->db->insert('it_transaction', $trans);
                
                $balaw['balance'] = $bala[0]['balance'] - $rate;        
                $balaw['modified_date'] = date('Y-m-d H:i:s');  
                $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                if($insert && $updatea ){
                
                $this->db->select('*');
                $this->db->from('it_users');
                $this->db->where('id', $bala[0]['parent_id']);
                $querya = $this->db->get();
                $bal = $querya->result_array();


                $trans1['user_id'] = $bal[0]['id'];
                $trans1['mobile'] = $bal[0]['mobile'];
                $trans1['wl_id'] = $bal[0]['wl_id'];
                $trans1['operator_id'] = '';
                $trans1['trans_id'] = 'API-COM-'.rand(10000,99999);
                $trans1['amount'] = $rate;
                $trans1['created_date'] = date('Y-m-d H:i:s');
                $trans1['trans_type'] = 'Commission';
                $trans1['status'] = '1';
                $trans1['pay_type'] = 'Credit';
                $trans1['cur_balance'] = $bal[0]['balance'] + $rate;
                $trans1['narration'] = 'Commission of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                $insert = $this->db->insert('it_transaction', $trans1);
                
                $balawq['balance'] = $bal[0]['balance'] + $rate;        
                $balawq['modified_date'] = date('Y-m-d H:i:s'); 
                $updateaq = $this->db->update('it_users', $balawq, array('id'=>$bal[0]['id']));
                    

                }

                return $updateaq;

            }else{

                $income = ($rate / 100) * $amt;
                $trans['user_id'] = $uid;
                $trans['mobile'] = $bala[0]['mobile'];
                $trans['wl_id'] = $bala[0]['wl_id'];
                $trans['operator_id'] = '';
                $trans['trans_id'] = 'API-SUR-'.rand(10000,99999);
                $trans['amount'] = $income;
                $trans['created_date'] = date('Y-m-d H:i:s');
                $trans['trans_type'] = 'Surcharge';
                $trans['status'] = '1';
                $trans['cur_balance'] = $bala[0]['balance'] - $income;
                $trans['pay_type'] = 'Debit';
                $trans['narration'] = 'Surcharge of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                
                $insert = $this->db->insert('it_transaction', $trans);
    
                $balaw['balance'] = $bala[0]['balance'] - $income;      
                $balaw['modified_date'] = date('Y-m-d H:i:s');  
                $updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

                if($insert && $updatea ){
                
                $this->db->select('*');
                $this->db->from('it_users');
                $this->db->where('id', $bala[0]['parent_id']);
                $querya = $this->db->get();
                $bal = $querya->result_array();


                $trans1['user_id'] = $bal[0]['id'];
                $trans1['mobile'] = $bal[0]['mobile'];
                $trans1['wl_id'] = $bal[0]['wl_id'];
                $trans1['operator_id'] = '';
                $trans1['trans_id'] = 'API-COM-'.rand(10000,99999);
                $trans1['amount'] = $income;
                $trans1['created_date'] = date('Y-m-d H:i:s');
                $trans1['trans_type'] = 'Commission';
                $trans1['status'] = '1';
                $trans1['pay_type'] = 'Credit';
                $trans1['cur_balance'] = $bal[0]['balance'] + $income;
                $trans1['narration'] = 'Commission of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
                $insert = $this->db->insert('it_transaction', $trans1);
                
                $balawq['balance'] = $bal[0]['balance'] + $income;      
                $balawq['modified_date'] = date('Y-m-d H:i:s'); 
                $updateaq = $this->db->update('it_users', $balawq, array('id'=>$bal[0]['id'])); 
                }
                return $updateaq;

            }

        }

    }

    function getRows($params = array()){
       $this->db->select('*');
       $this->db->from('it_users');

       //fetch data by conditions
       if(array_key_exists("conditions",$params)){
           foreach ($params['conditions'] as $key => $value) {
               $this->db->where($key,$value);
           }
       }

       if(array_key_exists("id",$params)){
           $this->db->where('id',$params['id']);
           $query = $this->db->get();
           $result = $query->row_array();
       }else{
           //set start and limit
           if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
               $this->db->limit($params['limit'],$params['start']);
           }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
               $this->db->limit($params['limit']);
           }
           $query = $this->db->get();
           if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
               $result = $query->num_rows();
           }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
               $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
           }else{
               $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
           }
       }

       //return fetched data
       return $result;
   }



    function updatetransaction($userid, $balance, $txdata,$status){
       
        $balaw['balance'] = $balance;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  

        $updatea = $this->db->insert('it_transaction', $txdata);
        $ins_id=$this->db->insert_id();
        if($status==1)
        {
          $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
          
        }
        if($updatea == 1){return $ins_id;}else{return false;}
        
    }
    function updateaftertransaction($tx_id, $balance, $txdata,$status,$userid){
       
        $balaw['balance'] = $balance;      
        $balaw['modified_date'] = date('Y-m-d H:i:s');  
        $updatea = $this->db->update('it_transaction', $txdata, array('id'=>$tx_id));
        //$ins_id=$this->db->insert_id();
        if($status==1)
        {
          $updatea = $this->db->update('it_users', $balaw, array('id'=>$userid));
          
        }
        if($updatea == 1){return true;}else{return false;}
        
    }

    function apipriority($type)
    {
        $this->db->select('swt.*,lst.apis_provider_name as api_name');
        $this->db->from('it_api_switch as swt');
        $this->db->where('swt.api_for', $type);
        $this->db->join('it_apis_list as lst','lst.id=swt.api_id','left');
        $this->db->where('swt.status', "1");
        $query = $this->db->get();
        $bala = $query->result_array();  
        return $bala;
    }

    function chkversion($version)
    {
        $this->db->select('*');
        $this->db->from('it_version');
        $this->db->where('version', $version);
        $this->db->where('status', "1");
        $query = $this->db->get();
        $bala = $query->result_array();  
        return $bala;
    }




}