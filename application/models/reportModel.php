<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the reportModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 21 Jul, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class reportModel extends SaanModel{
    
    public function getRechargeReport($reportParamArray)
    {
        if(is_array($reportParamArray) && count($reportParamArray) > 0)
        {
            $startDate = $reportParamArray['start_date'];
            $endDate = $reportParamArray['end_date'];
            $query = "SELECT report_date, sum(recharge_value) as recharge_amount FROM recharge_details WHERE report_date BETWEEN '$startDate' AND '$endDate' GROUP BY report_date";
            return $this->db->fetch_rows($query);
        }
    }
    
    public function getCustomerReport($customerParamArray)
    {
        if(is_array($customerParamArray) && count($customerParamArray) > 0)
        {
            $startDate = $customerParamArray['start_date'];
            $endDate = $customerParamArray['end_date'];
            $query = "SELECT report_date, count(customer_id) as customer_count FROM customer_details WHERE report_date  BETWEEN '$startDate' AND '$endDate' GROUP BY report_date";
            return $this->db->fetch_rows($query);
        }
    }
}

?>
