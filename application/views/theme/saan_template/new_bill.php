<?php
require_once("header.php");
?>
<script language="javascript">
    
    function getHiddenInputs() {
	    return $('.hidden_price_class').length;;
    }
    
    function manageQuantityPrice(obj)
    {
        var quantityValue = obj.value;
        var quantityId = obj.name;
        var idValue = quantityId.substring(8);
        var priceDiv = 'price' + idValue;
        var hdnPrice = 'hdnPrice' + idValue;
        var rateDiv = 'rate' + idValue;
        var hiddenQuantity = 'hdnQuantity' + idValue;
        var rateValue = document.getElementById(rateDiv).innerHTML;
        var product_final_price = parseFloat(rateValue).toFixed(2) * parseInt(quantityValue);
        
        document.getElementById(hiddenQuantity).value = quantityValue;
        document.getElementById(priceDiv).innerHTML = parseFloat(product_final_price).toFixed(2);
        document.getElementById(hdnPrice).value = parseFloat(product_final_price).toFixed(2);
        
        var hiddenCount = getHiddenInputs();
        var totalPriceValue = 0;
        
        for(var i = 1; i < hiddenCount; i++)
        {
            var hdnPriceId = 'hdnPrice' + i;
            var hdnPriceValue = document.getElementById(hdnPriceId).value;
            totalPriceValue = parseFloat(totalPriceValue) + parseFloat(hdnPriceValue);
        }
        document.getElementById('total_price_value').value = parseFloat(totalPriceValue).toFixed(2);
    }
    
$(document).ready(function(){
    $(document).on("blur", '.productCode', function(event){
       var productCode = $(this).val();
       var idValue = $(this).attr('id');
       var idNumberValue = idValue;
       var productDiv = '#product' + idValue;
       var rateDiv = '#rate' + idValue;
       var priceDiv = '#price' + idValue;
       var quantityDiv = '#quantity' + idValue;
       var hiddenRate = '#hdnRate' + idValue;
       var hiddenQuantity = '#hdnQuantity' + idValue;
       var quantity = 1;
       var newIdValue = ++idValue; 
       var total_price = $('#total_price_value').val();
       
       var newHTML = "<tr>"+
                        "<td align='left' valign='middle'><input name='"+newIdValue+"' id='"+newIdValue+"' value='' class='productCode'></td>"+
                        "<td align='left' valign='middle'><div id='product"+newIdValue+"'>&nbsp;</div></td>"+
                        "<td align='left' valign='middle'><input name='quantity"+newIdValue+"' id='quantity"+newIdValue+"' value='' onblur='javascript:manageQuantityPrice(this);'><input type='hidden' id='hdnQuantity"+newIdValue+"' name='hdnQuantity"+newIdValue+"' value=''></td>"+
                        "<td align='left' valign='middle'><div id='rate"+newIdValue+"'>&nbsp;</div><input type='hidden' id='hdnRate"+newIdValue+"' name='hdnRate"+newIdValue+"' value=''></td>"+
                        "<td align='left' valign='middle'><div id='price"+newIdValue+"'>&nbsp;</div><input type='hidden' id='hdnPrice"+newIdValue+"' name='hdnPrice"+newIdValue+"' value='' class='hidden_price_class'></td>"+
                      "</tr>";
       if($('#' + newIdValue).length === 0)
        {
            $.ajax({
                type: "POST",
                url: "<?=__SITE_URL?>billing/getProductByCode",
                beforeSend: function(){
                    $('.overlay').show();
                },
                complete: function(){
                    $('.overlay').hide();
                },
                data: { product_code: productCode }
                }).success(function( msg ) {
                    if(msg != '')
                    {
                        var productArray = jQuery.parseJSON(msg);
                        $(productDiv).html(productArray.product_name);
						
                        //Rate Value
                        $(rateDiv).html(parseFloat(productArray.product_price).toFixed(2));
                        $(hiddenRate).val(parseFloat(productArray.product_price).toFixed(2));
						
                        //Quantity Value
                        $(quantityDiv).val('01');
                        $(hiddenQuantity).val('01');
                        
                        var product_final_price = parseFloat(productArray.product_price).toFixed(2) * parseInt(quantity);

                        $(priceDiv).html(parseFloat(product_final_price).toFixed(2));
                        $('#bill_section').append(newHTML);
                        $('#'+ newIdValue).removeClass().addClass('productCode uniform-input text');
                        $('#quantity'+ newIdValue).removeClass().addClass('uniform-input text');
                        $('#hdnPrice'+ idNumberValue).val(parseFloat(product_final_price).toFixed(2));
                        total_price = parseFloat(total_price) + parseFloat(product_final_price);
                        $('#total_price_value').val(parseFloat(total_price).toFixed(2));
                        $('#' + newIdValue).focus();
                    }
                    
            });
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
                                            System - <span>Billing Section</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"><?=General::getMessage()?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <form name="form1" method="post" action="<?=__SITE_URL?>billing/finalize_payment">
                                              <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" id="bill_section">
                                                <tr>
                                                  <th width="3%">Product Code</th>
                                                  <th width="20%">Product Name</th>
                                                  <th width="20%">Quantity</th>
                                                  <th width="20%">Rate</th>
                                                  <th width="10%">Price</th>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle"><input name="1" id="1" value="" class="productCode"></td>
                                                  <td align="left" valign="middle"><div id="product1">&nbsp;</div></td>
                                                  <td align="left" valign="middle"><input name='quantity1' id='quantity1' value='' onblur='javascript:manageQuantityPrice(this);'>
                                                  	<input type='hidden' id='hdnQuantity1' name='hdnQuantity1' value=''>
                                                  </td>
                                                  <td align="left" valign="middle"><div id="rate1">&nbsp;</div>
                                                  	<input type='hidden' id='hdnRate1' name='hdnRate1' value=''>
                                                  </td>
                                                  <td align="left" valign="middle">
                                                      <div id="price1">&nbsp;</div>
                                                      <input type='hidden' id='hdnPrice1' name='hdnPrice1' value='' class="hidden_price_class">
                                                  </td>
                                                </tr>
                                              </table>
                                              <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                <tr>
                                                  <td colspan="4" align="right" width="80%"><h4 style="color:#FF0000; font-size:14px;">Nair </h4></td>
                                                  <td align="right"><input disabled style='text-align:right;' typé='text' name='total_price_value' id='total_price_value' value='0.00'><!-- <span id="total_price">0.00</span> --></td>
                                                </tr>
                                                <tr>
                                                	<td colspan="4">&nbsp;</td>
                                                    <td><input type="submit" name="btnSubmitBill" id="btnsubmitBill" value="Continue to Payment"></td>
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