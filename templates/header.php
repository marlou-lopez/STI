<?php $user = new User(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>BFP</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.2.1/united/bootstrap.min.css" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">BFP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
         aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="modal" data-target="#applicationModal">Application</a>
            </li>
            <!-- Para makita username pag ka login, comment ko muna kase di naman need sa ngayon -->
            <?php //if($user->isLoggedIn()) : ?>
            <!-- <li class="nav-item">
               <a class="nav-link" href="profile.php?user=<?php //echo escape($user->data()->username); ?>">Welcome,
                  <?php //echo escape($user->data()->username); ?> </a>
            </li> -->
            <?php //endif; ?>
         </ul>
         <?php if(!$user->isLoggedIn()) : ?>
         <button type="button" class="btn btn-light" data-toggle="modal" data-target="#loginModal">
            Login
         </button>
         <!--
            Ewan ko pa kung sang part magreregister, so baka tanggalin ko rin to
         -->
            <a href="http:register.php" class="btn btn-primary">Register</a> 
         <?php endif; ?>
         <!-- Lagay ko muna tong log out -->
         <?php if($user->isLoggedIn()) : ?>
         <a href="http:logout.php" class="btn btn-danger">Logout</a>
         <?php endif; ?>
      </div>
   </nav>
   

   <div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Account Type</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <a href="http:login_emp.php" class="btn btn-primary btn-block">Employee</a>
                  </div>
                  <div class="col-md-6">
                     <a href="http:login_app.php" class="btn btn-primary btn-block">Applicant</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Application</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <p>New Application?</p>
                     <a href="http:register_fsec.php" class="btn btn-primary btn-block">FSEC</a>
                     <a href="http:register_fsic_o.php" class="btn btn-primary btn-block">FSIC - Occupancy</a>
                     <a href="http:register_fsic_b.php" class="btn btn-primary btn-block">FSIC - Business</a>
                  </div>
                  <div class="col-md-6">
                     <p>Renew Application?</p>
                     <a href="#" class="btn btn-primary btn-block">FSEC - Business</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>