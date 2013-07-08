<?php
require_once("header.php");
?>
<script language="javascript">
    $(document).ready(function () {
        $('#ajax_loader').hide();
        $('#btnSubmit').click(function () {
            $.ajax({
                type:"POST",
                url:"<?=__SITE_URL?>" + "install/createDB/",
                beforeSend:function () {
                    $('#ajax_button').hide();
                    $('#ajax_loader').show();
                }
            }).done(function (msg) {
                        if (msg == "done") {
                            location.replace("<?=__SITE_URL?>" + "install/store_config/");
                        }
                    });
        });
    });

</script>
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
                                <form name="frmInstall" id="frmInstall" action="" method="post">
                                    <table width="90%" border="0" align="center" class="shadow">
                                        <tr>
                                            <td colspan="2" class="page_heading"><h2>Installation of Inventory
                                                Management System - <span>Database Setup</span></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table align="center" width="80%" cellpadding="3" cellspacing="3">
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Server Host Name:</td>
                                                        <td align="left" valign="top"><input type="text" name="db_host"
                                                                                             id="db_host"
                                                                                             value="<?=$HostName?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Server User Name:</td>
                                                        <td align="left" valign="top"><input type="text" name="db_user"
                                                                                             id="db_user"
                                                                                             value="<?=$DBUser?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Server Password:</td>
                                                        <td align="left" valign="top"><input type="text" name="db_pass"
                                                                                             id="db_pass"
                                                                                             value="<?=$DBPass?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">Database Name:</td>
                                                        <td align="left" valign="top"><input type="text" name="db_name"
                                                                                             id="db_name"
                                                                                             value="<?=$DBName?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                        <td align="left" valign="top">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td align="left" valign="top" width="30%">&nbsp;</td>
                                                        <td align="left" valign="top">
                                                            <div id="ajax_button">
                                                                <input type="button" name="btnSubmit" id="btnSubmit"
                                                                       value="Create Database">
                                                            </div>
                                                            <div id="ajax_loader"><img
                                                                    src="<?=__TEMPLATE_URL?>images/ajax_loader.gif">
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