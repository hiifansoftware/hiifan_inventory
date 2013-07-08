<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the reportController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 30 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class reportController extends SaanController{
    
    public function index()
    {
        
    }
    
    public function recharge_report()
    {
        $this->registry->template->Title = "Inventory Management System :: Product Page";
        $this->registry->template->show("recharge_report");
    }
}

?>
