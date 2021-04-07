<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
  <?php session_start();// error_reporting(0); ?>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
    
      <?php 
      
      require '../Common/CommonServices.php';
      checkIsLogin("co");
                    if(isset($_GET['act']) )
                    {
                        if($_GET['act']=='lg'){
                       //$_SESSION['Login'] = array();
                            //   session_destroy();
                               header('Location:../Homepage.php');
                        }
                    }
                    $datetime = new DateTime();
                            $Cid = $_SESSION['Login']['CId'];

                                   $sql="Select * from tblpayment pa left join tblplan p  on p.PlanId = pa.PlanId where pa.ComapnyId = $Cid and pa.StartedOn <= CURRENT_DATE() and pa.ExpiredOn>=CURRENT_DATE()";
                //echo $sql;

                                   $resultarr = mysqli_fetch_array(mysqli_query($conn, $sql));
                $count = count($resultarr);
                    ?>
   
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Homepage.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <?php if($count > 0) {?>
                    <li class="menu-title">//Company Admin</li><!-- /.menu-title -->
                    <li class="menu-item">
                        <a href="ManageHR.php" > <i class="menu-icon fa fa-cogs"></i>Manage HR</a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="Departmentall.php" > <i class="menu-icon fa fa-cogs"></i>Manage Department</a>
                    </li>

                    <li class="menu-item">
                        <a href="ViewJob.php" > <i class="menu-icon fa fa-joomla"></i>View Jobs</a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="Application.php" > <i class="menu-icon fa fa-file"></i>Application</a>
                    </li>
                    <li class="menu-item">
                        <a href="InterView.php" > <i class="menu-icon fa fa-users"></i>Interviews</a>
                    </li>
                   
                    
                          <li class="menu-item">
                              <a href="COProfile.php" > <i class="menu-icon fa fa-glide-g"></i>Company Profile</a>
                    </li>
                    
                         <li class="menu-item">
                             <a href="FeedBack.php" > <i class="menu-icon fa fa-star"></i>Rating</a>
                    </li>
                    
                                        
                     <li class="menu-item">
                        <a href="ViewPayement.php" > <i class="menu-icon fa fa-money"></i>View Payment History</a>
                    </li>
                        <li class="menu-item">
                             <a href="../Common/CommonServices.php?act=lg" > <i class="menu-icon fa fa-lock"></i>Logout</a>
                    </li>
                    <?php } else {
                        echo '<script>alert("Your Plan is expired !!Select Plan")</script>';
                        ?>
                    
                    <li class="menu-item">
                        <a href="MakePaynent.php" > <i class="menu-icon fa fa-credit-card-alt"></i>Make Payment</a>
                    </li>

                         <li class="menu-item">
                             <a href="../Common/CommonServices.php?act=lg" > <i class="menu-icon fa fa-lock"></i>Logout</a>
                    </li>
                    <?php }?>
              
                    
                    
                   


                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel #362680 -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
                   
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><b>JOB PORTAL</b></a>
                    <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                      
                      
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="COProfile.php"><i class="fa fa- user"></i>My Profile</a>

                           
                            <input type="submit" class="nav-link"  name="logout"/>
                        </div>
                    </div>

                </div>
            </div>
        </header>