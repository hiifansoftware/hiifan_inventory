<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the settingsModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class settingsModel extends SaanModel {
    
    public function getAllSettings()
    {
        $query = "SELECT setting_name, setting_value FROM setting_details WHERE setting_status = 'active'";
        return $this->db->fetch_rows($query);
    }
    
    public function updateStoreDetails($postArray)
    {
        if(is_array($postArray) && count($postArray) > 0)
        {
            foreach($postArray as $postKey=>$postValue)
            {
                if($postKey != 'btnSubmit')
                {
                    $query = "UPDATE setting_details SET setting_value = '" . $postValue . "'
                                                WHERE setting_name = '" . $postKey . "'";
                    
                    $this->db->query($query);
                }
            }
            return true;
        }
        return false;
    }
    
}

?>
