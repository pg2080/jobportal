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
                    url: "http://localhost/MAINJOBPORTAL/CompanyHR/Chart1.php",
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        for (var i = 0; i < result.length; i++)
                        {
                            _ChartCountCo[i] = result[i].AppliCount;
                            _ChartDate[i] = result[i].dates;
                        }
                        var _drawBoundryChart = new GetChart();
                        var hoverLable = ["Application"];
                        var Head = "Call line usage by duration chart";
                        var ylable = 'Occupied lines count ';
                        var xlabel = 'Date';
                        var XAxisData = [ _ChartCountCo];
                        _drawBoundryChart.fnGetBoundryChart(XAxisData, _ChartDate, hoverLable, Head, xlabel, ylable, 'TrafficChartsHR');
                    }
                });
    });
</script>

<?php include './Sidebar.php'; ?>  
<?php
$lId = $_SESSION['Login']['LId'];
$appcount="SELECT COUNT(ap.ApplicationId) as COUNTA  from tblappplication ap LEFT JOIN hrinfo h on h.HRId = ap.HRId WHERE ap.HRId = $lId";
$appscount = mysqli_fetch_assoc(mysqli_query($conn, $appcount));
$intcount="SELECT COUNT(inw.InterViewId) as COUNTA  from tblinterview inw LEFT JOIN hrinfo h on h.HRId = inw.HRId WHERE inw.HRId = $lId";
$intscount = mysqli_fetch_assoc(mysqli_query($conn, $intcount));

?>
<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count"><?php echo $appscount['COUNTA'];?></span></div>
                                            <div class="stat-heading">No of Applications</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $intscount['COUNTA'];?></span></div>
                                            <div class="stat-heading">No of Interviews</div>
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
                                         <canvas id="TrafficChartsHR" style="width: 100%; height: 500px"></canvas>   
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
                
                
                
                <!-- Modal - Calendar - Add New Event -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add New Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#event-modal -->
                <!-- Modal - Calendar - Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
<?php include './Footer.php'; ?>