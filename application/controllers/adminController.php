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
class adminController extends SaanController
{
    public function __construct($registry) {
        parent::__construct($registry);
        $this->registry->template->ControllerName = $this->controllerName; 
    }
    
    public function index()
    {
        $this->registry->template->Title = "Inventory Management System :: Admin Home Page";
        $this->registry->template->ProductCatCount = $this->registry->model->run('getProductCategoryCount');
        $this->registry->template->ProductCount = $this->registry->model->run('getProductCount');
        $this->registry->template->TerminalCount = $this->registry->model->run('getTerminalCount');
        $this->registry->template->AdminCount = $this->registry->model->run('getAdminCount');
        $this->registry->template->StaffCount = $this->registry->model->run('getStaffCount');
        $this->registry->template->show("admin_home");
    }
}