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
                                            System - <span>Assign Modules</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><?=General::getMessage()?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <form name="form1" method="post" action="">
                                                <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                    <tr>
                                                      <td><h2>Assign Modules to <?=$UserArray['store_user_fullname']?></h2>
                                                      	<span style="color:#FF0000;">Note: Until View Permission is given, the link for the module will not be displayed and no other permission for that module will be applicable.</span>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td>
                                                      	<table width="100%" border="0">
                                                          <tr>
                                                            <th width="40%">Module Name</th>
                                                            <th width="10%">Add</th>
                                                            <th width="10%">Delete</th>
                                                            <th width="10%">View</th>
                                                            <th width="10%">Edit</th>
                                                            <th>Activate/Deactivate</th>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td><h4>Product Category Module</h4></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="category_add" id="category_add" <?=(array_key_exists('category_add', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="category_delete" id="category_delete" <?=(array_key_exists('category_delete', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="category_view" id="category_view" <?=(array_key_exists('category_view', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="category_edit" id="category_edit" <?=(array_key_exists('category_edit', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="category_acid" id="category_acid" <?=(array_key_exists('category_acid', $UserRightArray) === true)?'checked':''?>></td>
                                                          </tr>
                                                          <tr>
                                                            <td><h4>Product Module</h4></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="product_add" id="product_add" <?=(array_key_exists('product_add', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="product_delete" id="product_delete" <?=(array_key_exists('product_delete', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="product_view" id="product_view" <?=(array_key_exists('product_view', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="product_edit" id="product_edit" <?=(array_key_exists('product_edit', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="product_acid" id="product_acid" <?=(array_key_exists('product_acid', $UserRightArray) === true)?'checked':''?>></td>
                                                          </tr>
                                                          <!-- <tr>
                                                            <td><h4>Terminal Module</h4></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="terminal_add" id="terminal_add" <?=(array_key_exists('terminal_add', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="terminal_delete" id="terminal_delete" <?=(array_key_exists('terminal_delete', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="terminal_view" id="terminal_view" <?=(array_key_exists('terminal_view', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="terminal_edit" id="terminal_edit" <?=(array_key_exists('terminal_edit', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="terminal_acid" id="terminal_acid" <?=(array_key_exists('terminal_acid', $UserRightArray) === true)?'checked':''?>></td>
                                                          </tr> -->
                                                          <tr>
                                                            <td><h4>User Module</h4></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="user_add" id="user_add" <?=(array_key_exists('user_add', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="user_delete" id="user_delete" <?=(array_key_exists('user_delete', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="user_view" id="user_view" <?=(array_key_exists('user_view', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="user_edit" id="user_edit" <?=(array_key_exists('user_edit', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="user_acid" id="user_acid" <?=(array_key_exists('user_acid', $UserRightArray) === true)?'checked':''?>></td>
                                                          </tr>
                                                          <tr>
                                                            <td><h4>Settings Module</h4></td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle"><input type="checkbox" name="setting_edit" id="setting_edit" <?=(array_key_exists('setting_edit', $UserRightArray) === true)?'checked':''?>></td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                          </tr>
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                            <td align="center" valign="middle">&nbsp;</td>
                                                          </tr>
                                                      </table>                                                      </td>
                                                  </tr>
                                                    <tr>
                                                      <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td><label>
                                                          <input type="submit" name="btnSubmit" id="btnSubmit" value="Assign Modules to <?=$UserArray['store_user_fullname']?>">
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