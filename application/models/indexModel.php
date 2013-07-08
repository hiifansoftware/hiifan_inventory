<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management System
 * @purpose: This is the Model Class for the Index Controller
 *
 * @author: Rishabh Dev Bansal
 * @created on: 02/15/13 3:17 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class indexModel extends SaanModel
{
    public function login($args)
    {
        if (is_array($args)) {
            $store_user_name = $args['username'];
            $query = "SELECT * FROM store_user_details WHERE store_user_name = '$store_user_name' AND store_user_status = 'active'";
            return $this->db->fetch_rows($query);
        }
    }
    
    public function getUserRightsById($userId)
    {
        $query = "SELECT user_rights FROM user_function_details WHERE user_id = '" . $userId . "'";
        return $this->db->fetch_rows($query);
    }
}
