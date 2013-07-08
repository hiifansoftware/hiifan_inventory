<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the categoryModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 20 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class categoryModel extends SaanModel
{
    public function getAllProductCategory($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT * FROM product_category_details ORDER BY product_category_id DESC ";

        return $this->db->paginateQuery($query, $start);
    }
    
    public function getProductCategoryList()
    {
        $query = "SELECT * FROM product_category_details WHERE product_category_status = 'active' ORDER BY product_category_id DESC ";
        return $this->db->fetch_rows($query);
    }

    public function addNewProductCategory($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $dataArray = array('product_category_name' => $postArray['product_category_name'],
                                'product_category_desc' => $postArray['product_category_desc'],
                                'product_category_status' => $postArray['product_category_status'],
                                'product_category_datetime' => $postArray['product_category_datetime']);
            return $this->db->query_insert('product_category_details', $dataArray);
        }
    }
    
    public function deleteProductCategory($productCategoryId)
    {
        if(isset($productCategoryId) && $productCategoryId != '')
        {
            $query = "DELETE FROM product_category_details WHERE product_category_id = '$productCategoryId'";
            return $this->db->query($query);
        }
    }
    
    public function activateProductCategory($productCategoryId)
    {
        if(isset($productCategoryId) && $productCategoryId != '')
        {
            $query = "UPDATE product_category_details SET product_category_status = 'active' WHERE product_category_id = '$productCategoryId'";
            return $this->db->query($query);
        }
    }
    
    public function deactivateProductCategory($productCategoryId)
    {
        if(isset($productCategoryId) && $productCategoryId != '')
        {
            $query = "UPDATE product_category_details SET product_category_status = 'inactive' WHERE product_category_id = '$productCategoryId'";
            return $this->db->query($query);
        }
    }
    
    public function getProductCategoryById($productCategoryId)
    {
        if(isset($productCategoryId) && $productCategoryId != '')
        {
            $query = "SELECT * FROM product_category_details WHERE product_category_id = '$productCategoryId'";
            return $this->db->fetch_rows($query);
        }
    }
    
    public function updateProductCategoryById($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "UPDATE product_category_details SET product_category_name = '" . $postArray['product_category_name'] . "',
                                                            product_category_desc = '" . $postArray['product_category_desc'] . "',
                                                            product_category_status = '" . $postArray['product_category_status'] . "'
                                                        WHERE product_Category_id = '" . $postArray['product_category_id'] . "'";
            return $this->db->query($query);
        }
    }
}
?>
