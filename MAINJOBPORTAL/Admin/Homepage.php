<?php include './Sidebar.php';?>     
<!-- Content -->
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
                    url: "http://localhost/MAINJOBPORTAL/Admin/adminchart.php",
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
                        var hoverLable = ["Company"];
                        var Head = "Call line usage by duration chart";
                        var ylable = 'Occupied lines count ';
                        var xlabel = 'Date';
                        var XAxisData = [ _ChartCountCo];
                        _drawBoundryChart.fnGetBoundryChart(XAxisData, _ChartDate, hoverLable, Head, xlabel, ylable, 'TrafficChartsA');
                    }
                });
    });
</script>

<?php $Jssql= "SELECT COUNT(*) As JsCount FROM jobseekerinfor ";$JsCount = mysqli_fetch_assoc(mysqli_query($conn, $Jssql));

        $Jobsql= "SELECT COUNT(*) As JobCount FROM tbljob ";$JobCount  = mysqli_fetch_assoc(mysqli_query($conn, $Jobsql));
       $Companysql="SELECT COUNT(*) As CompanCount FROM companyinfo "; $CompanyCout =  mysqli_fetch_assoc(mysqli_query($conn, $Companysql));
       $Plansql=  "Select COUNT(*) As PlanCount from tblplan where IsActive = 1"; $PlanCount =  mysqli_fetch_assoc(mysqli_query($conn, $Plansql));
       //SELECT COUNT(*) FROM `companyinfo` GROUP BY Date(Created_on)
       
       function  GetCompanyData()
       {
           $sql = "SELECT COUNT(*) As CompanyDate,Date(Created_on) FROM `companyinfo` GROUP BY Date(Created_on) LIMIT  30";
           $data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
           echo json_encode($data);
           
       }
               ?>
        <script src="../styles/js/jquery.min.js"></script>
     <script type="text/javascript">
                //alert('HiiZZZZ');

        $(document).ready(function () {
          // alert('HiiZZZZ' );
                $.ajax(
                        {
                            type: 'POST',
                            url: "http://localhost/PhpProject1/Admin/Chart1.php",
                          //  data: 'sid=' + sid,
                            //dataType: 'json',
                           // data: {functionname: 'GetCompanyData'},
                            success: function (result) {
                                console.log('data' + result);
                              //  $("#city").html(result);
                            }
                        })
            });
       
    </script>
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $CompanyCout['CompanCount'] ?></span></div>
                                            <div class="stat-heading">Companies</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="fa fa-joomla"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $JobCount['JobCount']; ?></span></div>
                                            <div class="stat-heading">Jobs</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $JsCount['JsCount']; ?></span></div>
                                            <div class="stat-heading">Applicants</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-cubes"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $PlanCount['PlanCount']; ?></span></div>
                                            <div class="stat-heading">Plans</div>
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
                                         <canvas id="TrafficChartsA" style="width: 100%; height: 500px"></canvas> 
                                         
                                     <!--   <div id="traffic-chart" class="traffic-chart"></div>-->
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
<?php include './Footer.php'; ?>