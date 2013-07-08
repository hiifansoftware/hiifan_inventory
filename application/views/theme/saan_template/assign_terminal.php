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
                                            System - <span>Edit User</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><?=General::getMessage()?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <form name="form1" method="post" action="">
                                                <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
<tr>
                                                        <td>User Full Name:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="store_user_fullname" id="store_user_fullname" value="<?=$RetainArray['store_user_fullname']?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Username:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="store_user_name" id="store_user_name" value="<?=$RetainArray['store_user_name']?>"></td>
                                                    </tr>
                                                    <tr>
                                                      <td>User Password:</td>
                                                    </tr>
                                                    <tr>
                                                      <td><input type="text" name="store_user_password" id="store_user_password" value="<?=$RetainArray['store_user_password']?>"></td>
                                                    </tr>
                                                    <tr>
                                                      <td>User Type:</td>
                                                    </tr>
                                                    <tr>
                                                      <td><select name="store_user_type" id="store_user_type">
                                                        <option value="admin" <?=($RetainArray['store_user_type'] == 'admin')?'selected':''?>>Admin</option>
                                                        <option value="user" <?=($RetainArray['store_user_type'] == 'user')?'selected':''?>>User</option>
                                                      </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td>User Status:</td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>
                                                          <select name="store_user_status" id="store_user_status">
                                                            <option value="active" <?=($RetainArray['store_user_status'] == 'active')?'selected':''?>>Active</option>
                                                            <option value="inactive" <?=($RetainArray['store_user_status'] == 'inactive')?'selected':''?>>Inactive</option>
                                                          </select>
                                                        </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>
                                                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Add New User">
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