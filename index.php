<?php
   require_once 'core/init.php';
   include 'templates/header.php';

   if(Session::exists('home')){
      echo Session::flash('home');
   }

   $user = new User();

   if($user->isLoggedIn()){
      ?>
         <p>Hello <a href="http:profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a></p>

         <ul>
            <li><a href="http:logout.php">Log out</a></li>
            <li><a href="http:update.php">Update Details</a></li>
            <li><a href="http:changepassword.php">Change Password</a></li>
         </ul>
      <?php

      if($user->hasPermission('admin')){
         echo 'You are an admin';
      }

   } else{
      echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a></p>';
   }

   include 'templates/footer.php';