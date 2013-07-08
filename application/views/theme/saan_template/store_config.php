<?php
require_once("header.php");
?>
</head>
<!-- ------------------------- End: Head Section ----------------------------- -->
<body>
<!-- ------------------------ Start: Container Section ---------------------------- -->
<div class="container">
    <!-- ------------------------------- Start: Logo Heading Section ----------------------------- -->
    <?php require_once("head_section.php"); ?>
    <!-- ------------------------------- End: Logo Heading Section ----------------------------- -->
    <!-- ------------------------------- Start: Wrapper section ------------------------------- -->
    <div class="main_content">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left" valign="top">
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%"><h3>Welcome to <span class="red">Inventory Management System</span>
                            </h3></td>
                        </tr>
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left">
                                <!-- ----------------------------------- Start: Main content Section -------------------------------- -->
                                <form action="" method="post" enctype="multipart/form-data" name="frmInstall"
                                      id="frmInstall">
                                    <table width="90%" border="0" align="center" class="shadow">
                                        <tr>
                                            <td colspan="2" class="page_heading"><h2>Installation of Inventory
                                                Management System - <span>Store Config Setup</span></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table align="center" width="80%" cellpadding="3" cellspacing="3">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"> <?=General::getMessage();?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Store Name:</td>
                                                        <td align="left" valign="top"><input type="text"
                                                                                             name="store_name"
                                                                                             id="store_name"
                                                                                             value="<?=$RetainArray['store_name']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Store Tag Line:</td>
                                                        <td align="left" valign="top"><input type="text"
                                                                                             name="store_tagline"
                                                                                             id="store_tagline"
                                                                                             value="<?=$RetainArray['store_tagline']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Store Logo:</td>
                                                        <td align="left" valign="top"><input type="file"
                                                                                             name="store_logo"
                                                                                             id="store_logo"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Admin Name:</td>
                                                        <td align="left" valign="top"><input type="text"
                                                                                             name="admin_name"
                                                                                             id="admin_name"
                                                                                             value="<?=$RetainArray['admin_name']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Admin Username:</td>
                                                        <td align="left" valign="top"><input type="text"
                                                                                             name="admin_username"
                                                                                             id="admin_username"
                                                                                             value="<?=$RetainArray['admin_username']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Admin Password:</td>
                                                        <td align="left" valign="top"><input type="password"
                                                                                             name="admin_password"
                                                                                             id="admin_password"
                                                                                             value="<?=$RetainArray['admin_password']?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">&nbsp;</td>
                                                        <td align="left" valign="top">
                                                            <div id="ajax_button">
                                                                <input type="submit" name="btnSubmit" id="btnSubmit"
                                                                       value="Save Store Configuration">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <!-- ----------------------------------- End: Main content Section -------------------------------- -->
                            </td>
                        </tr>
                    </table>
                    <div class="clear"></div>
                </td>
                <td align="right" valign="top" width="5%"><?php require_once('clock_section.php'); ?></td>
            </tr>
        </table>
        <div class="clear"></div>
    </div>
    <!-- ------------------------------- End: Wrapper section ------------------------------- -->
</div>
<!-- ------------------------- Start: Footer Section ---------------------------- -->
<?php require_once('footer.php'); ?>
<!-- ------------------------- End: Footer Section ---------------------------- -->
<!-- ------------------------ End: Container Section ---------------------------- -->
</body>
</html>