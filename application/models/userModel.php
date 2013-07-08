<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the userModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 22 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class userModel extends SaanModel{
    
    public function getAllUser($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT * FROM store_user_details ORDER BY store_user_id DESC ";

        return $this->db->paginateQuery($query, $start);
    }

    public function addNewUser($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $dataArray = array('store_user_fullname' => $postArray['store_user_fullname'],
                                'store_user_name' => $postArray['store_user_name'],
                                'store_user_password' => $postArray['store_user_password'],
                                'store_user_status' => $postArray['store_user_status'],
                                'store_user_type' => $postArray['store_user_type'],
                                'store_user_datetime' => $postArray['store_user_datetime']);
            return $this->db->query_insert('store_user_details', $dataArray);
        }
    }
    
    public function deleteUser($userId)
    {
        if(isset($userId) && $userId != '')
        {
            $query = "DELETE FROM store_user_details WHERE store_user_id = '" . $userId . "'";
            return $this->db->query($query);
        }
    }
    
    public function activateUser($userId)
    {
        if(isset($userId) && $userId != '')
        {
            $query = "UPDATE store_user_details SET store_user_status = 'active' WHERE store_user_id = '$userId'";
            return $this->db->query($query);
        }
    }
    
    public function deactivateUser($userId)
    {
        if(isset($userId) && $userId != '')
        {
            $query = "UPDATE store_user_details SET store_user_status = 'inactive' WHERE store_user_id = '$userId'";
            return $this->db->query($query);
        }
    }
    
    public function getUserById($userId)
    {
        if(isset($userId) && $userId != '')
        {
            $query = "SELECT * FROM store_user_details WHERE store_user_id = '$userId'";
            return $this->db->fetch_rows($query);
        }
    }
    
    public function updateUserById($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $query = "UPDATE store_user_details SET store_user_name = '" . $postArray['store_user_name'] . "',
                                                            store_user_fullname = '" . $postArray['store_user_fullname'] . "',
                                                            store_user_password = '" . $postArray['store_user_password'] . "',
                                                            store_user_status = '" . $postArray['store_user_status'] . "',
                                                            store_user_type = '" . $postArray['store_user_type'] . "'
                                                        WHERE store_user_id = '" . $postArray['store_user_id'] . "'";
            return $this->db->query($query);
        }
    }
    
    public function addUserRights($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            $deleteQuery = "DELETE FROM user_function_details WHERE user_id = '" . $postArray['user_id'] . "'";
            if($this->db->query($deleteQuery))
            {
                $dataArray = array('user_id' => $postArray['user_id'],
                                    'user_rights' => $postArray['serialize_value']);
                return $this->db->query_insert('user_function_details', $dataArray);
                
            }
            return false;
        }
    }
    
    public function getUserRightsById($userId)
    {
        if(isset($userId) && $userId != '')
        {
            $query = "SELECT U.store_user_id, U.store_user_fullname, UR.* FROM user_function_details UR INNER JOIN store_user_details U ON UR.user_id = U.store_user_id WHERE UR.user_id = '" . $userId . "'";
            $queryArray = $this->db->fetch_rows($query);
            if(count($queryArray) == 0)
            {
               $query = "SELECT * FROM store_user_details WHERE store_user_id = '" . $userId . "'";
               return $this->db->fetch_rows($query);
            }
            return $queryArray;
        }
    }
}

?>
