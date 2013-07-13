<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the productModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 20 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class productModel extends SaanModel
{
    public function getAllProduct($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT P.*, PC.product_category_name FROM product_details P INNER JOIN product_category_details PC ON P.product_category_id = PC.product_category_id ORDER BY P.product_id DESC ";

        return $this->db->paginateQuery($query, $start);
    }

    public function addNewProduct($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $dataArray = array('product_name' => $postArray['product_name'],
                                'product_desc' => $postArray['product_desc'],
                                'product_quantity' => $postArray['product_quantity'],
                                'product_status' => $postArray['product_status'],
                                'product_datetime' => $postArray['product_datetime'],
                                'product_category_id'=> $postArray['product_category_name']);
            return $this->db->query_insert('product_details', $dataArray);
        }
    }
    
    public function updateProductById($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "UPDATE product_details SET product_name = '" . $postArray['product_name'] . "',
                                                product_desc = '" . $postArray['product_desc'] . "',
                                                product_quantity = '" . $postArray['product_quantity'] . "',
                                                product_category_id = '" . $postArray['product_category_id'] . "',
                                                product_status = '" . $postArray['product_status'] . "'
                                                    WHERE product_id = '" . $postArray['product_id'] . "'";
            return $this->db->query($query);
        }
    }

    public function deleteProduct($productId)
    {
        if(isset($productId) && $productId != '')
        {
            $query = "DELETE FROM product_details WHERE product_id = '$productId'";
            return $this->db->query($query);
        }
    }
    
    public function getProductById($productId)
    {
        if(isset($productId) && $productId != '')
        {
            $query = "SELECT * FROM product_details WHERE product_id = '$productId'";
            return $this->db->fetch_rows($query);
        }
    }

    public function activateProduct($productId)
    {
        if(isset($productId) && $productId != '')
        {
            $query = "UPDATE product_details SET product_status = 'active' WHERE product_id = '$productId'";
            return $this->db->query($query);
        }
    }
    
    public function deactivateProduct($productId)
    {
        if(isset($productId) && $productId != '')
        {
            $query = "UPDATE product_details SET product_status = 'inactive' WHERE product_id = '$productId'";
            return $this->db->query($query);
        }
    }
    
    public function getAllProductCategory()
    {
        $query = "SELECT * FROM product_category_details WHERE product_category_status = 'active' ORDER BY product_category_id DESC";
        return $this->db->fetch_rows($query);
    }
    
    public function updateProductByPid($args)
    {
        if(is_array($args) && count($args) > 0)
        {
            $query = "UPDATE product_details SET product_code = '" . $args['product_code'] . "' WHERE product_id = '" . $args['product_id'] . "'";
            return $this->db->query($query);
        }
    }
}

?>
