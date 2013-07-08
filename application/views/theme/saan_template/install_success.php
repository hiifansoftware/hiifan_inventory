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

                                <table width="90%" border="0" align="center" class="shadow">
                                    <tr>
                                        <td colspan="2" class="page_heading"><h2>Installation of Inventory
                                            Management System - <span>Installation Successfull</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <table width="80%" border="0" align="center">

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td><img name="" src="<?=__TEMPLATE_URL?>images/success.png"
                                                             width="55" height="55" alt=""></td>
                                                    <td><h3 style="font-size:17px;">Congratulations!! The store is
                                                        installed successfully and the Default Settings are loaded!</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="center"><h4 style="font-size:14px;">Navigate
                                                        to the following Sections</h4></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <table width="100%" border="0">
                                                            <tr>
                                                                <td align="center">
                                                                    <a href="<?=__SITE_URL?>">
                                                                        <img name=""
                                                                             src="<?=__TEMPLATE_URL?>images/admin_login.jpg"
                                                                             width="78" height="77"
                                                                             alt="Admin Login Page"><br>Admin Login Page
                                                                    </a>
                                                                </td>
                                                                <td align="center">
                                                                    <a href="">
                                                                        <img src="<?=__TEMPLATE_URL?>images/help_support.png"
                                                                             width="78" height="77"
                                                                             alt="Store Help &amp; Support Page"><br>Store
                                                                        Help &amp; Support Page
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
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