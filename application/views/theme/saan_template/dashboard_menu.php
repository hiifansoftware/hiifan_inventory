<tr>
    <td width="2%" align="left" valign="top">&nbsp;</td>
    <td valign="top" align="left" width="95%">
        <a href="<?=__SITE_URL?>admin/index/" class="menu_button" id="admin">Admin Home</a>
        <?php 
        if(General::checkAccess('category_view', false) !== false)        
        {
        ?>
            <a href="<?=__SITE_URL?>category/view_product_category/" class="menu_button" id="category">Manage Product Category</a>
        <?php
        }
        ?>
        <?php 
        if(General::checkAccess('product_view', false) !== false)        
        {
        ?>
            <a href="<?=__SITE_URL?>product/view_product/" class="menu_button" id="product">Manage Product</a>
        <?php
        }
        ?>
        <?php 
        if(General::checkAccess('user_view', false) !== false)        
        {
        ?>
            <a href="<?=__SITE_URL?>user/view_user/" class="menu_button" id="user">Manage Users</a>
        <?php
        }
        ?>
        <!-- <a href="<?=__SITE_URL?>terminal/view_terminal/" class="menu_button" id=""terminal>Manage Terminal</a> -->
        <a href="<?=__SITE_URL?>report/view_report/" class="menu_button" id="report">Manage Reports</a>        
        <a href="<?=__SITE_URL?>settings/view_setting/" class="menu_button" id="settings">Manage Settings</a>
        
    </td>
</tr>