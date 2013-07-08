<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the categoryController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 20 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

class categoryController extends SaanController
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
    public function view_product_category($args)
    {
        General::checkAccess('category_view');
        $this->registry->template->Title = "Inventory Management System :: Product Category Page";
        $productCategoryArray = $this->registry->model->run("getAllProductCategory", $args);
        $this->registry->template->PresentPage = $args['start_page'];
        $this->registry->template->ProductCategoryArray = $productCategoryArray;
        $this->registry->template->show("view_product_category");
    }

    /**
     * 
     */
    public function add_product_category()
    {
        General::checkAccess('category_add');
        $this->registry->template->Title = "Inventory Management System :: Add Product Category";
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
                    $postArray['product_category_datetime'] = time();
                    if($lastProductId = $this->registry->model->run('addNewProductCategory', $postArray))
                    {
                        /** ************ Start: Cache Product Category **********/
                        $productCategoryListArray = $this->registry->model->run('getProductCategoryList');
                        CacheHandler::cache_content('productCategoryArray', $productCategoryListArray);
                        /** ************ End: Cache Product Category **********/
                        $_SESSION['success'] = "Product Category added successfully";
                        General::Redirect(__SITE_URL . '/category/add_product_category');
                    }
                }
                else
                {
                    $this->registry->template->RetainArray = $postArray;
                }
            }
        }
        $this->registry->template->show("add_product_category");
    }
    
    /**
     * 
     * @param type $args
     */
    public function edit_product_category($args)
    {
        General::checkAccess('category_edit');
        $this->registry->template->Title = "Inventory Management System :: Edit Product Category";
        
        $productCategoryId = $this->registry->security->decryptData($args['product_category_id']);
        $productCategoryAssocArray = $this->registry->model->run('getProductCategoryById', $productCategoryId);
        foreach($productCategoryAssocArray[0] as $prodCatAssocKey=>$prodCatAssocValue)
        {
            $productCategoryArray[$prodCatAssocKey] = $prodCatAssocValue;
        }
        
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
                    $postArray['product_category_id'] = $productCategoryId;
                    if($this->registry->model->run('updateProductCategoryById', $postArray))
                    {
                        /** ************ Start: Cache Product Category **********/
                        $productCategoryListArray = $this->registry->model->run('getProductCategoryList');
                        CacheHandler::cache_content('productCategoryArray', $productCategoryListArray);
                        /** ************ End: Cache Product Category **********/
                        $_SESSION['success'] = "Product Category Updated successfully";
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
            $this->registry->template->RetainArray = $productCategoryArray;
        }
        $this->registry->template->show("edit_product_category");
    }
    
    /**
     * 
     * @param type $args
     */
    public function deleteProductCategory($args)
    {
        General::checkAccess('category_delete');
        $productCategoryId = $this->registry->security->decryptData($args['product_category_id']);
        $this->registry->model->run('deleteProductCategory', $productCategoryId);
        /** ************ Start: Cache Product Category **********/
        $productCategoryListArray = $this->registry->model->run('getProductCategoryList');
        CacheHandler::cache_content('productCategoryArray', $productCategoryListArray);
        /** ************ End: Cache Product Category **********/
        $_SESSION['success'] = "Product Category Deleted Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function activateProductCategory($args)
    {
        General::checkAccess('category_acid');
        $productCategoryId = $this->registry->security->decryptData($args['product_category_id']);
        $this->registry->model->run('activateProductCategory', $productCategoryId);
        /** ************ Start: Cache Product Category **********/
        $productCategoryListArray = $this->registry->model->run('getProductCategoryList');
        CacheHandler::cache_content('productCategoryArray', $productCategoryListArray);
        /** ************ End: Cache Product Category **********/
        $_SESSION['success'] = "Product Category Activated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function deactivateProductCategory($args)
    {
        General::checkAccess('category_acid');
        $productCategoryId = $this->registry->security->decryptData($args['product_category_id']);
        $this->registry->model->run('deactivateProductCategory', $productCategoryId);
        /** ************ Start: Cache Product Category **********/
        $productCategoryListArray = $this->registry->model->run('getProductCategoryList');
        CacheHandler::cache_content('productCategoryArray', $productCategoryListArray);
        /** ************ End: Cache Product Category **********/
        $_SESSION['success'] = "Product Category Deactivated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
}

?>
