<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- ------------------------- Start: Head Section ----------------------------- -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?=$Title?></title>
    <!-- ----------------------- Start: Style Includes ------------------------------- -->
    <link rel="stylesheet" href="<?=__EXTERNAL_URL?>form_design/styles/uniform.default.css" media="screen"/>
    <link rel="stylesheet" href="<?=__EXTERNAL_URL?>clock/clock_css.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?=__TEMPLATE_URL?>styles/styles.css"/>
    <!-- ----------------------- End: Style Includes ------------------------------- -->

    <!-- ----------------------- Start: Scripts Includes ------------------------------- -->
    <script language="javascript" type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/script.js"></script>
    <script src="<?=__EXTERNAL_URL?>form_design/scripts/jquery.uniform.js" type="text/javascript"></script>
    <script src="<?=__EXTERNAL_URL?>clock/clock_js.js" type="text/javascript"></script>
    <script src="<?=__EXTERNAL_URL?>clock/moreskins.js" type="text/javascript"></script>
    <!-- ----------------------- End: Scripts Includes ------------------------------- -->
    
    <!-- ---------------------- Start: Custom Scripts ---------------------------------- -->
    <script language="javascript">
        $(document).ready(function(){
           var controllerName = "<?php echo $ControllerName; ?>";
           $('#' + controllerName).removeClass().addClass('menu_button red_button')
        });
    </script>
    <!-- ---------------------- Start: Custom Scripts ---------------------------------- -->