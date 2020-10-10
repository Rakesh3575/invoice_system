<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_user extends CI_model 
{ 
    function insert_reg($table,$data)
    {
        $result= $this->db->insert($table,$data);
        return $result;
	}

public function get_details($user)
{ 
    $this->db->select('invoice.*, users.id as user_id,users.username as username');
    $this->db->from('invoice');
    $this->db->join('users','users.id = invoice.user_id');
    $this->db->where('users.id',$user);
   $query = $this->db->get();
    return $query->result();
 }

    public function insert_invoice()
    {
        $product=implode(',',$_POST['product']);
        $rate=implode(',',$_POST['rate']);
        $quantity=implode(',',$_POST['quantity']);
        $amount=implode(',',$_POST['amount']);
         $data=array(
            'user_id'=>$_POST['user_id'],
            'inv_number'=>$_POST['inv_number'],
            'name'=>$product,
            'rate'=>$rate,
            'quantity'=>$quantity,
            'amount'=>$amount,
            'sub_total'=>$_POST['sub_total'],
            'sgst_per'=>$_POST['sgst_per'],
            'cgst_per'=>$_POST['cgst_per'],
            'sgst_amount'=>$_POST['sgst_amount'],
            'cgst_amount'=>$_POST['cgst_amount'],
            'due_amt'=>$_POST['due_amt'],
            'paid_amt'=>$_POST['paid_amt'],
            'grand_total'=>$_POST['grand_total'],
            );
        // print_r($data);die("DATA");
        $this->db->insert('invoice',$data);
        return($this->db->affected_rows()!=1)?false:true;
  } 
    function validate($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password', md5($pass));
        $this->db->where('username', $user);
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }
 }?>