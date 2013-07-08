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
        <td align="left" valign="top"><table width="100%" cellpadding="0" cellspacing="0">
            <tr>
              <td width="2%" align="left" valign="top">&nbsp;</td>
              <td valign="top" align="left" width="95%"><h3>Welcome to <span class="red">Inventory Management System</span> </h3></td>
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
              <td valign="top" align="left"><!-- ----------------------------------- Start: Main content Section -------------------------------- -->
                <table width="100%" border="0" align="left" class="shadow">
                  <tr>
                    <td colspan="2" class="page_heading"><h2>Admin Panel :: Inventory Management
                        System - <span>Add Product</span></h2></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><?=General::getMessage()?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><form name="form1" method="post" action="">
                        <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3">
                          <tr>
                            <td>Product Name:</td>
                          </tr>
                          <tr>
                            <td><input type="text" name="product_name" id="product_name" value="<?=$RetainArray['product_name']?>"></td>
                          </tr>
                          <tr>
                            <td>Category Name:</td>
                          </tr>
                          <tr>
                            <td><select name="product_category_id" id="select">
                            <option value="">Select Category</option>
                            <?php
                            if(is_array($productCategoryArray) && count($productCategoryArray) > 0)
                            {
                                foreach($productCategoryArray as $prodCatKey=>$prodCatValue)
                                {
                                ?>
                            <option value="<?=$prodCatValue['product_category_id']?>" <?=($prodCatValue['product_category_id'] == $RetainArray['product_category_id'])?'selected':''?>><?=$prodCatValue['product_category_name']?></option>
                                <?php
                                }
                            }
                            ?>
                            </select>
                            </td>
                          </tr>
                          <tr>
                            <td>Product Description:</td>
                          </tr>
                          <tr>
                            <td><input type="text" name="product_desc" id="product_desc" value="<?=$RetainArray['product_desc']?>"></td>
                          </tr>
                          <tr>
                            <td>Product Status:</td>
                          </tr>
                          <tr>
                            <td><label>
                              <select name="product_status" id="product_status">
                                <option value="active" <?=($RetainArray['product_status'] == 'active')?'selected':''?>>Active</option>
                                <option value="inactive" <?=($RetainArray['product_status'] == 'inactive')?'selected':''?>>Inactive</option>
                              </select>
                              </label></td>
                          </tr>
                          <tr>
                            <td><label>
                              <input type="submit" name="btnSubmit" id="btnSubmit" value="Add New Product">
                              </label></td>
                          </tr>
                        </table>
                      </form></td>
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
          </table></td>
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