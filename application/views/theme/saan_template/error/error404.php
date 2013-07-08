<?php
require_once(__TEMPLATE_PATH . "/header.php");
?>
</head>
<!-- ------------------------- End: Head Section ----------------------------- -->
<body>
<!-- ------------------------ Start: Container Section ---------------------------- -->
<div class="container">
    <!-- ------------------------------- Start: Logo Heading Section ----------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "/head_section.php"); ?>
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
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="left" valign="top">
                                <table width="70%" align="center" cellpadding='6' cellspacing='6'>
                                    <tr>
                                        <td align="center" valign='top'><img src="<?=__TEMPLATE_URL . 'images/icons/404_icon.jpg'?>" style='max-height: 50px;'></td>
                                        <td align="left" valign='top'><h2 style="margin-left:20px;">
                                    Unexpected Error Occurred!! Following are the possible reasons:
                                </h2>
                                            <ul>
                                                <li>Page Does Not Exist</li>
                                                <li>Page Under Maintenance</li>
                                                <li>Page Under construction</li>
                                            </ul></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="2%" align="left" valign="top">&nbsp;</td>
                            <td valign="top" align="left" width="95%">&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td align="right" valign="top" width="5%"><?php require_once(__TEMPLATE_PATH . '/clock_section.php'); ?></td>
            </tr>
        </table>
    </div>
    <!-- ------------------------------- End: Wrapper section ------------------------------- -->
</div>
<!-- ------------------------ End: Container Section ---------------------------- -->
<?php require_once(__TEMPLATE_PATH . '/footer.php'); ?>
</body>
</html>
