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
                        <!-- ------------------- Start: Dashboard Menu ---------------------------- -->
                        <?php require_once('dashboard_menu.php'); ?>
                        <!-- ------------------- End: Dashboard Menu ------------------------------ -->
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left">
                                <!-- ----------------------------------- Start: Main content Section -------------------------------- -->
                                <table width="100%" border="0" align="left" class="shadow">
                                    <tr>
                                        <td colspan="2" class="page_heading"><h2>Admin Panel :: Inventory Management
                                            System - <span>Admin Dashboard</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?=  General::getMessage()?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <form name="frmSetting" id="frmSetting" action="" method="post" enctype="multipart/form-data">
                                            <table width="60%" align="center" cellpadding="3" cellspacing="3"
                                                   border="0">
                                  <tr>
                                    <td><h3>Site Details</h3></td>
                                  </tr>
                                  <tr>
                                      
                                                    <td>Store Name:</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="store_name" id="store_name" value="<?=$RetainArray['store_name']?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Store Description</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" name="store_description" id="store_description" value="<?=$RetainArray['store_description']?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Store Logo</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="file" name="store_logo" id="store_logo"></td>
                                                </tr>
                                                <tr>
                                                    <td>Present Logo <br>
                                                    <img src="<?=__TEMPLATE_URL . 'images/' . $RetainArray['store_logo']?>" alt="Store Logo" title="Store Logo" style="max-width: 131px; max-height: 46px;">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update Store Details"></td>
                                                </tr>
                                             </table>
                                         </form>
                                      </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                <!-- ----------------------------------- End: Main content Section -------------------------------- -->
                            </td>
                        </tr>
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="top" width="5%"><?php require_once('clock_section.php'); ?></td>
            </tr>
        </table>
    </div>
    <!-- ------------------------------- End: Wrapper section ------------------------------- -->
</div>
<!-- ------------------------ End: Container Section ---------------------------- -->
<?php require_once('footer.php'); ?>
</body>
</html>
