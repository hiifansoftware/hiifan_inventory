<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the Admin controller for the Framework
 *
 * @author: Saurabh Sinha
 * @created on: 02/15/13 3:21 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class adminModel extends SaanModel
{
    public function getProductCategoryCount()
    {
        $query = "SELECT product_category_id FROM product_category_details WHERE product_category_status = 'active'";
        return $this->db->num_rows($query);
    }

    public function getProductCount()
    {
        $query = "SELECT product_id FROM product_details WHERE product_status = 'active'";
        return $this->db->num_rows($query);
    }

    public function getTerminalCount()
    {
        $query = "SELECT terminal_id FROM terminal_details WHERE terminal_status = 'active'";
        return $this->db->num_rows($query);
    }

    public function getAdminCount()
    {
        $query = "SELECT store_user_id FROM store_user_details WHERE store_user_status = 'active' AND store_user_type = 'admin'";
        return $this->db->num_rows($query);
    }

    public function getStaffCount()
    {
        $query = "SELECT store_user_id FROM store_user_details WHERE store_user_status = 'active' AND store_user_type = 'user'";
        return $this->db->num_rows($query);
    }

    
}
