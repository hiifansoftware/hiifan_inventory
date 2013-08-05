<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the reportController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 30 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class reportController extends SaanController{
    
    public function index()
    {
        
    }
    
    public function recharge_report()
    {
        $this->registry->template->Title = "Inventory Management System :: Recharge Report Page";
        $reportyType = 'weekly';
        $postArray = $this->requestPost();
        
        /** ************************ Start: Week Section ************************** */
        if($postArray['btnMonth'] != 'Monthly Report' && $postArray['btnYear'] != 'Yearly Report')
        {
            $reportType = "Weekly";
            //Get the First and Last Date of Week
            $weekFirstDate = date('Y-m-d', strtotime('Last Monday', time()));
            $timestampFirstDay = strtotime($weekFirstDate);
            $weekLastDate = date('Y-m-d', strtotime('This Sunday', time()));

            //Define Query Parameters
            $reportParamArray['start_date'] = $weekFirstDate;
            $reportParamArray['end_date'] = $weekLastDate;

            //Define Week array
            $weekArray = array();
            for ($i = 0 ; $i < 7 ; $i++) {
                $weekArray[date('Y-m-d', $timestampFirstDay)] = 0;
                $timestampFirstDay += 24 * 3600;
            }

            $rechargeArray = $this->registry->model->run('getRechargeReport', $reportParamArray);
            foreach($rechargeArray as $rechargeKey=>$rechargeValueArray)
            {
                $weekArray[$rechargeValueArray['report_date']] = $rechargeValueArray['recharge_amount'];
            }

            //Defining the Required Values
            $this->registry->template->ReportDays = count($weekArray);
            $this->registry->template->FirstDayArray = explode("-", $weekFirstDate);
            $this->registry->template->ReportValue = implode(",", $weekArray);
        }
        /** ************************ End: Week Section ************************** */
        
        if(isset($postArray['btnMonth']) && $postArray['btnMonth'] == 'Monthly Report')
        {
            $reportType = "monthly";
            $monthFirstDate = date('Y-m-01'); // hard-coded '01' for first day
            $timestampFirstDay = strtotime($monthFirstDate);
            $monthLastDate = date('Y-m-t');
            
            //Define Query Parameters
            $reportParamArray['start_date'] = $monthFirstDate;
            $reportParamArray['end_date'] = $monthLastDate;

            $monthDayNum = General::dateDiff($monthFirstDate, $monthLastDate) + 1;
            
            //Define Month array
            $monthArray = array();
            for ($i = 0 ; $i < $monthDayNum ; $i++) {
                $monthArray[date('Y-m-d', $timestampFirstDay)] = 0;
                $timestampFirstDay += 24 * 3600;
            }

            $rechargeArray = $this->registry->model->run('getRechargeReport', $reportParamArray);
            foreach($rechargeArray as $rechargeKey=>$rechargeValueArray)
            {
                $monthArray[$rechargeValueArray['report_date']] = $rechargeValueArray['recharge_amount'];
            }
            
            //Defining the Required Values
            $this->registry->template->ReportDays = count($monthArray);
            $this->registry->template->FirstDayArray = explode("-", $monthFirstDate);
            $this->registry->template->ReportValue = implode(",", $monthArray);

        }
        
        $this->registry->template->ReportType = $reportType;
        $this->registry->template->show("recharge_report");
    }
    
    public function customer_report()
    {
        $this->registry->template->Title = "Inventory Management System :: Customer Registration Report Page";
        $reportyType = 'Weekly';
        $postArray = $this->requestPost();
        
        /** ************************ Start: Week Section ************************** */
        if($postArray['btnMonth'] != 'Monthly Report' && $postArray['btnYear'] != 'Yearly Report')
        {
            $reportType = "Weekly";
            //Get the First and Last Date of Week
            $weekFirstDate = date('Y-m-d', strtotime('Last Monday', time()));
            $timestampFirstDay = strtotime($weekFirstDate);
            $weekLastDate = date('Y-m-d', strtotime('This Sunday', time()));

            //Define Query Parameters
            $reportParamArray['start_date'] = $weekFirstDate;
            $reportParamArray['end_date'] = $weekLastDate;

            //Define Week array
            $weekArray = array();
            for ($i = 0 ; $i < 7 ; $i++) {
                $weekArray[date('Y-m-d', $timestampFirstDay)] = 0;
                $timestampFirstDay += 24 * 3600;
            }

            $customerCountArray = $this->registry->model->run('getCustomerReport', $reportParamArray);
            foreach($customerCountArray as $customerCountKey=>$customerCountValueArray)
            {
                $weekArray[$customerCountValueArray['report_date']] = $customerCountValueArray['customer_count'];
            }

            //Defining the Required Values
            $this->registry->template->ReportDays = count($weekArray);
            $this->registry->template->FirstDayArray = explode("-", $weekFirstDate);
            $this->registry->template->ReportValue = implode(",", $weekArray);
        }
        /** ************************ End: Week Section ************************** */
        
        if(isset($postArray['btnMonth']) && $postArray['btnMonth'] == 'Monthly Report')
        {
            $reportType = "monthly";
            $monthFirstDate = date('Y-m-01'); // hard-coded '01' for first day
            $timestampFirstDay = strtotime($monthFirstDate);
            $monthLastDate = date('Y-m-t');
            
            //Define Query Parameters
            $reportParamArray['start_date'] = $monthFirstDate;
            $reportParamArray['end_date'] = $monthLastDate;

            $monthDayNum = General::dateDiff($monthFirstDate, $monthLastDate) + 1;
            
            //Define Month array
            $monthArray = array();
            for ($i = 0 ; $i < $monthDayNum ; $i++) {
                $monthArray[date('Y-m-d', $timestampFirstDay)] = 0;
                $timestampFirstDay += 24 * 3600;
            }

            $customerCountArray = $this->registry->model->run('getCustomerReport', $reportParamArray);
            foreach($customerCountArray as $customerCountKey=>$customerCountValueArray)
            {
                $monthArray[$customerCountValueArray['report_date']] = $customerCountValueArray['customer_count'];
            }
            
            //Defining the Required Values
            $this->registry->template->ReportDays = count($monthArray);
            $this->registry->template->FirstDayArray = explode("-", $monthFirstDate);
            $this->registry->template->ReportValue = implode(",", $monthArray);

        }
        
        $this->registry->template->ReportType = $reportType;
        $this->registry->template->show("customer_report");
    }
}

?>
