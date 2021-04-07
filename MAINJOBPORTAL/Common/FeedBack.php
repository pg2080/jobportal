<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <?php
    include './NavbarLogin.php';
    include '../Connection.php';
           if(!isset($_SESSION['Login']['LId']))
        {
            header('Location:Login.php');
            return;
        }

?>
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

    <div class="hero-wrap hero-wrap-2" style="background:transparent" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-8 ftco-animate text-center text-md-left mb-5">
                                            <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                                            <h1 class="mb-5 bread" style="margin-bottom: 5rem !important;">Help us to Serve You Better !!</h1>
                </div>
            </div>
        </div>
    </div>
    <center>
        <br><br><br><br><br><br>
        <div class="card  shadow-lg p-3 mb-5 bg-white rounded" style="width: 30%;margin-top:-290px"><br>
            <form action="" method="post">
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
            </div>
            <br /> <input type="submit" value=" Submit  Feedback "  name="f" class="btn btn-primary btn-lg"  > 
            <input type="hidden" id="hdn" name="hn">
        <br />
         <!--   <asp:HiddenField  runat="server" Value="0"  id="hdn" ClientIDMode="Static"/>
            <asp:TextBox runat="server" placeholder="Write Comment here" CssClass="form-control" ID="cmt" ToolTip="Optional"></asp:TextBox>
          <asp:Label runat="server" ID="lblerr" Visible="false" ForeColor="Red"></asp:Label>
              <br />
            <asp:Button runat="server" CssClass="btn btn-lg btn-primary" Text="Submit" OnClick="Unnamed_Click" />
       --> </form>
    </div>
        </center>
    <script>
        function getstar(va) {
            //  alert(val);
            $('#hdn').val(va);
           //alert(va+'A');
            return true;
        }
    </script>
  </body>
  <?php 
    if(isset($_POST['f']))
    {
        $v= $_POST['hn'];
        $lid = $_SESSION['Login']['LId'];
        echo $v,$lid;
        $sql="insert into tblfeedback(LoginId,Ratings,FeedType) Values($lid,$v,'JS')";
        echo $sql;
        if(mysqli_query($conn, $sql))
            echo "<script>alert('Feedback Submiited Sucesssfully');</script>";
        else 
            echo "<script>alert('Feedback Error');</script>";

    }
  ?>
    <?php include './Footer.php'; ?>
</html>
