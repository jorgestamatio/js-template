<div class="navbar navbar navbar-static-top">
  <div class="navbar-inner">
    <a class="brand" href="#"><?php echo COMPANY_NAME; ?></a>
    <ul class="nav">
      <li class="active"><a href="#">Home</a></li>
    </ul>
    
    <ul class="nav pull-right">
        <?php 
          if($session->logged_in){
            include 'nav-logout.php'; 
          }
          else{
            include 'nav-login.php';
          }       
        ?>    
    </ul>

  </div>
</div>