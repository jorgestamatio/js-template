<?php
include("classes/include.php");

/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 *
 */

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Register</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">



	<!-- Styles -->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/bootstrap-responsive.css">

  <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

      footer{
    text-align: center;
      }
  </style>

	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="../img/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/ico/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/ico/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../img/ico/apple-touch-icon-57x57-precomposed.png">


</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->

<div class="container">

<div class='form-signin'>
<?php
/**
 * The user is already logged in, not allowed to register.
 */
if($session->logged_in){
   echo "<h1>Registered</h1><br>";
   echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
       ."<br><a href='index.php'>&larr; Back to main</a>";
}
/**
 * The user has submitted the registration form and the
 * results have been processed.
 */
else if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess'] != false){
      echo "<h1>Registered!</h1><br>";
      echo "<p>Thank you <b>".$_SESSION['reguname']."</b>. Please follow the link on the email we sent you to complete your registration.</p>";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1><br>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again later.</p>";
      echo "<br><a href='index.php'>&larr; Back to main</a>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>


<form action="process.php" method="POST">
<h1>Register!</h1><br>
<p>Please fill in all the fields below to register.</p>
<div class="control-group <?php if($form->error("user")){ echo 'error'; }?>">
	<input type="text" class="input" name="user" placeholder='Username' value="<?php echo $form->value("user"); ?>"> <?php echo $form->error("user"); ?> 
</div>
<div class="control-group <?php if($form->error("pass")){ echo 'error'; }?>">
	<input type="password" class="input" name="pass" placeholder='Password' value="<?php echo $form->value("pass"); ?>"> <?php echo $form->error("pass"); ?> 
</div>
<div class="control-group <?php if($form->error("email")){ echo 'error'; }?>">
	<input type="text" class="input" name="email" placeholder='you&#64;mail.com' value="<?php echo $form->value("email"); ?>"> <?php echo $form->error("email"); ?>
</div>
<br>

<p class="help-block">In order to register you must ask for the code.</p>
<div class="control-group <?php if($form->error("code")){ echo 'error'; }?>">
	<input type="text" class="input" name="code" placeholder='The code'> <?php echo $form->error("code"); ?>
</div> 
<input type="hidden" name="subjoin" value="1"><br>
<input type="submit" value="Register!" class="btn btn-primary btn-large"><br>
<br>
<a href="index.php" class='btn'>&larr; Back to Login page</a>
</form>
<?php
}
?>


</div><!--/.register-form -->
</div><!--/.container -->

<footer>
&copy; <?php echo $year; ?> <?php echo COMPANY_NAME; ?>
</footer>

<script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- Bootstrap JS-->
<script src="../js/vendor/bootstrap.min.js"></script>



<script src="../js/plugins.js"></script>
<script src="../js/main.js"></script>


</body>
</html>
