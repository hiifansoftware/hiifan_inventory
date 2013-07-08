<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the Install controller for the Framework
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
class installController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "SAAN Infotech :: Home Page";
        $this->registry->template->HostName = DBHOST;
        $this->registry->template->DBUser = DBUSER;
        $this->registry->template->DBPass = DBPASS;
        $this->registry->template->DBName = DBNAME;
        $this->registry->template->show("install_db");
    }

    public function createDB()
    {
        $sqlFileToExecute = __BACKUP_PATH . "/db/inventory.sql";
        $f = fopen($sqlFileToExecute, "r+");
        $sqlFile = fread($f, filesize($sqlFileToExecute));
        $sqlArray = explode(';', $sqlFile);
        foreach ($sqlArray as $stmt) {
            if (strlen($stmt) > 3 && substr(ltrim($stmt), 0, 2) != '/*') {
                $args['stmt'] = $stmt;
                $result = $this->registry->model->run("create_db", $args);
                if (!$result) {
                    $this->registry->template->ProblemSql = $stmt;
                    break;
                }
            }
        }
        if ($this->registry->template->ProblemSql == '') {
            echo "done";
            exit;
        }
    }

    public function store_config()
    {
        $this->registry->template->Title = "SAAN Infotech :: Home Page";
        if ($this->isPostBack()) {
            $postArray = $this->requestPost();
            foreach ($postArray as $postKey => $postValue) {
                if ($postKey != "btnSubmit") {
                    if ($this->registry->validation->isEmpty($postValue)) {
                        $controlName = ucwords(str_replace("_", " ", $postKey));
                        $_SESSION['error'][] = "$controlName cannot be left blank";
                    }
                }
            }
            if (count($_SESSION['error']) == 0) {
                $postArray['store_datetime'] = time();
                $postArray['admin_password'] = $this->registry->security->encryptData($postArray['admin_password']);
                if ($this->registry->model->run('addStoreConfig', $postArray)) {
                    $_SESSION['success'] = "Store Configuration Saved Successfully!";
                    General::redirect(__SITE_URL . 'install/install_success/');
                    exit;
                } else {
                    $_SESSION['error'][] = "Something Went Wrong! Please try Again.";
                }

            } else {
                $this->registry->template->RetainArray = $postArray;
            }

        }
        $this->registry->template->show("store_config");
    }

    public function install_success()
    {
        $this->registry->template->Title = "SAAN Infotech :: Home Page";
        $this->registry->template->show("install_success");
    }
}
