<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the userController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 22 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class userController extends SaanController
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
     * @param type $args
     */
    public function view_user($args)
    {
        General::checkAccess('user_view');
        $this->registry->template->Title = "Inventory Management System :: User List Page";
        
        $userArray = $this->registry->model->run("getAllUser", $args);
        $this->registry->template->PresentPage = $args['start_page'];
        $this->registry->template->UserArray = $userArray;
        $this->registry->template->show("view_user");
    }

    /**
     * 
     */
    public function add_user()
    {
        General::checkAccess('user_add');
        $this->registry->template->Title = "Inventory Management System :: Add User";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray))
            {
                foreach($postArray as $postKey=>$postValue)
                {
                    if($postKey != 'btnSubmit')
                    {
                        if($this->registry->validation->isEmpty($postValue))
                        {
                            $_SESSION['error'][] = ucwords(str_replace("_", " ", $postKey)) . " is a required field";
                        }
                    }
                }
                if(count($_SESSION['error']) == 0)
                {
                    $postArray['store_user_datetime'] = time();
                    $postArray['store_id'] = 1;
                    $postArray['store_user_password'] = $this->registry->security->encryptData($postArray['store_user_password']);
                    if($lastUserId = $this->registry->model->run('addNewUser', $postArray))
                    {
                        $_SESSION['success'] = "User added successfully";
                        General::Redirect(__SITE_URL . '/user/add_user');
                    }
                }
                else
                {
                    $this->registry->template->RetainArray = $postArray;
                }
            }
        }
        $this->registry->template->show("add_user");
    }
    
    /**
     * 
     * @param type $args
     */
    public function edit_user($args)
    {
        General::checkAccess('user_edit');
        $this->registry->template->Title = "Inventory Management System :: Edit User";
        
        $userId = $this->registry->security->decryptData($args['store_user_id']);
        $userAssocArray = $this->registry->model->run('getUserById', $userId);
        foreach($userAssocArray[0] as $userAssocKey=>$userAssocValue)
        {
            $userArray[$userAssocKey] = $userAssocValue;
        }
        $userArray['store_user_password'] = $this->registry->security->decryptData($userArray['store_user_password']);
        
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray))
            {
                foreach($postArray as $postKey=>$postValue)
                {
                    if($postKey != 'btnSubmit')
                    {
                        if($this->registry->validation->isEmpty($postValue))
                        {
                            $_SESSION['error'][] = ucwords(str_replace("_", " ", $postKey)) . " is a required field";
                        }
                    }
                }
                if(count($_SESSION['error']) == 0)
                {
                    $postArray['store_user_id'] = $userId;
                    $postArray['store_id'] = 1;
                    $postArray['store_user_password'] = $this->registry->security->encryptData($postArray['store_user_password']);
                    if($this->registry->model->run('updateUserById', $postArray))
                    {
                        $_SESSION['success'] = "User Updated successfully";
                        General::Redirect($_SERVER['HTTP_REFERER']);
                    }
                }
                else
                {
                    $this->registry->template->RetainArray = $postArray;
                }
            }
        }
        else
        {
            $this->registry->template->RetainArray = $userArray;
        }
        $this->registry->template->show("edit_user");
    }
    
    /**
     * 
     * @param type $args
     */
    public function deleteUser($args)
    {
        General::checkAccess('user_delete');
        $storeUserId = $this->registry->security->decryptData($args['store_user_id']);
        $this->registry->model->run('deleteUser', $storeUserId);
        $_SESSION['success'] = "User Deleted Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function activateUser($args)
    {
        General::checkAccess('user_acid');
        $storeUserId = $this->registry->security->decryptData($args['store_user_id']);
        $this->registry->model->run('activateUser', $storeUserId);
        $_SESSION['success'] = "User Activated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function deactivateUser($args)
    {
        General::checkAccess('user_acid');
        $storeUserId = $this->registry->security->decryptData($args['store_user_id']);
        $this->registry->model->run('deactivateUser', $storeUserId);
        $_SESSION['success'] = "User Deactivated Successfully";
        General::redirect($_SERVER['HTTP_REFERER']);
        exit;
    }
    
    /**
     * 
     * @param type $args
     */
    public function assign_module($args)
    {
        General::checkAccess('user_acid');
        $this->registry->template->Title = "Inventory Management System :: User List Page";
        $storeUserId = $this->registry->security->decryptData($args['store_user_id']);
        $userAssocArray = $this->registry->model->run("getUserRightsById", $storeUserId);
        foreach($userAssocArray[0] as $userValueKey=>$userValueArray)
        {
            $userArray[$userValueKey] = $userValueArray;
        }
        
        $this->registry->template->UserArray = $userArray;
        $this->registry->template->UserRightArray = unserialize($userArray['user_rights']);
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
        
            foreach($postArray as $postKey=>$postValue)
            {
                if($postKey != 'btnSubmit')
                $finalArray[$postKey] = $postValue;
            }
            
            $userRightsSerialized = serialize($finalArray);
            $finalArray['serialize_value'] = $userRightsSerialized;
            $finalArray['user_id'] = $userArray['store_user_id'];
            if($this->registry->model->run('addUserRights', $finalArray))
            {
                $_SESSION['success'] = "User Rights Assigned Successfully";
                General::redirect($_SERVER['HTTP_REFERER']);
            }else
            {
                $_SERVER['error'][] = "Problem while assigning rights. Please Try Again";
            }
        }
        $this->registry->template->show("assign_module");
    }
    
}

?>
