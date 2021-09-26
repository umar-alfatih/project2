<?php
    @session_start();
        include "koneksi.php";
        if (@$_SESSION['admin']){
            header("location:inde.php");
        } else  
        if (@$_SESSION['tatausaha']){
            header("location:tatausaha/index.php");
        } else 
        if (@$_SESSION['guru']){
            header("location:guru/index.php");
        } else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman Login</title>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Administrasi</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/sweet/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="js/sweet/sweetalert2.css">
    
  </head>  
<body style="background-color:#6495ED;">
<div class="container">
        
            <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
            <div class="panel-heading-group">
            <img src="img/lamban.png" width="60%" alt="" style="margin-bottom: 10px; margin-left: 80px">
            
                    <h5 class="panel-title" align="center"><strong>LOGIN ADMINISTRATOR</strong></h5>                    
                    </div>
          <div class="panel-body">              
              <form  method="POST">
              <fieldset>
                <div class="form-group input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                  <input type="text"class="form-control" name="username" placeholder="Input username anda!" required autofocus>
                </div>
                                
                <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input type="password" class="form-control" name="pass" placeholder="Input Password anda!" required>
                </div>

                <div class="form-group">
                <strong>
                <input type="submit" name="login" class="btn btn-primary col-sm-12" value="Log In"></strong>
                </div>
                <br></br>
                <p class="mt-5 mb-3 text-muted text-center">(&copy; Project1_Umar&Salmia 05/09/2021)</p>
              </form>

            <?php
             if (@$_POST['login']){
             $username = @$_POST['username'];
             $pass = @$_POST ['pass'];
             if ($username == '' || $pass == ''){
            ?>
             <script type="text/javascript">alert("Username / Password Tidak Boleh Kosong")</script>
            <?php
              } else {
        $sql =  mysqli_query($conn,"SELECT*FROM tb_pengguna WHERE username = 
         '$username' and pass='$pass'");
                            
         $data = mysqli_fetch_array($sql);
         $cek = mysqli_num_rows($sql);
         if ($cek >= 1){
         if($data['status'] == "admin"){
         @$_SESSION ['admin'] = $data ['id_pengguna'];
         header("location:/siswaonline/inde.php");
         } else if($data['status'] == "tatausaha"){
         @$_SESSION ['tatausaha'] = $data ['id_pengguna'];
         header("location:tatausaha/index.php");
         } else if($data['status'] == "guru"){
         @$_SESSION ['guru'] = $data ['id_pengguna'];
         header("location:guru/index.php");
         }
        
        } else  {
        ?>
         <script type="text/javascript">alert("Login Gagal")</script>
        <?php
            }
           }
          }
        ?>

                
                    
</div>
</div>
</div>
</div>
</div>

            
<?php
}
?>