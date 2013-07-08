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
                                                    System - <span>Product List</span></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><div style="width: auto; float: right; margin-right:20px;"><a href="<?= __SITE_URL ?>product/add_product/" class="red_button">Add New Product</a></div></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?php
                                                $i = 0;
                                                if ($PresentPage > 0) {
                                                    $i = $PresentPage * 10;
                                                }
                                                if (is_array($ProductArray['result_set']) && count($ProductArray['result_set']) > 0) {
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
                                                                        <th>Product Name</th>
                                                                        <th>Category Name</th>
                                                                        <th>Category Status</th>
                                                                        <th>Add Date</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    <?php
                                                                    foreach ($ProductArray['result_set'] as $prodKey => $prodArray) {
                                                                        $i++;
                                                                        ?>
                                                                        <tr>
                                                                            <td><?= $i ?></td>
                                                                            <td><?= ucwords($prodArray['product_name']) ?></td>
                                                                            <td><?= ucwords($prodArray['product_category_name']) ?></td>
                                                                            <td><?= ucwords($prodArray['product_status']) ?></td>
                                                                            <td><?= General::getFormatedDate($prodArray['product_datetime']) ?></td>
                                                                            <td><a title="Delete Product"
                                                                                   href="<?= __SITE_URL ?>product/deleteProduct/product_id:<?= $this->registry->security->encryptData($prodArray['product_id']) ?>"
                                                                                   onClick="return confirm('Do You really Want To Delete This?');">
                                                                                    <img src="<?= __TEMPLATE_URL . "images/del.png" ?>"> </a>
                                                                                <?php
                                                                                if ($prodArray['product_status'] == 'active') {
                                                                                    ?>
                                                                                    <a title="Deactivate Product"
                                                                                       onClick="return confirm('Do you want to change the status');"
                                                                                       href="<?= __SITE_URL ?>product/deactivateProduct/product_id:<?= $this->registry->security->encryptData($prodArray['product_id']) ?>">
                                                                                        <img src="<?= __TEMPLATE_URL . "images/ico-done.gif" ?>">
                                                                                    </a>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <a title="Activate Product"
                                                                                       onClick="return confirm('Do you want to change the status');"
                                                                                       href="<?= __SITE_URL ?>product/activateProduct/product_id:<?= $this->registry->security->encryptData($prodArray['product_id']) ?>">
                                                                                        <img src="<?= __TEMPLATE_URL . "images/ico-warning.gif" ?>">
                                                                                    </a>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <a title="Edit Category"
                                                                                   href="<?= __SITE_URL ?>product/edit_product/product_id:<?= $this->registry->security->encryptData($prodArray['product_id']) ?>">
                                                                                    <img src="<?= __TEMPLATE_URL . "images/edit.png" ?>">
                                                                                </a></td>
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
                                                        $paginationContent = General::getFullNavigation($ProductArray['total_rows'], $ProductArray['total_pages'], $PresentPage, "product/view_product");
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