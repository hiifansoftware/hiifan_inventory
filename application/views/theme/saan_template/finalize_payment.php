<?php
require_once("header.php");
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
	$('#by_card').hide();
	$('#by_email').hide();
	$('#card_do_bill').hide();
	$('#email_do_bill').hide();
		$('#btnByCard').click(function(){
			$('#by_card').show('slow');
			$('#by_email').hide('slow');
			$('#customer_email').val('');
			$('#email_do_bill').hide();
		});
		
		$('#btnByEmail').click(function(){
			$('#by_email').show('slow');
			$('#by_card').hide('slow');
			$('#customer_card_number').val('');
			$('#card_do_bill').hide();
		});
		
	/** ************* Start: Ajax Section For Card Billing ******************** */
	
	$('#customer_card_number').blur(function(){
        var cardNumberValue = $('#customer_card_number').val();
		var totalPriceValue = "<?=$TotalPriceValue?>";
        $.ajax({
                type: "POST",
                url: "<?=__SITE_URL?>billing/getCreditByCard",
                beforeSend: function(){
                    $('.overlay').show();
                },
                complete: function(){
                    $('.overlay').hide();
                },
                data: { customer_card_number: cardNumberValue,
						total_price_value: totalPriceValue }
                }).success(function( msg ) {
					if(msg != 'not-found')
					{
						if(msg == 'success')
						{
							$('#card_do_bill').show();
						}
						else
						{
							alert('Available Credit is only ' + msg + 'Naira');
							$('#card_do_bill').hide();
						}
					}
					else
					{
						alert('Customer Not Found');
						$('#card_do_bill').hide();
					}
					
            }); 
    	});
	/** ************* End: Ajax Section For Card Billing ******************** */
	
	
	/** ************* Start: Ajax Section For Email Billing ******************** */
	
	$('#customer_email').blur(function(){
        var customerEmailValue = $('#customer_email').val();
		var totalPriceValue = "<?=$TotalPriceValue?>";
        $.ajax({
                type: "POST",
                url: "<?=__SITE_URL?>billing/getCreditByEmail",
                beforeSend: function(){
                    $('.overlay').show();
                },
                complete: function(){
                    $('.overlay').hide();
                },
                data: { customer_email: customerEmailValue,
						total_price_value: totalPriceValue }
                }).success(function( msg ) {
					if(msg != 'not-found')
					{
						if(msg == 'success')
						{
							$('#email_do_bill').show();
						}
						else
						{
							alert('Available Credit is only ' + msg + 'Naira');
							$('#email_do_bill').hide();
						}
					}
					else
					{
						alert('Customer Not Found');
						$('#email_do_bill').hide();
					}
					
            }); 
    	});
	/** ************* Start: Ajax Section For Email Billing ******************** */
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
                                            System - <span>Billing Section - Final Step</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><?=General::getMessage()?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                          <table width="80%" border="0" align="center">
                                            <tr>
                                              <th>Sl. No. </th>
                                              <th>Product Code</th>
                                              <th>Quantity</th>
                                              <th>Price Rate</th>
                                              <th>Total Cost</th>
                                            </tr>
                                            <?php
											if(is_array($ItemArray) && count($ItemArray) > 0)
											{
												$totalPrice = 0;
												foreach($ItemArray as $itemKey=>$itemValueArray)
												{
													$totalPrice =  $totalPrice + $itemValueArray['product_price'];
												?>
													<tr>
													  <td><?=$itemKey?></td>
													  <td><?=$itemValueArray['product_code']?></td>
													  <td><?=$itemValueArray['product_quantity']?></td>
													  <td align="right"><?=$itemValueArray['product_rate']?></td>
													  <td align="right"><?=$itemValueArray['product_price']?></td>
													</tr>		
                                                <?php    
												}
											}
											?>
                                            <tr>
                                            	<td colspan="5"><hr></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="4" align="right"><h4>Grand Total: </h4></td>
                                                <td align="right"><h4>Naira <?=$totalPrice?></h4></td>
                                            </tr>
                                          </table>
                                          <form name="frmBilling" id="frmBilling" action="<?=__SITE_URL?>billing/do_final_payment" method="post">
                                          <table width="80%" cellpadding="0" cellspacing="0" border="0" align="center">
                                          	<tr>
                                            	<td colspan="2"><h2>Billing Details</h2></td>
                                            </tr>
                                            <tr>
                                            	<td align="center"><input type="button" name="btnByCard" value="Use Card Number" id="btnByCard"></td>
                                                <td align="center"><input type="button" name="btnByEmail" value="Use Email Address" id="btnByEmail"></td>
                                            </tr>
                                            <tr>
                                            	<td>&nbsp; <br></td>
                                            </tr>
                                            <tr id="by_card">
                                            	<td align="center" colspan="2">
                                                	Card Number: <input type="text" name="customer_card_number" id="customer_card_number" value="">
                                                    <span id='card_do_bill'><input type="submit" name="btnCardSubmit" value='Complete Transaction'></span>
                                                </td>
                                            </tr>
                                            <tr id="by_email">
                                            	<td align="center"  colspan="2">
                                                	Email Address: <input type="text" name="customer_email" id="customer_email" value="">
                                                    <span id='email_do_bill'><input type="submit" name="btnEmailSubmit" value='Complete Transaction'></span>
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