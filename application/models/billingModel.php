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
}

?>
