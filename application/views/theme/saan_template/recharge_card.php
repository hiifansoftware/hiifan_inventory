<?php
require_once("header.php");
?>
<link rel="stylesheet" type="text/css" href="<?= __TEMPLATE_URL ?>styles/tcal.css" />
<script type="text/javascript" src="<?= __TEMPLATE_URL ?>scripts/tcal.js"></script>
<script language='javascript'>
$(document).ready(function(){
    $('#customer_card_number').blur(function(){
        var cardNumberValue = $('#customer_card_number').val();
        $.ajax({
                type: "POST",
                url: "<?=__SITE_URL?>customer/getCreditByCard",
                beforeSend: function(){
                    $('.overlay').show();
                },
                complete: function(){
                    $('.overlay').hide();
                },
                data: { customer_card_number: cardNumberValue }
                }).success(function( msg ) {
                    if(msg != '')
                    {
                        var productArray = jQuery.parseJSON(msg);
                        $('#credit_available_card').html(productArray.customer_credit_avail);
                    }
                    else
                        {
                            $('#credit_available_card').html('Customer not found');
                        }
            }); 
    });
    
    function getCardNumber(customerEmail, customerDob)
    {
        $.ajax({
                type: "POST",
                url: "<?=__SITE_URL?>customer/getCreditByEmailnDOB",
                beforeSend: function(){
                    $('.overlay').show();
                },
                complete: function(){
                    $('.overlay').hide();
                },
                data: { customer_email: customerEmail, customer_dob: customerDob }
                }).success(function( msg ) {
                    
                    if(msg != '')
                    {
                        var productArray = jQuery.parseJSON(msg);
                        $('#credit_available_email').html(productArray.customer_credit_avail);
                    }
                    else
                        {
                            $('#credit_available_email').html('Customer Not Found');
                        }
                    
            });
    }
    
    $('#customer_email').blur(function(){
        var customerEmail = $('#customer_email').val();
        var customerDob = $('#customer_dob').val();
        if(customerEmail != '' && customerDob != '')
            {
                getCardNumber(customerEmail, customerDob);
            }
    });
    $(document).on("click", '#tcalGrid', function(event){
    
        var customerEmail = $('#customer_email').val();
        var customerDob = $('#customer_dob').val();
        if(customerEmail != '' && customerDob != '')
            {
                getCardNumber(customerEmail, customerDob);
            }
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
                                                    System - <span>Recharge Card</span></h2></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="right"><?= General::getMessage() ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">

                                                <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                    <tr>
                                                        <td><h3>By Customer Card Number:</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <form name="form1" method="post" action="">
                                                                <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                                    <tr>
                                                                        <td>Customer Card Number:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text" name="customer_card_number" id="customer_card_number" value="<?= $RetainArray['customer_card_number'] ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Available Credit:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div id="credit_available_card"></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Recharge With Amount:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text" name="recharge_amount_card" id="recharge_amount_card" value="<?= $RetainArray['recharge_amount_card'] ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>
                                                                                <input type="submit" name="btnSubmitCard" id="btnSubmitCard" value="Add Recharge Value">
                                                                            </label></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </td>
                                                    </tr>	
                                                    <tr>
                                                        <td><h3>By Customer Email &amp; Date of Birth:</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <form name="form2" method="post" action="">
                                                                <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                                    <tr>
                                                                        <td>Customer Email:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text" name="customer_email" id="customer_email" value="<?= $RetainArray['customer_email'] ?>"></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Customer Date of Birth:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text" name="customer_dob" id="customer_dob" value="<?= $RetainArray['customer_dob'] ?>" class="tcal" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Available Credit:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div id="credit_available_email"></div></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Recharge With Amount:</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="text" name="recharge_amount_email" id="recharge_amount_email" value="<?= $RetainArray['customer_card_number'] ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>
                                                                                <input type="submit" name="btnSubmitDOB" id="btnSubmitDOB" value="Add Recharge Value">
                                                                            </label></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                        </td>
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