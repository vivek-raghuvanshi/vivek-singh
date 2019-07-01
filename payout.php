<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Payout extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('mlm_model');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->driver('cache');
        $this->load->library('session');
        $this->load->helper('string');
    }
    
    
    public function index(){   
                $all_id['id'] = $this->mlm_model->select_all_id();
                foreach ($all_id['id'] as  $value) {
                $Id=$value['userId'];

                $rightsum=0;
                $total_rbvpackage=0;
                $total_rrewards=0;
               

                $position=0;
                $total_leftid=0;
                $this->data=$this->mlm_model->select_lavel($Id,$position);
                $Useridlbv=$this->data[0]['UserID'];
                $leftdirect=$this->data[0]['total'];
        if ($leftdirect>=1) {
                $Userid=explode(',', $Useridlbv);
                $i=0;
                $a=1;
                $sum=0;
                   while ( $i<$a) {
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('parent_id', $Userid);
                 $this->db->where('parent_id !=', $Id);
                 $this->data2 = $this->db->get()->result_array();
                 $Userid1=$this->data2[0]['UserID'];
                 $Userid=$Userid1;
                 $totals=$this->data2[0]['total'];
        
                         if ($totals>0) {
                             $a++;
                         }else{
                            $a==0;
                         }
                         $Userid1=$this->data2[0]['UserID'];
                         $total_leftid.=$Userid1.','.$Userid;
                         $Userid=explode(',', $Userid1);
                         $sum=$totals+$sum;
                 $i++;

                 } 

                $totalleftbv=$Useridlbv.','.$total_leftid;  

               //*****************First Packages*********************//
                 $Userid=explode(',', $totalleftbv);
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 1);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL1=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 2);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL2=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 3);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL3=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 4);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL4=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 5);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL5=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 6);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL6=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 7);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL7=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 8);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL8=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 9);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL9=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 10);
                 $this->data2 = $this->db->get()->result_array();
                 $packageL10=$this->data2[0]['total'];




                 $total_lbvpackage=$packageL1*5000+$packageL2*7500+$packageL3*10000+$packageL4*10000+$packageL5*11000+$packageL6*12000+$packageL7*13500
                 +$packageL8*18000+$packageL9*55000+$packageL10*120000;
                 $leftsum=$sum+$leftdirect;
    }    
                $position=1;
                $Useridrbv=0;
                $this->data=$this->mlm_model->select_lavel($Id,$position);
                $total_rightid=$this->data[0]['UserID'];
                $rightdirect=$this->data[0]['total'];
             
  if ($rightdirect>=1) {
                $Userid=explode(',', $total_rightid);
                $i=0;
                $a=1;
                $sum=0;
                   while ( $i<$a) {
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('parent_id', $Userid);
                 $this->data2 = $this->db->get()->result_array();
                 $Userid1=$this->data2[0]['UserID'];
                 $Userid=$Userid1;
                 $totals=$this->data2[0]['total'];
        
                         if ($totals>0) {
                             $a++;
                         }else{
                            $a==0;
                         }
                         $Userid1=$this->data2[0]['UserID'];
                         $Useridrbv.=$Userid1.','.$Userid;
                         $Userid=explode(',', $Userid1);
                         $sum=$totals+$sum;
                 $i++;

                 } 
            //*************************Right Bv ******************************//  
                $totalrightbv=$Useridrbv.','.$total_rightid;  

                 $Userid=explode(',', $totalrightbv);
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 1);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR1=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 2);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR2=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 3);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR3=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 4);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR4=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 5);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR5=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 6);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR6=$this->data2[0]['total'];

                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 7);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR7=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 8);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR8=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 9);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR9=$this->data2[0]['total'];
                 
                 $this->db->select(array("count(verified_users.parent_id) as total",'user_id,GROUP_CONCAT(verified_users.user_id SEPARATOR ",") AS UserID'));
                 $this->db->from('verified_users');
                 $this->db->where_in('user_id', $Userid);
                 $this->db->where_in('package', 10);
                 $this->data2 = $this->db->get()->result_array();
                 $packageR10=$this->data2[0]['total'];

                $total_rbvpackage=$packageR1*5000+$packageR2*7500+$packageR3*10000+$packageR4*10000+$packageR5*11000+$packageR6*12000+$packageR7*13500
                +$packageR8*18000+$packageR9*55000+$packageR10*120000; 
                $rightsum=$sum+$rightdirect;
             }

                             if($rightdirect>=1 && $leftdirect>=1){
                                             $matching_bv=min($total_lbvpackage,$total_rbvpackage);
                                             $this->db->from('withdrawal');
                                             $this->db->where_in('user_id', $Id);
                                             $total_amount = $this->db->get()->result_array();
                                             $previoseamount=array_sum(array_column($total_amount, 'parday_amount'));
                                             $total_amaount=($matching_bv*10/100)-($previoseamount);
                             
                                            if($total_amaount>0){
                                                $data=array('user_id'=>$Id,'parday_amount'=>$total_amaount);
                                                $this->data=$this->user_model->insert('withdrawal',$data);
                                            }
                            }                 
                                          
           }    

 redirect(base_url('dashboard'), 'refresh');       
  
} 

}?>