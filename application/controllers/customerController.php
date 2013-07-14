<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the customerController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class customerController extends SaanController{
    
    public function index()
    {
        General::jsAlert(__SITE_URL . 'customer/add_customer');
    }
    
    public function add_customer()
    {
        $this->registry->template->Title = "Inventory Management System :: Add Customer Page";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                foreach($postArray as $postKey => $postValue)
                {
                    if($postKey != 'btnSubmit')
                    {
                        if($this->registry->validation->isEmpty($postValue))
                        {
                            $_SESSION['error'][] = ucwords(str_replace("_", " ", $postKey)) . " is a required field";
                        }
                    }
                }
                
                if(count($_SESSION['error']) == 0)
                {
                    if($this->registry->validation->validateEmail($postArray['customer_email']) != true)
                    {
                        $_SESSION['error'][] = "Invalid Email Address Format";
                    }
                    
                    if($this->registry->validation->checkDateFormat($postArray['customer_dob']) === false)
                    {
                        $_SESSION['error'][] = "Invalid Date of Birth Format";
                    }
                    if(count($_SESSION['error']) == 0)
                    {
                        $settingArray['setting_name'] = 'store_type';
                        $settingArray = $this->registry->model->run('getSettingBySettingName', $settingArray);
                     
                        if(is_array($settingArray) && count($settingArray) > 0)
                        {
                            if($settingArray[0]['setting_value'] == 'offline')
                            {
                                $cardnumberArray = $this->registry->model->run('getFreshCard');
                                if(is_array($cardnumberArray) && count($cardnumberArray) > 0)
                                {
                                    $postArray['customer_card_number'] = $cardnumberArray[0]['cardnumber_value'];
                                    if(isset($cardnumberArray[0]['cardnumber_value']) && $cardnumberArray[0]['cardnumber_value'] != '')
                                    {
                                        $postArray['customer_reg_date'] = time();
                                        $postArray['customer_dob'] = strtotime($postArray['customer_dob']);
                                        unset($postArray['btnSubmit']);
                                        $customerNum = $this->registry->model->run('getCustomerByEmail', $postArray);
                                        if($customerNum < 1)
                                        {
                                            if($this->registry->model->run('addNewCustomer', $postArray))
                                            {
                                                if($this->registry->model->run('updateFreshCard', $postArray))
                                                {
                                                    $_SESSION['success'] = "New customer Added Succesfully with Card Number: <strong>" . $postArray['customer_card_number'] . "</strong>";
                                                    General::jsRedirect($_SERVER['HTTP_REFERER']);
                                                    exit;
                                                }
                                                else
                                                {
                                                    $_SESSION['error'][] = "Problem with registration. Please Try Again";
                                                }
                                            }
                                        }
                                        else
                                        {
                                            $_SESSION['error'][] = "Email Address and DOB is already prenset in Database";
                                        }

                                    }
                                    else
                                    {
                                        $_SESSION['error'][] = "Registration Incomplete as there is no cardnumber to assign to the customer.";
                                    }
                                }
                                else
                                {
                                    $_SESSION['error'][] = "Registration Incomplete as there is no cardnumber to assign to the customer.";
                                }
                            }
                            else if($settingArray[0]['setting_value'] == 'online')
                            {
                                $customerNum = $this->registry->model->run('getCustomerByEmail', $postArray);
                                if($customerNum < 1)
                                {
                                    $url = 'http://www.hiifan.com/api/newCardEntry/';

                                    $fields = array('email_address' => $this->registry->security->encryptData($postArray['customer_email']));
                                    $fields_string = '';
                                    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
                                    rtrim($fields_string, '&');
                                    $ch = curl_init();
                                    //set the url, number of POST vars, POST data
                                    curl_setopt($ch,CURLOPT_URL, $url);
                                    curl_setopt($ch,CURLOPT_POST, count($fields));
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                    $result = curl_exec($ch);
                                    $resultArray = json_decode($result);
                                    $registerStatus = $this->registry->security->decryptData($resultArray->output);
                                    $statusArray = explode('-^-', $registerStatus);
                                    if($statusArray[0] == 'success')
                                    {
                                        $postArray['customer_card_number'] = $statusArray[1];
                                        $postArray['customer_reg_date'] = time();
                                        $postArray['customer_dob'] = strtotime($postArray['customer_dob']);
                                        unset($postArray['btnSubmit']);
                                        if($this->registry->model->run('addNewCustomer', $postArray))
                                        {
                                            $_SESSION['success'] = "New customer Added Succesfully with Card Number: <strong>" . $postArray['customer_card_number'] . "</strong>";
                                            General::jsRedirect($_SERVER['HTTP_REFERER']);
                                            exit;
                                        }
                                        else
                                        {
                                            $_SESSION['error'][] = "Problem Registering customer. Please Try Again";
                                        }
                                    }
                                }
                                else
                                {
                                    $_SESSION['error'][] = "Email Address and DOB is already prenset in Database";
                                }
                            }
                        }
                    }
                    
                }
                $this->registry->template->RetainArray = $postArray;
            }
        }
        $this->registry->template->show("add_customers");
    }
    
    public function recharge_card()
    {
        $this->registry->template->Title = "Inventory Management System :: Recharge Card Page";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                if(isset($postArray['btnSubmitCard']) && $postArray['btnSubmitCard'] == 'Add Recharge Value')
                {
                    foreach($postArray as $postKey=>$postValue)
                    {
                        if($postKey != 'btnSubmitCard')
                        {
                            if($this->registry->validation->isEmpty($postValue))
                            {
                                $_SESSION['error'][] = ucwords(str_replace("_", " ", $postKey)) . " is a required field";
                            }
                        }
                    }
                    if(count($_SESSION['error']) == 0)
                    {
                        if($this->registry->model->run('rechargeByCard', $postArray))
                        {
                            $_SESSION['success'] = "Recharge Successfull";
                            General::jsRedirect($_SERVER['HTTP_REFERER']);
                            exit;
                        }
                    }
                }
                else if(isset($postArray['btnSubmitDOB']) && $postArray['btnSubmitDOB'] == 'Add Recharge Value')
                {
                    foreach($postArray as $postKey=>$postValue)
                    {
                        if($postKey != 'btnSubmitDOB')
                        {
                            if($this->registry->validation->isEmpty($postValue))
                            {
                                $_SESSION['error'][] = ucwords(str_replace("_", " ", $postKey)) . " is a required field";
                            }
                        }
                    }
                    if($this->registry->validation->validateEmail($postArray['customer_email']) != true)
                    {
                        $_SESSION['error'][] = "Invalid Email Address Format";
                    }
                    
                    if($this->registry->validation->checkDateFormat($postArray['customer_dob']) === false)
                    {
                        $_SESSION['error'][] = "Invalid Date of Birth Format";
                    }
                    
                    if(count($_SESSION['error']) == 0)
                    {
                        if($this->registry->model->run('rechargeCardByEmailnDob', $postArray))
                        {
                            $_SESSION['success'] = "Recharge Successfull";
                            General::jsRedirect($_SERVER['HTTP_REFERER']);
                            exit;
                        }
                    }
                    
                }
                $this->registry->template->RetainArray = $postArray;
            }
        }
        $this->registry->template->show("recharge_card");
    }
    
    public function getCreditByCard()
    {
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                $customerCardNumberArray = $this->registry->model->run('getCreditByCard', $postArray);
                if(is_array($customerCardNumberArray) && count($customerCardNumberArray) > 0)
                {
                    echo json_encode($customerCardNumberArray[0]);
                }
            }
        }
    }
    
    public function getCreditByEmailnDOB()
    {
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                $customerCardNumberArray = $this->registry->model->run('getCreditByEmailnDOB', $postArray);
                if(is_array($customerCardNumberArray) && count($customerCardNumberArray) > 0)
                {
                    echo json_encode($customerCardNumberArray[0]);
                }
            }
        }
    }
    
}

?>
