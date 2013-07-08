<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <script language="javascript" type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/jquery.js"></script>
    <link rel="stylesheet" href="<?=__EXTERNAL_URL?>form_design/styles/uniform.default.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?=__TEMPLATE_URL?>styles/styles.css"/>
    <script src="<?=__EXTERNAL_URL?>form_design/scripts/jquery.uniform.js"></script>
    <script type='text/javascript'>
        $(function () {
            $("select, input, button").uniform();
        });
    </script>
    <style type="text/css">
        .login_box {
            background-color: #FFFFFF;
            border-radius: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            min-height: 350px;
            height: auto;
            margin-top: 10px;
        }

        .logo {
            height: 100px;
            margin-top: 40px;
        }

        h3 {
            font-size: 25px;
            border-bottom: 0px;
            color: #FFFFFF;
        }
    </style>
</head>
<body>
<div class="logo">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="middle" align="center"><img src="<?=__TEMPLATE_URL?>images/logo.png" width="170"/></td>
        </tr>
    </table>
</div>
<div class="login_box">
    <form name="form1" id="form1" action="" method="post">
        <table width="100%" cellpadding="0" cellspacing="0"
               style="background-color:#c20505; border-top-right-radius:10px; border-top-left-radius:10px;">
            <tr>
                <td align="center"><h3>Inventory Management System</h3></td>
            </tr>
            <tr style="background-color:#fff;">
                <td align="center">
                    <table width="40%" align="center" cellpadding="3" cellspacing="3">
                        <tr>
                            <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Username:</td>
                        </tr>
                        <tr>
                            <td align="left"><input type="text" name="username" id="username"
                                                    value="Please Enter Username"/></td>
                        </tr>
                        <tr>
                            <td align="left">Password:</td>
                        </tr>
                        <tr>
                            <td align="left"><input type="password" name="password" id="password" value="Password"/>
                            </td>
                        </tr>
                        <tr>
                            <td align="left"><input type="submit" name="password" id="password" value="Log In"/></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="logo" style="font-size:11px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td valign="middle" align="center">Copyright &copy; 2013 All Rights Reserved. | Powered By: <a href="">HiiFan
                India Pvt. Ltd.</a></td>
        </tr>
    </table>
</div>
</body>
</html>
