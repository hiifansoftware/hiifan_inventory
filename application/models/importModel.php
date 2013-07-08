<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the importModel controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class importModel extends SaanModel{
    
    public function importData($dataArray)
    {
        if(is_array($dataArray) && count($dataArray) > 0)
        {
            return $this->db->query_insert($dataArray['table'], $dataArray['data']);
        }
    }
}

?>
