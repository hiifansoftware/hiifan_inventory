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
                                        <td colspan="2">
                                            <table width="80%" border="0" align="center" cellpadding="3" cellspacing="3"> 
                                            <tr><td colspan="6"><h3>Transaction Module</h3></td></tr>
                                              <tr>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/new_customer.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/recharge.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/billing.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>customer/add_customer" class="item_button">New Customer</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>customer/recharge_card" class="item_button">Recharge Card</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>billing/new_bill" class="item_button">Billing Section</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>customer/transaction_history" class="item_button">Transaction History</a></td>
                                                <td>&nbsp;</td>
                                              </tr>
                                            <tr><td colspan="6"><h3>Import Export Module</h3></td></tr>
                                              <tr>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/import_category.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/import_product.jpg"></td>
                                                <td align="center" valign="top"></td>
                                                <td align="center" valign="top">&nbsp;</td>
                                                <td></td>
                                              </tr>
                                              <tr>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>import/import_category" class="item_button">Import Category</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>import/import_product" class="item_button">Import Products</a></td>
                                                <td align="center" valign="top"></td>
                                                <td align="center" valign="top"></td>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr><td colspan="6"><h3>Report Module</h3></td></tr>
                                              <tr>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                                <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/icons/transaction.jpg"></td>
                                              </tr>
                                              <tr>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>report/customer_report" class="item_button">Customer Report</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>report/sales_report" class="item_button">Sales Report</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>report/product_report" class="item_button">Product Report</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>report/returning_customers" class="item_button">Returning Customers</a></td>
                                                <td align="center" valign="top"><a href="<?=__SITE_URL?>report/recharge_report" class="item_button">Recharge Report</a></td>
                                              </tr>
                                            </table>
                                     
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
