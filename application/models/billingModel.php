<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the billingModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 30 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class billingModel extends SaanModel{
    
    public function  getProductByCode($dataArray)
    {
        if(is_array($dataArray) && count($dataArray) > 0)
        {
            $query = "SELECT product_name, product_price FROM product_details WHERE product_code = '" . $dataArray['product_code'] . "' AND product_status = 'active'";
            return $this->db->fetch_assoc($query);
        }
    }
    
    public function getCreditByCard($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "SELECT customer_credit_avail FROM customer_details WHERE customer_card_number = '" . $postArray['customer_card_number'] . "' AND customer_status = 'active'";
            return $this->db->fetch_assoc($query);
        }
    }
    
    public function getCreditByEmail($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $customerDOB = strtotime($postArray['customer_dob']);
            $query = "SELECT customer_credit_avail FROM customer_details WHERE customer_email = '" . $postArray['customer_email'] . "' AND customer_status = 'active'";
            return $this->db->fetch_assoc($query);
        }
    }
    
    public function do_final_payment($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            if($postArray['post_type'] == 'card')
            {
                $query = "SELECT customer_id FROM customer_details WHERE customer_card_number = '" . $postArray['customer_card_number'] . "'";
            }
            elseif($postArray['post_type'] == 'email')
            {
                $query = "SELECT customer_id FROM customer_details WHERE customer_email = '" . $postArray['customer_email'] . "'";
            }
            
            $customerArray = $this->db->fetch_rows($query);
            $customerId = $customerArray[0]['customer_id'];
            $dataArray = array('purchase_customer_id' => $customerId,
                                'purchase_user_id' => $_SESSION['store_user_id'],
                                'purchase_payment_by' => $postArray['post_type'],
                                'purchase_total_amount' => $postArray['purchase_total_amount'],
                                'purchase_datetime' => time());
            $purchaseIdValue = $this->db->query_insert('purchase_details', $dataArray);
            foreach($postArray['purchase_item_array'] as $itemKey=>$itemValueArray)
            {
                $itemValueArray['purchase_id'] = $purchaseIdValue;
                $this->db->query_insert('purchase_item_details', $itemValueArray);
            }
            $query = "UPDATE customer_details SET customer_credit_avail = customer_credit_avail - " . $postArray['purchase_total_amount'] ." WHERE customer_id = '$customerId'";
            $this->db->query($query);
            return true;
        }
    }
}

?>
