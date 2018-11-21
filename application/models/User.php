<?php
class User extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
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

	function commissionSetter($comm, $amt, $uid, $txnid, $ttd,$wl_id,$mobile,$curr_bal,$oper)
	{
		$commission = $comm['deduction'];
		$rate = $comm['amt'];
		$type = $comm['type'];
		$this->db->select('*');
		$this->db->from('it_users');
    	$this->db->where('id', $uid);
    	$query = $this->db->get();
    	$bala = $query->result_array();

    	$trans['cur_balance']=$curr_bal;
    	$trans['operator_id']=$oper;
    	$trans['wl_id']=$wl_id;
    	$trans['mobile']=$mobile;

		if($commission == 'commission'){
			if($type == 'flat'){
				
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'COM-'.rand(10000,99999);
				$trans['amount'] = $rate;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Commission';
				$trans['status'] = '1';

				if($amt < 0){
				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Commisssion of ₹ '.$rate.' With Referance to Transaction ID: '.$txnid.' and TID:'.$ttd;
				}else {
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
				$trans['trans_id'] = 'COM-'.rand(10000,99999);
				$trans['amount'] = $income;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Commission';
				$trans['status'] = '1';

				if($amt < 0){
				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Commisssion of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				}else {
				$trans['pay_type'] = 'Credit';
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
				$trans['trans_id'] = 'SUR-'.rand(10000,99999);
				$trans['amount'] = $rate;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Surcharge';
				$trans['status'] = '1';

				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Surcharge of ₹ '.$rate.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
						
				$insert = $this->db->insert('it_transaction', $trans);

		    	if($insert){
		    		
		    		$balaw['balance'] = $bala[0]['balance'] - $rate;    	
    				$balaw['modified_date'] = date('Y-m-d H:i:s');	
    				$updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

		    	}

		    	return $updatea;

			}else{

				$income = ($rate / 100) * $amt;
				$trans['user_id'] = $uid;
				$trans['trans_id'] = 'SUR-'.rand(10000,99999);
				$trans['amount'] = $income;
				$trans['created_date'] = date('Y-m-d H:i:s');
				$trans['trans_type'] = 'Surcharge';
				$trans['status'] = '1';

				$trans['pay_type'] = 'Debit';
				$trans['narration'] = 'Surcharge of ₹ '.$income.' With Referance to transaction ID: '.$txnid.' and TID:'.$ttd;
				
		    	$insert = $this->db->insert('it_transaction', $trans);
	
	    		$balaw['balance'] = $bala[0]['balance'] - $income;    	
				$balaw['modified_date'] = date('Y-m-d H:i:s');	
				$updatea = $this->db->update('it_users', $balaw, array('id'=>$uid));

				return $updatea;

			}

		}

	}



}