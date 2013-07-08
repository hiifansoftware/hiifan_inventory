<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the Index controller for the Framework
 *
 * @author: Saurabh Sinha
 * @created on: 02/15/13 3:21 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
/* * ******************************************************************** */
class indexController extends SaanController {

    /**
     * @purpose: This action manages the Home page
     * @return mixed|void
     */
    public function index() {
        $this->registry->template->Title = "SAAN Infotech :: Home Page";
        if ($this->isPostBack()) {
            $postArray = $this->requestPost();
            if ($this->registry->validation->isEmpty($postArray['username'])) {
                $_SESSION['error'][] = "Username cannot be left blank";
            }
            if ($this->registry->validation->isEmpty($postArray['password'])) {
                $_SESSION['error'][] = "Password cannot be left blank";
            }
            if (count($_SESSION['error']) == 0) {
                $loginArray = $this->registry->model->run("login", $postArray);
                if (is_array($loginArray) && count($loginArray) > 0) {
                    if ($this->registry->security->decryptData($loginArray[0]['store_user_password']) == $postArray['password']) {
                        $_SESSION['store_user_name'] = $postArray['username'];
                        $_SESSION['store_user_id'] = $loginArray[0]['store_user_id'];

                        $userRightsArray = $this->registry->model->run('getUserRightsById', $_SESSION['store_user_id']);
                        $_SESSION['user_rights'] = unserialize($userRightsArray[0]['user_rights']);

                        if ($loginArray[0]['store_user_type'] != '') {
                            $_SESSION['store_admin_user'] = $postArray['username'];
                            General::redirect(__SITE_URL . 'admin/index/');
                            exit;
                        }
                    }
                } else {
                    $_SESSION['error'][] = "Invalid Login Credentials";
                }
            }
        }
        $this->registry->template->show("index");
    }

}
