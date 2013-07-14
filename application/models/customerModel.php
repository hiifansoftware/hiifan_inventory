<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the customerModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class customerModel extends SaanModel{
   
    public function addNewCustomer($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            return $this->db->query_insert('customer_details', $postArray);
        }
    }
    
    public function getFreshCard()
    {
        $query = "SELECT cardnumber_value FROM cardnumber_details WHERE cardnumber_status = 'fresh' LIMIT 0, 1";
        return $this->db->fetch_rows($query);
    }
    
    public function updateFreshCard($args)
    {
        if(is_array($args) && count($args) > 0)
        {
            $query = "UPDATE cardnumber_details SET cardnumber_status = 'used' WHERE cardnumber_value = '" . $args['customer_card_number'] . "'";
            return $this->db->query($query);
        }
    }
    
    public function getCustomerByEmail($args)
    {
        $query = "SELECT * FROM customer_details WHERE customer_email = '" . $args['customer_email'] . "'";
        return $this->db->num_rows($query);
    }
    
    public function getCreditByCard($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "SELECT customer_credit_avail FROM customer_details WHERE customer_card_number = '" . $postArray['customer_card_number'] . "' AND customer_status = 'active'";
            return $this->db->fetch_assoc($query);
        }
    }
    
    public function getCreditByEmailnDOB($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $customerDOB = strtotime($postArray['customer_dob']);
            $query = "SELECT customer_credit_avail FROM customer_details WHERE customer_email = '" . $postArray['customer_email'] . "' AND customer_dob = '" . $customerDOB . "' AND customer_status = 'active'";
            return $this->db->fetch_assoc($query);
        }
    }
    
    public function rechargeByCard($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "SELECT customer_id FROM customer_details WHERE customer_card_number = '" . $postArray['customer_card_number'] . "'";
            $customerArray = $this->db->fetch_assoc($query);
            $customerIdValue = $customerArray[0]['customer_id'];
            $query = "UPDATE customer_details SET customer_credit_avail = customer_credit_avail + " . $postArray['recharge_amount_card'] . " WHERE customer_card_number = '" . $postArray['customer_card_number'] . "'";
            if($this->db->query($query))
            {
                $dataArray = array('customer_id' => $customerIdValue,
                                    'recharge_value' => $postArray['recharge_amount_card'],
                                    'recharge_by' => 'card',
                                    'recharge_datetime' => time());
                return $this->db->query_insert('recharge_details', $dataArray);
            }
        }
    }
    
    public function rechargeCardByEmailnDob($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $dobValue = strtotime($postArray['customer_dob']);
            $query = "SELECT customer_id FROM customer_details WHERE customer_email = '" . $postArray['customer_email'] . "' AND customer_dob = '" . $dobValue . "'";
            $customerArray = $this->db->fetch_assoc($query);
            $customerIdValue = $customerArray[0]['customer_id'];
            
            $query = "UPDATE customer_details SET customer_credit_avail = customer_credit_avail + " . $postArray['recharge_amount_email'] . " WHERE customer_email = '" . $postArray['customer_email'] . "' AND customer_dob = '" . $dobValue . "'";
            
            if($this->db->query($query))
            {
                $dataArray = array('customer_id' => $customerIdValue,
                                    'recharge_value' => $postArray['recharge_amount_email'],
                                    'recharge_by' => 'email',
                                    'recharge_datetime' => time());
                return $this->db->query_insert('recharge_details', $dataArray);
            }
        }
    }
    
    public function getSettingBySettingName($settingName)
    {
        $query = "SELECT setting_value FROM setting_details WHERE setting_name = '" . $settingName['setting_name'] . "'";
        return $this->db->fetch_rows($query);
    }
}

?>
