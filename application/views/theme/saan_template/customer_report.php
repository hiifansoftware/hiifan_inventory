<?php
require_once("header.php");
?>
<script src="<?=__TEMPLATE_URL?>scripts/highcharts/highcharts.js"></script>
<script src="<?=__TEMPLATE_URL?>scripts/highcharts/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                zoomType: 'x',
                spacingRight: 20
            },
            title: {
                text: "<?php echo ucwords($ReportType); ?> " + 'Customer Registration Report'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' :
                    'Drag your finger over the plot to zoom in'
            },
            xAxis: {
                type: 'datetime',
                maxZoom: <?php echo $ReportDays; ?> * 24 * 3600000, // fourteen days
                title: {
                    text: "Days of the <?php echo ($ReportType == 'Weekly')? 'Week': 'Month'; ?>"
                }
            },
            yAxis: {
                title: {
                    text: 'Customer Registration Number'
                }
            },
            tooltip: {
                shared: true
            },
            legend: {
                enabled: true
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    lineWidth: 2,
                    marker: {
                        enabled: true
                    },
                    shadow: true,
                    states: {
                        hover: {
                            lineWidth: 2
                        }
                    },
                    threshold: null
                }
            },
    
            series: [{
                type: 'area',
                name: 'Customer Registration Number to Date',
                pointInterval: 24 * 3600 * 1000,
                pointStart: Date.UTC(<?php echo $FirstDayArray[0]; ?>, <?php echo ($FirstDayArray[1]-1); ?>, <?php echo $FirstDayArray[2]; ?>),
                data: [<?php echo $ReportValue; ?>]
            }]
        });
    });
    
$(document).ready(function(){
	//$('tspan').html('');
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
                                            System - <span>Admin Dashboard</span></h2></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <br>
                                            <form name="frmReport" id="frmReport" action="" method="post">
                                                <input type="submit" name="btnWeek" id="btnWeek" value="Weekly Report">
                                                <input type="submit" name="btnMonth" id="btnMonth" value="Monthly Report">  
                                            </form>
                                    </td>    
                                  </tr>
                                    <tr>
                                        <td colspan="2"><div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                  </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
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
