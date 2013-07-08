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
class installModel extends SaanModel
{
    public function create_db($args)
    {
        if (is_array($args) and count($args) > 0) {
            $stmt = $args['stmt'];
            return $this->db->query($stmt);
        }
    }

    public function addStoreConfig($args)
    {
        if (is_array($args) && count($args) > 0) {
            $storeDataArray = array('store_name' => $args['store_name'],
                'store_title' => $args['store_title'],
                'store_tagline' => $args['store_tagline'],
                'store_datetime' => $args['store_datetime']
            );
            if ($storeIdValue = $this->db->query_insert('store_details', $storeDataArray)) {
                $adminDataArray = array('store_id' => $storeIdValue,
                    'store_user_name' => $args['admin_username'],
                    'store_user_password' => $args['admin_password'],
                    'store_user_fullname' => $args['admin_fullname'],
                    'store_user_type' => 'admin',
                    'store_user_datetime' => $args['store_datetime']
                );

                if ($this->db->query_insert('store_user_details', $adminDataArray)) {
                    return $storeIdValue;
                }
            }

        }
    }
    
}
