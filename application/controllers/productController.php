<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the productController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 20 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class productController extends SaanController
{
    /**
     * 
     * @param type $registry
     */
    public function __construct($registry) {
        parent::__construct($registry);
        $this->registry->template->ControllerName = $this->controllerName; 
    }

    /**
     * 
     */
    public function index()
    {
        
    }

    /**
     * 
     * @param type $args
     */
    public function view_product($args)
    {
        General::checkAccess('product_view');
        $this->registry->template->Title = "Inventory Management System :: Product Page";
        $productArray = $this->registry->model->run("getAllProduct", $args);
        $this->registry->template->PresentPage = $args['start_page'];
        $this->registry->template->ProductArray = $productArray;
        $this->registry->template->show("view_product");
    }

    /**
     * 
     */
    public function add_product()
    {
        General::checkAccess('product_add');
        $this->registry->template->Title = "Inventory Management System :: Add Product";
        
        $productCategoryContentArray = CacheHandler::retrieve_cache('productCategoryArray', 80);
        $productCategoryArray = $productCategoryContentArray['content'];
        if(!is_array($productCategoryArray) || count($productCategoryArray) == 0)
        {
            $productCategoryArray = $this->getAllProductCategory();
            CacheHandler::cache_content('productCategoryArray', $productCategoryArray);
        }
        $this->registry->template->productCategoryArray = $productCategoryArray;
        
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray))
            {
                foreach($postArray as $postKey=>$postValue)
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
                    $postArray['product_datetime'] = time();
                    if($lastProductId = $this->registry->model->run('addNewProduct', $postArray))
                    {
                        $_SESSION['success'] = "Product added successfully";
                        General::Redirect(__SITE_URL . '/product/add_product');
                    }
                }
                else
                {
                    $this->registry->template->RetainArray = $postArray;
                }
            }
        }
        $this->registry->template->show("add_product");
    }
    
    /**
     * 
     * @param type $args
     */
    public function edit_product($args)
    {
        General::checkAccess('product_edit');
        $this->registry->template->Title = "Inventory Management System :: Add Product";
        $productCategoryContentArray = CacheHandler::retrieve_cache('productCategoryArray', 80);
        $productCategoryArray = $productCategoryContentArray['content'];
        if(!is_array($productCategoryArray) || count($productCategoryArray) == 0)
        {
            $productCategoryArray = $this->getAllProductCategory();
            CacheHandler::cache_content('productCategoryArray', $productCategoryArray);
        }
        
        //Get the Product Id Value
        $productId = $this->registry->security->decryptData($args['product_id']);
        //Get the Product From DB
        $productAssocArray = $this->registry->model->run('getProductById', $productId);
        foreach($productAssocArray[0] as $prodAssocKey=>$prodAssocValue)
        {
            $prodcutArray[$prodAssocKey] = $prodAssocValue;
        }
        
        $this->registry->template->productCategoryArray = $productCategoryArray;
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray))
            {
                foreach($postArray as $postKey=>$postValue)
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
                    $postArray['product_id'] = $productId;
                    if($this->registry->model->run('updateProductById', $postArray))
                    {
                        $_SESSION['success'] = "Product Updated successfully";
                        General::Redirect($_SERVER['HTTP_REFERER']);
                    }
                }
                else
                {
                    $this->registry->template->RetainArray = $postArray;
                }
            }
        }
        else
        {
            $this->registry->template->RetainArray = $prodcutArray;
        }
        $this->registry->template->show("edit_product");
    }
    
    /**
     * 
     * @param type $args
     */
    public function deleteProduct($args)
    {
        General::checkAccess('product_delete');
        $productId = $this->registry->security->decryptData($args['product_id']);
        $this->registry->model->run('deleteProduct', $productId);
        $_SESSION['success'] = "Product Deleted Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function activateProduct($args)
    {
        General::checkAccess('product_acid');
        $productId = $this->registry->security->decryptData($args['product_id']);
        $this->registry->model->run('activateProduct', $productId);
        $_SESSION['success'] = "Product Activated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function deactivateProduct($args)
    {
        General::checkAccess('product_acid');
        $productCategoryId = $this->registry->security->decryptData($args['product_id']);
        $this->registry->model->run('deactivateProduct', $productCategoryId);
        $_SESSION['success'] = "Product Deactivated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @return type
     */
    public function getAllProductCategory()
    {
        return $this->registry->model->run('getAllProductCategory');
    }
}

?>
