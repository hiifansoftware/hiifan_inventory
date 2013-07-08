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
                                                    System - <span>User List</span></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><div style="width: auto; float: right; margin-right:20px;"><a href="<?= __SITE_URL ?>user/add_user/" class="red_button">Add New User</a></div></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2"><?php
                                                $i = 0;
                                                if ($PresentPage > 0) {
                                                    $i = $PresentPage * 10;
                                                }
                                                if (is_array($UserArray['result_set']) && count($UserArray['result_set']) > 0) {
                                                    ?>
                                                    <table width="90%" border="0" cellpadding="5" cellspacing="5" align="center">
                                                        <tr>
                                                            <td colspan="5"><?=General::getMessage()?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5">
                                                                <table width="100%" border="0" cellpadding="5" cellspacing="5" align="center" class="list_table">
                                                                    <tr>
                                                                        <th>Sl No.</th>
                                                                        <th>Full Name</th>
                                                                        <th>Username</th>
                                                                        <th>User Status</th>
																		<th>User Type</th>
																		<th>Reg Date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    <?php
                                                                    foreach ($UserArray['result_set'] as $userKey => $userDataArray) {
                                                                        $i++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?= $i ?></td>
                                                                            <td><?= ucwords($userDataArray['store_user_fullname']) ?></td>
                                                                            <td><?= ucwords($userDataArray['store_user_name']) ?></td>
																			<td><?= ucwords($userDataArray['store_user_status']) ?></td>
																			<td><?= ucwords($userDataArray['store_user_type']) ?></td>
                                                                            <td><?= General::getFormatedDate($userDataArray['store_user_datetime']) ?></td>
                                                                            <td><a title="Delete User"
                                                                                   href="<?= __SITE_URL ?>user/deleteUser/store_user_id:<?= $this->registry->security->encryptData($userDataArray['store_user_id']) ?>"
                                                                                   onClick="return confirm('Do You really Want To Delete This?');">
                                                                                    <img src="<?= __TEMPLATE_URL . "images/del.png" ?>"> </a>
                                                                                <?php
                                                                                if ($userDataArray['store_user_status'] == 'active') {
                                                                                    ?>
                                                                                    <a title="Deactivate User"
                                                                                       onClick="return confirm('Do you want to change the status');"
                                                                                       href="<?= __SITE_URL ?>user/deactivateUser/store_user_id:<?= $this->registry->security->encryptData($userDataArray['store_user_id']) ?>">
                                                                                        <img src="<?= __TEMPLATE_URL . "images/ico-done.gif" ?>">
                                                                                    </a>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <a title="Activate User"
                                                                                       onClick="return confirm('Do you want to change the status');"
                                                                                       href="<?= __SITE_URL ?>user/activateUser/store_user_id:<?= $this->registry->security->encryptData($userDataArray['store_user_id']) ?>">
                                                                                        <img src="<?= __TEMPLATE_URL . "images/ico-warning.gif" ?>">
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <a title="Edit User"
                                                                                   href="<?= __SITE_URL ?>user/edit_user/store_user_id:<?= $this->registry->security->encryptData($userDataArray['store_user_id']) ?>">
                                                                                    <img src="<?= __TEMPLATE_URL . "images/edit.png" ?>">
                                                                                </a>
                                                                                <a title="Assign Module"
                                                                                   href="<?= __SITE_URL ?>user/assign_module/store_user_id:<?= $this->registry->security->encryptData($userDataArray['store_user_id']) ?>">
                                                                                    <img src="<?= __TEMPLATE_URL . "images/module.png" ?>">
                                                                                </a>
                                                                                </td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                    <div class="paginate_nav">
                                                        <?php
                                                        $paginationContent = General::getFullNavigation($UserArray['total_rows'], $UserArray['total_pages'], $PresentPage, "user/view_user");
                                                        echo $paginationContent;
                                                        ?>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="no_records">No Records Found!</div>
                                                    <?php
                                                }
                                                ?>
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