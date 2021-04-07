<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <?php
    include '../NavbarLogin.php';
    include '../Connection.php';
    /*       if(!isset($_SESSION['Login']['LId']))
        {
            header('Location:Login.php');
            return;
        }
*/
?>

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
