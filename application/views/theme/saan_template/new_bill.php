<?php
require_once("header.php");
?>
<script language="javascript">
$(document).ready(function(){
    $(document).on("blur", '.productCode', function(event){
       var productCode = $(this).val();
       var idValue = $(this).attr('id');
       var productDiv = '#product' + idValue;
       var rateDiv = '#rate' + idValue;
       var priceDiv = '#price' + idValue;
       var quantityDiv = '#quantity' + idValue;
       var quantity = 1;
       var newIdValue = ++idValue; 
       var total_price = $('#total_price').html();
       
       var newHTML = "<tr>"+
                        "<td align='left' valign='middle'><input name='"+newIdValue+"' id='"+newIdValue+"' value='' class='productCode'></td>"+
                        "<td align='left' valign='middle'><div id='product"+newIdValue+"'>&nbsp;</div></td>"+
                        "<td align='left' valign='middle'><div id='quantity"+newIdValue+"'></div></td>"+
                        "<td align='left' valign='middle'><div id='rate"+newIdValue+"'>&nbsp;</div></td>"+
                        "<td align='left' valign='middle'><div id='price"+newIdValue+"'>&nbsp;</div></td>"+
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
                        $(rateDiv).html(parseFloat(productArray.product_price).toFixed(2));
                        $(quantityDiv).html('01');

                        var product_final_price = parseFloat(productArray.product_price).toFixed(2) * parseInt(quantity);

                        $(priceDiv).html(parseFloat(product_final_price).toFixed(2));
                        $('#bill_section').append(newHTML);
                        $('#'+ newIdValue).removeClass().addClass('productCode uniform-input text');
                        total_price = parseFloat(total_price) + parseFloat(product_final_price);
                        $('#total_price').html(parseFloat(total_price).toFixed(2));
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
                                            <form name="form1" method="post" action="">
                                              <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3" id="bill_section">
                                                <tr>
                                                  <th>Product Code</th>
                                                  <th>Product Name</th>
                                                  <th>Quantity</th>
                                                  <th>Rate</th>
                                                  <th>Price</th>
                                                </tr>
                                                <tr>
                                                  <td align="left" valign="middle"><input name="1" id="1" value="" class="productCode"></td>
                                                  <td align="left" valign="middle"><div id="product1">&nbsp;</div></td>
                                                  <td align="left" valign="middle"><div id="quantity1"></div></td>
                                                  <td align="left" valign="middle"><div id="rate1">&nbsp;</div></td>
                                                  <td align="left" valign="middle"><div id="price1">&nbsp;</div></td>
                                                </tr>
                                              </table>
                                              <table width="90%" border="0" align="center" cellpadding="3" cellspacing="3">
                                                <tr>
                                                  <td colspan="4" align="right" width="80%"><h4>Grand Total</h4></td>
                                                  <td align="right"><h4 style="color:#FF0000; font-size:14px;">Nair <span id="total_price">0.00</span></h4></td>
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