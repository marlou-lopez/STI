<?php
   require_once 'core/init.php';
   include 'templates/header.php';
   if(Input::exists()){
      if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST,array(
            'username' => array('required' => true),
            'password' => array('required' => true)
         ));

         if($validation->passed()){
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;

            $login = $user->login(Input::get('username'), Input::get('password'),$remember);

            if($login){
               Redirect::to('index.php');
            }else{
               echo 'badshit';
            }
         }else{
            foreach($validation->errors() as $error){
               echo $error, '<br>';
            }
         }
      }
   }
?>

<div class="container">
   <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
         <div class="jumbotron">
            <h1>Log in</h1>
            <form action="" method="post">
               <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
               </div>
               <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
               </div>
               <div class="form-group">
                  <label for="remember">
                     <input type="checkbox"  name="remember" id="remember"> Remember me
                  </label>
               </div>

               <input type="hidden" name="token" value ="<?php echo Token::generate(); ?>">
               <input type="submit" class="form-control btn btn-primary" value="Log in">
            </form>
         </div>
      </div>
      <div class="col-lg-4"></div>
   </div>
</div>

<?php 
   include 'templates/footer.php';
?>
