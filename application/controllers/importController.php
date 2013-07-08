<?php

/**
 * SAAN FRAMEWORK
 *
 * @project: Inventory Management system
 * @purpose: This is the importController controller for the Framework
 *
 * @author: saurabhsinha
 * @created on: 29 Jun, 2013
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */
class importController extends SaanController{
    
    public function index()
    {
        
    }
    
    public function import_category()
    {
        $this->registry->template->Title = "Inventory Management System :: Import Category Page";
        if(isset($_FILES['import_category']['name']) && $_FILES['import_category']['name'] != '')
        {
            if($_FILES['import_category']['type'] == 'text/csv' && $_FILES['import_category']['size'] > 0)
            {
                $filename=$_FILES["import_category"]["tmp_name"];
                $file = fopen($filename, "r");
                while (($categoryData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                   $dataArray['data'] = array('product_category_name' => $categoryData[0],
                                        'product_category_desc' => $categoryData[1],
                                        'product_category_status' => $categoryData[2],
                                        'product_category_datetime' => time());
                   $dataArray['table'] = 'product_category_details';
                   $this->registry->model->run('importData', $dataArray);
                }
                fclose($file);
                $_SESSION['success'] = 'Import Done Successfull';
                General::jsRedirect($_SERVER['HTTP_REFERER']);
                exit;
            }
        }
        $this->registry->template->show("import_category");
    }
    
    public function import_product()
    {
        $this->registry->template->Title = "Inventory Management System :: Import Product Page";
        if(isset($_FILES['import_product']['name']) && $_FILES['import_product']['name'] != '')
        {
            if($_FILES['import_product']['type'] == 'text/csv' && $_FILES['import_product']['size'] > 0)
            {
                $filename=$_FILES["import_product"]["tmp_name"];
                $file = fopen($filename, "r");
                while (($categoryData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                   $dataArray['data'] = array('product_category_id' => $categoryData[0],
                                        'product_name' => $categoryData[1],
                                        'product_desc' => $categoryData[2],
                                        'product_status' => $categoryData[3],
                                        'product_datetime' => time());
                   $dataArray['table'] = 'product_details';
                   $this->registry->model->run('importData', $dataArray);
                }
                fclose($file);
                $_SESSION['success'] = 'Import Done Successfull';
                General::jsRedirect($_SERVER['HTTP_REFERER']);
                exit;
            }
        }
        $this->registry->template->show("import_product");
    }
    
    
}

?>
