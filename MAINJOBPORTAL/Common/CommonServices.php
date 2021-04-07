<?php
session_start();
//error_reporting(0);
require 'Connection.php';



function checkIsLogin($ut) {
    if (isset($_SESSION['Login']['ut'])) {
        if ($ut == $_SESSION['Login']['ut']) {
             //  echo "<script>alert('User is Match')</script>";
     
        } else {
               echo "<script>alert('User is not Match')</script>";
     
           header("Location:../Login.php");
        }
        /* echo "<script>alert('User is L   ogin')</script>";
          echo $_SESSION['Login']['ut'];
          if($_SESSION['Login']['ut'] =='co')
          header("Location:CompanyAdmin/Homepage.php");

          if($_SESSION['Login']['ut'] =='CH')
          header("Location:CompanyHR/Homepage.php");

          if($_SESSION['Login']['ut'] =='JS')
          header("Location:Common/HomepageSeeker.php"); */
    } else {
        echo "<script>alert('User is not Login')</script>";
       header("Location:../Login.php");
    }
}

function  uploadMyFile($Path,$extensions,$file_name,$file_size,$file_tmp,$file_type,$file_ext)
{
    echo "<script>alert('HI');</script>";
         $errors= array();
     /* $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];*/
      ///$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
     // $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
               echo "IN IIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII";

      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$Path.$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
}
function Login($username, $password, $conn) {

    //return "UserLogin";
    $stmt = $conn->prepare("Select * from tbllogin where Email=? and Password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all();

    return $result;
}

function RegisterCompany($conn, $compnme, $address, $city, $state, $cname, $mobile, $cEmail, $cWebsite, $logo, $cAbout, $Email, $password) {
    $querylrc = 'INSERT INTO tbllogin(Email,Password,UserType) VALUES(?,?,?)';
    $stmtl = $conn->prepare($querylrc);
    echo $Email;
    $ut = "co";
    $stmtl->bind_param('sss', $Email, $password, $ut);
    $stmtl->execute();

    $loginid = $conn->insert_id; //$_SESSION["loginid"]
    echo $loginid;
    $queryrc = 'INSERT INTO companyinfo(LoginId,CompanyName, Address, City, State,ContactPersonName,Mobile,CompanyEmail,Wesite,CompanyLogo,AboutCompany) VALUES(?,?,?,?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($queryrc);
    $stmt->bind_param('issiissssss', $loginid, $compnme, $address, $city, $state, $cname, $mobile, $cEmail, $cWebsite, $logo, $cAbout);
    if ($stmt->execute()) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    return $conn->insert_id;
}

function getstate($conn) {
    $statq = "Select * from tblstate";
    $result = mysqli_query($conn, $statq);
    return $result;
}

/*function getcity() {
    $id = $_POST["sid"];
    $statq = "Select * from tblcity";
    $result = mysqli_query($conn, $statq);
    return $result;
}*/

function RegisterSeeker() {
    
}

          if(isset($_GET['act']) )
                    {
                        if($_GET['act']=='lg'){
                       //$_SESSION['Login'] = array();
                              session_destroy();
                               header('Location:../Homepage.php');
                        }
                    }

/*
 * job--dept---
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>