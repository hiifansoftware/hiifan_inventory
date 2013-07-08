<?php
require_once("header.php");
?>
<link rel="stylesheet" type="text/css" href="<?=__TEMPLATE_URL?>styles/tcal.css" />
<script type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/tcal.js"></script>
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
                                            System - <span>Add New Customer</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><?=General::getMessage()?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <form name="form1" method="post" action="">
                                                <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
<tr>
                                                        <td>Customer Name:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="customer_name" id="customer_name" value="<?=$RetainArray['customer_name']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Email:</td>
                                                  </tr>
                                                    <tr>
                                                        <td><input type="text" name="customer_email" id="customer_email" value="<?=$RetainArray['customer_email']?>"></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Customer Phone Number:</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="text" name="customer_phone" id="customer_phone" value="<?=$RetainArray['customer_phone']?>"></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                      <td>Customer Date of Birth:</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="text" name="customer_dob" id="customer_dob" value="<?=$RetainArray['customer_dob']?>" class="tcal" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Customer Status:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>
                                                          <select name="customer_status" id="customer_status">
                                                            <option value="active" <?=($RetainArray['customer_status'] == 'active')?'selected':''?>>Active</option>
                                                            <option value="inactive" <?=($RetainArray['customer_status'] == 'inactive')?'selected':''?>>Inactive</option>
                                                          </select>
                                                        </label></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><label>
                                                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Add New Customer">
                                                        </label></td>
                                                    </tr>
                                                </table>
                                          </form>
                                        </td>
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