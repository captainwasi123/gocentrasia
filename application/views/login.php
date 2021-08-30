<?php
$alert_msg=$this->session->userdata('alert_msg');
?>
<html>
  <head>
  <link rel="icon" type="image/png" href="">
<title>Admin Login</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="assets/css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">

<div class="login-form" style="margin-top: 100px;">
<div class="main-div">
    <div class="panel">
                 
   <h2>Login to your account</h2>
   <p>Please enter your username and password</p>
   <?php
      if (!empty($alert_msg)) {
        $flash_status = $alert_msg[0];
        $flash_header = $alert_msg[1];
        $flash_desc = $alert_msg[2];
          if ($flash_status == 'failure') { ?>
   <p style="color:red"><b><?php echo $flash_desc; ?></b></p>
   <?php
      }
          }
    ?>
   </div>
    <form id="Login" action="Auth/login" method="post">

        <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" name="username" placeholder="User Name">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">

        </div>
        <div class="forgot">
</div>
        <button type="submit" class="btn btn-primary" style="background: #4fb7fe!important">Login</button>

    </form>
    </div>
</div></div></div>


</body>
</html>
