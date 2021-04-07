<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
        include './Sidebar.php';
        include '../Connection.php';
        /*   if(!isset($_SESSION['Login']['ADM']))
          {
          header('Location:../Login.php');
          return;
          } */
        ?>
        <script >
            function getstar(va) {
                //  alert(val);
             //   $('#hdn').val(va);
             document.getElementById('hdn').value=va;
                //alert(va + 'A');
                return true;
            }
        </script>
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            .rate {
                float: none;
                height: 96px;
                padding: 0 10px;
            }

            .rate:not(:checked) > input {
                position: absolute;
                top: -9999px;
            }

            .rate:not(:checked) > label {
                float: right;
                width: 1em;
                overflow: hidden;
                white-space: nowrap;
                cursor: pointer;
                font-size: 70px;
                color: #ccc;
            }

            .rate:not(:checked) > label:before {
                content: '★ ';
            }

            .rate > input:checked ~ label {
                color: #ffc700;
            }

            .rate:not(:checked) > label:hover,
            .rate:not(:checked) > label:hover ~ label {
                color: #deb217;
            }

            .rate > input:checked + label:hover,
            .rate > input:checked + label:hover ~ label,
            .rate > input:checked ~ label:hover,
            .rate > input:checked ~ label:hover ~ label,
            .rate > label:hover ~ input:checked ~ label {
                color: #c59b08;
            }

            /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
        </style>
    </head>
    <body>

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Add Department</strong>
                            </div>
                            <div class="card-body">


                                <div class="card-body card-block">
                                    <div class="form-group">

                                        <center>
                                            <br><br>
                                            <div class="p-3 mb-5 bg-white rounded" style="width: 60%;margin-top:-80px"><br>
                                                <h3>Rate Us </h3>
                                                <div class="rate card-body" >
                                                    <input type="radio" id="star5" name="rate" value="5" onclick="getstar(5)" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" onclick="getstar(4)" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" onclick="getstar(3)" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" onclick="getstar(2)" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" onclick="getstar(1)" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>    <br />

                                                <form action="" method="post">

                                                    <br /> <input type="submit" value=" Submit  Feedback "  name="f" style="margin-top: 39px;" class="btn btn-ca btn-lg"  > 
                                                    <input type="hidden" id="hdn" name="hn">

                                                </form>
                                            </div>
                                        </center>
                                    </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </body>
    <?php
    if (isset($_POST['f'])) {
        $v = $_POST['hn'];
        $lid = $_SESSION['Login']['CId'];
        //echo $v, $lid;
        $sql = "insert into tblfeedback(LoginId,Ratings,FeedType) Values($lid,$v,'co')";
        //echo $sql;
        if (mysqli_query($conn, $sql))
            echo "<script>alert('Feedback Submiited Sucesssfully');</script>";
        else
            echo "<script>alert('Please Give Ratings');</script>";
    }
    ?>
    <?php include './Footer.php'; ?>
</html>
