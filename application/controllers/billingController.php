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
}

?>
