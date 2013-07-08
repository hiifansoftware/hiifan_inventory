<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the settingsController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class settingsController  extends SaanController
{

    /**
     * 
     * @param type $registry
     */
    public function __construct($registry) {
        parent::__construct($registry);
        $this->registry->template->ControllerName = $this->controllerName; 
    }
    
    /**
     * 
     */
    public function index()
    {
        
    }
    
    /**
     * 
     */
    public function view_setting()
    {
        General::checkAccess('setting_edit');
        $this->registry->template->Title = "Inventory Management System :: Setting Page";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($_FILES['store_logo']['name'] != '')
            {
                if($_FILES['store_logo']['type'] != 'image/png' && $_FILES['store_logo']['type'] != 'image/x-png')
                {
                    $_SESSION['error'][] = "Image File format is not Valid. Only PNG images are wllowed.";
                }
                else
                {
                    $uploadPath = __TEMPLATE_PATH . 'images/store_logo.png';
                    move_uploaded_file($_FILES["store_logo"]["tmp_name"], $uploadPath);
                }
            }
            if(count($_SESSION['error']) == 0)
            {
                if($this->registry->model->run('updateStoreDetails', $postArray))
                {
                    $_SESSION['success'] = "Store Details Updated Successfully";
                    General::jsRedirect($_SERVER['HTTP_REFERER']);
                    exit;
                }
                else
                {
                    $_SESSION['error'][] = "Error while processing request. Please try again";
                }
            }
            
        }
        $settingAssocArray = $this->registry->model->run('getAllSettings');
        foreach($settingAssocArray as $settingKey=>$settingValue)
        {
            $settingsArray[$settingValue['setting_name']] = $settingValue['setting_value'];
        }
        $this->registry->template->RetainArray = $settingsArray;
        $this->registry->template->show("view_setting");
    }
    
}

?>
