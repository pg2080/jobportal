<?php include './Sidebar.php'; ?>     

<script src="../styles/js/jquery.min.js"></script>
<script src="../Chart/Chart.bundle.min.js" type="text/javascript"></script>
<script src="../Chart/utils.js" type="text/javascript"></script>
<script src="../Chart/MgnifyChart.js" type="text/javascript"></script>
<script>



    $(document).ready(function () {
        var _ChartDate = [];//['2020-12-21','2020-12-22','2020-12-23'];
        var _ChartCountJS = [];//[2,3,1];
        var _ChartCountCo = [];
        var _DATANOW = [];
        $.ajax(
                {
                    type: 'POST',
                    url: "http://localhost/MAINJOBPORTAL/CompanyAdmin/cochart.php",
                    dataType: 'json',
                    success: function (result) {
                                                console.log("result");

                        console.log(result);
                        for (var i = 0; i < result.length; i++)
                        {
                            _ChartCountCo[i] = result[i].AppliCount;
                            _ChartDate[i] = result[i].dates;
                        }
                        var _drawBoundryChart = new GetChart();
                        var hoverLable = ["Jobs"];
                        var Head = "Call line usage by duration chart";
                        var ylable = 'Occupied lines count ';
                        var xlabel = 'Date';
                        var XAxisData = [ _ChartCountCo];
                        _drawBoundryChart.fnGetBoundryChart(XAxisData, _ChartDate, hoverLable, Head, xlabel, ylable, 'TrafficChartsCo');
                    }
                });
    });
</script>

<?php
$depcount="";
$lId =$_SESSION['Login']['Company']['LoginId'];
$appcount="SELECT COUNT(*) as COUNTA  from tbldepartment WHERE companyId = $lId";
$appscount = mysqli_fetch_assoc(mysqli_query($conn, $appcount));
//print_r($appscount);

$intcount="SELECT COUNT(*) as COUNTA  from hrInfo  WHERE companyId  = $lId";
$intscount = mysqli_fetch_assoc(mysqli_query($conn, $intcount));

$lI = $_SESSION['Login']['Company']['CompanyId'];

$intjcount="SELECT COUNT(*) as COUNTA  from tbljob  WHERE companyId  = $lI";
$intjscount = mysqli_fetch_assoc(mysqli_query($conn, $intjcount));

?>
<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <!--<div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count">23569</span></div>
                                            <div class="stat-heading">Revenue</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $appscount['COUNTA'];?></span></div>
                                            <div class="stat-heading">No of Department</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $intscount['COUNTA'];?></span></div>
                                            <div class="stat-heading">No of HR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $intjscount['COUNTA'];?></span></div>
                                            <div class="stat-heading">No of Jobs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Traffic </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                         <canvas id="TrafficChartsCo" style="width: 100%; height: 500px"></canvas> 
                                         
                                     <!--   <div id="traffic-chart" class="traffic-chart"></div>-->
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
<?php include './Footer.php'; ?>