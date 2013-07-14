<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the billingController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class billingController extends SaanController{
    
    public function index()
    {
        
    }
    
    public function new_bill()
    {
        $this->registry->template->Title = "Inventory Management System :: Bill Page";
        $this->registry->template->show('new_bill');
    }
    
    public function finalize_payment()
    {
        $this->registry->template->Title = "Inventory Management System :: Bill Page";
        if($this->isPostBack() || isset($_SESSION['itemPostArray']))
        {
            if(!isset($_SESSION['itemPostArray']))
            {
                $_SESSION['itemPostArray'] = $this->requestPost();
            }
            $postArray = $_SESSION['itemPostArray'];
            $postSize = count($postArray);
            $postSize = $postSize - 1;
            $postSize = ($postSize / 5) - 1;
            $itemArray = array();
            $totalPriceValue = 0;
            for($i=1; $i <= $postSize; $i++)
            {
                $itemArray[$i]['product_code'] = $postArray[$i];
                $itemArray[$i]['product_quantity'] = $postArray['hdnQuantity'.$i];
                $itemArray[$i]['product_rate'] = $postArray['hdnRate'.$i];
                $itemArray[$i]['product_price'] = $postArray['hdnPrice'.$i];
                $totalPriceValue = $totalPriceValue + $itemArray[$i]['product_price'];
            }
            $this->registry->template->TotalPriceValue = $totalPriceValue;
            $this->registry->template->ItemArray = $itemArray;
            $_SESSION['purchase_item_array'] = $itemArray;
        }
        $this->registry->template->show('finalize_payment');
    }
    
    public function do_final_payment()
    {
        $this->registry->template->Title = "Inventory Management System :: Bill Page";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($postArray['btnCardSubmit'] == 'Complete Transaction')
            {
                $postArray['post_type'] = 'card';
            }
            elseif($postArray['btnEmailSubmit'] == 'Complete Transaction')
            {
                $postArray['post_type'] = 'email';
            }
            $postArray['purchase_item_array'] = $_SESSION['purchase_item_array'];
            foreach($_SESSION['purchase_item_array'] as $itemKey=>$itemValueArray)
            {
                $postArray['purchase_total_amount'] = $postArray['purchase_total_amount'] + $itemValueArray['product_price'];
            }
            if(is_array($postArray) && count($postArray) > 0)
            {
                if($this->registry->model->run('do_final_payment', $postArray))
                {
                    $_SESSION['success'] = 'Transaction Successfull';
                    unset($_SESSION['purchase_item_array']);
                    unset($_SESSION['itemPostArray']);
                    General::jsRedirect(__SITE_URL . 'billing/do_final_payment');
                    exit;
                }
            }
        }
        $this->registry->template->show('do_final_payment');
    }

    public function getProductByCode()
    {
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                $productAssocArray = $this->registry->model->run('getProductByCode', $postArray);
                if(is_array($productAssocArray) && count($productAssocArray) > 0)
                {
                    foreach($productAssocArray as $prodKey=>$prodArray)
                    {
                        $productArray['product_name'] = $prodArray['product_name'];
                        $productArray['product_price'] = $prodArray['product_price'];
                        echo json_encode($productArray);
                    }
                }
            }
        }
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
                    if($customerCardNumberArray[0]['customer_credit_avail'] > $postArray['total_price_value'])
                    {
                        echo "success";
                    }
                    else
                    {
                        echo $customerCardNumberArray[0]['customer_credit_avail'];
                    }
                }
                else
                {
                    echo "not-found";
                }
            }
        }
    }
    
    public function getCreditByEmail()
    {
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                $customerCardNumberArray = $this->registry->model->run('getCreditByEmail', $postArray);
                if(is_array($customerCardNumberArray) && count($customerCardNumberArray) > 0)
                {
                    if($customerCardNumberArray[0]['customer_credit_avail'] > $postArray['total_price_value'])
                    {
                        echo "success";
                    }
                    else
                    {
                        echo $customerCardNumberArray[0]['customer_credit_avail'];
                    }
                }
                else
                {
                    echo "not-found";
                }
            }
        }
    }
}

?>
