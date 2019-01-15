<?php
   require_once 'core/init.php';
   include 'templates/header.php';

   if(Session::exists('home')){
      echo Session::flash('home');
   }
   
?>
   <div class="container">
   
   </div>
<?php 
   include 'templates/footer.php';