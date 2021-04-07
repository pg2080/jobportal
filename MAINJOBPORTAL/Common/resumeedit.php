<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <?php
        include './NavbarLogin.php';
        include '../Connection.php';
        /*       if(!isset($_SESSION['Login']['LId']))
          {
          header('Location:Login.php');
          return;
          }
         */
        $lid = $_SESSION['Login']['LId'];
        $sql="Select * from resume where loginId = $lid";
        $res = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        //print_r($res);
        ?>

        <div class="hero-wrap hero-wrap-2" style="background:transparent" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-start">
                    <div class="col-md-8 ftco-animate text-center text-md-left mb-5">
                        <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                        <h5 class="mb-5 bread" style="margin-bottom: 5rem !important;">Make Free access to resume !!</h5>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <div class="card  shadow-lg p-3 mb-5 bg-white rounded" style="width: 70%;margin-top:-290px;margin-left: 190px;"><br>
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Resume </h3>
                <div class="col-md-12"><div class="row">
                        <div class="col-md-6 ">
                            <label class="pull-left">Objective: </label>
                            <textarea cols="30" rows="3" name="obj" class="form-control "  ><?php echo $res['Objective']; ?></textarea>

                        </div>
                        <div class="col-md-6 "><?php $re = explode(',', $res['maxedu']) ;                                echo $re[0];?> 
                            <label>Higest Eduaction :</label>
                            <select class="form-control " name="edu">
                                <option value="0">Select</option>
                                <option value="10th Pass" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>10th Pass</option>
                                <option value="12 Pass" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>12 Pass</option>
                                <option value="Diploma" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>Diploma</option>
                                <option value="Graduate" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>Graduate</option>
                                <option value="Masters Degree" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>Masters Degree</option>
                                <option value="Post Graduate" <?= $row['maxedu'] == $re[0] ? ' selected="selected"' : ''; ?>>Post Graduate</option>

                            </select>
                            <label>Grade of this:</label>
                            <input type="text" class="form-control" name="gr" value="<?php echo $re[1]; ?>" placeholder="Grade/Percentage " />
                        </div>
                    </div></div>
                <?php $project = explode(',', $res['Project']);$projDes = explode(',', $res['ProjectDescription'] ); $proimg = explode(',', $res['ProjectImage']);
                ?>
                <?php  $ext = explode(',', $res['ProjectImage']);
                                ?>

                <div class="col-md-12 mt-5">
                    <b style="color: black">About Project </b>(ex Academic,research)
 
                    <div class="row">
                        <div class="col-md-6">
                            <label> Project1 name &Image </label> <input type="text" value="<?php echo $project[0]; ?>" placeholder="project name" name="p1name" class="form-control">
                            <input type="file" name="p1img"  class="mt-2 col-md-7"/> <img title="cuurent  image" class="mt-2 " src="Resume/Proj1/<?php echo $ext[0] ?>" width="100px" alt="">
                        </div>
                        <div class="col-md-6 ">
                            <label class="pull-left">Project1 Description: </label>
                            <textarea name="p1des" cols="30" rows="3" class="form-control " ><?php echo $projDes[0]; ?>" </textarea>

                        </div>
                    </div>
                </div>
                <hr class="">
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label> Project2 name &Image </label> <input type="text" name="p2name" value="<?php echo $project[1]; ?>"  placeholder="project name" class="form-control">
                            <input type="file" name="p2img"  class="mt-2 col-md-7"> <img title="cuurent  image" class="mt-2" src="Resume/Proj2/<?php echo $ext[1] ?>" width="100px" alt="">
                        </div>
                        <div class="col-md-6 ">
                            <label class="pull-left">Project2 Description: </label>
                            <textarea cols="30" rows="3" name="p2des" class="form-control " ><?php echo $projDes[1]; ?>"</textarea>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Certification</label>
                            <textarea  id="certi" onchange="gettar(this.id)" name="certiii"  cols="30" rows="3" placeholder="Certificates(Enter Name of Certificate and end it with ,)" class="form-control"><?php echo $res['Certification']; ?></textarea>
                            <input type="hidden" value="<?php echo $res['Certification']; ?>"  name="certi" id="hcerti">

                        </div>
                        <div class="col-md-6">
                            <label class="pull-left">Extra Skill: </label>
                            <textarea cols="30" rows="3" class="form-control " name="skil"  id="esl" onchange="gettar(this.id)" placeholder="Extra skill (Seprate it with (,))"><?php echo $res['ExtraSkills']; ?></textarea>
                            <input type="hidden" name="skill" id="hesl" value="<?php echo $res['ExtraSkills']; ?>">

                        </div>

                    </div>

                </div>

                <div class="col-md-12  mt-3">
                    <div class="row">

                        <div class="col-md-6"><label>About Services</label>
                            <textarea  onchange="gettar(this.id)" value="" name="ssr" id="ser" placeholder=" Services name(Seprate it with (,))"  cols="5" rows="3" class="form-control"><?php echo $res['Services']; ?></textarea>
                            <input type="hidden" name="sr" id="hser" value="<?php echo $res['Services']; ?>">
                        </div>
                        
                        <div class="col-md-6"><label>About Services</label>
                            <textarea  onchange="gettar(this.id)" name="abtssr" value="" id="abtser" placeholder="About Services(Seprate it with (,))"  cols="5" rows="3" class="form-control"><?php echo $res['AboutServices']; ?></textarea>
                            <input type="hidden" name="abtsr" id="habtser" value="<?php echo $res['AboutServices']; ?>">
                        </div>
                    </div>
                    <center>
                        <div class="col-md-6"><label> Resume File(optional)</label><input type="file" class="" name="res"></div>
                        <a href="../Resume-Builder-master/Resume-Builder-master/index.php" target="_blank">Click Here to use Resume builder to build and  add more info in your resume</a>
                    </center>
                    </div>

                <br /> <input type="submit" value=" Submit "  name="f" class="btn btn-primary btn-lg"  > 
                <br />
                </div>
            </form>
        </div>
        <script>
            function gettar(id) {
                //  alert(val);
                //alert('id0'+id);
                var sertext = document.getElementById(id).value;
                                document.getElementById('h'+id).value=sertext;

                console.log(sertext);
                var newText = '1]. ';
                var count = 2;
                console.log(sertext.length);
                for (var i = 0; i < sertext.length; i++)
                {
                    if (sertext[i] == ",") {
                        newText = newText + sertext[i].replace(',', '.' + '\n' + count + ']. ');
                        count++;
                    } else {
                        newText = newText + sertext[i];
                    }
                }
                document.getElementById(id).value = newText + '.';
                return true;
            }
        </script>

    </body>
    <?php

    function uploadMyFiles($Path, $extensions, $file_name, $file_size, $file_tmp, $file_type, $file_ext) {
        //echo "<script>alert('HI');</script>";
        $errors = array();
         /*$file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type']; 
        ///$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        // $extensions= array("jpeg","jpg","png");*/
        echo $Path.$file_name;
         if(in_array($file_ext,$extensions)=== false){
          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
          }

          if($file_size > 2097152){
          $errors[]='File size must be excately 2 MB';
          }
          //echo "IN IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII";

          if(empty($errors)==true){
          move_uploaded_file($file_tmp,$Path.$file_name);
          echo "Success";
          }else{
          print_r($errors);
          } 
    }

    if (isset($_POST['f'])) {
        $obj = $_POST['obj'];
        $edu = $_POST['edu'];
        $gr = $_POST['gr'];
        $p1name = $_POST['p1name'];
        $p1des = $_POST['p1des'];
        $p1img = $_POST['p1img'];
        $p2name = $_POST['p2name'];
        $p2des = $_POST['p2des'];
        $cert = $_POST['certi'];
        $skill = $_POST['skill'];
        $sr = $_POST['sr'];
        $abtsr = $_POST['abtsr'];
        $srr=explode(',', $sr);
        $abtsrr=explode(',', $abtsr);
        
        if(count($srr) != count($abtsrr))
        {
            echo "<script>alert(' Thers is count mismatch in service name and about');</script>";
            return;
        }

        //return ;
        $lid = $_SESSION['Login']['LId'];
        //Proj1
        $file_name = $lid;//$lid;// $_FILES['p1img']['name'];
        $file_size = $_FILES['p1img']['size'];
        $file_tmp = $_FILES['p1img']['tmp_name'];
        $file_type = $_FILES['p1img']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['p1img']['name'])));
        $Path = "Resume/Proj1/";
        $extensions = array("jpg","jpg");
        echo 'AAA'. $file_tmp;
        if(!empty($_FILES['p1img']['name']))
        { uploadMyFiles($Path,$extensions,$file_name,$file_size,$file_tmp,$file_typ,$file_ext);
        }
                //Proj1
        $file_name1 = $lid;
        $file_size1 = $_FILES['p2img']['size'];
        $file_tmp1 = $_FILES['p2img']['tmp_name'];
        $file_type1 = $_FILES['p2img']['type'];
        $file_ext1 = strtolower(end(explode('.', $_FILES['p2img']['name'])));
        $Path1 = "Resume/Proj2/";
        $extensions1 = array("jpg","jpg");
        echo 'AAA'. $file_tmp;
        if(!empty($_FILES['p2img']['name']))
        {  uploadMyFiles($Path1,$extensions1,$file_name1,$file_size11,$file_tmp1,$file_type1,$file_ext1);
        }
        
        $file_name2 = $lid.'.pdf';//.'_'. $_FILES['p1img']['name'];
        $file_size2 = $_FILES['res']['size'];
        $file_tmp2 = $_FILES['res']['tmp_name'];
        $file_type2 = $_FILES['res']['type'];
        $file_ext2 = strtolower(end(explode('.', $_FILES['res']['name'])));
        $Path2 = "Resume/";
        $extensions2 = array("pdf","pdf");
        echo 'AAA'. $file_tmp;
        
        if(!empty($_FILES['res']['name']))
        {uploadMyFiles($Path2,$extensions2,$file_name2,$file_size2,$file_tmp2,$file_type2,$file_ext2);
        }
//echo $v, $lid;
            $abt = $edu.','.$gr;
            $pron = $p1name.','.$p2name;
            $pde= $p1des.','.$p2des;
            $pimg = $file_name.','.$file_name1;
            $sql = "update resume set  Objective='$obj', Services='$sr', AboutServices='$abtsr',maxedu='$abt', Project='$pron', ProjectDescription='$pde', ProjectImage='$pimg', Certification='$cert', ExtraSkills='$skill' where LoginId= $lid" ;
                 // . ") VALUES ($lid,'$obj','$sr','$abtsr','$abt','$pron','$pde','$pimg','$cert','$skill')";
          echo $sql;
          if (mysqli_query($conn, $sql))
          echo "<script>alert('Resume Updated Sucesssfully');</script>";
          else
          echo "<script>alert(' Error');</script>";
    }
    ?>
    <?php include './Footer.php'; ?>
</html>
